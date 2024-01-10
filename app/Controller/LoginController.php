<?php

namespace App\Controller;

use App\Controller\UserController;


class LoginController
{

    private $user;
    public function __construct()
    {
        $this->user = new UserController();
    }
    public function index()
    {
        include_once("../app/views/login.php");
    }
    public function login()
    {
        $this->user->loginUser();
    }
}
