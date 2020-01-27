<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");

$title = "Statistiques des Bandes dessinnées";

ob_start(); //Start of capture to put it in the variable at the end of the script 
    echo $backLink;
?>
        <div class="container statistics d-flex justify-content-center flex-column +">
            <section class="text-center">
            <h1 class="text-uppercase">Quelques chiffres</h1>
                <div>
                    <h2>Les bandes dessinées</h2>
                </div>
                <div class="nbCartoons">
                    <div class="fieldDescription">
                        Nombres total de BD :
                    </div>
                    <div class="dataDescription">
                        <?= $nbCartoons; ?> 
                    </div>
                </div>
                <div class="countPagesCartoon">
                    <div class="fieldDescription">
                        Nombres total de pages de BD :
                    </div>
                    <div class="dataDescription">
                        <?= $countPagesCartoon; ?> Pages
                    </div>
                </div>
                <div class="avgPagesCartoon">
                    <div class="fieldDescription">
                        Nombres de pages en moyenne par BD :
                    </div>
                    <div class="dataDescription">
                        <?= intval($avgPagesCartoon); ?> pages en moyenne
                    </div>
                </div>
            </section>
        </div>

           


<?php

$content = ob_get_clean();
require("templateCartoon.php");
/*This code does 3 things:

    It defines the title of the page in $title. This will be integrated in the <title> tag in the template.

    It defines the content of the page in $content. It will be integrated in the <body> tag in the template.
    As this content is a bit big, we use a trick to put it in a variable. We call 
    the ob_start() function (line 3) which "memorizes" all the HTML output that follows, then, at the end, we retrieve 
    the content generated with ob_get_clean() (line 28) and put it in $content .

    Finally, it calls the template with a require. This one will retrieve the variables $title and $content that we just created... to display the page!
    */

