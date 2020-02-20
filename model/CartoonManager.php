<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
namespace cidja\cartoonManager; //source: https://youtu.be/WHtbi8S0rkI?t=163

use \cidja\managerDb\Model_ManagerDb;


require_once("model/ManagerDb.php"); //calling the file for the connection to the database



class Model_CartoonManager extends Model_ManagerDb
{
    public function allCartoonInfos() // method for retrieving all the information from all the cartoons
    {
        $db =$this->dbConnect();
        $infos = $db->query('SELECT id, title, serie, isbn, genre, page_count, finish, comment, rate, 
        cover, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM cartoon');
        return $infos;
    }

    public function oneCartoonInfos($id) // method for retrieving all the information from one cartoon with $_GET["id"]
        {
            $db = $this->dbConnect();
            $oneCartoonInfos = $db->prepare('SELECT id, title, serie, isbn, genre, page_count, volume_number, finish, comment, rate, 
            cover,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr,begin_date, 
           end_date FROM cartoon WHERE id=?');
            $oneCartoonInfos->execute(array($id));
            return $oneCartoonInfos;
        }

    public function cartoonsRead()
    {
        $db = $this->dbConnect();
        $cartoonsFinish = $db->query('SELECT id, title, serie, scriptwriter, designer, isbn, genre, page_count, count_volume
        ,active,finish,comment,rate,cover,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM cartoon
        WHERE finish = 1');
        return $cartoonsFinish;
    }

    public function cartoonCurrent()
    {
        $db = $this->dbConnect();
        $cartoonCurrent = $db->query('SELECT cartoon.id, cartoon.title, cartoon.serie, cartoon.scriptwriter,
                                    cartoon.designer, cartoon.isbn, cartoon.genre, cartoon.page_count,
                                    cartoon.count_volume, cartoon.volume_number, cartoon.active, cartoon.finish,
                                    cartoon.comment, cartoon.rate, cartoon.cover, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr,
                                    cartoon_page_count.cartoon_id, cartoon_page_count.new_page_count, DATE_FORMAT(update_date, "%d/%m/%Y à %Hh%imin%ss") AS update_date_fr FROM cartoon
        INNER JOIN cartoon_page_count on cartoon.id = cartoon_page_count.cartoon_id WHERE active = 1 AND finish = 0 ORDER BY update_date_fr DESC LIMIT 0,1;'); 
                                        // inner query for table join with a date_format on the dates of the 2 tables, a descending ranking and we keep that the last record 
                                        // used to display new_pages_count
            return $cartoonCurrent;
        
        return $cartoonCurrent;
    }
    public function countCartoons() // method that counts the number of cartoon
        {
            $db = $this->dbConnect();
            $countNovels = $db->query("SELECT COUNT(title) as nb FROM cartoon"); //source: https://openclassrooms.com/forum/sujet/pdo-compter-le-nombre-de-resultats-d-une-requete
            $result = $countNovels->fetch();
            $nbCartoons = $result['nb'];
            return $nbCartoons;
        }
        
        public function countPages() // method that counts the total number of pages in the library
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT SUM(page_count) as nb_pages FROM cartoon");
            $result = $req->fetch();
            $countPages = $result["nb_pages"];
            return $countPages;
        }

        public function avgPages() // method that counts the average number of pages in the library
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT AVG(page_count) as avg_nb_pages FROM cartoon");
            $result = $req->fetch();
            $avgPagesCartoon = $result["avg_nb_pages"];
            return $avgPagesCartoon;
        }

        public function addCartoonConfirm($title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
        $rate, $cover)
        {
            $db = $this->dbConnect();
            $addNovel = $db->prepare("INSERT INTO cartoon(`title`, `serie`, `isbn`, `genre`, `page_count`, `volume_number`
                                    , `finish`, `comment`, `rate`, `cover`, `creation_date`)
                                    VALUES(:title, :serie, :isbn, :genre, :page_count, :volume_number, :finish, :comment,
                                    :rate, :cover, NOW())");
            $addNovel->execute(array(
                "title"             => $title,
                "serie"             => $serie,
                "isbn"              => $isbn,
                "genre"             => $genre,
                "page_count"        => $page_count, 
                "volume_number"     => $volume_number,
                "finish"            => $finish,
                "comment"           => $comment,
                "rate"              => $rate,
                "cover"             => $cover
            ));
            $lastId = $db->lastInsertId();  // source: I retrieve the last id entered in the novel table to insert it in my 
                                            //query from below and display it with the novelCurrent method. 
                                            // https://openclassrooms.com/forum/sujet/pdo-lastinsertid-61280
            $updatePageCount = $db->prepare("INSERT INTO cartoon_page_count (`cartoon_id`, `new_page_count`, `update_date`)
            VALUES(?, '0', NOW())");
            $updatePageCount->execute(array($lastId));
        }

        public function updateCartoon($id, $title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
        $rate, $cover, $begin_date, $end_date)
        {
            $db = $this->dbConnect();
            $updateCartoon = $db->prepare("UPDATE cartoon SET title=:title, serie=:serie, isbn=:isbn, genre=:genre, page_count=:page_count,
                                         volume_number=:volume_number, finish=:finish, comment=:comment, rate=:rate, cover=:cover,
                                          begin_date=:begin_date, end_date=:end_date WHERE id=:id");
            $updateCartoon->execute(array(
                "id"                => $id,
                "title"             => $title,
                "serie"             => $serie,
                "isbn"              => $isbn,
                "genre"             => $genre,
                "page_count"        => $page_count, 
                "volume_number"     => $volume_number,
                "finish"            => $finish,
                "comment"           => $comment,
                "rate"              => $rate,
                "cover"             => $cover,
                "begin_date"        => $begin_date,
                "end_date"          => $end_date

            ));
            
        }

        public function deleteCartoon($id)
        {
            $db = $this->dbConnect();
            $deleteCartoon = $db->prepare("DELETE FROM cartoon WHERE id=?");
            $deleteCartoon->execute(array($id));

        }

        public function endCartoonReading($id)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("UPDATE cartoon SET active=0, finish=1 WHERE id=?");
            $endReading= $req->execute(array($id));
        }
}