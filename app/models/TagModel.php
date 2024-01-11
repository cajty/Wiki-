<?php

namespace App\models;

use App\core\Database;
use PDO;

class TagModel extends Database
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
        $sql = "INSERT INTO `tags`(`name`) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getName()]);
        if ($stmt) {
            return true;
        }
    }


    public function getTags()
    {
        $conn =  $this->connect();
        $sql = "SELECT * FROM `tags` ";
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
        $sql = "UPDATE `tags`   SET `name` = ?  WHERE id = ? ";
        $stmt = $conn->prepare($sql);
        $result =  $stmt->execute([$this->getName(), $id]);
        if ($result) {
            return true;
        }
    }

    public function searchByTag($searchTerm)
    {
        $conn =  $this->connect();
        $sql = "SELECT * FROM `tags` WHERE `name` LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$searchTerm%"]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }

    public function delete($id)
    {
        $conn =  $this->connect();
        $sql = "DELETE FROM `tags` WHERE `tagID` = ?";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([$id]);
        if ($result) {
            return $result;
        }
    }
}
