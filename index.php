<?php //deviens notre routeur 
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
session_start(); // saving settings for the source admin: http://www.lephpfacile.com/cours/18-les-sessions Ligne 64
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682351-creer-un-routeur#/id/r-4682481


include(dirname(__FILE__)."/controller/frontend.php");
//include(dirname(__FILE__)."/controller/backend.php");

try{
    if(isset($_GET["action"])){
        
        if($_GET["action"] == "home"){
            header ("location: view/frontend/home.php");
        }
        elseif($_GET["action"] == "allNovels"){
            ToolsFrontend::listNovel();
            
        }
        elseif($_GET["action"] == "oneNovel"){ // if in the url $_GET["action"]= oneNovel
            if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                ToolsFrontend::oneNovelInfos($id); // calling the tool oneNovelInfos
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé !");
            }
        }
        elseif($_GET["action"] == "novelsRead"){
            ToolsFrontend::novelRead();
        }
        elseif($_GET["action"] == "novelCurrent"){
            
            ToolsFrontend::novelCurrent();
            
        }
        elseif($_GET["action"] == "statistics"){
            ToolsFrontend::statistics();
        }
        elseif($_GET["action"] == "addNovel"){
            ToolsFrontend::addNovel();
        }
        elseif($_GET["action"] == "addNovelConfirm"){
            $title          = htmlspecialchars($_POST["title"]);
            $author         = htmlspecialchars($_POST["author"]);
            $isbn           = htmlspecialchars($_POST["isbn"]);
            $genre          = htmlspecialchars($_POST["genre"]);
            $page_count     = htmlspecialchars($_POST["page_count"]);
            $count_volume   = htmlspecialchars($_POST["count_volume"]);
            $finish         = htmlspecialchars($_POST["finish"]);
            $comment        = htmlspecialchars($_POST["comment"]);
            $rate           = htmlspecialchars($_POST["rate"]);
            $cover          = htmlspecialchars($_POST["cover"]);
            ToolsFrontend::addNovelConfirm($title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover);
        }


        // novelPagesCount
        elseif($_GET["action"] == "newPageCount"){
            $id             = htmlspecialchars($_POST["id"]);
            $newPageCount   = htmlspecialchars($_POST["newPageCount"]);
            ToolsFrontend::newPageCount($id, $newPageCount);
        }

        
        elseif($_GET["action"] == "updateNovel"){
            if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                ToolsFrontend::updateNovelInfos($id); // calling the tool oneNovelInfos
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé !");
            }
        }
        elseif($_GET["action"] == "updateNovelConfirm"){
            $id             = htmlspecialchars($_GET['id']);
            $title          = htmlspecialchars($_POST["title"]);
            $author         = htmlspecialchars($_POST["author"]);
            $isbn           = htmlspecialchars($_POST["isbn"]);
            $genre          = htmlspecialchars($_POST["genre"]);
            $page_count     = htmlspecialchars($_POST["page_count"]);
            $count_volume   = htmlspecialchars($_POST["count_volume"]);
            $finish         = htmlspecialchars($_POST["finish"]);
            $comment        = htmlspecialchars($_POST["comment"]);
            $rate           = htmlspecialchars($_POST["rate"]);
            $cover          = htmlspecialchars($_POST["cover"]);
            ToolsFrontend::updateNovelConfirm($id,$title, $author,$isbn, $genre, $page_count, $count_volume, $finish, $comment, $rate, $cover);
        }


        //Cartoon part 
        elseif ($_GET["action"] == "allCartoons"){
            ToolsFrontend::allCartoons();
        }
        elseif ($_GET["action"] == "cartoonsRead"){
            ToolsFrontend::cartoonsRead();
        }
        elseif ($_GET["action"] == "oneCartoon"){
            if(isset($_GET["id"]) && $_GET["id"] > 0){
                $id = htmlspecialchars($_GET["id"]);
                ToolsFrontend::oneCartoonInfos($id);
            }
        }
        elseif ($_GET["action"] == "cartoonCurrent"){
            ToolsFrontend::cartoonCurrent();
        }
        elseif($_GET["action"] == "addCartoons"){
            ToolsFrontend::addCartoons();
        }
        elseif($_GET["action"] == "addCartoonsConfirm"){
            $title              = htmlspecialchars($_POST['title']);
            $serie              = htmlspecialchars($_POST["serie"]);
            $scriptwriter       = htmlspecialchars($_POST["scriptwriter"]);
            $designer           = htmlspecialchars($_POST["designer"]);
            $isbn               = htmlspecialchars($_POST["isbn"]); 
            $genre              = htmlspecialchars($_POST["genre"]);
            $page_count         = htmlspecialchars($_POST["page_count"]);
            $count_volume       = htmlspecialchars($_POST["count_volume"]);
            $volume_number      = htmlspecialchars($_POST["volume_number"]);
            $finish             = htmlspecialchars($_POST["finish"]);
            $comment            = htmlspecialchars($_POST["comment"]);
            $rate               = htmlspecialchars($_POST["rate"]);
            $cover              = htmlspecialchars($_POST["cover"]);

            ToolsFrontend::addCartoonsConfirm($title, $serie, $scriptwriter, $designer, $isbn, $genre, $page_count, $count_volume, $volume_number, $finish, $comment,
            $rate, $cover);
        }
        elseif($_GET["action"] == "statisticsCartoon"){
            ToolsFrontend::statisticsCartoon();
        }
        
    }
    else{
        ToolsFrontend::listNovel();
    }
}
catch(Exception $e) // s'il y a une erreur, alors...
{
    echo "Erreur : " . $e->getMessage();
}
    /*
        On charge le fichier controller.php (pour que les fonctions soient en mémoire, quand même !).
    
        On teste le paramètre action pour savoir quel contrôleur appeler. Si le paramètre n'est pas présent, 
        par défaut on charge la liste des derniers billets (ligne 16). C'est comme ça qu'on indique ce que doit 
        afficher la page d'accueil du site.
    
        On teste les différentes valeurs possibles pour notre paramètre action et on redirige vers le bon contrôleur à chaque fois.
    
    */
