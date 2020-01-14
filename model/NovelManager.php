<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

require_once("model/ManagerDb.php"); //calling the file for the connection to the database

class Model_NovelManager extends Model_ManagerDb
    {
        public function allNovelInfos() //method for retrieving all the information from all the novels
        {
            $db = $this->dbConnect();
            $infos = $db->query('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
                                 DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel');
            return $infos;
        }
        
        public function oneNovelInfos($id) //method for retrieving all the information from one novel with $_GET["id"]
        {
            $db = $this->dbConnect();
            $infos = $db->prepare('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
                                    DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE id=?');
            $infos->execute(array($id));
            return $infos;
            
        }

        public function novelsRead() // method that displays the books read based on whether 1 in the table (read) otherwise (not finished)
        {
            $db = $this->dbConnect();
            $novelsread = $db->query('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE finish = 1');
            return $novelsread;
        }

        public function novelCurrent() // method that displays the current novel
        {
            $db = $this->dbConnect();
            $novelcurrent = $db->query('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE finish = 0');
            return $novelcurrent;
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

        public function addNovelConfirm($title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover)
        {
            $db = $this->dbConnect();
            $addNovel = $db->prepare("INSERT INTO novel(`title`, `author`, `isbn`, `genre`, `page_count`, `count_volume`, `active`, `finish`, `comment`, `rate`, `cover`, `creation_date`)
                                    VALUES(:title, :author, :isbn, :genre, :page_count, :count_volume, :active, :finish, :comment, :rate, :cover, NOW())");
            $addNovel->execute(array(
                "title"         => $title,
                "author"        => $author,
                "isbn"          => $isbn,
                "genre"         => $genre,
                "page_count"    => $page_count,
                "count_volume"  => $count_volume,
                "active"        => 0, //to say it's non active by default
                "finish"        => $finish,
                "comment"       => $comment,
                "rate"          => $rate,
                "cover"         => $cover
            ));
        }

        public function updateNovel($id,$title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover)
        {
            $db = $this->dbConnect();
            $updateNovel = $db->prepare("UPDATE novel SET title=:title, author=:author, isbn=:isbn, genre=:genre, page_count=:page_count, count_volume=:count_volume,
                                        finish=:finish, comment=:comment, rate=:rate, cover=:cover  WHERE id=:id");
            $updateNovel->execute(array(
                ":id"           => $id,
                "title"         => $title,
                "author"        => $author,
                "isbn"          => $isbn,
                "genre"         => $genre,
                "page_count"    => $page_count,
                "count_volume"  => $count_volume,
                "finish"        => $finish,
                "comment"       => $comment,
                "rate"          => $rate,
                "cover"         => $cover
            ));
        }

    }

