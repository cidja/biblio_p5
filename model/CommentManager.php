<?php

namespace cidja\commentManager; //source: https://youtu.be/WHtbi8S0rkI?t=163

use \cidja\managerDb\Model_ManagerDb;
use \PDO;
require_once("model/ManagerDb.php"); //calling the file for the connection to the database

class Model_CommentManager extends Model_ManagerDb 
{
    public function getComments($postId)
    {
    $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
    $comments = $db->prepare('SELECT comments.id, comments.novel_id, comments.author, comments.comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comments.comment_signal
    FROM novel
    INNER JOIN comments
    on novel.id = comments.novel_id
    WHERE novel.id = ?
    ORDER BY comment_date DESC');
    $comments->bindValue(1,$postId, PDO::PARAM_INT); //Source: https://www.php.net/manual/fr/pdostatement.bindvalue.php
    $comments->execute();
    return $comments;
    
    }

    public function listComments()
    {
    $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
    $listComments = $db->query('SELECT novel.title, novel.author, novel.publication, novel.genre, novel.page_count, novel.cover, comments.id, comments.novel_id, comments.author,
     comments.comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comments.comment_signal
    FROM novel
    INNER JOIN comments
    on novel.id = comments.novel_id
    ORDER BY comment_date DESC');
    return $listComments;
    }

    public function lastComments($row_count)
    {
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $lastComments = $db->prepare('SELECT novel.title, novel.author, novel.publication, novel.genre, novel.page_count, novel.cover, comments.id, comments.novel_id, comments.author,
         comments.comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comments.comment_signal
        FROM novel
        INNER JOIN comments
        on novel.id = comments.novel_id
        ORDER BY comment_date DESC LIMIT 0,?');
        $lastComments->bindValue(1, $row_count, PDO::PARAM_INT); //Source: https://www.php.net/manual/fr/pdostatement.bindvalue.php
        $lastComments->execute();
        return $lastComments;
    }

    //to add comment
    public function postComment($novel_id, $author, $comment) 
    { 
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $comments = $db->prepare("INSERT INTO comments(novel_id, author, comment, comment_date, comment_signal)VALUES(:novel_id,:author,:comment, NOW(),0)"); //comment_signal mis sur 0 
        $affectedLines = $comments->execute(array(
            "novel_id"  =>$novel_id,
            "author"    => $author,
            "comment"   =>  $comment));
 
    }

    public function signalComment($id) //to signal comment
    { //le but de la fonction est d'ajouter un TRUE sur la colonne signal de la table comments pour ensuite le faire remonter dans les signal sur le backend
        $db = $this->dbConnect(); //appel de $this S:https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4744592
        $comments = $db->prepare("UPDATE comments SET comment_signal=1 WHERE id=?");
        $signalComments = $comments->execute(array($id));
        
        return $signalComments;
    }

    // Fonction pour afficher tous les commentaires signalés
    public function checkSignalComment() 
    {
        $db = $this->dbConnect(); // appel de $this
        $signalComments = $db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr, comment_signal FROM comments WHERE comment_signal = 1 ORDER BY comment_date DESC');
        return $signalComments;
    }

    //fonction pour valider un commentaire signalé
    public function approuveComment($id)
    {
        $db= $this->dbConnect();
        $approuveComment = $db->prepare("UPDATE comments set comment_signal	= 0 WHERE id= ?");
        $affectedLines = $approuveComment->execute(array($id));
    }

    //Fonction pour supprimer un commentaire signalé
    public function deleteComment($id)
    {
        $db= $this->dbConnect();
        $comment=$db->prepare("DELETE FROM comments WHERE id=?");
        $deleteComment = $comment->execute(array($id));
    }

    //Fonction pour compter nombre commentaire a modérer
    public function countSignalComments()
    {
        $db = $this->dbConnect();
        $countSignalComments = $db->query("SELECT COUNT(comment_signal) FROM comments WHERE comment_signal = 1");
        return $countSignalComments;
    }



}