<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
namespace cidja\userManager;
use cidja\managerDb\Model_ManagerDb;

require_once("model/ManagerDb.php"); // Calling the ManagerDb.php class Source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4744941-tirer-parti-de-lheritage#/id/r-4745131

class Model_UserManager extends Model_ManagerDb
{
    //function to check the user and the mdp entered in the header
    public function checkSuperUser($user, $pwd) 
    {
        $result = false; //Create boolean to check if member exist in table
        $db = $this->dbConnect(); 
        $check = $db->query("SELECT user,pwd FROM superuser");
        foreach($check as $data){ // iteration 
            if(($data["user"] == $user) AND (password_verify($pwd, $data["pwd"]))){
                    $_SESSION["user"] = $user; // sessions create
                    $result = true;
            }
        }
        if($result == true){
            header ("location: index.php?action=home");
        }
            else {
                header("location: index.php?action=wrongId");
            }
    }
    
    public function changePassword($oldMdp,$newMdp, $newMdpRepeat)
    {
        $db= $this->dbConnect(); //fonction qui va vérifier si l'ancien mot de passe est bon 
        $checkMdp = $db->query("SELECT user,pwd FROM superuser");
        foreach($checkMdp as $data){
            if(password_verify($oldMdp, $data["pwd"])){
                if($newMdp === $newMdpRepeat){
                    $db = $this->dbConnect();
                        $mdp = password_hash($newMdp,PASSWORD_DEFAULT); //source: https://www.php.net/manual/en/function.password-hash.php
                        $change = $db->prepare("UPDATE superuser SET pwd=?, update_date=NOW() WHERE user='admin'"); 
                        $changeresult = $change->execute(array($mdp));
                        echo "Mot de passe modifié";
                        session_unset();
                        session_destroy();
                        ?>
                        <a href="connexionView.php"> Merci de vous reconnecter avec le nouveau mot de passe</a>
                        <?php
                }else{
                    echo "les mots de passe ne correspondent pas";
                }
            }
        }
    }

    public function createNewUser($user, $pwd1)
    {
        $passwordHash = password_hash($pwd1, PASSWORD_DEFAULT);

        $db= $this->dbConnect();
        $createUser = $db->prepare("INSERT INTO users(user, pwd, inscription_date, update_date)
                                    VALUES(:user, :pwd, now(), now())");
        $createUser->execute(array(
            "user"      => $user,
            "pwd"       => $passwordHash
        ));
    }

    public function checkMember($member, $pwd)
    {
        $result = false; //Create boolean to check if member exist in table
        $db = $this->dbConnect(); 
        $check = $db->query("SELECT user,pwd FROM users");
        foreach($check as $data){ // iteration 
            if(($data["user"] == $member) AND (password_verify($pwd, $data["pwd"]))){
                    $_SESSION["member"] = $member; // sessions create
                    $result = true;    
            } 
        }
        if($result == true){
            header ("location: index.php?action=home");
        } else{
            ?> <h3>mauvais mot de passe ou identifiant</h3>
            <div><a href="index.php?action=formAccessUser">Réessayer</a></div>
            <?php
        }
    }
}