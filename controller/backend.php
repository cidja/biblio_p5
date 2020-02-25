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

use cidja\userManager\Model_UserManager;


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

        public static function checkSuperUser($user, $pwd)
        {
            $userManager = new Model_UserManager(); // creation of the UserManager objet
            $check = $userManager->checkSuperUser($user, $pwd); //
        }

        public static function wrongId()
        {
            require("view/backend/wrongIdView.php");
        }

        public static function formNewPassword()
        {
            require("view/backend/updatePassword.php");
        }
        public static function changePassword($oldMdp, $mdp1, $mdprepeat)
        {
            $userManager = new Model_UserManager();
            $newPassword = $userManager->changePassword($oldMdp, $mdp1, $mdprepeat);

        }

        public static function createNewUser($user, $pwd1)
        {
            $userManager = new Model_UserManager();
            $newUser = $userManager->createNewUser($user, $pwd1);
            
        ?><div>validation de la création du nouvel utilisateur, <a href="index.php?action=formAccessUser">Cliquez ici pour se connecter</a></div>
        <?php
        }

        public static function checkMember($member, $pwd)
        {
            $userManager = new Model_UserManager();
            $checkMember = $userManager->checkMember($member, $pwd);
            
        }
    }