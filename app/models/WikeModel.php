<?php


namespace App\models;

use App\core\Database;
use PDO;


class WikeModel extends Database
{
    private $id;
    private $title;
    private $content;
    private $visibility;
    private $user_id;
    private $category_id;

    public function getId()
    {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getVisibility()
    {
        return $this->visibility;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getWikis()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `wikis`  ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getWikisUser()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `wikis` WHERE `visibility` = 1 ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function getWikisAUthor()
    {
        $conn = $this->connect();
        $query = "SELECT * FROM `wikis` WHERE user_id = ? ";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getUserId()]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function createWiki()
    {
        $conn = $this->connect();
        $query = "INSERT INTO wikis (title, content, visibility, user_id, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getTitle(), $this->getContent(), $this->getVisibility(), $this->getUserId(), $this->getCategoryId()]);
        return $conn->lastInsertId();
    }

    public function updateWiki()
    {

        $conn = $this->connect();
        $query = "UPDATE wikis SET title = ?, content = ?,  category_id = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getTitle(), $this->getContent(), $this->getCategoryId(), $this->getId()]);
    }

    public function setCategoryIdNull()
    {
        $conn = $this->connect();
        $query = "UPDATE `wikis` SET `category_id`= null WHERE `category_id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getCategoryId()]);
    }
    public function deleteWiki()
    {
        $conn = $this->connect();
        $query = "DELETE FROM wikis WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getId()]);
    }
    public function visible()
    {
        $conn = $this->connect();
        $query = "UPDATE wikis SET  `visibility` = 1 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getId()]);
    }
    public function invisible()
    {
        $conn = $this->connect();
        $query = "UPDATE wikis SET  `visibility` = 0 WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getId()]);
    }


    public function  detailWiki()
    {
        $conn = $this->connect();
        $query = "SELECT wikis.title, wikis.content, users.first_name, users.last_name, categories.name AS category_name FROM wikis
        JOIN users ON wikis.user_id = users.id
        JOIN categories ON wikis.category_id = categories.id
        WHERE wikis.id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getId()]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
    public function searchByName($searchTerm) {
        $conn = $this->connect();
        $sql = "SELECT DISTINCT * FROM `wikis` WHERE `title` LIKE ? AND `visibility` = 1  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$searchTerm%"]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }
    public function searchByCategory($categoryId) {
        $conn = $this->connect();
        $sql = "SELECT w.* FROM `wikis` w  JOIN `categories` wc ON w.`categoryID` = wc.`categoryID`  WHERE  wc.`categoryID` = ? AND w.`deletedAt` IS NULL"; 
        $stmt = $conn->prepare($sql);
        $stmt->execute([$categoryId]); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
        if ($result) {
            return $result;
        }
    }
    
    
    public function searchByTag($tagId) {
        $conn = $this->connect();
        $sql = "SELECT * FROM `wikis` join wiki_tags on wiki_tags.wikiID =wikis.wikiID  join tags on tags.tagID = wiki_tags.tagID  where tags.tagID = ? AND wikis.`deletedAt` IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$tagId]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }
}
