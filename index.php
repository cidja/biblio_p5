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
