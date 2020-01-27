<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr


ob_start(); // Start of capture to put it in the variable at the end of the script 
foreach($oneCartoonInfos as $data){ // Let's go through the board
    $title = $data["title"]; 
    ?>
    <div class="container oneInfos d-flex justify-content-center flex-column">
        <div class="cover text-center">
            <img class="imgCover +" src="<?= $data["cover"];?>" alt="image de couverture de la bande dessinée" title="image de couverture de <?= $data["title"]; ?>">
        </div>
        <section class="infosNovel d-flex flex-column align-items-center">
            <h3>Infos de la bande dessinée </h3>
            <div class="title">
                <div class="d-flex">
                    <div class="fieldDescription">Titre :</div>
                    <div><?= $data["title"]; ?></div>
                </div>
            </div>
            <div class="serie">
                <div class="d-flex">
                    <div class="fieldDescription">Série :</div>
                    <div><?= $data["serie"]; ?></div>
                </div>
            </div>
            <div class="volume_number">
                <div class="d-flex">
                    <div class="fieldDescription">volume :</div>
                    <div><?= $data["volume_number"]; ?></div>
                </div>
            </div>
            <div class="scriptwriter">
                <div class="d-flex">
                    <div class="fieldDescription">scénario :</div>
                    <div><?= $data["scriptwriter"]; ?></div>
                </div>
            </div>
            <div class="designer">
                <div class="d-flex">
                    <div class="fieldDescription">Dessin :</div>
                    <div><?= $data["designer"]; ?></div>
                </div>
            </div>
            <div class="genre">
                <div class="d-flex">
                    <div class="fieldDescription">Genre : </div>
                    <div><?= $data["genre"]; ?></div>
                </div>
            </div>
            <div class="pagesCount">
                <div class="d-flex">
                    <div class="fieldDescription">Nombre de pages :</div>
                    <div><?= $data["page_count"]; ?></div>
                </div>
            </div>
            <div class="isbn">
                <div class="d-flex">
                    <div class="fieldDescription">ISBN :</div>
                    <div>
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
            <div class="finish">
                <div class="d-flex">
                    <div>
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
            </div>
            <div class="rate">
                <div class="d-flex">
                    <div class="fieldDescription">Note :</div>
                    <div><?= $data["rate"]; ?></div>
                </div>
            </div>
            <div class="comment">
                <div class="d-flex">
                    <div class="fieldDescription">Commentaires :</div>
                    <div><?=$data["comment"]; ?></div>
                </div>
            </div>
            <div class="creation_date">
                <div class="d-flex">
                    <div class="fieldDescription">Date d'ajout :</div>
                    <div><?= $data["creation_date_fr"]; ?></div>
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info">
                    <a class="bodyLink" href="index.php?action=updateCartoon&amp;id=<?= $data["id"];?>">Modifier la fiche</a>
                </button>
                <button class="btn btn-danger ml-4">
                    <a class="bodyLink" href="index.php?action=deleteCartoon&amp;id=<?= $data["id"];?>">Supprimer la BD</a>
                </button>
            </div>
        </section>
    </div>
<?php
}


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