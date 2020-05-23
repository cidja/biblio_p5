<?php //deviens notre routeur 
/*privileges 
0 : member only comments
1 : contributor comments + add book
2 : admin comments + add book + manage comments + add privilege for other members
*/
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
session_start(); // saving settings for the source admin: http://www.lephpfacile.com/cours/18-les-sessions Ligne 64
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682351-creer-un-routeur#/id/r-4682481


include(dirname(__FILE__)."/controller/frontend.php");
include(dirname(__FILE__)."/controller/backend.php");


try{
    if(isset($_GET["action"])){
        
            if($_GET["action"] == "home"){
                ToolsFrontend::home();
            }

            //For connexionView
            elseif($_GET["action"] == "connexionview"){
                ToolsBackend::connexionView();
            }
           

            //To create newUser
            elseif($_GET["action"] == "inscription"){
                ToolsBackend::inscription();
            }

            elseif($_GET["action"] == "createUserConfirm"){
                $user = htmlspecialchars($_POST["user"]);
                $pwd1 = htmlspecialchars($_POST["password1"]);
                ToolsBackend::createNewUser($user, $pwd1);
            }

            elseif($_GET["action"] == "checkMember"){
                $member = htmlspecialchars($_POST["member"]);
                $pwd = $_POST["pwd"];
                ToolsBackend::checkMember($member, $pwd);
            }

            elseif($_GET["action"] == "wrongId"){
                ToolsBackend::wrongId();
            }

            //------------------Comment part ---------------------------

            elseif ($_GET["action"] == "addComment") { 
                //source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4683301-nouvelle-fonctionnalite-ajouter-des-commentaires#/id/r-4683671
                if (isset($_GET["id"]) && $_GET["id"] > 0){
                    if (!empty($_POST["author"]) && !empty($_POST["comment"])) {
                        $novel_id = htmlspecialchars($_GET["id"]);
                        $author     = htmlspecialchars($_POST["author"]);
                        $comment    = htmlspecialchars($_POST["comment"]);
                        ToolsFrontend::addComment($novel_id, $author, $comment); 
                    }
                    else {
                        
                        throw new Exception("Erreur tous les champs ne sont pas remplis !");
                    }
                }
                else {
                // other exception
                throw new Exception("Erreur : aucun identifiant de billet envoyé");
            }

            }
            elseif ($_GET["action"] == "signalComment"){ //to signal a comment
            $id = htmlspecialchars($_GET["id"]);
            $novel_id = htmlspecialchars($_GET["novel_id"]);
            ToolsFrontend::signalComment($id, $novel_id); 
            }

            elseif($_GET["action"] == "listComments"){
                ToolsBackend::listComments();
            }

            elseif($_GET["action"] == "moderation"){
                ToolsBackend::moderation();
            }
            elseif($_GET["action"] == "signalCommentDecision"){
                if(isset($_GET['id']) && $_GET["id"] > 0){
                    if($_POST["commentChoice"] == "commentApprouve"){
                        ToolsBackend::approuveComment($_GET["id"]);
                        header("location: index.php?action=moderation");
                        
                    }
                    elseif($_POST["commentChoice"] == "deleteComment"){
                        ToolsBackend::deleteComment($_GET["id"]);
                        header("location: index.php?action=moderation");
                    }
                }
                else {
                    throw new Exception("Aucun id de post envoyé");
                }
            }

            elseif($_GET["action"] == "lastComments"){
                $row_count = htmlspecialchars($_GET["row_count"]);
                ToolsFrontend::lastComments($row_count);
            }

            elseif($_GET["action"] == "listMember"){
                ToolsBackend::listMembers();
            }


            //Novel part

            elseif($_GET["action"] == "allNovels"){
                ToolsFrontend::listNovel();
            }

            elseif($_GET["action"] == "oneNovel"){ // if in the url $_GET["action"]= oneNovel
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::oneNovelInfos($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                }
            }


            


            elseif($_GET["action"] == "oneNovelAjax"){ // if in the url $_GET["action"]= oneNovel
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::oneNovelInfosAjax($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                }
            }

            elseif($_GET["action"] == "listNovelCurrent"){
                ToolsFrontend::listNovelCurrent();
            }

            elseif($_GET["action"] == "novelCurrent"){
                $id = htmlspecialchars($_GET["id"]);
                ToolsFrontend::novelCurrent($id);
            }

            // novelPagesCount
            elseif($_GET["action"] == "newPageCount"){
                $id             = htmlspecialchars($_POST["id"]);
                $newPageCount   = htmlspecialchars($_POST["newPageCount"]);
                ToolsFrontend::newPageCount($id, $newPageCount);   
            }

            elseif($_GET["action"] == "statistics"){
                ToolsFrontend::statistics();
            }
            elseif($_GET["action"] == "addNovel"){
                ToolsFrontend::addNovel();
            }
            elseif($_GET["action"] == "addNovelConfirm"){
                $title          = htmlspecialchars($_POST["title"]);
                $author         = htmlspecialchars($_POST["author"]);
                $isbn           = htmlspecialchars($_POST["isbn"]);
                $publication    = htmlspecialchars($_POST["publication"]);
                $genre          = htmlspecialchars($_POST["genre"]);
                $page_count     = htmlspecialchars($_POST["page_count"]);
                $count_volume   = htmlspecialchars($_POST["count_volume"]);
                //$finish         = htmlspecialchars($_POST["finish"]);
                $comment        = htmlspecialchars($_POST["comment"]);
                $rate           = htmlspecialchars($_POST["rate"]);
                $cover          = htmlspecialchars($_POST["cover"]);
                ToolsFrontend::addNovelConfirm($title, $author,$isbn, $publication, $genre, $page_count, $count_volume, $comment, $rate, $cover);
            }
    
            elseif($_GET["action"] == "endReading"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::endReading($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                }
            }
    
            elseif($_GET["action"] == "updateNovel"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::updateNovelInfos($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                }
            }
            elseif($_GET["action"] == "updateNovelConfirm"){
                $id             = htmlspecialchars($_GET['id']);
                $title          = htmlspecialchars($_POST["title"]);
                $author         = htmlspecialchars($_POST["author"]);
                $isbn           = htmlspecialchars($_POST["isbn"]);
                $publication    = htmlspecialchars($_POST["publication"]);
                $genre          = htmlspecialchars($_POST["genre"]);
                $page_count     = htmlspecialchars($_POST["page_count"]);
                $count_volume   = htmlspecialchars($_POST["count_volume"]);
                $active         = htmlspecialchars($_POST["active"]);
                $comment        = htmlspecialchars($_POST["comment"]);
                $rate           = htmlspecialchars($_POST["rate"]);
                $cover          = htmlspecialchars($_POST["cover"]);
                $begin_date     = htmlspecialchars($_POST["begin_date"]);
                $end_date       = htmlspecialchars($_POST["end_date"]);
                $lend           = htmlspecialchars($_POST["lend"]);
                $borrower       = htmlspecialchars($_POST["borrower"]);
                $lend_date      = htmlspecialchars($_POST["lend_date"]);

               ToolsFrontend::updateNovelConfirm($id,$title, $author,$isbn, $publication, $genre, $page_count, $count_volume,$active, $comment, $rate, $cover, $begin_date, $end_date, $lend, $borrower, $lend_date);
                
            }

            elseif($_GET["action"] == "formDeleteNovel"){ // calls the form that asks for a password to delete a work
                $id = htmlspecialchars($_POST["id"]); // to avoid inclusion xss
                $novel = htmlspecialchars($_POST["novel"]); // to avoid inclusion xss
                ToolsFrontend::formDeleteNovel($id, $novel);
            }
            elseif($_GET["action"] == "deleteNovel"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                $pwdDelete = htmlspecialchars($_POST["pwdDelete"]); // to avoid inclusion xss
                ToolsFrontend::deleteNovel($id,$pwdDelete);
                }else{
                    throw new Exception ("aucun identifiant de billet envoyé");
                }
            }


            elseif($_GET["action"] == "genreSort"){
                $genre = htmlspecialchars(($_POST["genre"]));
                ToolsFrontend::genreSort($genre);
            }

            elseif($_GET["action"] == "sortAlphabetical"){
                ToolsFrontend::sortAlphabetical();
            }

            elseif($_GET["action"] == "readDateSort"){
                ToolsFrontend::readDateSort();
            }

            //********change password part ********* */
            //Appel de la méthode pour afficher le formNewPassword
        elseif($_GET["action"] == "formNewPassword"){
            $user = $_SESSION["member"];
            ToolsBackend::formNewPassword($user);
        }

        //Appel de la méthode pour modifier le mot de passe admin
        elseif($_GET["action"] == "updatePassword"){
            $user = htmlspecialchars($_SESSION["member"]);
            $oldPwd = htmlspecialchars($_POST["oldMdp"]);
            $newPwd = htmlspecialchars($_POST["newMdp"]);
            $newPwdRepeat = htmlspecialchars($_POST["newMdpRepeat"]);
            ToolsBackend::changePassword($user, $oldPwd, $newPwd, $newPwdRepeat);
        }
    
    
            //Cartoon part 
            elseif ($_GET["action"] == "allCartoons"){
                ToolsFrontend::allCartoons();
            }
            elseif ($_GET["action"] == "cartoonsRead"){
                ToolsFrontend::cartoonsRead();
            }
            elseif ($_GET["action"] == "oneCartoon"){
                if(isset($_GET["id"]) && $_GET["id"] > 0){
                    $id = htmlspecialchars($_GET["id"]);
                    ToolsFrontend::oneCartoonInfos($id);
                }
            }
    
            elseif ($_GET["action"] == "cartoonCurrent"){
                ToolsFrontend::cartoonCurrent();
            }
            elseif($_GET["action"] == "addCartoons"){
                ToolsFrontend::addCartoons();
            }
            elseif($_GET["action"] == "addCartoonsConfirm"){
                $title              = htmlspecialchars($_POST['title']);
                $serie              = htmlspecialchars($_POST["serie"]);
                $isbn               = htmlspecialchars($_POST["isbn"]); 
                $genre              = htmlspecialchars($_POST["genre"]);
                $page_count         = htmlspecialchars($_POST["page_count"]);
                $volume_number      = htmlspecialchars($_POST["volume_number"]);
                $finish             = htmlspecialchars($_POST["finish"]);
                $comment            = htmlspecialchars($_POST["comment"]);
                $rate               = htmlspecialchars($_POST["rate"]);
                $cover              = htmlspecialchars($_POST["cover"]);
    
                ToolsFrontend::addCartoonsConfirm($title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
                $rate, $cover);
            }
            
            elseif($_GET["action"] == "updateCartoonConfirm"){
                $id                 = htmlspecialchars($_GET["id"]);
                $title              = htmlspecialchars($_POST['title']);
                $serie              = htmlspecialchars($_POST["serie"]);
                $isbn               = htmlspecialchars($_POST["isbn"]); 
                $genre              = htmlspecialchars($_POST["genre"]);
                $page_count         = htmlspecialchars($_POST["page_count"]);
                $volume_number      = htmlspecialchars($_POST["volume_number"]);
                $finish             = htmlspecialchars($_POST["finish"]);
                $comment            = htmlspecialchars($_POST["comment"]);
                $rate               = htmlspecialchars($_POST["rate"]);
                $cover              = htmlspecialchars($_POST["cover"]);
                $begin_date         = htmlspecialchars($_POST["begin_date"]);
                $end_date           = htmlspecialchars($_POST["end_date"]);
                ToolsFrontend::updateCartoonConfirm($id, $title, $serie, $isbn, $genre, $page_count, $volume_number, $finish, $comment,
                $rate, $cover, $begin_date, $end_date);
            }
    
            //Cartoon pages
            elseif($_GET["action"] == "newCartoonPageCount"){
                $id             = htmlspecialchars($_POST["id"]);
                $newPageCount   = htmlspecialchars($_POST["newPageCount"]);
                ToolsFrontend::newCartoonPageCount($id, $newPageCount);
                
            }
    
    
            elseif($_GET["action"] == "statisticsCartoon"){
                ToolsFrontend::statisticsCartoon();
            }
            elseif($_GET["action"] == "updateCartoon"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::updateCartoonInfos($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                    }
                }  
    
            
            elseif($_GET["action"] == "endCartoonReading"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                    $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                    ToolsFrontend::endCartoonReading($id); // calling the tool oneNovelInfos
                }
                else {
                    throw new Exception("Aucun identifiant de billet envoyé !");
                }
            }
            elseif($_GET["action"] == "formDeleteCartoon"){ // calls the form that asks for a password to delete a work
                $id = htmlspecialchars($_POST["id"]); // to avoid inclusion xss
                $cartoon = htmlspecialchars($_POST["cartoon"]); // to avoid inclusion xss
                ToolsFrontend::formDeleteCartoon($id, $cartoon);
            }
            elseif($_GET["action"] == "deleteCartoon"){
                if(isset($_GET["id"]) && $_GET["id"] > 0) { // check if $_get["id"] defined and greater than 0
                $id = htmlspecialchars($_GET["id"]); // to avoid inclusion xss
                $pwdDelete = htmlspecialchars($_POST["pwdDelete"]); // to avoid inclusion xss
                ToolsFrontend::deleteCartoon($id,$pwdDelete);
                }else{
                    throw new Exception ("aucun identifiant de billet envoyé");
                }
            }

            elseif($_GET["action"] == "sessionStop"){
                ToolsFrontend::sessionStop();
            }
        }
        else{
            ToolsFrontend::connexionScreen();
        }
}


catch(Exception $e) // s'il y a une erreur, alors...
{
    echo "Erreur : " . $e->getMessage();
}
    /*
        On charge le fichier controller.php (pour que les fonctions soient en mémoire, quand même !).
    
        On teste le paramètre action pour savoir quel contrôleur appeler. Si le paramètre n'est pas présent, 
        par défaut on charge la liste des derniers billets (ligne 16). C'est comme ça qu'on indique ce que doit 
        afficher la page d'accueil du site.
    
        On teste les différentes valeurs possibles pour notre paramètre action et on redirige vers le bon contrôleur à chaque fois.
    
    */
