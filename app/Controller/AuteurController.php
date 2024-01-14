<?php

namespace App\Controller;



use App\models\CategorieModel;
use App\models\TagModel;
use App\models\WikeModel;

class AuteurController
{
    public function index()
    {
        if ( empty($_SESSION['isAdmin']) ) {
            $id_user =  $_SESSION['id']; 
            $wiki = new WikeModel();
            $wiki->setUserId($id_user);
            if ($r = $wiki->getWikisAUthor()){
                include_once("../app/views/admindashboard/wiki.php");
            }else{
                include_once("../app/views/authr/home.php");
            }
            
        } else {
            include_once("../app/views/user/login.php");
        }
    }

public function createWiki()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'wikeCreat') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['selectCategorie'];
        $tag = $_POST['selectTag'];
        $id_user =  $_SESSION['id']; 
        
        $wiki = new WikeModel();
        foreach($tag as $row){
            
        }
        $wiki->setTitle($title);
        $wiki->setContent($content);
        $wiki->setVisibility(0);
        $wiki->setUserId($id_user);
        $wiki->setCategoryId($category);
        $wiki->createWiki();
        $categorie = new CategorieController();
        $r = $categorie->getCategories();
        $t = $tag->getTags();
        include_once("../app/views/authr/home.php");
    
    }
}
public function deleteWiki($id){
    $model = new WikeModel();
    $model->deleteWiki($id);
    $r = $model->getWikis();
    include_once("../app/views/admindashboard/wiki.php");
}
}