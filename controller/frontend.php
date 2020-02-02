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


    trait ToolsFrontend{
            public static function connexionScreen()
            {
                require("connexionView.php");
            }

            public static function checkUser($user, $pwd)
            {
                $userManager = new Model_UserManager(); // creation of the UserManager objet
                $check = $userManager->checkUser($user, $pwd); //
            }

            public static function wrongId()
            {
                require("view/frontend/wrongIdView.php");
            }

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
                $lastUpdate = $novelManager->lastUpdate();
                require("view/frontend/novelCurrentView.php");
            }

            public static function addNovel()
            {
                require("view/frontend/addNovelView.php");
            }

            public static function addNovelConfirm($title, $author,$isbn, $publication, $genre, $page_count, $count_volume, $comment, $rate, $cover)
            {
            
                $novelManager = new Model_NovelManager();
                $addConfirm = $novelManager->addNovelConfirm($title, $author,$isbn, $publication, $genre, $page_count, $count_volume, $comment, $rate, $cover);
                header("location:index.php?action=allNovels");
            }

            public static function updateNovelInfos($id)
            {
                $novelManager = new Model_NovelManager();
                $oneInfos = $novelManager->oneNovelInfos($id); // $oneInfo which is called in oneNovelView.php
                require("view/frontend/updateNovelView.php");
            }

            public static function updateNovelConfirm($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume,$active, $comment, $rate, $cover)
            {
                $novelManager = new Model_NovelManager();
                $updateConfirm = $novelManager->updateNovel($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume,$active, $comment, $rate, $cover);
                header("location:index.php?action=allNovels");
            }

            public static function endReading($id)
            {
                $novelManager= new Model_NovelManager();
                $endReading = $novelManager->endReading($id);
                require("view/frontend/endReadingNovelConfirm.php");

            }

            //*******************Delete Part **************************** */
            public static function formDeleteNovel($id, $novel)
            {
                require("view/frontend/formDeleteNovel.php");
            }

            public static function deleteNovel($id, $pwdDelete)
            {
                if($pwdDelete == "secret"){ //chosen password that must be entered in the form to validate the deletion of the work
                    $novelManager = new Model_NovelManager();
                    $deleteNovel = $novelManager->deleteNovel($id);
                    header("location:index.php?action=allNovels");
                } else{
                    echo "mauvais mot de passe";
                }
                
            }



            //************** */ novelPageCount part ******
            public static function newPageCount($id,$newPageCount)
            {
                $pageNovelManager = new Model_PageNovelManager();
                $req = $pageNovelManager->newPageCount($id,$newPageCount);
                
                header("location: index.php?action=novelCurrent");
            }

            public static function readingNovelTime($novel_id)
            {
                $pageNovelManager = new Model_PageNovelManager();
                $readingNovelTime = $pageNovelManager->readingNovelTime($novel_id);
                return $readingNovelTime;

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
       
            public static function statistics()
            {
                $novelManager = new Model_NovelManager();
                $countPages = $novelManager->countPages();
                $avgPages = $novelManager->avgPages();
                $nbNovels = $novelManager->countNovels();
                
                require("view/frontend/statisticsView.php");
            }

            public static function addCartoons()
            {
                require("view/frontend/addCartoonView.php");
            }
            public static function addCartoonsConfirm($title, $serie, $scriptwriter, $designer, $isbn, $genre, $page_count, $count_volume, $volume_number, $finish, $comment,
            $rate, $cover)
            {
                $cartoonManager = new Model_CartoonManager();
                $addCartoon = $cartoonManager->addCartoonConfirm($title, $serie, $scriptwriter, $designer, $isbn, $genre, $page_count, $count_volume, $volume_number, $finish, $comment,
                $rate, $cover);
                header("location:index.php?action=allCartoons");
            }

            public static function statisticsCartoon()
            {
                $cartoonManager= new Model_CartoonManager();
                $countPagesCartoon = $cartoonManager->countPages();
                $nbCartoons = $cartoonManager->countCartoons();
                $avgPagesCartoon = $cartoonManager->avgPages();
                require("view/frontend/statisticsCartoonView.php");
            }

            public static function updateCartoonInfos($id)
            {
                $cartoonManager= new Model_CartoonManager();
                $oneInfos = $cartoonManager->oneCartoonInfos($id); // $oneInfo which is called in oneNovelView.php
                require("view/frontend/updateCartoonView.php");
            }

            public static function updateCartoonConfirm($id, $title, $serie, $scriptwriter, $designer, $isbn, $genre, $page_count, $count_volume, $volume_number, $active, $finish, $comment,
            $rate, $cover)
            {
                $cartoonManager= new Model_CartoonManager();
                $updateCartoonConfirm = $cartoonManager->updateCartoon($id, $title, $serie, $scriptwriter, $designer, $isbn, $genre, $page_count, $count_volume, $volume_number, $active, $finish, $comment,
                $rate, $cover);
                header("location: index.php?action=allCartoons");
            }

            public static function endCartoonReading($id)
            {
                $cartoonManager= new Model_CartoonManager();
                $endCartoonReading = $cartoonManager->endCartoonReading($id);
                require("view/frontend/endReadingCartoonConfirm.php");

            }

            //cartoon page count
            public static function newCartoonPageCount($id,$newPageCount)
            {
                $pageCartoonManager = new Model_PageCartoonManager();
                $req = $pageCartoonManager->newCartoonPageCount($id,$newPageCount);
                header("location: index.php?action=cartoonCurrent");
            }


            /****************deleteCartoon part ********************************/
            public static function formDeleteCartoon($id, $cartoon)
            {
                require("view/frontend/fromDeleteCartoon.php");
            }

            public static function deleteCartoon($id, $pwdDelete)
            {
                if($pwdDelete == "secret"){ //chosen password that must be entered in the form to validate the deletion of the work
                    $cartoonManager = new Model_CartoonManager();
                    $deleteCartoon = $cartoonManager->deleteCartoon($id);
                    header("location:index.php?action=allCartoons");
                } else{
                    echo "mauvais mot de passe";
                }
                
            }

            // Session Manager
            public static function sessionStop()
            {
                $sessionManager = new Model_SessionManager();
                $sessionStop = $sessionManager->sessionStop();
                header("location: connexionView.php"); // once the session has been deleted, we go back to the login page.
            }
        }