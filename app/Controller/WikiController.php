<?php

namespace App\Controller;

use App\models\WikeModel;


class WikiController
{
    public function index()
    {
        $wiki = new WikeModel();
        $r = $wiki->getWikis();

        include_once("../app/views/dashboard.php");
    }
    public function createWiki($category)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'wikeCreat') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['selectedOption'];



            $wiki = new WikeModel();
            $wiki->setTitle($title);
            $wiki->setContent($content);
            $wiki->setVisibility(0);
            $wiki->setUserId(2);
            $wiki->setCategoryId($category);
            $wiki->createWiki();


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
        $r = $wiki->getWikis();

        include_once("../app/views/dashboard.php");
    }
}
