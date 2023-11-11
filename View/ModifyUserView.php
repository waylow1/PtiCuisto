<?php
ob_start();
?>
<br><br><br><br><br><br><br>

<br>
<div class="container text-center">
<h1> Modifier l'utilisateur : </h1>
</div>

<table class="table">
    <thead class="thead-dark"> 
        <tr>
            <th scope="col"> N° Utilisateur </th>
            <th scope="col"> Type utilisteur </th>
            <th scope="col"> Statut utilisateur </th>
            <th scope="col"> Pseudo </th>
            <th scope="col"> Mail </th>
            <th scope="col"> Prénom </th>
            <th scope="col"> Nom </th>
       

        </tr> 
    </thead>
    <form method="post" action=<?php $_SESSION['dir'] . '/Controller/ModifyUserController.php'?>>

    <tbody>
        <?php 
        
        echo '<tr>';
        echo '<div class="input-group mb-3">';
        echo '<div class="input-group-prepend">';
        echo '<div >';
        echo '<form method="post" action="' . $_SESSION['dir'] . '"/Controller/ModifyUserController.php">';
        for($i = 0; $i<(count($_SESSION['radioUsers'][0])/2)-2;$i++){
            switch ($i){
                case 0: 
                    echo '<td> <input class="form-control" type="number"  placeholder="' . $_SESSION['radioUsers'][0][$i] . '" disabled >  </td> ' ;   
                    break;
                case 1: 
                    echo '<td> <input class="form-control" type="number" name="modified_UST_ID" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '" > </td> ' ;  
                    break;
                case 2: 
                    echo '<td> <input class="form-control" type="number" name="modified_USS_JD" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '"></td> ' ;  
                    break;
                case 3: 
                    echo '<td> <input class="form-control" type="text" name="modified_US_PSEUDO" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '"> </td> ' ;  
                    break;
                case 4: 
                    echo '<td> <input class="form-control" type="email" name="modified_US_MAIL" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '">  </td> ' ;  
                    break;
                case 5: 
                    echo '<td> <input  class="form-control" type="text" name="modified_US_FIRSTNAME" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '">  </td> ' ;  
                    break;
                case 6: 
                    echo '<td> <input  class="form-control" type="text" name="modified_US_LASTNAME" placeholder="' . $_SESSION['radioUsers'][0][$i] . '" value="' . $_SESSION['radioUsers'][0][$i] . '">  </td> ' ;  
                    break;
                           
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';                  
        echo '</tr>';
        ?> 
        
    </tbody>  
    </table>
    <div class="container text-center">
        <button type=submit class="btn btn-success btn-block mb-4 " name='validateUserModif' value="Valider la modification">Valider</button>
        <button type=submit class="btn btn-danger btn-block mb-4 " name='annulateUserModif' value="Annuler la modification">Annuler</button>
    </div>
    </form>


<?php
$content = ob_get_clean();
include $_SESSION['dir'] . '/View/Layout.php';
?>