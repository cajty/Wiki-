<?php

namespace App\Controller;

use App\Controller\UserController;


class AccountController
{

    private $user;
    public function __construct()
    {
        $this->user = new UserController();
    }
    public function index()
    {
        include_once("../app/views/account.php");
    }
    public function register()
    {
        $this->user->registration();
    }
}
