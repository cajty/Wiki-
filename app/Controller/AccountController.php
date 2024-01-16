<?php

namespace App\Controller;



use App\models\UserModel;

class AccountController
{

    private $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        include_once("../app/views/user/header.php");
        include_once("../app/views/user/account.php");
        include_once("../app/views/footer.php");
    }

    public function registration()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'register') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->user->setFirstname($firstname);
            $this->user->setLastname($lastname);
            $this->user->setEmail($email);
            $this->user->setPassword($password);
            $this->user->setIsAdmin(0);
            if ($this->user->registerUser()) {
                include_once("../app/views/user/header.php");
                include_once("../app/views/user/login.php");
                include_once("../app/views/footer.php");

            }
        }
    }
}
