<?php 


    $title = "Admin mon blog"; 
    ob_start(); 
if(isset($_SESSION["user"])){
    ?>
    <div class="blocPage">
        <section id="sectionUpdatePassword">
            <div class="error"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="mb-5 mt-4">
                        <form class="form-login" action="index.php?action=updatePassword" method="post">
                            <div class="form-group text-center mb-1">
                                <label for="oldMdp">
                                    <input class="form-control field" type="password" id="oldMdp" name="oldMdp" placeholder="ancien mot de passe" required autofocus>
                                    <p class="show-password btn btn-primary mt-1">Afficher</p> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdp">
                                    <input class="form-control field" type="password" id="newMdp" name="newMdp" placeholder="nouveau mot de passe" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdpRepeat">
                                    <input class="form-control field" type="password" id="newMdpRepeat" name="newMdpRepeat" placeholder="rentrez le mot de passe à nouveau" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="text-center">
                                <input class="container-fluid btn btn-success confirm" type="submit" value="valider">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
    <?php
    } // if end
    else{
        ?>
        <div class="blocPage">
            <h2 class="textDemo container text-center text-uppercase">Mode visiteur aucune modification possible</h2>
            <section id="sectionUpdatePassword">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="mb-5 mt-4">
                            <div class="form-group text-center mb-1">
                                <label for="oldMdp">
                                    <input class="form-control field" type="password" id="oldMdp" name="oldMdp" placeholder="ancien mot de passe" required autofocus>
                                    <p class="show-password btn btn-primary mt-1">Afficher</p> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdp">
                                    <input class="form-control field" type="password" id="newMdp" name="newMdp" placeholder="nouveau mot de passe" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="form-group text-center mb-1">
                                <label for="newMdpRepeat">
                                    <input class="form-control field" type="password" id="newMdpRepeat" name="newMdpRepeat" placeholder="rentrez le mot de passe à nouveau" required>
                                    <span class="show-password btn btn-primary mt-1">Afficher</span> <!--source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/!-->
                                </label>
                            </div>
                            <div class="text-center">
                                <input class="container-fluid btn btn-success confirm" type="submit" value="valider">
                                <button type="text" class="reset">Vider le formulaire</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
    <?php
    }
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