<?php

require_once $_SESSION['dir'] . '/Modele/Manager.php';

class AdminManager extends Manager
{
    public function getAllUsers()
    {
        $db = $this->con();
        $users = $db->prepare('SELECT * from USERS');
        $users->execute();
        $res = $users->fetchall();
        return $res;
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

    
    
    public function logOut(){
        session_destroy($_SESSION['username'],$_SESSION['password'],$_SESSION['type']);
    }


    public function deleteUser($us_id) {
        $connexion = $this->con();
        $req = $connexion->prepare('UPDATE USERS SET USS_JD = 2 WHERE US_ID like :id ');
        $req->bindParam('id', $us_id);
        $req->execute();
    }
    public function getRecipesToAccept(){
        $connexion = $this->con();
        $recipes = $connexion->prepare('SELECT RE_ID,RES_ID,US_PSEUDO,CA_TITLE,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_REGDATE 
        from RECIPE 
        join USERS using(US_ID) 
        join CATEGORY using(ca_id)
        where RES_ID = 1');
        $recipes->execute();
        $res = $recipes->fetchAll();
        return $res;
    }

    public function acceptRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RES_ID = 2 where RE_ID like :re_id' );
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
    }

    public function denyRecipe($re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('DELETE FROM RECIPE where RE_ID like :re_id');
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
    }

    public function getUser($us_id){
        $connexion = $this->con();
        $user = $connexion->prepare('SELECT * FROM USERS  WHERE US_ID like :us_id');
        $user->bindParam('us_id',$us_id);
        $user->execute();
        $res = $user->fetchAll();
        return $res;
    }

    public function userModifyUstId($ust_id,$us_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET UST_ID = :ust_id where US_ID like :us_id' );
        $recipe->bindParam('ust_id',$ust_id);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    public function userModifyUssJd($uss_jd,$us_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET USS_JD = :uss_jd where US_ID like :us_id' );
        $recipe->bindParam('uss_jd',$uss_jd);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    public function userModifyUsPseudo($us_pseudo,$us_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET US_PSEUDO = :us_pseudo where US_ID like :us_id' );
        $recipe->bindParam('us_pseudo',$us_pseudo);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    public function userModifyUsMail($us_mail,$us_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET US_MAIL = :us_mail where US_ID like :us_id' );
        $recipe->bindParam('us_mail',$us_mail);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    public function userModifyUsFirstName($us_firstname,$us_id){        
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET US_FIRSTNAME = :us_firstname where US_ID like :us_id' );
        $recipe->bindParam('us_firstname',$us_firstname);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    public function userModifyUsLastName($us_lastname,$us_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE USERS SET US_LASTNAME = :us_lastname where US_ID like :us_id' );
        $recipe->bindParam('us_lastname',$us_lastname);
        $recipe->bindParam('us_id',$us_id);
        $recipe->execute();
    }
    
   public function getAllRecipes()
   {
      $connexion = $this->con();
      $recipes = $connexion->query('SELECT RE_ID, RES_ID, RE_REGDATE,US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      where RES_ID=2');
      $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipe($re_id){
    $connexion = $this->con();
    $recipe = $connexion->prepare('SELECT RE_ID,RES_ID,RE_TITLE,CA_ID,CA_TITLE,RE_SUMMARY,RE_CONTENT FROM RECIPE
    JOIN CATEGORY USING (CA_ID)
    WHERE RE_ID like :re_id');
    $recipe->bindParam('re_id',$re_id);
    $recipe->execute();
    $recipeID = $recipe->fetchAll();
    return $recipeID;

    }

    public function recipeModifyReTitle($re_title,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare("UPDATE RECIPE SET RE_TITLE = :re_title where re_id like :re_id" );
        $recipe->bindParam('re_title',$re_title);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute(); 
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyCaTitle($ca_title,$re_id){
        
        $connexion = $this->con();
        $category = $connexion->prepare('SELECT CA_ID FROM CATEGORY WHERE CA_TITLE like :ca_title');
        $category->bindParam('ca_title',$ca_title);
        $category->execute();
        $ca_id = $category->fetchAll();
        $recipe = $connexion->prepare('UPDATE RECIPE SET CA_ID = :ca_id  where re_id like :re_id' );
        $recipe->bindParam('ca_title',$ca_id[0]['CA_ID']);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyReSummary($re_summary,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_SUMMARY = :re_summary where re_id like :re_id' );
        $recipe->bindParam('re_summary',$re_summary);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
    public function recipeModifyReContent($re_content,$re_id){
        $connexion = $this->con();
        $recipe = $connexion->prepare('UPDATE RECIPE SET RE_CONTENT = :re_content  where re_id like :re_id' );
        $recipe->bindParam('re_content',$re_content);
        $recipe->bindParam('re_id',$re_id);
        $recipe->execute();
        $recipe2 = $connexion->prepare('UPDATE RECIPE SET RES_ID = 1  where re_id like :re_id');
        $recipe2->bindParam('re_id',$re_id);
        $recipe2->execute();
    }
}

?>