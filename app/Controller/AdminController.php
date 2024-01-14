<?php

namespace App\Controller;


use App\models\WikiTagsModel;
use App\models\CategorieModel;
use App\models\TagModel;
use App\models\WikeModel;

class AdminController
{
    private $wikiTag;
    private $wiki;
    private $categorie;
    private $tag;
    public function __construct()
    {
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 0) {
            $this->wikiTag = new WikiTagsModel();
            $this->wiki = new WikeModel();
            $this->categorie = new CategorieModel();;
            $this->tag = new TagModel();
        } else {
            include_once("../app/views/user/header.php");
            include_once("../app/views/user/login.php");
            include_once("../app/views/footer.php");
        }
    }
    public function index()
    {

        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 0) {
            $w = $this->wiki->getWikis();
            include_once("../app/views/admindashboard/header.php");
            include_once("../app/views/admindashboard/side.php");
            include_once("../app/views/admindashboard/wiki.php");
            include_once("../app/views/footer.php");
        }
    }
    public function createTags()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "createTags") {
            $name = $_POST['name'];

            if (!empty($name)) {
                $this->tag->setName($name);
                $this->tag->create();
            }
            $tag =  $this->tag->getTags();
            include_once("../app/views/admindashboard/header.php");
            include_once("../app/views/admindashboard/side.php");
            include_once("../app/views/admindashboard/tags.php");
            include_once("../app/views/footer.php");
        }
    }
    public function getTags()
    {

        $tag =  $this->tag->getTags();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/tags.php");
        include_once("../app/views/footer.php");
    }

    public function updateTag($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "updateTag") {

            $mane = $_POST['mane'];

            $this->tag->setName($mane);
            $this->tag->update($id);
            $tag =  $this->tag->getTags();

            include_once("../app/views/admindashboard/header.php");
            include_once("../app/views/admindashboard/side.php");
            include_once("../app/views/admindashboard/tags.php");
            include_once("../app/views/footer.php");
        }
    }



    public function deleteTag($id)
    {


        $this->tag->delete($id);
        $tag =  $this->tag->getTags();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/tags.php");
        include_once("../app/views/footer.php");
    }
    public function creatCategories()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"]  == "creatCategories") {
            $name = $_POST['name'];

            if (!empty($name)) {
                $this->categorie->setName($name);
                $this->categorie->create();
            }
            $cat =  $this->categorie->getCategories();
            include_once("../app/views/admindashboard/header.php");
            include_once("../app/views/admindashboard/side.php");
            include_once("../app/views/admindashboard/Categorie.php");
            include_once("../app/views/footer.php");
        }
    }

    public function getCategories()
    {

        $cat =  $this->categorie->getCategories();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/Categorie.php");
        include_once("../app/views/footer.php");
    }

    public function updateCategories($id)
    {

        $mane = $_POST['mane'];

        $this->categorie->setName($mane);
        $this->categorie->setId($id);
        $this->categorie->update();
        $cat =  $this->categorie->getCategories();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/Categorie.php");
        include_once("../app/views/footer.php");
    }



    public function deleteCategories($id)
    {

        $this->categorie->setId($id);
        $this->categorie->delete();
        $cat =  $this->categorie->getCategories();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/Categorie.php");
    }
    public function deleteWiki($wiki_id)
    {


        $this->wiki->setId($wiki_id);
        $this->wikiTag->setId($wiki_id);
        $this->wikiTag->deleteByWiki();
        $this->wiki->deleteWiki();
        $w =  $this->wiki->getWikis();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/wiki.php");
        include_once("../app/views/footer.php");
    }

    public function visible($wiki_id)
    {
        $this->wiki->setId($wiki_id);
        $this->wiki->visible();
        $w =  $this->wiki->getWikis();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/wiki.php");
        include_once("../app/views/footer.php");
    }
    public function invisible($wiki_id)
    {
        $this->wiki->setId($wiki_id);
        $this->wiki->invisible();
        $w =  $this->wiki->getWikis();
        include_once("../app/views/admindashboard/header.php");
        include_once("../app/views/admindashboard/side.php");
        include_once("../app/views/admindashboard/wiki.php");
        include_once("../app/views/footer.php");
    }
}
