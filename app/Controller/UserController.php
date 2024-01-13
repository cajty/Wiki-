<?php

namespace App\Controller;



use App\models\UserModel;
use App\models\WikeModel;

class UserController {
 
  
    
    

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
