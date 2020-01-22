<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

require_once("model/ManagerDb.php"); //calling the file for the connection to the database

class Model_PageCartoonManager extends Model_ManagerDb
{
    public function currentPageCount($id) // method for displaying the number of pages already read
        {
            $db = $this->dbConnect();
            $req = $db->prepare('SELECT new_page_count,  DATE_FORMAT(update_date, "%d/%m/%Y à %Hh%imin%ss") AS update_date_fr FROM cartoon_page_count WHERE novel_id=?');
            $currentPageCount = $req->execute(array($id));
            return $currentPageCount;

        }

        public function newCartoonPageCount($id, $newPageCount) // method for inserting the number of pages already read
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO cartoon_page_count (cartoon_id, new_page_count, update_date)
                                VALUES (:cartoon_id, :new_page_count,NOW())");
            $req->execute(array(
                "cartoon_id"         => $id,
                "new_page_count"   => $newPageCount
            )); 
        }
}