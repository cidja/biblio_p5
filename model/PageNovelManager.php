<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
namespace cidja\pageNovelManager;
use cidja\managerDb\Model_ManagerDb;
require_once("model/ManagerDb.php"); //calling the file for the connection to the database

class Model_PageNovelManager extends Model_ManagerDb
    {
        public function currentPageCount($id) // method for displaying the number of pages already read
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT new_page_count,  DATE_FORMAT(update_date, "%d/%m/%Y à %Hh%imin%ss") AS update_date_fr FROM novel_page_count WHERE novel_id=?');
            $currentPageCount = $req->execute(array($id));
            return $currentPageCount;

        }

        public function createPageCount($id) // method that will create an entry a 0 in the table novel_page_count this in order to see it displayed in current book
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO novel_page_count (novel_id, new_page_count, update_date)
                                VALUES (:novel_id, 0, NOW())");
            $req->execute(array(
                "novel_id"         => $id
            )); 
        }

        public function newPageCount($id, $newPageCount) // method for inserting the number of pages already read
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO novel_page_count (novel_id, new_page_count, update_date)
                                VALUES (:novel_id, :new_page_count,NOW())");
            $req->execute(array(
                "novel_id"         => $id,
                "new_page_count"   => $newPageCount
            )); 
        }

        public function readingNovelTime($novel_id) // method for displaying the time taken to read the book
        {
            $db = $this->dbConnect();
            $req = $db->prepare("SELECT update_date FROM novel_page_count WHERE novel_id=? ORDER BY update_date limit 0,1"); //to select the first record in the playback table
            $beginDate = $req->execute(array($novel_id));

            $req = $db->prepare("SELECT update_date FROM novel_page_count WHERE novel_id=? ORDER BY update_date DESC limit 0,1"); //to select the last record in the playback table
            $endDate = $req->execute(array($novel_id));

            $dateDiff = $db->prepare('SELECT DATEDIFF(":endDate", ":beginDate")');
            $readingNovelTime = $dateDiff->execute(array(
                "endDate"       => $endDate,
                "beginDate"     => $beginDate
            ));
            return $readingNovelTime;
        }
    }