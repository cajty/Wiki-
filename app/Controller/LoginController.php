<?php

namespace App\Controller;


use App\models\WikeModel;
use App\models\CategorieModel;
use App\models\TagModel;
use App\models\UserModel;



class LoginController
{

    private $user;
    private $wiki;
    private $categorie;
    private $tag;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->wiki = new WikeModel();
        $this->categorie = new CategorieModel();;
        $this->tag = new TagModel();
    }
    public function index()
    {

        if (isset($_SESSION['isAdmin'])) {

            if ($_SESSION['isAdmin'] == 0) {

                $w = $this->wiki->getWikis();
                include_once("../app/views/admindashboard/header.php");
                include_once("../app/views/admindashboard/side.php");
                include_once("../app/views/admindashboard/wiki.php");
                include_once("../app/views/footer.php");
            }
            if ($_SESSION['isAdmin'] == 1) {
                $r =  $this->categorie->getCategories();
                $t = $this->tag->getTags();
                $w = $this->wiki->getWikisAUthor();
                include_once("../app/views/admindashboard/header.php");
                include_once("../app/views/authr/creatwiki.php");
                include_once("../app/views/admindashboard/wiki.php");
                include_once("../app/views/footer.php");
            }
        } else {
            include_once("../app/views/user/header.php");
            include_once("../app/views/user/login.php");
            include_once("../app/views/footer.php");
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'login') {
            $email = $_POST['email'];
            $password = $_POST['password'];


            $user =  $this->user->loginUser($email, $password);


            if ($user) {
                $_SESSION['id'] = $user->id;

                $_SESSION['email'] = $user->email;
                $_SESSION['first'] = $user->first_name;
                $_SESSION['last'] = $user->last_name;
                $_SESSION['isAdmin'] = $user->isAdmin;

                if ($_SESSION['isAdmin'] == 0) {

                    $w = $this->wiki->getWikis();
                    include_once("../app/views/admindashboard/header.php");
                    include_once("../app/views/admindashboard/side.php");
                    include_once("../app/views/admindashboard/wiki.php");
                    include_once("../app/views/footer.php");
                }
                if ($_SESSION['isAdmin'] == 1) {
                    $r =  $this->categorie->getCategories();
                    $t = $this->tag->getTags();
                    $w = $this->wiki->getWikisAUthor();
                    include_once("../app/views/admindashboard/header.php");
                    include_once("../app/views/authr/creatwiki.php");
                    include_once("../app/views/admindashboard/wiki.php");
                    include_once("../app/views/footer.php");
                }
            }
        } else {
            $r =  $this->wiki->getWikisUser();
            include_once("../app/views/admindashboard/header.php");
        }
    }
}
