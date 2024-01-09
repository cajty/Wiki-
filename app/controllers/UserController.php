<?php

namespace App\controllers;


use App\models\UserModel;

class UserController extends UserModel {
    public function index()
    {
        if (!empty($_SESSION['isAdmin'])) {
            if ($_SESSION['isAdmin'] == false) {
                header("Location: Home.php");
                exit();
            }
            if ($_SESSION['isAdmin'] == true) {
                header("Location: dashboard.php");
                exit();
        } else {
            header("Location: login.php");
        }
    }  
    }
    public function logout()
    {
        session_destroy();
        $this->index();
    }

    public function registration()
    {
        echo "cfghjkl";die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'regester') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];


            $this->setFirstname($firstname);
            $this->setLastname($lastname);
            $this->setEmail($email);
            $this->setPassword($password);
            $this->getIsAdmin();
            if ($this->registerUser()) {
                include_once("login.php");
            }
        }
    }

    public function loginUsern()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->loginUser($email, $password);
            var_dump($user);
            if ($user) {
                $_SESSION['email'] = $user->email;
                $_SESSION['first'] = $user->first_name;
                $_SESSION['last'] = $user->last_name;
                $_SESSION['isAdmin'] = $user->isAdmin;
                var_dump($user);
                
                if ($_SESSION['isAdmin'] === '2') {
                    include_once("dashboard.php");
                }else{
                    include_once("Home.php");
                    
                }
            }
        }else {
            header("Location: login.php");
        }
        
    }
}


