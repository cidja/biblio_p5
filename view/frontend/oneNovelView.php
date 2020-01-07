<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr


ob_start(); //Start of capture to put it in the variable at the end of the script 

while($data = $oneResult->fetch()){
    $title = $data["title"]; 
}

