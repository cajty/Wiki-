<?php

namespace App\Controller;

use App\models\WikeModel;

class AccueilController
{
    public function index()
    {
        $wiki = new WikeModel();
       
        $r = $wiki->getWikisUser();
        if (isset($_SESSION['isAdmin'])) {
            include_once("../app/views/admindashboard/header.php");
        }
        include_once("../app/views/user/header.php");
        include_once("../app/views/user/accueil.php");
        include_once("../app/views/footer.php");

    }

}
