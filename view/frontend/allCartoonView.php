<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Liste des Bandes dessinés";

ob_start(); //Start of capture to put it in the variable at the end of the script 

    foreach($infos as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
    {
        if(!empty($data["cover"])){
            $cover = $data["cover"];
        } else {
            $cover = "public/img/noCover.png";
        }
        ?>
        
            <div>
                <a href="index.php?action=oneCartoon&amp;id=<?= $data["id"];?>">
                    <img class="imgCover +"src=<?=$cover; ?> alt="couverture de la bande dessinnée <?= $data["title"]; ?>" title="couverture de la bande dessinnée <?= $data["title"]; ?>" />
                </a>
            </div>
        <?php
    }

$infos->closeCursor();
$content = ob_get_clean();
require("templateCartoon.php");
/*This code does 3 things:

    It defines the title of the page in $title. This will be integrated in the <title> tag in the template.

    It defines the content of the page in $content. It will be integrated in the <body> tag in the template.
    As this content is a bit big, we use a trick to put it in a variable. We call 
    the ob_start() function (line 3) which "memorizes" all the HTML output that follows, then, at the end, we retrieve 
    the content generated with ob_get_clean() (line 28) and put it in $content .

    Finally, it calls the template with a require. This one will retrieve the variables $title and $content that we just created... to display the page!

Translated with www.DeepL.com/Translator (free version)*/

