<?php 
include("public/inc/tools.php");
$title = "Admin mon blog"; 
    ob_start(); 
    ?>
    <div class="blocPage">
        <section id="sectionUpdatePassword">
            <div class="error"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <h3>Connecté en tant que : <?= $_SESSION["member"]; ?></h3>
                </div>
                <?php
                foreach($updateDatePassword as $data){ // retrieving the updatedatepassword query
                    //source: https://www.php.net/manual/fr/function.date-create.php
                        $InscriptionDate = date_create($data["inscription_date"]);
                        $InscriptionDateFr =  $InscriptionDate->format("d/m/Y à H:i:s");
                        $date = new DateTime(); // now date creation

                        $UpdateDate = date_create($data["update_date"]);
                        $UpdateDateFr =  $UpdateDate->format("d/m/Y à H:i:s");

                        $interval = date_diff($InscriptionDate, $date);
                        $intervalInscriptionNow =  $interval->format("%a jours");
                    ?> 
                    <div class="container d-flex flex-column align-items-center">
                        <div class="row">
                            <div class="dataDescription">Vous êtes inscrit depuis le :</div>
                            <div class="fieldDescription"><?= $InscriptionDateFr; ?></div>
                        </div>
                        <div class="row">
                            <div class="dataDescription"> c'était il y a :</div>
                            <div class="fieldDescription"><?= $intervalInscriptionNow; ?></div>
                        </div>
                        <div class="row">
                            <div class="dataDescription"><?php
                            if($data["inscription_date"] == $data["update_date"]){
                                ?>vous n'avez jamais modifié le mot de passe, il faudrait y penser peut être :) 
                                <?php 
                            } else {
                                ?>La dernière fois que vous avez modifié le mot de passe c'était le :</div>
                            <div class="fieldDescription"><?= $UpdateDateFr; ?></div>
                            <?php 
                            }; 
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="row justify-content-center">
                    <div class="mb-5 mt-4">

                   
                    <form class="form-login" action="index.php?action=updatePassword" method="post">

                            <div class="form-group text-center mb-1">
                                <label for="oldMdp">
                                    <input class="form-control" type="password" id="oldMdp" name="oldMdp" placeholder="ancien mot de passe" required autofocus>
                                    <p class="show-password btn btn-primary mt-1">Afficher</p> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdp">
                                    <input class="form-control field" type="password" id="pwd1" name="newMdp" placeholder="nouveau mot de passe" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdpRepeat">
                                    <input class="form-control field" type="password" id="pwd2" name="newMdpRepeat" placeholder="rentrez le mot de passe à nouveau" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="text-center">
                                <input class="container-fluid btn btn-success confirm" id="submitButton" type="submit" value="valider">
                            </div>
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <script src="/p5/public/js/form_password_check.js"></script>
    <?php
    
    $content = ob_get_clean();

 require("view/frontend/templateNovel.php"); 

/*Ce code fait 3 choses :

    Il définit le titre de la page dans $title. Celui-ci sera intégré dans la balise <title> dans le template.

    Il définit le contenu de la page dans $content. Il sera intégré dans la balise <body> du template.
    Comme ce contenu est un peu gros, on utilise une astuce pour le mettre dans une variable. On appelle 
    la fonction ob_start() (ligne 3) qui "mémorise" toute la sortie HTML qui suit, puis, à la fin, on récupère 
    le contenu généré avec ob_get_clean()  (ligne 28) et on met le tout dans $content .

    Enfin, il appelle le template avec un require. Celui-ci va récupérer les variables $title et $content qu'on vient de créer... pour afficher la page !
*/

?>
