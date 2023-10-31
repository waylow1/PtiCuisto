<?php

require_once('Manager.php');

class RecipesManager extends Manager{
   public function getAllRecipes(){
      $connexion = $this->con();
      $recipes = $connexion->query('SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)');
      $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }
    
    public function getRecipe($re_id){
      $connexion = $this->con();
      $recipe =  $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID) 
      where RE_ID ='$re_id'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipesOfUser($us_id){
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO 
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      where US_ID='$us_id'");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipesByIngredient($in_title){
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      join UTILIZE using(re_id)
      join INGREDIENT using(in_id)
      where in_title like '%$in_title%'
      ");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getRecipesByTag($ta_title){
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      join COMPOSE using(re_id)
      join TAGS using(ta_id)
      where ta_title like '%$ta_title%'
      ");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }

   public function getLatestRecipe(){
      $connexion = $this->con();
      $recipe = $connexion->query("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE,US_PSEUDO
      from RECIPE 
      join CATEGORY using(CA_ID) 
      join USERS using(US_ID)
      where RE_CREATIONDATE = 
      (select max(RE_CREATIONDATE) from RECIPE)");
      $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }
}
?> 
