<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class UsersManager extends Manager
{
    public function verifInformations($pseudo, $password)
    {
        $db = $this->con();
        $reponse = $db->prepare('SELECT * from USERS where US_PSEUDO = ? and US_PASSWORD = ? and USS_JD <> 2');
        $reponse->bindParam(1, $pseudo);
        $reponse->bindParam(2, $password);
        $reponse->execute();
        $res = $reponse->fetchall();
        if (isset($res)) {
            return $res;
        }
    }
    public function getRecipesOfUser($us_id)
    {
        $connexion = $this->con();
        $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
        from RECIPE 
        join CATEGORY using(CA_ID) 
        join USERS using(US_ID)
        where US_ID='$us_id'");
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } 

    public function selectPass($pseudo){
        $db = $this->con();
        $reponse = $db->prepare('SELECT US_PASSWORD FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    public function selectPseudo($pseudo){
        $db = $this->con();
        $reponse = $db->prepare('SELECT US_PSEUDO FROM USERS WHERE US_PSEUDO = ?');
        $reponse->bindParam(1, $pseudo);
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    public function insertUser($max, $pseudo, $password, $mail, $firstname, $lastname){
        $db = $this->con();    
        $reponse = $db->prepare('INSERT INTO `USERS`(`US_ID`, `UST_ID`, `USS_JD`, `US_PSEUDO`, `US_MAIL`, `US_FIRSTNAME`, `US_LASTNAME`, `US_REGDATE`, `US_PASSWORD`) VALUES (:max, 2, 1, :pseudo, :mail, :firstname, :lastname, NOW(), :password);');
        $reponse->bindParam(':max', $max);
        $reponse->bindParam(':pseudo', $pseudo);
        $reponse->bindParam(':mail', $mail);
        $reponse->bindParam(':firstname', $firstname);
        $reponse->bindParam(':lastname', $lastname);
        $reponse->bindParam(':password', $password);

        $reponse->execute();
    }

    public function selectMaxID(){
        $db = $this->con();
        $reponse = $db->prepare('select max(US_ID) as max from USERS');
        $reponse->execute();
        $res = $reponse->fetchall();
        return $res;
    }

    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }

    public function getCurrentUserID()
    {
        $connexion = $this->con();
        $user = $connexion->prepare('SELECT US_ID from USERS where US_PSEUDO like :name');
        $user->bindParam('name', $_POST['userName']);
        $user->execute();
        $userID = $user->fetchall();
        return $userID;
    }

    public function deleteUser() {
        $connexion = $this->con();
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_PSEUDO like :pseudo AND US_PASSWORD like :password');
        $req->bindParam('pseudo', $_SESSION['username']);
        $req->bindParam('password', $_SESSION['password']);
        $req->execute();
    }
    public function getRecipesToAccept(){
        $db = $this->con();
        $users = $db->prepare('SELECT RE_ID,RES_ID,US_PSEUDO,CA_TITLE,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_REGDATE 
        from RECIPE 
        join USERS using(US_ID) 
        join CATEGORY using(ca_id)');
        $users->execute();
        $res = $users->fetchall();
        return $res;
    }
}
