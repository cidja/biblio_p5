<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
require_once("model/ManagerDb.php"); // Calling the ManagerDb.php class Source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4744941-tirer-parti-de-lheritage#/id/r-4745131

class Model_UserManager extends Model_ManagerDb
{
    //function to check the user and the mdp entered in the header
    public function checkUser($user, $pwd)
    {
        $db = $this->dbConnect(); 
        $check = $db->query("SELECT user,pwd FROM users");
        foreach($check as $data){ // iteration 
            if(($data["user"] == $_POST["user"]) AND (password_verify($_POST["pwd"], $data["pwd"]))){
                    $_SESSION["user"] = $user; // sessions create
                    $_SESSION["pwd"] = $pwd; // sessions create
                    echo $user . "   " . $pwd;
                    //header ("location: index.php?action=home");
                
            }
            else {
                echo "mauvais mot de passe ou identifiant";
            }
        }
    }
    
    public function changePassword($oldMdp,$newMdp, $newMdpRepeat)
    {
        $db= $this->dbConnect(); //fonction qui va vérifier si l'ancien mot de passe est bon 
        $checkMdp = $db->query("SELECT user,mdp FROM users");
        foreach($checkMdp as $data){
            if(password_verify($oldMdp, $data["mdp"])){
                if($newMdp === $newMdpRepeat){
                    $db = $this->dbConnect();
                        $mdp = password_hash($newMdp,PASSWORD_DEFAULT); //source: https://www.php.net/manual/en/function.password-hash.php
                        $change = $db->prepare("UPDATE users SET mdp=?, update_date=NOW() WHERE user='admin'"); 
                        $changeresult = $change->execute(array($mdp));
                        echo "Mot de passe modifié";
                        ?>
                        <a href="index.php?action=backend"> Retour à l'admin</a>
                        <?php
                }
            }else{
                echo "les mots de passe ne correspondent pas";
            }
        }
    }
}