<?php

namespace App\Controller;



use App\models\UserModel;
use App\models\WikeModel;

class UserController {
 
  
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
        }
    }
    

    public function loginUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->loginUser($email, $password);
            
           
            if ($user) {
                $_SESSION['id'] = $user->id;
            
                $_SESSION['email'] = $user->email;
                $_SESSION['first'] = $user->first_name;
                $_SESSION['last'] = $user->last_name;
                $_SESSION['isAdmin'] = $user->isAdmin;

                if ($_SESSION['isAdmin'] == 0) {
                    $wiki = new WikeModel();
                    $r = $wiki->getWikis();
                    include_once("../app/views/admindashboard/wiki.php");
                } else {
                   // include_once("../app/views/dashboard.php");
                }
            }
        } else {
            include_once("../app/views/home.php");
        }
    }
}
