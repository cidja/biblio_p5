<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
require("model/NovelManager.php"); //call the class novelManager require_once (once only)
require("model/PageNovelManager.php");
require("model/CartoonManager.php");


    trait ToolsFrontend{

            public static function countTemplate()
            {
                $novelManager = new Model_NovelManager(); // creation of the novelManager object
                $countNovels = $novelManager->countNovels();
            }
            public static function listNovel()
            {
                $novelManager = new Model_NovelManager(); // creation of the novelManager object
                $infos = $novelManager->allNovelInfos(); // call of the method allNovelInfos of the NovelManager object
                $countNovels = $novelManager->countNovels();
                require("view/frontend/allNovelView.php"); // Displays a list of all novels 
            }
            public static function oneNovelInfos($id)
            {
                $novelManager = new Model_NovelManager();
                $oneInfos = $novelManager->oneNovelInfos($id); // $oneInfo which is called in oneNovelView.php
                require("view/frontend/oneNovelView.php");
            }
            
            public static function novelRead()
            {
                $novelManager = new Model_NovelManager();
                $novelsRead = $novelManager->novelsRead(); // $result which is called in novelReadView.php
                require("view/frontend/novelReadView.php");
            }
            public static function novelCurrent()
            {
                $novelManager = new Model_NovelManager();
                $novelCurrent = $novelManager->novelCurrent();
                require("view/frontend/novelCurrentView.php");
            }



            //************** */ novelPageCount part ******
            public static function newPageCount($id,$newPageCount)
            {
                $pageNovelManager = new Model_PageNovelManager();
                $req = $pageNovelManager->newPageCount($id,$newPageCount);
                header("location: index.php?action=novelCurrent");
            }


            //**************Cartoon part *******

            public static function allCartoons()
            {
                $cartoonManager = new Model_CartoonManager();
                $infos = $cartoonManager->allCartoonInfos();
                require("view/frontend/allCartoonView.php");
            }

            public static function cartoonsRead()
            {
                $cartoonManager = new Model_CartoonManager();
                $cartoonsFinish = $cartoonManager->cartoonsRead();
                require("view/frontend/cartoonReadView.php");
            }
            public static function oneCartoonInfos($id)
            {
                $cartoonManager = new Model_CartoonManager();
                $oneCartoonInfos = $cartoonManager->oneCartoonInfos($id);
                require("view/frontend/oneCartoonView.php");
            }
            public static function cartoonCurrent()
            {
                $cartoonManager = new Model_CartoonManager();
                $cartoonCurrent = $cartoonManager->cartoonCurrent();
                require("view/frontend/cartoonCurrentView.php");
            }
            public static function countNovels()
            {
                //$novelManager = new Model_NovelManager();
                //$countNovels = $novelManager->countNovels();
                echo "je rentre";
                
            }

            public static function statistics()
            {
                $novelManager = new Model_NovelManager();
                $countPages = $novelManager->countPages();
                $avgPages = $novelManager->avgPages();
                $nbNovels = $novelManager->countNovels();
                require("view/frontend/statisticsView.php");
            }

            public static function addNovel()
            {
                require("view/frontend/addNovelView.php");
            }

            public static function addNovelConfirm($title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover)
            {
            
                $novelManager = new Model_NovelManager();
                $addConfirm = $novelManager->addNovelConfirm($title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover);
                header("location:index.php?action=allNovels");
            }

            public static function updateNovelInfos($id)
            {
                $novelManager = new Model_NovelManager();
                $oneInfos = $novelManager->oneNovelInfos($id); // $oneInfo which is called in oneNovelView.php
                require("view/frontend/updateNovelView.php");
            }

            public static function updateNovelConfirm($id,$title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover)
            {
                $novelManager = new Model_NovelManager();
                $updateConfirm = $novelManager->updateNovel($id,$title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover);
                header("location:index.php?action=allNovels");
            }


        }