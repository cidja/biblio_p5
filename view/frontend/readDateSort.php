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
        <div class="container">
            <div class="row jumbotron"  id="textContainer">
                <div class="col-sm-4">
                    <img src="<?= $cover;?>" class="img-fluid">
                </div>
                <div class="row" id="title">
                    <div class="col-sm-6">
                    <?= $data["title"]; ?>
                    </div>
                    <div class="col-sm-6">
                        <?= $data["author"];?>
                    </div>
                </div>

                <div class="row" id="beginDate">
                    <div class="col-sm-6">
                        Commencé le : 
                    </div>
                    <div class="col-sm-6">
                        <?= $data["begin_date"]; ?>
                    </div>
                </div>

                <div class="row" id="endDate">
                    <div class="col-sm-6">
                        Fini le :
                    </div>
                    <div class="col-sm-6">
                        <?= $data["end_date"]; ?>
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