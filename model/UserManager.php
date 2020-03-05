<?php
//tous les appels ce font directement dans le index.php
//source: https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4735671-passage-du-modele-en-objet#/id/r-4735685
namespace cidja\userManager;
use cidja\managerDb\Model_ManagerDb;


require_once(dirname(__FILE__)."/ManagerDb.php"); //calling the file for the connection to the database

class Model_UserManager extends Model_ManagerDb
{
    public function createNewUser($user, $pwd1)
    {
        $passwordHash = password_hash($pwd1, PASSWORD_DEFAULT);

        $db= $this->dbConnect();
        $createUser = $db->prepare("INSERT INTO users(user, pwd, inscription_date, update_date)
                                    VALUES(:user, :pwd, now(), now())");
        $confirm = $createUser->execute(array(
            "user"      => $user,
            "pwd"       => $passwordHash
        ));
        if($confirm == false){
            ?><div>Utilisateur déja pris, merci d'en choisir un autre : <a href="index.php?action=inscription">Cliquez ici pour réessayer avec un autre nom d'utilisateur</a> </div> <?php
        } else { ?>
        <div>validation de la création du nouvel utilisateur, <a href="index.php?action=connexionview">Cliquez ici pour se connecter</a></div>
        <?php
        };
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
           header("location: index.php?action=wrongId");
        }
    }

    public function updateDatePassword($user){
        $db= $this->dbConnect();
        $updateDatePassword = $db->prepare("SELECT user, inscription_date, update_date FROM users WHERE user =?");
        $updateDatePassword->execute(array($user));
        return $updateDatePassword;
    }

    public function changePassword($user, $oldPwd, $newPwd, $newPwdRepeat)
    {
        $db= $this->dbConnect(); //fonction qui va vérifier si l'ancien mot de passe est bon 
        $checkMdp = $db->prepare("SELECT user,pwd FROM users WHERE user=?");
        $checkMdp->execute(array($user));
        foreach($checkMdp as $data){
            if(password_verify($oldPwd, $data["pwd"])){
                if($newPwd === $newPwdRepeat){
                    $db = $this->dbConnect();
                        $pwd = password_hash($newPwd,PASSWORD_DEFAULT); //source: https://www.php.net/manual/en/function.password-hash.php
                        $change = $db->prepare("UPDATE users SET pwd=:pwd, update_date=NOW() WHERE user=:user"); 
                        $changeresult = $change->execute(array(
                            "pwd"       => $pwd,
                            "user"      => $user
                        ));
                        echo "Mot de passe modifié";
                        session_unset();
                        session_destroy();
                        ?>
                        <a href="connexionView.php"> Merci de vous reconnecter avec le nouveau mot de passe</a>
                        <?php
                }
            } else {
                ?>
                <h3>le mot de passe actuel n'est pas le bon</h3>
            <div><a href="index.php?action=formNewPassword">Réessayer</a></div>
            <?php
            }
        }
    }

    public function listMembers()
    {
        $db= $this->dbConnect();
        $listMembers = $db->query("SELECT id,user,DATE_FORMAT(inscription_date, '%d/%m/%Y à %Hh%i') AS inscription_date_fr,
        DATE_FORMAT(update_date, '%d/%m/%Y à %Hh%i') AS update_date_fr FROM users");
        return $listMembers;
        var_dump($listMembers);
    }


    public function memberExist($member)
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT * FROM users");
        foreach($req as $result){
            echo $result["user"];
            var_dump($result);
        }
    }

}