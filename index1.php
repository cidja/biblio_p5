<?php //deviens notre routeur 
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
session_start(); // enregistrement des paramètres pour l'admin source: http://www.lephpfacile.com/cours/18-les-sessions Ligne 64
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682351-creer-un-routeur#/id/r-4682481


include(dirname(__FILE__)."/controller/frontend1.php");
include(dirname(__FILE__)."/controller/backend1.php");

try{
    if($_GET["action"] == "home"){
        ToolsFrontend::home();
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
