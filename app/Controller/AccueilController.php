<?php

namespace App\Controller;

use App\models\WikeModel;

class AccueilController
{
    private $wiki;

    public function __construct()
    {
        $this->wiki = new WikeModel();
    }

    public function index()
    {


        $r = $this->wiki->getWikisUser();
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
            include_once("../app/views/authr/header.php");
        } else if (isset($_SESSION['isAdmin'])) {
            include_once("../app/views/admindashboard/header.php");
        } else {
            include_once("../app/views/user/header.php");
        }


        include_once("../app/views/user/accueil.php");
        include_once("../app/views/footer.php");
    }
    public function searchtwo()
    {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];


            $searchResults = $this->wiki->searchByName($searchTerm);
            if ($searchResults) {
                include_once '../app/views/user/includesAjax/wiki.php';
            }
        }
    }

}
