<?php

// Include necessary files and dependencies
require_once $_SESSION['dir'] . '/Controller/Controller.php';
require_once $_SESSION['dir'] . '/Modele/UsersManager.php';

// Class definition for UsersController
class UsersController extends Controller
{
    // Constructor for the UsersController class
    public function __construct()
    {
        $this->manager = new UsersManager();
        
        // Retrieve and store the current user's information in the session
        $_SESSION['current_user_info'] = $this->manager->verifInformations($_SESSION['username'], $_SESSION['password']);
    }
    
    // The main method to run the controller
    public function run()
    {
        // Include a view based on the value of $_SESSION['dir']
        include $_SESSION['dir'];
    }
}

?>
