<?php

$title = "Connexion superutilisateur";
ob_start();
?>

        <section class="container text-center jumbotron connexion mt-5">
            <form method="post" action="index.php?action=checkConnexion">
                <h3>Accès admin :</h3>
                <div class="form-group">
                    <label for="user">Utilisateur :</label>
                    <input type="text" class="form-control user" id="user" name="user" autofocus required>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe : </label>
                    <input type="password" class="form-control pwd" id="pwd" name="pwd" required >
                </div>
                <div class="form-group">
                    <input class="submitButtonConnexion +" type="submit" value="Valider">
                </div>
            </form>
<?php
$content = ob_get_clean();
require("templateConnexion.php");
?>