<?php

namespace App\Controller;

use App\models\WikeModel;

class WikeController
{
    public function createWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'wikeCreat') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            // $user_id = $_SESSION['id'];
            // $category_id = $_POST[''];

            $wikiModel = new WikeModel();

            $wikiModel->setTitle($title);
            $wikiModel->setContent($content);
            $wikiModel->setVisibility(0);
            $wikiModel->setUserId(2);
            $wikiModel->setCategoryId(1);
            $wiki = $wikiModel->createWiki();

            if ($wiki) {
                include_once("../app/views/home.php");
            }
        }
    }
    public function updateWiki($id, $title, $content, $visibility, $category_id)
    {
        $wikiModel = new WikeModel();
        $result = $wikiModel->updateWiki($id, $title, $content, $visibility, $category_id);

        // Process the result or return it as needed
        return $result;
    }

    public function deleteWiki($id)
    {
        $wikiModel = new WikeModel();
        $result = $wikiModel->deleteWiki($id);

        // Process the result or return it as needed
        return $result;
    }
}
