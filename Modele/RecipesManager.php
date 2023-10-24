<?php

require_once 'Manager.php';

class RecipesManager extends Manager{
   public function getAllRecipes(){
      $connexion = $this->con();
      $recipes = $connexion->prepare('SELECT RE_ID,RES_ID,US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_CATEGORY,RE_REGDATE,RE_IMAGE,RE_CREATIONDATE,RE_MODIFDATE from RECIPE order by RE_ID');
      $recipes->execute();
      $res = $recipes->fetchAll();
      return $res;
   }
    
    public function getRecipe($re_id){
      $connexion = $this->con();
      $recipe =  $connexion->prepare("SELECT RE_ID,RES_ID,US_ID,CA_ID,RE_TITLE,RE_CONTENT,RE_SUMMARY,RE_CATEGORY,RE_REGDATE,RE_IMAGE,RE_CREATIONDATE,RE_MODIFDATE from RECIPE where RE_ID ='$re_id'");
      return $recipe;
   }
}
?> 
