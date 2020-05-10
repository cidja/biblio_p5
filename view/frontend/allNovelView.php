<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: contact@christian-georges.net

$title = "Liste des romans";

ob_start(); //Start of capture to put it in the variable at the end of the script 
?>
    <div class="container" id="titleSort">
        <form action="index.php?action=genreSort" method="post">
            <div class="form-group row text-center align-items-center">
            <label for="genre" id="genreSortTitle" class="col-sm-2 col-form-label text-uppercase">tri par genre : </label>
            <div class="col-sm-8">
                <select class="form-control" id="genre" name="genre">
                    <option>Auto biographie</option>
                    <option>Biographie</option>
                    <option>Classique</option>
                    <option>Developpement personnel</option>
                    <option>Essais</option>
                    <option>Fantastique</option>
                    <option>Policier</option>
                    <option>Roman</option>
                    <option>Science-fiction</option>
                    <option>Traité</option>
                    <option>Thriller</option>
                    <option>Vie quotidienne</option>
                </select>
            </div>
            <div class="col-sm-2 mt-1">
                <input type="submit" class="btn btn-primary text-uppercase" value="valider">
            </div>
            </div>
        </form>
    </div>
    <div class="nbNovels">
        <div class="d-flex justify-content-center text-white">
            <div class="fieldDescription">Nombre de livres dans la catégorie choisie :  </div>
            <div class="dataDescription"><?= $countNovels; ?></div>
        </div>
    </div>
    
    <div class="container d-flex text-center flex-wrap justify-content-center">
    
        <?php
    //foreach($infos as $data) //source: https://www.php.net/manual/fr/control-structures.foreach.php
        for($i = 0; $i < 9; $i++)
    {
        if(!empty($data["cover"])){
            $cover = $data["cover"];
        } else {
            $cover = "public/img/noCover.png";
        }
        ?>
                <div class="coverAndStatus col-12 col-md-3 col-lg-3">
                    <a class="linkCover" href="index.php?action=oneNovel&amp;id=<?= $data["id"];?>">
                        <img class="imgCover +"src=<?=$cover; ?> alt="couverture du livre" title="couverture du livre" />
                    
                   
                        <div>
                            <div><?= $data["title"]; ?></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="dataDescription"> Format : </div>
                            <div class="fieldDescription ml-1"> <?= $data["publication"];?></div>
                        </div>
                    
                    <div class="mt-1">
                        <?php
                    if($data["active"] == 1){
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
                    </a>
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