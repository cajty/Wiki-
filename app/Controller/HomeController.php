<?php

namespace App\Controller;
use App\Controller\CategorieController;
   
class HomeController
{
    public function index()
    {
        $categorie = new CategorieController();
        $r = $categorie->getCategories();
        include_once("../app/views/home.php");
    }
}