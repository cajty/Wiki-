<?php

namespace App\Controller;



use App\models\CategorieModel;

class CategorieController
{

    public function Create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'addCategorie') {
            $name = $_POST['category'];
            $category = new CategorieModel();
            $category->setName($name);
            if ($category->create()) {
                $this->getCategories();
            }
        }
    }

    public function getCategories()
    {
        $category = new CategorieModel();
        $categoreis = $category->getCategories();
        return $categoreis;
    }



    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'modifierCategorie') {
            $name = $_POST['category'];
            $id = $_POST['id'];
            $category = new CategorieModel();
            $category->setName($name);
            if ($category->update($id)) {
                $this->getCategories();
            }
        }
    }

    public function delete()
    {
        if ($_POST['submit'] == 'deletcategory') {
            $id = $_POST['id'];
            $category = new CategorieModel();
            $result = $category->delete($id);

            if ($result) {
                $this->getCategories();
            }
        }
    }
}
