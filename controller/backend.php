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

    trait ToolsBackend{
        public static function formNewPassword()
        {
            require("view/backend/updatePassword.php");
        }
        public static function changePassword($oldMdp, $mdp1, $mdprepeat)
        {
            $userManager = new Model_UserManager();
            $newPassword = $userManager->changePassword($oldMdp, $mdp1, $mdprepeat);

        }
    }