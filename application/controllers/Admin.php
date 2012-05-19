<?php

class Admin extends CI_Controller {
    
    //This is the Admin Controller
    
    function __construct() {
        parent::__construct();
        //check if user is logged on or admin
        
    }

    function index() {
        echo "Admin Home";
    }

    
    
}

?>
