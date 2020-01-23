<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr

$title = "Ajout d'un ouvrage";

ob_start(); //Start of capture to put it in the variable at the end of the script 
?>
<!-- source: https://getbootstrap.com/docs/4.0/components/forms/ !-->
    <section class=" container addNovelForm">
        <form method="post" action="index.php?action=addNovelConfirm">
            <div class="form-group">
                <label for="title">Titre de l'ouvrage</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="author">Auteur de l'ouvrage</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="exemple : 2253257419">
                <small id="isbnHelp" class="form-text text-muted">Si ISBN inconnu ne rien mettre</small>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select class="form-control" id="genre" name="genre">
                    <option>Developpement personnel</option>
                    <option>Biographie</option>
                    <option>Auto biographie</option>
                    <option>Fantastique</option>
                    <option>Science-fiction</option>
                    <option>Traité</option>
                    <option>Essais</option>
                    <option>Policier</option>
                    <option>Thriller</option>
                    <option>Classique</option>
                    <option>Roman</option>
                </select>
            </div>
            <div class="form-group">
                <label for="page_count">Nombre de pages : </label>
                <input type="number" class="form-control" id="page_count" name="page_count">
            </div>
            <div class="form-group">
                <label for="count_volume">Nombre de tomes :</label>
                <input type="text" class="form-control" id="count_volume" name="count_volume" value="1">
                <small id="count_volumeHelp" class="form-text text-muted">Si aucun autre tome mettre 1</small>
            </div>

            <div>Une note :</div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rate" id="1" value="1" >
                <label class="form-check-label" for="1">
                    1
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rate" id="2" value="2" >
                <label class="form-check-label" for="2">
                    2
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rate" id="3" value="3" >
                <label class="form-check-label" for="3">
                    3
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rate" id="4" value="4" >
                <label class="form-check-label" for="4">
                    4
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="rate" id="5" value="5" checked>
                <label class="form-check-label" for="5">
                    5
                </label>
            </div>

            <div class="form-group">
                <label for="comment">Un commentaire (pour s'en rappeler pour plus tard :))</label>
                <textarea class="form-control" id="comment" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="cover">Une image de couverture (ça marque bien les images ):</label>
                <input type="text" class="form-control" id="cover" name="cover" placeholder="rentrez l'adresse du lien de l'image">
            </div>
            <div class="row">
                <input type="submit" value="valider">
            </div>
        </form>
    </section>


<?php

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