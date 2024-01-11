<?php

namespace App\models;

use App\core\Database;
use PDO;



class CategorieModel extends Database
{

    private $name;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function create()
    {
        $conn =  $this->connect();
        $sql = "INSERT INTO `categories`(`name`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getName()]);
        if ($stmt) {
            return true;
        }
    }


    public function getCategories()
    {
        $conn =  $this->connect();
        $sql = "SELECT * FROM `categories` ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }


    public function update($id)
    {

        $conn =  $this->connect();
        $sql = "UPDATE `categories`   SET `name` = ?  WHERE id = ? ";
        $stmt = $conn->prepare($sql);
        $result =  $stmt->execute([$this->getName(), $id]);
        if ($result) {
            return true;
        }
    }

    

    public function delete($id)
    {
        $conn =  $this->connect();
        $sql = "DELETE FROM `categories` WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }

}
