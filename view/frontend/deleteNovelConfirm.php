<?php 
//Tous les commentaires sont en anglais pour la compréhension pour le plus grand nombre
//All comments are in English for the understanding of as many people as possible.
//to support : mail: christian@linternaute-averti.fr
include("public/inc/tools.php");

ob_start(); // Start of capture to put it in the variable at the end of the script 

    echo $backLink;
?>
<div class="container">
    <div class="col">
        <form method="get" action="index.php?action=deleteNovel&amp;id=<?= $data["id"];?>">
            <div class="form-group">
                <label for="confirmDelete">Mot de passe pour la confirmation de la suppression</label>
                <input type="text" class="form-control" id="confirmDelete" name="confirmDelete">
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