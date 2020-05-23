<?php
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
require_once(dirname(__FILE__)."/../model/NovelManager.php"); //call the class novelManager require_once (once only)
require_once(dirname(__FILE__)."/../model/PageNovelManager.php");
require_once(dirname(__FILE__)."/../model/CartoonManager.php");
require_once(dirname(__FILE__)."/../model/PageCartoonManager.php");
require_once(dirname(__FILE__)."/../model/UserManager.php");
require_once(dirname(__FILE__)."/../model/SessionManager.php");
require_once(dirname(__FILE__)."/../model/CommentManager.php");

use cidja\novelManager\Model_NovelManager;
use cidja\pageNovelManager\Model_PageNovelManager;
use cidja\userManager\Model_UserManager;
use cidja\cartoonManager\Model_CartoonManager;
use cidja\pageCartoonManager\Model_PageCartoonManager;
use cidja\commentManager\Model_CommentManager;




    trait ToolsFrontend{

            public static function home()
            {
                require("view/frontend/home.php");
            }

            public static function connexionScreen()
            {
                require("connexionView.php");
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
                $commentManager = new Model_CommentManager(); // Création d'un objet
                $comments = $commentManager->getComments($id); 
                require("view/frontend/oneNovelView.php");
            }

            public static function addComment($novel_id, $author, $comment)
            {
                $commentManager = new Model_CommentManager(); // Création d'un objet

                $affectedLines = $commentManager->postComment($novel_id, $author, $comment); // appel de la fonction postComment de l'objet CommentManager

                if($affectedLines === false) {
                    //Notre modèle arrête tout et affiche une erreur avec un  die . Il y a moyen de faire plus propre : 
                    //jetons ici une exception, le code va s'arrêter là et l'erreur être remontée jusque dans le routeur qui contenait le bloc  try  !
                    //source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4689546-gerer-les-erreurs#/id/r-4689802
                    throw new Exception("Impossible d'ajouter le commentaire");
                }
                else { //Sinon on renvoi sur l'url index.php?action=post&id=5 par exemple pour le post avec l'id 5
                    header("location: index.php?action=oneNovel&id=". $novel_id);
                }
            }

            public static function lastComments($row_count)
            {
                $commentManager = new Model_CommentManager();
                $lastComments = $commentManager->lastComments($row_count);
                require("view/frontend/lastComments.php");
            }

            public static function signalComment($id, $novel_id,$redirect=true)
            {
                $commentManager = new Model_CommentManager(); // création d'un objet

                $signalComment = $commentManager->signalComment($id); // Appel de la fonction signalComment de l'objet CommentManager
                if($signalComment === false) 
                {
                    throw new Exception("Impossible de signaler le commentaire");
                }
                else {
                    if ($redirect==true){
                        header("location: index.php?action=oneNovel&id=".$novel_id); // renvoi au menu principal
                    }
                    else{
                        return $signalComment;
                    }
                }
                    
                }


            public static function oneNovelInfosAjax($id)
            {
                $novelManager = new Model_NovelManager();
                $oneInfos = $novelManager->oneNovelInfosAjax($id);
                
            }
            
            /* NOT USE
            public static function novelRead()
            {
                $novelManager = new Model_NovelManager();
                $novelsRead = $novelManager->novelsRead(); // $result which is called in novelReadView.php
                require("view/frontend/novelReadView.php");
            }
            */
            public static function listNovelCurrent()
            {
                $novelManager = new Model_NovelManager();
                $listNovelCurrent = $novelManager->novelCurrent();
                require("view/frontend/listNovelCurrent.php");
            }

            public static function novelCurrent($id)
            {

                $novelManager = new Model_NovelManager();
                $novelCurrent = $novelManager->novelCurrent();
                $lastUpdate = $novelManager->lastUpdate($id);
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

            public static function updateNovelConfirm($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume,$active, $comment, $rate, $cover,$begin_date, $end_date, $lend, $borrower, $lend_date)
            {
                $novelManager = new Model_NovelManager();
                $updateConfirm = $novelManager->updateNovel($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume,$active, $comment, $rate, $cover, $begin_date, $end_date);
                $lendNovel = $novelManager->insertLendNovel($id, $lend, $borrower, $lend_date);
                header("location:index.php?action=allNovels");
            }

            public static function endReading($id)
            {
                $novelManager= new Model_NovelManager();
                $endReading = $novelManager->endReading($id);
                require("view/frontend/endReadingNovelConfirm.php");

            }


            //*******************Sort Part */
            public static function genreSort($genre)
            {
                $novelManager = new Model_NovelManager();
                $infos = $novelManager->genreSortNovel($genre);
                $countNovels = $novelManager->genreCountNovels($genre);
                require("view/frontend/allNovelView.php");
            }
            public static function sortAlphabetical()
            {
                $novelManager = new Model_NovelManager();
                $infos = $novelManager->sortAlphabetical();
                require("view/frontend/allNovelView.php");
            }

            public static function readDateSort()
            {
                $novelManager = new Model_NovelManager();
                $infos = $novelManager->readDateSort();
                require("view/frontend/readDateSort.php");
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
                
                header("location: index.php?action=listNovelCurrent");
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
            public static function addCartoonsConfirm($title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
            $rate, $cover)
            {
                $cartoonManager = new Model_CartoonManager();
                $addCartoon = $cartoonManager->addCartoonConfirm($title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
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

            public static function updateCartoonConfirm($id, $title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
            $rate, $cover, $begin_date, $end_date)
            {
                $cartoonManager= new Model_CartoonManager();
                $updateCartoonConfirm = $cartoonManager->updateCartoon($id, $title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
                $rate, $cover, $begin_date, $end_date);
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