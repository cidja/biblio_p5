<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

require_once("model/ManagerDb.php"); //calling the file for the connection to the database

class Model_CartonManager extends Model_ManagerDb
{
    public function allCartoonInfos() // method for retrieving all the information from all the cartoons
    {
        $db =$this->dbConnect();
        $infos = $db->query('SELECT id, title, serie, scriptwriter, designer, isbn, kind, page_count, count_volume
        ,active,finish,comment,rate,cover,DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr ');
        return $infos;
    }
}