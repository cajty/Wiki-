<?php

namespace App\Controller;



use App\models\CategorieModel;
use App\models\TagModel;
use App\models\WikeModel;

class AdminController
{
    public function index()
    {
        if ($_SESSION['isAdmin'] == 0) {
            $wiki = new WikeModel();
            $r = $wiki->getWikis();
            include_once("../app/views/admindashboard/wiki.php");
        } else {
            include_once("../app/views/login");
        }
    }
    public function createTags()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "createTags") {
            $name = $_POST['name'];
            $model = new TagModel();
            $model->setName($name);
            $model->create();
            $tag = $model->getTags();
            include_once("../app/views/admindashboard/tags.php");
        }
    }
    public function getTags()
    {
        $model = new TagModel();
        $tag = $model->getTags();
        include_once("../app/views/admindashboard/tags.php");
    }

    public function updateTag($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "updateTag") {
        $mane = $_POST['mane'];
        $model = new TagModel();
        $model->setName($mane);
        $model->update($id);
        $tag = $model->getTags();
        include_once("../app/views/admindashboard/tags.php");
        }
    }



    public function deleteTag($id)
    {

        $model = new TagModel();
        $model->delete($id);
        $tag = $model->getTags();
        include_once("../app/views/admindashboard/tags.php");
    }
    public function creatCategories()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "creatCategories") {
            $name = $_POST['name'];
            $model = new  CategorieModel();
            $model->setName($name);
            $model->create();
            $cat = $model->getCategories();
            include_once("../app/views/admindashboard/Categorie.php");
        }
    }

    public function getCategories()
    {
        $model = new  CategorieModel();
        $cat = $model->getCategories();
        include_once("../app/views/admindashboard/Categorie.php");
    }

    public function updateCategories($id)
    {
        
        $mane = $_POST['mane'];
        $model = new  CategorieModel();
        $model->setName($mane);
        $model->update($id);
        $cat = $model->getCategories();
        include_once("../app/views/admindashboard/Categorie.php");
    }



    public function deleteCategories($id)
    {

        $model = new  CategorieModel();
        $model->delete($id);
        $cat = $model->getCategories();
        include_once("../app/views/admindashboard/Categorie.php");
    }
    public function deleteWiki($id){
        $model = new WikeModel();
        $model->deleteWiki($id);
        $r = $model->getWikis();
        include_once("../app/views/admindashboard/wiki.php");
    }

    public function visibility($wiki_id){
        $model = new WikeModel();
        $model->visibility($wiki_id);
        $r = $model->getWikis();
        include_once("../app/views/admindashboard/wiki.php");
    }



}
