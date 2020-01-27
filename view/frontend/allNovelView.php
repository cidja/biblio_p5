<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Liste des romans";

ob_start(); //Start of capture to put it in the variable at the end of the script 
?>

    <div class="container d-flex text-center flex-wrap justify-content-center">
        <?php
    foreach($infos as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
    {
        if(!empty($data["cover"])){
            $cover = $data["cover"];
        } else {
            $cover = "public/img/noCover.png";
        }
        ?>
                <div class="col-4">
                    <a href="index.php?action=oneNovel&amp;id=<?= $data["id"];?>">
                        <img class="imgCover +"src=<?=$cover; ?> alt="couverture du livre" title="couverture du livre" />
                    </a>
                    <div class="mt-1">
                        <?php
                    if($data["finish"] == 0){
                                ?> 
                                    <button class="btn btn-warning">En cours</button>
                                <?php
                            }
                            else{
                                ?>
                                    <button class="btn btn-success">Fini</button>
                                <?php
                            } ?>
                    </div>
                </div>
            
        <?php
    }
?>
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
?>