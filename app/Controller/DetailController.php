<?php

namespace App\Controller;

use App\models\WikiTagsModel;


use App\models\WikeModel;

class DetailController
{
   


    public function edait($id)
    {

        $wiki = new WikeModel();
        $wiki->setId($id);
        $d = $wiki->detailWiki();



        $wikiTag = new WikiTagsModel();
        $wikiTag->setWikiId($id);
        $tags = $wikiTag->getTagsOfWiki();

        if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
            include_once("../app/views/authr/header.php");
        }
        else if( isset($_SESSION['isAdmin'])) {
            include_once("../app/views/admindashboard/header.php");
        }else{
            include_once("../app/views/user/header.php");
        }
        include_once("../app/views/user/detailwiki.php");
        include_once("../app/views/footer.php");
    }
}
