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

        public function novelCurrent()
        {
            $db = $this->dbConnect();
            $novelcurrent = $db->query('SELECT id,title, author, isbn, genre, page_count, count_volume, active,finish, comment,rate,cover,
            DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM novel WHERE finish = 0');
            return $novelcurrent;
        }

    }

