<?php

namespace App\models;

use App\core\Database;
use PDO;



class CategorieModel extends Database
{
    private $id;
    private $name;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

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


    public function update()
    {

        $conn =  $this->connect();
        $sql = "UPDATE `categories`   SET `name` = ?  WHERE id = ? ";
        $stmt = $conn->prepare($sql);
        $result =  $stmt->execute([$this->getName(), $this->getId()]);
        if ($result) {
            return true;
        }
    }

    

    public function delete()
    {
        $conn =  $this->connect();
        $sql = "DELETE FROM `categories` WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$this->getId()]);
        return $result;
    }

}
