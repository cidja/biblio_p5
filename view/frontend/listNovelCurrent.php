<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Roman en cours";

ob_start(); //Start of capture to put it in the variable at the end of the script 
    ?>
    <div class="titleContainer text-center text-uppercase">
        <h2> Liste des livres en cours </h2>
        <h5>Cliquez sur un livre pour plus de détails</h5>
    </div>
    <?php
    foreach($listNovelCurrent as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
    {
        
        ?>
        <div class="container oneInfos d-flex justify-content-center flex-column">
            <?php
            if(!empty($data["cover"])){
                $cover = $data["cover"];
            } else {
                $cover = "public/img/noCover.png";
            }
            ?>
            
               
                    <div class="cover text-center">
                        <a href="index.php?action=novelCurrent&amp;id=<?= $data["id"];?>">
                            <img class="imgCover img-fluid +"src=<?= $cover; ?> alt="couverture du livre" title="couverture du livre <?= $data["title"]; ?>" />
                        </a>
                    </div>
                    <?php
$listNovelCurrent->closeCursor();
        }
        $content = ob_get_clean();

require("templateNovel.php");
        ?>
