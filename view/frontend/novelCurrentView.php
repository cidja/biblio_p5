<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");
$title = "Roman en cours";

ob_start(); //Start of capture to put it in the variable at the end of the script 
testnotUserIssetVisitTitle();?>
    <div class="titleContainer text-center text-uppercase">
        <h2>Livre en cours </h2>
    </div>
    <?php
    foreach($novelCurrent as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
    {
        
        ?>
        <div class="container oneInfos d-flex justify-content-center flex-column">
            <?php
        if($data["new_page_count"] < $data["page_count"]){
           
            if(!empty($data["cover"])){
                $cover = $data["cover"];
            } else {
                $cover = "public/img/noCover.png";
            }
            ?>
            
                <h2 class="title text-center text-uppercase"><?= $data["title"]; ?></h2>
                    <div class="cover text-center">
                        <a href="index.php?action=oneNovel&amp;id=<?= $data["id"];?>">
                            <img class="imgCover +"src=<?= $cover; ?> alt="couverture du livre" title="couverture du livre <?= $data["title"]; ?>" />
                        </a>
                    </div>
                    <section class="infos d-flex flex-column align-items-center">
                        <div class="pageNumber">
                            <div class="d-flex">
                                <div class="fieldDescription">Nombre de pages : </div>
                                <div class="dataDescription"><?= $data["page_count"]; ?></div>
                            </div>
                        </div>
                        <?php
                                foreach($lastUpdate as $data2){
                                    ?>
                    <div class="updateDate">
                        <div class="d-flex">
                            <div class="fieldDescription">Date de la dernière lecture  </div>
                            <div class="dataDescription">le <?= $data2["update_date"]; ?></div>
                        </div>      
                    </div>
                    <div class="lastReadTime">
                        <div class="d-flex">
                                <?php
                                 // to see difference between 2 date source: https://www.php.net/manual/fr/datetime.diff.php
                                    $dateBdd =  $data2["update_date"];
                                    $datetime1 = new DateTime('now');
                                    $datetime2 = new DateTime($dateBdd);
                                    $interval = $datetime2->diff($datetime1);
                                    $result =  $interval->format('%a jour, %h heures et %i minutes');
                                    ?>
                                    <div class="fieldDescription">Votre dernière session de lecture remonte a</div>
                                    <div class="dataDescription"><?= $result; ?></div> 
                                    <?php 
                                
                                ?>
                        </div>
                    </div>
                    <div class="newPagesCount">
                        <div class="d-flex">
                            <div class="fieldDescription">Vous en étiez à la page : </div>
                            <div class="dataDescription"><?=$data2["new_page_count"]; ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?><div class="result"></div>
                    <?php if(isset($_SESSION["user"])){ ?>
                        <form method="post" action="index.php?action=newPageCount">
                    <?php }; ?>
                        <div class="form-group d-flex flex-column">
                            <input type="number" class="form-control" max ="<?= $data["page_count"]; //max value number of page of the $data ("page_count") ?>" 
                            placeholder="Nouveau numéro de pages " id="newPageCount" name="newPageCount" required>
                            <input type="hidden" value="<?= $data["id"];?>" id="id" name="id"> <!--to retrieve the id for the query!-->
                            <button id="submitForm" type="submit" class="btn btn-success mt-2">Valider</button>
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
                        <button class="btn btn-success" type="submit"><a href="index.php?action=endReading&amp;id=<?= $data["id"]; ?>">Valider la fin de la lecture</a></button>
                    </div>
            
                </div>
                </section>
                <?php
            }
        }
    
$content = ob_get_clean();
?>
<script src="/p5/public/js/app.js"></script>
<?php
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

