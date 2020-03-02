<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");
$title = "validation de suppression";

ob_start(); // Start of capture to put it in the variable at the end of the script 
?>
<div class="container jumbotron">
    <div class="col">
    <?php if(isset($_SESSION["member"]) && $_SESSION["member"] == "admin"){ ?>
        <form method="post" action="index.php?action=deleteNovel&amp;id=<?=$id;?>">
        <?php }; ?>
            <div class="form-group">
                <label for="pwdDelete">Mot de passe pour confirmer la suppression du livre <?= $novel; ?></label>
                <input type="password" class="form-control" id="pwdDelete" name="pwdDelete" required>
                
            </div>
            <div class="form-group">
                <input class="btn btn-info" type="submit" value="valider">
            </div>

        </form>
    </div>
</div>
<?php
    
$content = ob_get_clean();
require("templateNovel.php");

?>