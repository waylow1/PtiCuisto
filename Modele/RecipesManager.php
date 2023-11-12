<?php

require_once($_SESSION['dir'] . '/Modele/Manager.php');

class RecipesManager extends Manager
{
   public function getAllRecipes()
   {
      $connexion = $this->con();
      $recipes = $connexion->query('SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)');
      $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipe($re_id)
   {
      $connexion = $this->con();
      $recipe =  $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID) 
      where RE_ID ='$re_id'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
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

   public function getRecipesByIngredient($in_title)
   {
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      join UTILIZE using(re_id)
      join INGREDIENT using(in_id)
      where in_title like '%$in_title%'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipesByTag($ta_title)
   {
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      join COMPOSE using(re_id)
      join TAGS using(ta_id)
      where ta_title like '%$ta_title%'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getLatestRecipes()
   {
      $connexion = $this->con();
      $recipe = $connexion->query('SELECT RE_ID,
      US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) order by RE_CREATIONDATE LIMIT 6 ');
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function deleteRecipe($re_id)
   {
      $connexion = $this->con();
      $recipe = $connexion->query("DELETE from RECIPE where RE_ID = '$re_id'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function createRecipe($fileName)
   {
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT max(RE_ID)+1 as max from RECIPE");
      $recipeID = $recipe->fetchAll(PDO::FETCH_ASSOC);

      $user = $connexion->prepare('SELECT US_ID from USERS where US_PSEUDO like :name');
      $user->bindParam('name', $_SESSION['username']);
      $user->execute();
      $userID = $user->fetchall();

      $category = $connexion->prepare('SELECT CA_ID from CATEGORY where CA_TITLE like :type');
      $category->bindParam('type', $_POST['recipeType']);
      $category->execute();
      $categoryID = $category->fetchall();

      $insert = $connexion->prepare('INSERT INTO RECIPE(re_id,res_id,us_id,ca_id,re_title,re_content,re_summary,RE_REGDATE,RE_IMAGE,RE_CREATIONDATE,RE_MODIFDATE) VALUES(:re_id,:res_id,:us_id,:ca_id,:re_title,:re_content,:re_summary,now(),:re_image,now(),now())');
      $insert->execute(array(
         're_id' => (int)$recipeID[0]['max'],
         'res_id' => 1,
         'us_id' => (int)$userID[0]['US_ID'],
         'ca_id' => (int)$categoryID[0]['CA_ID'],
         're_title' => $_POST['recipeName'],
         're_content' => $_POST['recipeContent'],
         're_summary' => $_POST['recipeDescription'],
         're_image' => $fileName
      ));
   }

   public function getIngredient($ingredientName){
      $connexion = $this->con();
      $getIg = $connexion->prepare('SELECT count(*) FROM INGREDIENT WHERE IN_TITLE LIKE :title');
      $ingredientName = '%' . $ingredientName . '%';
      $getIg->bindParam('title',$ingredientName);
      $getIg->execute();
      $res = $getIg->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function insertIngredient($ingredientName){
      $connexion = $this->con();
      $getIg = $connexion->prepare('INSERT INTO INGREDIENT VALUES((select max(in_id)+1),:title,:title)');
      $getIg->bindParam('title',$ingredientName);
      $getIg->execute();
   }

   public function getRecipeByCategorie($Ca_id){
      $connexion = $this->con();
      $getCa = $connexion->prepare('SELECT * FROM RECIPE WHERE CA_ID = ?');
      $getCa->bindParam(1,$Ca_id);
      $getCa->execute();
      $ca = $getCa->fetchall();
   }
}
