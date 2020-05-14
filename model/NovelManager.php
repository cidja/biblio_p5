<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
namespace cidja\novelManager;

use cidja\managerDb\Model_ManagerDb;
use \PDO;
require_once(dirname(__FILE__)."/ManagerDb.php"); //calling the file for the connection to the database


class Model_NovelManager extends Model_ManagerDb
    {

        //For debut use : $infos->debugDumpParams(); 
        public function allNovelInfos() //method for retrieving all the information from all the novels
        {
            $db = $this->dbConnect();
            $infos = $db->query('SELECT id,title, author, isbn, genre,`publication`, page_count, count_volume, 
            active, finish, comment, rate, cover,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel ORDER BY id DESC');
            return $infos;
        }
        
        public function oneNovelInfos($id) //method for retrieving all the information from one novel with $_GET["id"]
        {
            $db = $this->dbConnect();
            $infos = $db->prepare('SELECT id,title, author, isbn, genre, `publication`, page_count, count_volume, active,finish, comment,rate,cover,
                                    DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr, begin_date, 
            end_date  FROM novel WHERE id=?');
            $infos->bindValue(1, $id, PDO::PARAM_INT);
            $infos->execute();
            return $infos;
            
        }

        public function genreSortNovel($genre)
        {
            $db= $this->dbConnect();
            $genreSort = $db->prepare('SELECT id,title, author, isbn, genre,`publication`, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE genre=? ORDER BY author');
            $genreSort->bindValue(1, $genre, PDO::PARAM_STR);
            $genreSort->execute();
            return $genreSort;

        }

        public function sortAlphabetical(){
            $db = $this->dbConnect();
            $sortAlphabetical = $db->prepare('SELECT id,title, author, isbn, genre,`publication`, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel ORDER BY title');
        }

        public function genreCountNovels($genre) // method that counts the number of novels
        {
            $db = $this->dbConnect();
            $countNovels = $db->prepare("SELECT COUNT(title) as nb FROM novel WHERE genre=?");
            $countNovels->execute(array($genre)); //source: https://openclassrooms.com/forum/sujet/pdo-compter-le-nombre-de-resultats-d-une-requete
            $result = $countNovels->fetch();
            $nbNovels = $result['nb'];
            return $nbNovels;
        }

        public function oneNovelInfosAjax($id) //method for retrieving all the information from one novel with $_GET["id"]
        {
            $db = $this->dbConnect();
            $infos = $db->prepare('SELECT id,title, author, isbn, genre, `publication`, page_count, count_volume, active,finish, comment,rate,cover,
                                    DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE id=?');
            $infos->bindValue(1, $id, PDO::PARAM_INT);
            $infos->execute();
            echo $infos;
            
        }

        /* NOT USE
        public function novelsRead() // method that displays the books read based on whether 1 in the table (read) otherwise (not finished)
        
        {
            $db = $this->dbConnect();
            $novelsread = $db->query('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE finish = 1');
            return $novelsread;
        }*/

        
        public function novelCurrent() // method that displays the current novel
        {
            $db = $this->dbConnect();
            $novelcurrent = $db->query('SELECT novel.id, novel.title, novel.author, novel.isbn, novel.genre, novel.page_count, novel.count_volume, novel.active,novel.finish, 
                                        novel.comment,novel.rate,novel.cover, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr, novel_page_count.novel_id,
                                        novel_page_count.new_page_count,  DATE_FORMAT(update_date, "%d/%m/%Y à %Hh%i") AS update_date_fr FROM novel 
                                        INNER JOIN novel_page_count on novel.id = novel_page_count.novel_id WHERE active = 1 ORDER BY update_date_fr DESC LIMIT 0,1;');
                                        // inner query for table join with a date_format on the dates of the 2 tables, a descending ranking and we keep that the last record 
                                        // used to display new_pages_count
            return $novelcurrent;
            
        }

        public function lastUpdate($id)
        {
            $db = $this->dbConnect();
            $lastUpdate = $db->prepare('SELECT novel.id, novel_page_count.novel_id, novel_page_count.new_page_count,
            novel_page_count.update_date FROM novel_page_count INNER JOIN novel on novel_page_count.novel_id = novel.id 
           WHERE novel_page_count.novel_id = ? ORDER BY update_date DESC LIMIT 0,1');
           $lastUpdate->bindValue(1, $id, PDO::PARAM_INT);
           $lastUpdate->execute();
            return $lastUpdate;
        }

        public function countNovels() // method that counts the number of novels
        {
            $db = $this->dbConnect();
            $countNovels = $db->query("SELECT COUNT(title) as nb FROM novel"); //source: https://openclassrooms.com/forum/sujet/pdo-compter-le-nombre-de-resultats-d-une-requete
            $result = $countNovels->fetch();
            $nbNovels = $result['nb'];
            return $nbNovels;
        }
        
        public function countPages() // method that counts the total number of pages in the library
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT SUM(page_count) as nb_pages FROM novel");
            $result = $req->fetch();
            $countPages = $result["nb_pages"];
            return $countPages;
        }

        public function avgPages() // method that counts the average number of pages in the library
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT AVG(page_count) as avg_nb_pages FROM novel");
            $result = $req->fetch();
            $avgPages = $result["avg_nb_pages"];
            return $avgPages;
        }

        public function addNovelConfirm($title, $author,$isbn, $publication, $genre, $page_count, $count_volume, $comment, $rate, $cover)
        {
            $db = $this->dbConnect();
            $addNovel = $db->prepare("INSERT INTO novel(`title`, `author`, `isbn`, `publication`, `genre`, `page_count`, `count_volume`,
                                     `active`, `finish`, `comment`, `rate`, `cover`, `creation_date`)
                                      VALUES(:title, :author, :isbn, :publication, :genre, :page_count, :count_volume, 
                                      :active, :finish, :comment, :rate, :cover, NOW())");
            $addNovel->execute(array(
                "title"         => $title,
                "author"        => $author,
                "isbn"          => $isbn,
                "publication"   => $publication,
                "genre"         => $genre,
                "page_count"    => $page_count,
                "count_volume"  => $count_volume,
                "active"        => 0, //to say it's non active by default
                "finish"        => 1,
                "comment"       => $comment,
                "rate"          => $rate,
                "cover"         => $cover
            ));
            $lastId = $db->lastInsertId();  // source: I retrieve the last id entered in the novel table to insert it in my 
                                            //query from below and display it with the novelCurrent method. 
                                            // https://openclassrooms.com/forum/sujet/pdo-lastinsertid-61280
            $updatePageCount = $db->prepare("INSERT INTO novel_page_count (`novel_id`, `new_page_count`, `update_date`)
            VALUES(?, '0', NOW())");
            $updatePageCount->execute(array($lastId));
        }

        public function creationUpdateNovelPageCount($id) // method that adds 0 to the creation of an entry 
        {
            $db = $this->dbConnect();
            $updatePageCount = $db->prepare("INSERT INTO novel_page_count(novel_id, new_page_count, update_date)
            VALUES(?, 0, :NOW()");
            $updatePageCount->bindValue(1, $id, PDO::PARAM_INT);
            $updatePageCount->execute();
        }

        public function updateNovel($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume, $active, $comment, $rate, $cover, $begin_date, $end_date)
        {
           
            $db = $this->dbConnect();
            $updateNovel = $db->prepare("UPDATE novel SET title=:title, author=:author, isbn=:isbn, publication=:publication, genre=:genre, page_count=:page_count,
                                         count_volume=:count_volume, active=:active,
                                         comment=:comment, rate=:rate, cover=:cover, begin_date=:begin_date, end_date=:end_date WHERE id=:id");
            $updateNovel->execute(array(
                "id"            => $id,
                "title"         => $title,
                "author"        => $author,
                "isbn"          => $isbn,
                "publication"   => $publication,
                "genre"         => $genre,
                "page_count"    => $page_count,
                "count_volume"  => $count_volume,
                "active"        => $active,
                "comment"       => $comment,
                "rate"          => $rate,
                "cover"         => $cover,
                "begin_date"    => $begin_date,
                "end_date"      => $end_date
                
            ));
            
        }

        public function insertLendNovel($id, $lend, $borrower, $lend_date)
        {
            $db = $this->dbConnect();
            /*
            $test = $db->query("SELECT id, novel_id FROM novel_lend WHERE novel_id=?");
            $result = $test->execute(array($id));
            print_r($result);*/


            if($lend == 1){ //if lend 1 (The book's already on loan. We can't get in the loop.)
                
                $insertLend = $db->prepare("INSERT INTO `novel_lend`(`novel_id`,`lend`, `borrower`,`lend_date`)
                VALUES(:novel_id, :lend, :borrower, :lend_date)");
                    $insertLend->execute(array(
                    "novel_id"      => $id,
                    "lend"          => $lend,
                    "borrower"      => $borrower,
                    "lend_date"     => $lend_date   
                ));
            } 
        }

        public function statusLendNovel($id)
        {
            $db = $this->dbConnect();
            $statusLendNovel = $db->prepare("SELECT novel_id, lend, borrower, lend_date FROM novel_lend WHERE novel_id= ?");
            $statusLendNovel->bindValue(1, $id, PDO::PARAM_INT);
            $statusLendNovel->execute();
            return $statusLendNovel;
        }

        public function deleteNovel($id)
        {
            $db = $this->dbConnect();
            $deleteNovel = $db->prepare("DELETE FROM novel  WHERE id=?");
            $deleteNovel->bindValue(1, $id, PDO::PARAM_INT);
            $deleteNovel->execute();

        }

        public function endReading($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("UPDATE novel SET active=0, finish=1 WHERE id=?");
            $req->bindValue(1, $id, PDO::PARAM_INT);
            $endReading= $req->execute();
        }

    }

