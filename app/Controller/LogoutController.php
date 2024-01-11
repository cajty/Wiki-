<?php

namespace App\Controller;

class LogoutController
{

    
    public function index()
    {
        session_destroy();
        include_once("../app/views/login.php");
    }
}