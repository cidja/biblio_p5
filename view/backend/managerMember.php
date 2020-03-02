<?php
$title= "Membre du site";
ob_start();
?>
    <div class="container" id="listMemberContainer">
        <h2 class="text-center text-uppercase">Liste des membres</h2>
        
            <?php foreach($listMembers as $member){
                ?>
                <div class="container d-flex justify-content-between">
                    <div class="row col-sm-3">
                        <div class="fieldDescription">Utilisateur : </div>
                        <div class="dataDescription"><?= $member["user"] ?></div>
                    </div>
                    <div class="row col-sm-4">
                        <div class="fieldDescription">Inscrit le : </div>
                        <div class="dataDescription"><?= $member["inscription_date_fr"] ?></div>
                    </div>
                    <div class="row col-sm-5">
                        <div class="fieldDescription">mot de passe mis à jour le  : </div>
                        <div class="dataDescription"><?php
                        if($member["inscription_date_fr"] == $member["update_date_fr"]){
                            echo "jamais";
                        } else{
                            echo $member["update_date_fr"];
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


