<?php

namespace App\Controller;

use App\models\WikeModel;

class AccueilController
{
    public function index()
    {
        $wiki = new WikeModel();
        $r = $wiki->getWikis();
        include_once("../app/views/accueil.php");
    }
}
