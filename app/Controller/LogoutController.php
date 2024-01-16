<?php

namespace App\Controller;

class LogoutController
{

    
    public function index()
    {
        session_destroy();
        
        include_once("../app/views/user/header.php");
        include_once("../app/views/user/login.php");
        include_once("../app/views/footer.php");
    }
}