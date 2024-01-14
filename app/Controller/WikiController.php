<?php

namespace App\Controller;

use App\models\WikeModel;
use App\Controller\CategorieController; 
use App\Controller\TagController;


class WikiController
{
    public function createWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'wikeCreat') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['selectCategorie'];
            $tag = $_POST['selectTag'];
            
            $wiki = new WikeModel();
            foreach($tag as $row){
                
            }
            $wiki->setTitle($title);
            $wiki->setContent($content);
            $wiki->setVisibility(0);
            $wiki->setUserId(2);
            $wiki->setCategoryId($category);
            $wiki->createWiki();
            $categorie = new CategorieController();
            $r = $categorie->getCategories();
            $t = $tag->getTags();
            include_once("../app/views/home.php");
        
        }
    }
    public function updateWiki($wiki_id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "upWike") {
            $title = $_POST["title"];
            $content = $_POST["content"];
            $category = $_POST['category'];

            $wiki = new WikeModel();
            $wiki->setTitle($title);
            $wiki->setContent($content);
            $wiki->setCategoryId($category);
            $wiki->updateWiki($wiki_id);
        }
    }

    public function deleteWiki($wiki_id)
    {
        $wiki = new WikeModel();
        $wiki->deleteWiki($wiki_id);
    }
}
