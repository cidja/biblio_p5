<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");

ob_start(); // Start of capture to put it in the variable at the end of the script 

    foreach($oneCartoonInfos as $data){ // Let's go through the board
        $title = $data["title"]; 
        if(!empty($data["cover"])){
            $cover = $data["cover"];
        } else {
            $cover = "public/img/noCover.png";
        }
        ?>
        <div class="container oneInfos d-flex justify-content-center flex-column">
            <div class="cover text-center">
                <img class="imgCover +" src="<?= $cover;?>" alt="image de couverture de la bande dessinée" title="image de couverture de <?= $data["title"]; ?>">
            </div>
            <section class="infosNovel d-flex flex-column align-items-center">
                <h3>Infos de la bande dessinée </h3>
                
                <div class="title">
                    <div class="d-flex">
                        <div class="fieldDescription">Titre :</div>
                        <div class="dataDescription"><?= $data["title"]; ?></div>
                    </div>
                </div>

                <div class="serie">
                    <div class="d-flex">
                        <div class="fieldDescription">Série :</div>
                        <div class="dataDescription"><?= $data["serie"]; ?></div>
                    </div>
                </div>

                <div class="volume_number">
                    <div class="d-flex">
                        <div class="fieldDescription">volume :</div>
                        <div class="dataDescription"><?= $data["volume_number"]; ?></div>
                    </div>
                </div>
                
                <div class="genre">
                    <div class="d-flex">
                        <div class="fieldDescription">Genre : </div>
                        <div class="dataDescription"><?= $data["genre"]; ?></div>
                    </div>
                </div>

                <div class="pagesCount">
                    <div class="d-flex">
                        <div class="fieldDescription">Nombre de pages :</div>
                        <div class="dataDescription"><?= $data["page_count"]; ?></div>
                    </div>
                </div>

                <div class="timeToRead">
                <div class="d-flex">
                    <div class="fieldDescription">BD lus en : </div>
                    <div class="dataDescription">
                        <?php //source: https://www.php.net/manual/fr/function.date-create.php
                        $bDate = date_create($data["begin_date"]);
                        $eDate = date_create($data["end_date"]);
                        $interval = date_diff($bDate, $eDate);
                        echo $interval->format("%a jours");
                        ?>
                    </div>
                </div>
            </div>

                <div class="beginDate">
                    <div class="d-flex">
                        <div class="fieldDescription">Date de début de lecture :</div>
                        <div class="dataDescription">
                            <?php //source: https://www.php.net/manual/fr/function.explode.php
                            $begin_date = $data["begin_date"];
                            $begin_date_fr = explode("-", $begin_date);
                            echo $begin_date_fr[2] . "/". $begin_date_fr[1] . "/". $begin_date_fr[0];
                            ?>
                        </div>
                    </div>
                </div>

                <div class="endDate">
                    <div class="d-flex">
                        <div class="fieldDescription">Date de fin de lecture :</div>
                        <div class="dataDescription">
                            <?php //source: https://www.php.net/manual/fr/function.explode.php
                            $end_date = $data["end_date"];
                            $end_date_fr = explode("-", $end_date);
                            echo $end_date_fr[2] . "/". $end_date_fr[1] . "/". $end_date_fr[0];
                            ?>
                        </div>
                    </div>
                </div>

                <div class="isbn">
                    <div class="d-flex">
                        <div class="fieldDescription">ISBN :</div>
                        <div class="dataDescription">
                            <?php
                            if ($data["isbn"] == 0){
                                echo "non renseigné";
                            } else{
                                echo $data["isbn"];
                            } 
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="rate">
                    <div class="d-flex">
                        <div class="fieldDescription">Note :</div>
                        <div class="dataDescription"><?= $data["rate"]; ?></div>
                    </div>
                </div>

                <div class="comment">
                    <div class="d-flex">
                        <div class="fieldDescription">Impressions :</div>
                        <div class="dataDescription"><?=$data["comment"]; ?></div>
                    </div>
                </div>

                <div class="creation_date">
                    <div class="d-flex">
                        <div class="fieldDescription">Date d'ajout :</div>
                        <div class="dataDescription"><?= $data["creation_date_fr"]; ?></div>
                    </div>
                </div>

                <div class="d-flex">
                <?php if(isset($_SESSION["member"]) && $_SESSION["member"] == "admin"){ ?>
                    <button class="btn btn-info">
                        <a class="bodyLink" href="index.php?action=updateCartoon&amp;id=<?= $data["id"];?>">Modifier la fiche</a>
                    </button>
                    <form method="post" action="index.php?action=formDeleteCartoon&amp;id=<?= $data["id"]; ?>">
                        <input type="hidden" value="<?= $data["id"];?>" name="id">
                        <input type="hidden" value="<?= $data["title"]; ?>" name="cartoon">
                        <button type="submit" class="btn btn-danger ml-4">Supprimer la BD</button>
                    </form>
                    <?php };?>
                </div>
            </section>
        </div>
    <?php
    } // foreach end



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
?>