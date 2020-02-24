<?php
$title = "connexion membre";
ob_start();
?>
        <section class="container text-center jumbotron connexion mt-5">
            <form method="post" action="index.php?action=checkMember">
                <h3>Accès membre :</h3>
                <div class="form-group">
                    <label for="member">Pseudo :</label>
                    <input type="text" class="form-control user" id="member" name="member" autofocus required>
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