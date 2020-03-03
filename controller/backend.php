<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
require_once("model/NovelManager.php"); //call the class novelManager require_once (once only)
require_once("model/PageNovelManager.php");
require_once("model/CartoonManager.php");
require_once("model/PageCartoonManager.php");
require_once("model/UserManager.php");
require_once("model/SessionManager.php");
require_once("model/CommentManager.php");

use cidja\userManager\Model_UserManager;
use cidja\commentManager\Model_CommentManager;


    trait ToolsBackend{
        
        public static function connexionView()
        {
            require("connexionView.php");
        }

        public static function formAccessAdmin()
        {
            require("view/backend/formAccessAdmin.php");
        }

        public static function formAccessUser()
        {
            require("view/backend/formAccessUser.php");
        }

        public static function inscription()
        {
            require("view/backend/formNewUser.php");
        }

        public static function wrongId()
        {
            require("view/backend/wrongIdView.php");
        }

        public static function formNewPassword($user)
        {
            $userManager = new Model_UserManager();
            $updateDatePassword = $userManager->updateDatePassword($user);
            require("view/backend/updatePassword.php");
        }
        public static function changePassword($user, $oldPwd, $newPwd, $newPwdRepeat)
        {
            $userManager = new Model_UserManager();
            $newPassword = $userManager->changePassword($user, $oldPwd, $newPwd, $newPwdRepeat);
        }

        public static function listMembers()
        {
            $userManager = new Model_UserManager();
            $listMembers = $userManager->listMembers();
            require("view/backend/managerMember.php");
        }

        public static function listComments()
        {
            $commentManager = new Model_CommentManager();
            $listComments = $commentManager->listComments();
            require("view/backend/listComments.php");
        }


        public static function createNewUser($user, $pwd1)
        {
            $userManager = new Model_UserManager();
            //$memberExist = $userManager->memberExist($user);
            $newUser = $userManager->createNewUser($user, $pwd1);
        }

        public static function checkMember($member, $pwd)
        {
            $userManager = new Model_UserManager();
            $checkMember = $userManager->checkMember($member, $pwd);
            
        }

        public static function moderation()
        {
            $commentManager = new Model_CommentManager(); //Création d'un objet
            $signalComments = $commentManager->checkSignalComment(); // Appel de la méthode checkSignalComment() de l'objet CommentManager
            $countSignalComments = $commentManager->countSignalComments(); // Appel de la méthode countSignalComments() pour affichage du nombre de commentaire à modérer dans signalCommentsView
            require("view/backend/signalCommentsView.php");
        }

        public static function checkSignalComment()
        {
            $commentManager = new Model_CommentManager(); //Création d'un objet
            $signalComments = $commentManager->checkSignalComment(); // Appel de la méthode checkSignalComment() de l'objet CommentManager
            $countSignalComments = $commentManager->countSignalComments(); // Appel de la méthode countSignalComments() pour affichage du nombre de commentaire à modérer dans signalCommentsView
            require("view/backend/signalCommentsView.php"); // appel de la vue signalCommentsView.php
        }

        //Fonction pour approuvé un commentaire
        public static function approuveComment($id)
        {
            $commentManager = new Model_CommentManager();
            $approuveComment = $commentManager->approuveComment($id); // Appel de la méthode approuveComment avec en paramétre l'id du commentaire
        }

        //Fonction pour delete un commentaire
        public static function deleteComment($id)
        {
            $commentManager = new Model_CommentManager(); // Création de l'objet CommentManager()
            $deleteComment = $commentManager->deleteComment($id); // Appel de la méthode deleteComment avec en paramétre l'id du commentaire
        }
    }