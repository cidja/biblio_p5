<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");
$title = "Ajout d'un ouvrage";

ob_start(); //Start of capture to put it in the variable at the end of the script 
if(isset($_SESSION["user"])){
?>
<!-- source: https://getbootstrap.com/docs/4.0/components/forms/ !-->
    <section class="container addCartoonForm jumbotron">
        <h3 class="text-center text-uppercase">Ajout d'une bande dessinée</h3>
        <form method="post" action="index.php?action=addCartoonsConfirm">
            <div class="form-group">
                <label for="title">Titre de l'ouvrage</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="serie">Série </label>
                <input type="text" class="form-control" id="serie" name="serie" placeholder="leonard, spirou, boule et bill,..." required >
            </div>

            <div class="form-group">
                <label for="scriptwriter">Scénario</label>
                <input type="text" class="form-control" id="scriptwriter" name="scriptwriter">
            </div>

            <div class="form-group">
                <label for="designer">dessinateur </label>
                <input type="text" class="form-control" id="designer" name="designer">
            </div>
            
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="number" class="form-control" id="isbn" name="isbn" placeholder="exemple : 2253257419">
                <small id="isbnHelp" class="form-text text-muted">Si ISBN inconnu ne rien mettre</small>
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select class="form-control" id="genre" name="genre">
                    <option>Aventure</option>
                    <option>Comics</option>
                    <option>Heroïque fantasy</option>
                    <option>Historique</option>
                    <option>Humour</option>
                    <option>Manga</option>  
                    <option>Policier</option> 
                    <option>Science-fiction</option>
                    <option>Western</option>
                 </select>
            </div>

            <div class="form-group">
                <label for="page_count">Nombre de pages </label>
                <input type="number" class="form-control" id="page_count" name="page_count">
            </div>

            <div class="form-group">
                <label for="count_volume">Nombre de tomes </label>
                <input type="number" class="form-control" id="count_volume" name="count_volume" value="1">
            </div>

            <div class="form-group">
                <label for="volume_number">Numéro de ce tome </label>
                <input type="number" class="form-control" id="volume_number" name="volume_number">
            </div>

            <input type="hidden" name="finish" value="1">
            
            <div class="form-group">
                <label for="rate">Une note </label>
                <select class="form-control" id="rate" name="rate">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="comment">Un commentaire (pour s'en rappeler pour plus tard :))</label>
                <textarea class="form-control" id="comment" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="cover">Une image de couverture (ça marque bien les images ):</label>
                <input type="text" class="form-control" id="cover" name="cover" placeholder="rentrez l'adresse du lien de l'image">
            </div>

            <div class="d-flex justify-content-center">
                <input class="addSubmitButton btn btn-success text-uppercase" type="submit" value="valider">
            </div>

        </form>
    </section>


    <?php
} // if end
else {
    ?>
    <h2 class="textDemo container text-center text-uppercase">Mode visiteur aucune modification possible</h2>
<!-- source: https://getbootstrap.com/docs/4.0/components/forms/ !-->
    <section class="container addCartoonForm jumbotron">
        <h3 class="text-center text-uppercase">Ajout d'une bande dessinée</h3>
        <div class="form-group">
            <label for="title">Titre de l'ouvrage</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="serie">Série </label>
            <input type="text" class="form-control" id="serie" name="serie" placeholder="leonard, spirou, boule et bill,..." required >
        </div>

        <div class="form-group">
            <label for="scriptwriter">Scénario</label>
            <input type="text" class="form-control" id="scriptwriter" name="scriptwriter">
        </div>

        <div class="form-group">
            <label for="designer">dessinateur </label>
            <input type="text" class="form-control" id="designer" name="designer">
        </div>
            
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="number" class="form-control" id="isbn" name="isbn" placeholder="exemple : 2253257419">
            <small id="isbnHelp" class="form-text text-muted">Si ISBN inconnu ne rien mettre</small>
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre">
                <option>Aventure</option>
                <option>Comics</option>
                <option>Heroïque fantasy</option>
                <option>Historique</option>
                <option>Humour</option>
                <option>Manga</option>  
                <option>Policier</option> 
                <option>Science-fiction</option>
                <option>Western</option>
            </select>
        </div>

        <div class="form-group">
            <label for="page_count">Nombre de pages </label>
            <input type="number" class="form-control" id="page_count" name="page_count">
        </div>

        <div class="form-group">
            <label for="count_volume">Nombre de tomes </label>
            <input type="number" class="form-control" id="count_volume" name="count_volume" value="1">
        </div>

        <div class="form-group">
            <label for="volume_number">Numéro de ce tome </label>
            <input type="number" class="form-control" id="volume_number" name="volume_number">
        </div>

        <input type="hidden" name="finish" value="1">

        <div class="form-group">
                <label for="rate">Une note </label>
                <select class="form-control" id="rate" name="rate">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

        <div class="form-group">
            <label for="comment">Un commentaire (pour s'en rappeler pour plus tard :))</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
        </div>
            
        <div class="form-group">
            <label for="cover">Une image de couverture (ça marque bien les images ):</label>
            <input type="text" class="form-control" id="cover" name="cover" placeholder="rentrez l'adresse du lien de l'image">
        </div>

        <div class="d-flex justify-content-center">
            <input class="addSubmitButton btn btn-success text-uppercase" type="submit" value="valider">
        </div>
    </section>


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
    */
?>