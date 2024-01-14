<?php

namespace App\Controller;

use App\models\WikeModel;

class AccueilController
{
    public function index()
    {
        $wiki = new WikeModel();
        $r = $wiki->getWikisUser();
        include_once("../app/views/user/accueil.php");
    }
}
