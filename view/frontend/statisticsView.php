<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Statistiques";

ob_start(); //Start of capture to put it in the variable at the end of the script 
?>
    <div class="container">
        <section class="container">
            <h2>Quelques chiffres</h2>
            <div class="row">
                <div class="#">
                    Nombres total de livres :
                </div>
                <div class="#">
                    "nb livres"
                </div>
            </div>
            <div class="row">
                <div class="#">
                    Nombres total de pages :
                </div>
                <div class="#">
                    "nb pages"
                </div>
            </div>
            <div class="row">
                <div class="#">
                    Nombres total de pages lus pour le moment :
                </div>
                <div class="#">
                    "nb paage_current"
                </div>
            </div>
            <div class="row">
                <div class="#">
                    Auteur préféré :
                </div>
                <div class="#">
                    "auteur préféré"
                </div>
            </div>

        </section>
    </div>


<?php
    
$infos->closeCursor();
$content = ob_get_clean();
require("templateNovel.php");
/*This code does 3 things:

    It defines the title of the page in $title. This will be integrated in the <title> tag in the template.

    It defines the content of the page in $content. It will be integrated in the <body> tag in the template.
    As this content is a bit big, we use a trick to put it in a variable. We call 
    the ob_start() function (line 3) which "memorizes" all the HTML output that follows, then, at the end, we retrieve 
    the content generated with ob_get_clean() (line 28) and put it in $content .

    Finally, it calls the template with a require. This one will retrieve the variables $title and $content that we just created... to display the page!
    */


