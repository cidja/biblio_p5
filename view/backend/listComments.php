<?php

$title = "liste commentaires";
ob_start();
?>
    <div class="container" id="listcommentContainer">
        <h2 class="text-center text-uppercase">Liste des commentaires</h2>
        
            <?php foreach($listComments as $comment){
                ?>
                <div class="container d-flex justify-content-between">
                    <div class="row col-sm-3">
                        <div class="fieldDescription">Utilisateur : </div>
                        <div class="dataDescription"><?= $comment["user"] ?></div>
                    </div>
                    <div class="row col-sm-4">
                        <div class="fieldDescription">Inscrit le : </div>
                        <div class="dataDescription"><?= $comment["inscription_date_fr"] ?></div>
                    </div>
                    <div class="row col-sm-5">
                        <div class="fieldDescription">mot de passe mis à jour le  : </div>
                        <div class="dataDescription"><?php
                        if($comment["inscription_date_fr"] == $comment["update_date_fr"]){
                            echo "jamais";
                        } else{
                            echo $comment["update_date_fr"];
                        } 
                        ?>
                        </div>
                    </div>
                    
                </div>
                <?php
            }
            ?>
        
    </div>
    <?php
    $content = ob_get_clean();
    require("templateConnexion.php");
    ?>