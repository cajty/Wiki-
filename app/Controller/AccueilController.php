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

    public function searchByCategory()
    {
        if (isset($_GET['category'])) {
            $categoryId = $_GET['category'];


            $searchResults = $this->wiki->searchByCategory($categoryId);

            if ($searchResults) {
                include_once '../app/View/user/includesAjax/wiki.php';
            }
        }
    }


    public function searchByTag()
    {
        if (isset($_GET['tag'])) {
            $tagId = $_GET['tag'];


            $searchResults = $this->wiki->searchByTag($tagId);

            if ($searchResults) {
                include_once '../app/View/user/includesAjax/wiki.php';
            }
        }
    }
}
