<?php

$title = "liste commentaires";
ob_start();
?>
    <div class="container" id="listcommentContainer">
        <h2 class="text-center text-uppercase text-white">Liste des derniers commentaires</h2>
        
            <?php foreach($lastComments as $comment){
                ?>
                <div class="container jumbotron">
                    <div class="row">
                        <div class="d-flex col-sm-3">
                            <div class="fieldDescription">Auteur : </div>
                            <div class="dataDescription"><?= $comment["author"] ?></div>
                        </div>
                    
                        <div class="d-flex col-sm-9">
                            <div class="fieldDescription">Commentaire : </div>
                            <div class="dataDescription"><?= $comment["comment"] ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex col-sm-6">
                            <div class="fieldDescription">livre</div>
                            <div class="dataDescription"><a href="index.php?action=oneNovel&amp;id=<?= $comment["novel_id"];?>"><?= $comment["title"]; ?></a></div>
                        </div>
                        <div class="d-flex col-sm-6">                
                            <div class="fieldDescription">posté le :</div>
                            <div class="dataDescription"><?= $comment["comment_date_fr"]; ?></div>
                        </div>
                    <div class="row container mt-3">
                        <div class="d-flex col-sm-9 offset-sm-3">
                            <div class="fieldDescription">Commentaire en attente de modération ? :</div>
                            <div class="dataDescription">
                                <?php
                                if($comment["comment_signal"] == 1){
                                    echo "oui";
                                } elseif($comment["comment_signal"] == 0){
                                    echo "non";
                                }
                                ?></div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                <?php
            } // foreach end
            ?>
            <div class="container jumbotron">
                <div class="d-flex justify-content-end">
                    <a href="index.php?action=lastComments&amp;row_count=10">+5</a>
                    <a href="index.php?action=lastComments&amp;row_count=15">+10</a>
                    <a href="index.php?action=lastComments&amp;row_count=20">+15</a>
                </div>
            </div>
        
    </div>
    <?php
    $content = ob_get_clean();
    require("view/frontend/templateNovel.php");
    ?>