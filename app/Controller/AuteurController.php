<?php

namespace App\Controller;



use App\models\CategorieModel;
use App\models\TagModel;
use App\models\WikiTagsModel;
use App\models\WikeModel;

class AuteurController
{
    private $wikiTag;
    private $wiki;
    private $categorie;
    private $tag;
    public function __construct()
    {
        $this->wikiTag = new WikiTagsModel();
        $this->wiki = new WikeModel();
        $this->categorie = new CategorieModel();;
        $this->tag = new TagModel();
    }
    public function index()
    {


        if (isset($_SESSION['isAdmin'])) {
            $id_user =  $_SESSION['id'];

            $this->wiki->setUserId($id_user);
            $w =  $this->wiki->getWikisAUthor();


            $r = $this->categorie->getCategories();
            $t = $this->tag->getTags();

            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                include_once("../app/views/authr/header.php");
            } else {
                include_once("../app/views/admindashboard/header.php");
            }
            include_once("../app/views/authr/creatwiki.php");
            include_once("../app/views/authr/wikiauthr.php");
            include_once("../app/views/footer.php");
        } else {
            include_once("../app/views/user/header.php");
            include_once("../app/views/user/login.php");
            include_once("../app/views/footer.php");
        }
    }

    public function createWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'wikeCreat') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['selectCategorie'];
            $tag = $_POST['selectTag'] ?? null;

            $id_user =  $_SESSION['id'];
            $this->wiki->setUserId($id_user);
            if (!empty($title) && !empty($content) && !empty($category) && !empty($tag) && !empty($id_user)) {
                $this->wiki->setTitle($title);
                $this->wiki->setContent($content);
                $this->wiki->setVisibility(0);

                $this->wiki->setCategoryId($category);
                $wiki_id =  $this->wiki->createWiki();

                $this->wikiTag->setWikiId($wiki_id);
                foreach ($tag as $tag_id) {
                    $this->wikiTag->setTagId($tag_id);
                    $this->wikiTag->create();
                }
            }
        }

        $r = $this->categorie->getCategories();
        $t = $this->tag->getTags();
        $w =  $this->wiki->getWikisAUthor();

        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
            include_once("../app/views/authr/header.php");
        } else {
            include_once("../app/views/admindashboard/header.php");
        }
        include_once("../app/views/authr/creatwiki.php");
        include_once("../app/views/authr/wikiauthr.php");
        include_once("../app/views/footer.php");
    }


    public function updateWiki($wiki_id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "upWike") {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['selectCategorie'];
            $tag = $_POST['selectTag'] ?? null;
            $id_user =  $_SESSION['id'];
            $this->wiki->setUserId($id_user);
            if (!empty($title) && !empty($content) && !empty($category) && !empty($tag) && !empty($id_user)) {
                $this->wiki->setTitle($title);
                $this->wiki->setContent($content);

                $this->wiki->setCategoryId($category);
                $this->wiki->setId($wiki_id);

                $this->wiki->updateWiki();

                $this->wikiTag->setWikiId($wiki_id);
                $this->wikiTag->deleteByWiki();
                foreach ($tag as $tag_id) {
                    $this->wikiTag->setTagId($tag_id);
                    $this->wikiTag->create();
                }
            }

            $r = $this->categorie->getCategories();
            $t = $this->tag->getTags();
            $w =  $this->wiki->getWikisAUthor();

            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
                include_once("../app/views/authr/header.php");
            } else {
                include_once("../app/views/admindashboard/header.php");
            }

            include_once("../app/views/authr/creatwiki.php");
            include_once("../app/views/authr/wikiauthr.php");
            include_once("../app/views/footer.php");
        }
    }
    public function deleteWiki($wiki_id)
    {
        $id_user =  $_SESSION['id'];


        $this->wiki->setUserId($id_user);
        $this->wikiTag->setWikiId($wiki_id);
        $this->wikiTag->deleteByWiki();
        $this->wiki->setId($wiki_id);
        $this->wiki->deleteWiki();

        $r = $this->categorie->getCategories();
        $t = $this->tag->getTags();
        $w =  $this->wiki->getWikisAUthor();

        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) {
            include_once("../app/views/authr/header.php");
        } else {
            include_once("../app/views/admindashboard/header.php");
        }
        include_once("../app/views/authr/creatwiki.php");
        include_once("../app/views/authr/wikiauthr.php");
        include_once("../app/views/footer.php");
    }
}
