<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: contact@christian-georges.net

$title = "Liste des romans";

ob_start(); //Start of capture to put it in the variable at the end of the script 
?>
<div class="container">
<?php 
foreach($infos as $data){
    if(!empty($data["cover"])){
        $cover = $data["cover"];
    } else {
        $cover = "public/img/noCover.png";
    }
        ?>
        <div class="container d-flex jumbotron">
            
                <div class="col-sm-2">
                    <img src="<?= $cover;?>" class="img-fluid">
                </div>

            <div class="container" id="textContent">
                <div class="row" id="title">
                    <div class="col-sm">
                        <?= $data["title"]; ?>
                    </div>
                    <div class="col-sm">
                        <?= $data["author"];?>
                    </div>
                </div>
                <div class="row">
                    <div class=" col beginDate">
                        <div class="d-flex">
                            <div class="fieldDescription">Commencé le : </div>
                            <div class="dataDescription">
                                <?php //source: https://www.php.net/manual/fr/function.explode.php
                                $begin_date = $data["begin_date"];
                                $begin_date_fr = explode("-", $begin_date);
                                echo $begin_date_fr[2] . "/". $begin_date_fr[1] . "/". $begin_date_fr[0];
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class=" col endDate">
                        <div class="d-flex">
                            <div class="fieldDescription"> Fini le :</div>
                            <div class="dataDescription">
                                <?php //source: https://www.php.net/manual/fr/function.explode.php
                                $end_date = $data["end_date"];
                                $end_date_fr = explode("-", $end_date);
                                echo $end_date_fr[2] . "/". $end_date_fr[1] . "/". $end_date_fr[0];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row timeToRead">
                <div class="d-flex">
                    <div class="fieldDescription">Livres lus en : </div>
                    <div class="dataDescription">
                        <?php //source: https://www.php.net/manual/fr/function.date-create.php
                        $bDate = date_create($data["begin_date"]);
                        $eDate = date_create($data["end_date"]);
                        if($data["end_date"] == "0000-00-00"){ //to check if end date ok 
                            echo "pas encore de date de fin";
                        } else{
                            $interval = date_diff($bDate, $eDate);
                            echo $interval->format("%a jours");
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
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