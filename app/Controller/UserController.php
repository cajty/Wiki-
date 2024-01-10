<?php

namespace App\Controller;



use App\models\UserModel;

class UserController {
    public function index()
    {
        if (!empty($_SESSION['isAdmin'])) {
            if ($_SESSION['isAdmin'] == false) {
                header("Location: Home.php");
                exit();
            }
            if ($_SESSION['isAdmin'] == true) {
                include_once("../app/views/home.php");
                exit();
            } else {
                include_once("../app/views/login.php");
            }
        }
    }

   

    public function registration()
    {  
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'register') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new UserModel();
            $userModel->setFirstname($firstname);
            $userModel->setLastname($lastname);
            $userModel->setEmail($email);
            $userModel->setPassword($password);
            $userModel->setIsAdmin(0);

            if ($userModel->registerUser()) {
                include_once("../app/views/login.php");
            }
        }else{
            echo"berbrb";
            die();
        }
    }

    public function loginUser()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->loginUser($email, $password);
            var_dump($user);
            die();

            if ($user) {
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['first'] = $user->first_name;
                $_SESSION['last'] = $user->last_name;
                $_SESSION['isAdmin'] = $user->isAdmin;

                if ($_SESSION['isAdmin'] == 0) {
                    include_once("../app/views/dashboard.php");
                } else {
                    include_once("../app/views/home.php");
                }
            }
        } else {
            include_once("../app/views/login.php");
        }
    }
}
