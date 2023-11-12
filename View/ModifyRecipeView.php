<?php
ob_start();
?>
<br><br><br><br><br><br><br>

<br>
<div class="container text-center">
<h1> Modifier la recette : </h1>
</div>

<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <th scope="col"> N° Recette </th>
            <th scope="col"> Titre </th>
            <th scope="col"> Catégorie</th>
            <th scope="col"> Résumé </th>
            <th scope="col"> Contenu </th>
       

        </tr> 
</thead>
<form method="post" action=<?php $_SESSION['dir'] . '/Controller/ModifyRecipeController.php'?>>
    <tbody>
               
        <tr>';
        <div class="input-group mb-3">
        <div class="input-group-prepend">
       <div>
        <?php  
        for($i = 0; $i<(count($_SESSION['radioRecipes'][0]));$i++){                     
            switch ($i){
                case 0: 
                    echo '<td> <input class="form-control" type="number"  placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" disabled >  </td> ' ;   
                    echo $_SESSION['radioRecipes'][0][$i] . '<br>';  
                    break;
                case 2: 
                    echo '<td> <input class="form-control" type="text" name="modified_RE_TITLE" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '" > </td> ' ; 
                    echo $_SESSION['radioRecipes'][0][$i] . '<br>';   
                    break;
                case 4: 
                    echo '<td> <input class="form-control" type="text" name="modified_CA_TITLE" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '"></td> ' ;  
                    echo $_SESSION['radioRecipes'][0][$i] . '<br>';  
                    break;
                case 5: 
                    echo '<td> <input class="form-control" type="text" name="modified_RE_SUMMARY" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '"> </td> ' ;  
                    echo $_SESSION['radioRecipes'][0][$i] . '<br>';  
                    break;
                case 6: 
                    echo '<td> <input class="form-control" type="textarea" name="modified_RE_CONTENT" placeholder="' . $_SESSION['radioRecipes'][0][$i] . '" value="' . $_SESSION['radioRecipes'][0][$i] . '">  </td> ' ;  
                    echo $_SESSION['radioRecipes'][0][$i] . '<br>';  
                    break;
            }
        }?>

        </div>
        </div>                
        </tr>
         
        
    </tbody>  
    </table>
    <div class="container text-center">
        <button type=submit class="btn btn-success btn-block mb-4 " name="validateRecipeModif" value="Valider la modification">Valider</button>
        <button type=submit class="btn btn-danger btn-block mb-4 " name="annulateRecipeModif" value="Annuler la modification">Annuler</button>
    </div>
    </form>


<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>