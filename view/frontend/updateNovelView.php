<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");

ob_start(); // Start of capture to put it in the variable at the end of the script 
testnotUserIssetVisitTitle();

foreach($oneInfos as $data){ // Let's go through the board
    $title = $data["title"]; 
    
    ?>
    <section class="container novelForm">
        <form method="post" action="index.php?action=updateNovelConfirm&amp;id=<?= $data["id"];?>">

        <!-- lend part !-->
            <div class="form-group row justify-content-center align-items-center">
                <label for="lend" id="lend" class="col-sm-auto col-form-label">Emprunté ? :</label>
                <div class="col-sm-auto">
                    <select class="form-control" id="lend" name="lend">
                        <option value="0">Non</option>
                        <option value="1">Oui</option>
                    </select>
                </div>
                <label for="borrower" id="borrower" class="col-sm-auto col-form-label">Par qui ?</label>
                <div class="col-sm-auto">
                    <input type="text" id="borrower" name="borrower">
                </div>
                <label for="lend_date" id="lend_date" class="col-sm-auto col-form-label">Date du prêt : </label>
                <div class="col-sm-auto">
                    <input type="date" id="lend_date" name="lend_date">
                </div>
            </div>
           
            <!--update novel part !-->
            <div class="form-group">
                <label for="title">Titre de l'ouvrage </label>
                <input type="text" class="form-control" id="title" name="title" required value="<?= $data["title"];?>" autofocus>
            </div>
            <div class="form-group">
                <label for="author">Auteur de l'ouvrage</label>
                <input type="text" class="form-control" id="author" name="author" required value="<?= $data["author"];?>">
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="exemple : 2253257419" value="<?= $data["isbn"];?>">
                <small id="isbnHelp" class="form-text text-muted">Si ISBN inconnu ne rien mettre</small>
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select class="form-control" id="genre" name="genre">
                    <option><?= $data["genre"];?></option>
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

            <div class="form-group">
                <label for="publication">format : </label>
                <select class="form-control" id="publication" name="publication">
                    <option><?= $data["publication"];?></option>
                    <option>papier</option>
                    <option>kindle</option>
                </select>
            </div>

            <div class="form-group">
                <label for="page_count">Nombre de pages : </label>
                <input type="number" class="form-control" id="page_count" name="page_count" value="<?= $data["page_count"];?>">
            </div>

            <div class="form-group">
                <label for="count_volume">Nombre de tomes :</label>
                <input type="text" class="form-control" id="count_volume" name="count_volume" value="<?= $data["count_volume"];?>">
                <small id="count_volumeHelp" class="form-text text-muted">Si aucun autre tome mettre 0</small>
            </div>

            
            <p>Lecture actuelle ?</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" id="yes" value="1">
                <label class="form-check-label" for="yes">
                    Oui
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" id="no" value="0" checked>
                <label class="form-check-label" for="no">
                    Non
                </label>
            </div>

            <div class="form-group">
                <label for="begin_date">Date début lecture</label>
                <input type="date" class="form-control" id="begin_date" name="begin_date"  value="<?= $data["begin_date"];?>">
            </div>

            <div class="form-group">
                <label for="end_date">Date de fin de lecture</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $data["end_date"];?>">
            </div>

            <div class="form-group">
                <label for="rate">Note actuelle : </label>
                <select class="form-control" id="rate" name="rate">
                    <option><?= $data["rate"];?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="comment">Revoir ton commentaire ? (on change tous d'avis :) )</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"><?= $data["comment"]; ?></textarea>
            </div>

            <div class="form-group">
                <label for="cover">Une image de couverture (ça marque bien les images ):</label>
                <input type="text" class="form-control" id="cover" name="cover" placeholder="rentrez l'adresse du lien de l'image" value="<?= $data["cover"];?>" >
            </div>

            <div class="row justify-content-center">
                <input class="btn btn-success" type="submit" value="valider">
            </div>
        </form>
    </section>
<?php
    } //foreach end

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