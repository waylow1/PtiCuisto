<?php

require_once 'Manager.php';

class RecipesManager extends Manager{
   public function getAllRecipes(){
      $connexion = $this->con();
      $recipes = $connexion->query('SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGE,CA_TITLE from RECIPE join CATEGORY using(CA_ID)');
      $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
      return $res;
   }
    
    public function getRecipe($re_id){
      $connexion = $this->con();
      $recipe =  $connexion->prepare("SELECT RE_ID, US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_IMAGEE from RECIPE where RE_ID ='$re_id'");
      return $recipe;
   }
}
?> 
