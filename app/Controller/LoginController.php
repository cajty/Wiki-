<?php

namespace App\Controller;

use App\Controller\UserController;
use App\models\WikeModel;

class LoginController
{
   
    private $user;
    public function __construct()
    {
        $this->user = new UserController();
    }
    public function index()
    {
       
        if ($_SESSION['isAdmin'] == 0) {
            $wiki = new WikeModel();
            $r = $wiki->getWikis();
            include_once("../app/views/admindashboard/wiki.php");
        } else{
            include_once("../app/views/login.php");
        }
    }
    public function login()
    {
        $this->user->loginUser();
    }
}
