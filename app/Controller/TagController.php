<?php

namespace App\Controller;



use App\models\TagModel;

class TagController
{

    public function Create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'addtag') {
            $name = $_POST['tag'];
            $tag = new TagModel();
            $tag->setName($name);
            if ($tag->create()) {
                $this->getTags();
            }
        }
    }

    public function getTags()
    {
        $tag = new TagModel();
        return  $tag->getTags();
    }

   

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'modifierTag') {
            $name = $_POST['tag'];
            $id = $_POST['id'];
            $tag = new TagModel();
            $tag->setName($name);
            if ($tag->update($id)) {
                $this->getTags();
            }
        }
    }

    public function delete()
    {
        if ($_POST['submit'] == 'delettag') {
            $id = $_POST['id'];
            $tag = new TagModel();
            $result = $tag->delete($id);

            if ($result) {
                $this->getTags();
            }
        }
    }

    public function getTagsForFormulaire()
    {
        $tag = new TagModel();
        return $tags = $tag->getTags();
    }

    public function getTagsForFilter()
    {
        $tag = new TagModel();
        return $tags = $tag->getTags();
    }
}
