<?php

namespace App\Controller;

use App\controllers\UserController;

class RegisterController
{

    private $user;
    public function __construct()
    {
        $this->user = new UserController();
    }
    public function index()
    {
        include_once("../views/login.php");
    }
    public function login()
    {
        $this->user->loginUsern();
    }
}
