<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Roman en cours";

ob_start(); //Start of capture to put it in the variable at the end of the script 
    ?>
    <div class="titleContainer">
        <h2>Livre en cours </h2>
    </div>
    <?php
    foreach($novelCurrent as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
    {
        if($data["new_page_count"] < $data["page_count"]){
           
            if(!empty($data["cover"])){
                $cover = $data["cover"];
            } else {
                $cover = "public/img/noCover.png";
            }
            ?>
            
                <div class="container">
                    <section class="cover">
                        <a href="index.php?action=oneNovel&amp;id=<?= $data["id"];?>">
                            <img class="imgCover +"src=<?= $cover; ?> alt="couverture du livre" title="couverture du livre <?= $data["title"]; ?>" />
                        </a>
                    </section>
                    <div class="infos">
                        <div class="row">
                            <div>Nombre de pages : </div>
                        </div>
                        <div class="#">
                            <?= $data["page_count"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div>Date de la dernière lecture :</div>
                        <div><?= $data["update_date_fr"]; ?></div>
                    </div>
                    <div class="row">
                        <div>Vous en étiez à la page :</div>
                        <div><?= $data["new_page_count"]; ?></div>
                    </div>
                    <form method="post" action="index.php?action=newPageCount">
                        <div class="form-group">
                            <label for="newPageCount">Nouveau numéro de pages :</label>
                            <input type="number" class="form-control" max ="<?= $data["page_count"]; //max value number of page of the $data ("page_count") ?>" id="newPageCount" name="newPageCount" required>
                            <input type="hidden" value="<?= $data["id"];?>" id="id" name="id"> <!--to retrieve the id for the query!-->
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </form>
                </div>
                
                <?php
                
        } else{
          
          if(!empty($data["cover"])){
                $cover = $data["cover"];
            } else {
                $cover = "public/img/noCover.png";
            }
            ?>
            
                <div class="container">
                    <section class="cover col">
                        <a href="index.php?action=oneNovel&amp;id=<?= $data["id"];?>">
                            <img class="imgCover +"src=<?= $cover; ?> alt="couverture du livre" title="couverture du livre <?= $data["title"]; ?>" />
                        </a>
                    </section>
                    <div class="col">
                        <div>Bravo <?= $data["title"]; ?> terminé</div>
                    </div>
                    <div class="row">
                        <div class="col-6">Vous avez terminé le livre en :</div>
                        <div class="col-6"></div>
                    </div>
            
                </div>
                <?php
        }
        
       
    }

$novelCurrent->closeCursor();
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
?>

