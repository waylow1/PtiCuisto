<?php

require_once($_SESSION['dir'] . '/Modele/Manager.php');

class RecipesManager extends Manager
{
    // Function to retrieve all recipes with status RES_ID=2
    public function getAllRecipes()
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve all recipes with specific information about the author and category
        $recipes = $connexion->query('SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) where RES_ID=2');
        // Fetch and return the results as an associative array
        $res = $recipes->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve details of a specific recipe by its ID
    public function getRecipe($re_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve specific information about a recipe by its ID
        $recipe =  $connexion->query("SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) where RE_ID ='$re_id'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve recipes associated with a specific user
    public function getRecipesOfUser($us_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve recipes associated with a specific user, along with category and author information
        $recipe = $connexion->query("SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) where US_ID='$us_id'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve recipes containing a specific ingredient
    public function getRecipesByIngredient($in_title)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve recipes containing a specific ingredient, along with category and author information
        $recipe = $connexion->query("SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO,IN_TITLE from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) join UTILIZE using(re_id) join INGREDIENT using(in_id) where in_title like '%$in_title%'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve recipes with a specific tag
    public function getRecipesByTag($ta_title)
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve recipes with a specific tag, along with category and author information
        $recipe = $connexion->query("SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) join COMPOSE using(re_id) join TAGS using(ta_id) where ta_title like '%$ta_title%'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to retrieve the latest recipes
    public function getLatestRecipes()
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve the latest recipes, along with category and author information
        $recipe = $connexion->query('SELECT RE_ID, US_ID, CA_ID, RE_TITLE, RE_CONTENT, RE_SUMMARY, RE_IMAGE, CA_TITLE, US_PSEUDO from RECIPE join CATEGORY using(CA_ID) join USERS using(US_ID) where RES_ID=2 order by RE_CREATIONDATE LIMIT 6');
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to delete a recipe by its ID
    public function deleteRecipe($re_id)
    {
        $connexion = $this->con();
        // Prepare a SQL query to delete a recipe by its ID
        $recipe = $connexion->query("DELETE from RECIPE where RE_ID = '$re_id'");
        // Fetch and return the results as an associative array
        $res = $recipe->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to create a new recipe and return its ID
    public function createRecipe($fileName)
    {
        $connexion = $this->con();
        // Get the maximum recipe ID and increment it
        $recipe = $connexion->query("SELECT max(RE_ID)+1 as max from RECIPE");
        $recipeID = $recipe->fetchAll(PDO::FETCH_ASSOC);

        // Get the user ID based on the current user's username
        $user = $connexion->prepare('SELECT US_ID from USERS where US_PSEUDO like :name');
        $user->bindParam('name', $_SESSION['username']);
        $user->execute();
        $userID = $user->fetchAll();

        // Get the category ID based on the specified recipe type
        $category = $connexion->prepare('SELECT CA_ID from CATEGORY where CA_TITLE like :type');
        $category->bindParam('type', $_POST['recipeType']);
        $category->execute();
        $categoryID = $category->fetchAll();

        // Insert the new recipe into the database
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
        // Return the newly created recipe's ID
        return (int)$recipeID[0]['max'];
    }

    // Function to check if an ingredient exists
    public function getIngredient($ingredientName)
    {
        $connexion = $this->con();
        // Prepare a SQL query to check if an ingredient with the given title exists
        $getIg = $connexion->prepare('SELECT count(*) FROM INGREDIENT WHERE IN_TITLE LIKE :title');
        $ingredientName = '%' . $ingredientName . '%';
        $getIg->bindParam('title', $ingredientName);
        $getIg->execute();
        // Return the count of matching ingredients
        $count = $getIg->fetchColumn();
        return $count;
    }

    // Function to retrieve all ingredients
    public function getAllIngredients()
    {
        $connexion = $this->con();
        // Prepare a SQL query to retrieve all ingredients
        $getAllIg = $connexion->prepare('Select * from INGREDIENT');
        $getAllIg->execute();
        // Fetch and return the results as an associative array
        $res = $getAllIg->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Function to insert a new ingredient
    public function insertIngredient($ingredientName)
    {
        $connexion = $this->con();
        // Prepare a SQL query to insert a new ingredient with a unique ID
        $getIg = $connexion->prepare('INSERT INTO INGREDIENT VALUES(0,:title,:title)');
        $getIg->bindParam('title', $ingredientName);
        $getIg->execute();
    }

    // Function to insert an ingredient in a recipe
    public function insertIngredientInRecipe($ingredientName, $recipeID)
    {
        $connexion = $this->con();

      $ingredientIdQuery = $connexion->prepare("SELECT IN_ID FROM INGREDIENT WHERE IN_TITLE = :title");
      $ingredientIdQuery->bindParam(':title', $ingredientName);
      $ingredientIdQuery->execute();
  
      
      $igID = $ingredientIdQuery->fetchColumn();
  
          $insertUtilize = $connexion->prepare('INSERT INTO UTILIZE (RE_ID, IN_ID) VALUES (:recipeID, :igID)');
          $insertUtilize->bindParam(':recipeID', $recipeID);
          $insertUtilize->bindParam(':igID', $igID);
          $insertUtilize->execute();
   }
   public function getRecipeByCategorie($Ca_id){
      $connexion = $this->con();
      $getCa = $connexion->prepare('SELECT * FROM RECIPE WHERE CA_ID = ?');
      $getCa->bindParam(1,$Ca_id);
      $getCa->execute();
      $ca = $getCa->fetchall();
   }

   public function getIngredientsParRecetteId($re_id) {
      $connexion = $this->con();
      $req =$connexion->prepare('SELECT IN_TITLE FROM RECIPE JOIN UTILIZE USING (RE_ID) JOIN INGREDIENT USING (IN_ID) WHERE RE_ID = ?');
      $req->bindParam(1, $re_id);
      $req->execute();
      $res = $req->fetchAll();
      return $res;
   }
}
?>
