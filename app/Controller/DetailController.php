<?php

namespace App\Controller;
use App\models\WikiTagsModel;


use App\models\WikeModel;
class DetailController{
    public function index(){
        $wiki = new WikeModel();
        $wiki->setId(41);
        $d = $wiki->detailWiki();

        echo $d->title ."<br>";
        echo $d->content ."<br>";
        echo $d->first_name ."<br>";
        echo $d->last_name ."<br>";
        echo $d->category_name ."<br>";
    
        $wikiTag = new WikiTagsModel();
        $wikiTag->setWikiId(41);
        $tags = $wikiTag->getTagsOfWiki();
        var_dump($tags);
        $r = $wiki->getWikisUser();
        if (isset($_SESSION['isAdmin'])) {
            include_once("../app/views/admindashboard/header.php");
        }
        include_once("../app/views/user/accueil.php");
        include_once("../app/views/user/header.php");
        include_once("../app/views/footer.php");

    }
}