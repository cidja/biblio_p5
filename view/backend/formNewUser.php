<?php

$title = "Inscription";
ob_start();
?> 
        <div class="container text-center jumbotron">
            <h2 class="text-uppercase">Création d'un nouvel utilisateur :</h2>
            <div class="formUser">
                <form action="/p5/index.php?action=createUserConfirm" method="post">
                    <div class="form-group">
                        <label for="user">Nom d'utilisateur : </label>
                        <input type="text" class="form-control" id="user" name="user">
                    </div>
                    <div class="form-group">
                        <label for="password1">Mot de passe : </label>
                        <input type="password" class="form-control field" id="pwd1" name="password1">
                    </div>
                    <div class="form-group">
                        <label for="password2">Retaper le mot de passe : </label>
                        <input type="password" class="form-control field" id="pwd2" name="password2">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info" type="submit" value="valider" id="submitButton">
                    </div>
                </form>
                <div id="result"></div>
            </div>
        </div>
        <script src="/p5/public/js/form_password_check.js"></script>
    <?php
    $content = ob_get_clean();
    require("templateConnexion.php");
    ?>