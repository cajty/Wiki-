<?php

namespace App\Controller;
use App\Controller\CategorieController;
use App\Controller\TagController;
   
class HomeController
{
    public function index()
    {
        $categorie = new CategorieController();
        $tag = new TagController();
        $r = $categorie->getCategories();
        $t = $tag->getTags();

        include_once("../app/views/home.php");
    }
}