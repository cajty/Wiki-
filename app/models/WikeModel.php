<?php


namespace App\models;

use App\core\Database;
use PDO;


class WikeModel extends Database
{
    private $title;
    private $content;
    private $visibility;
    private $user_id;
    private $category_id;
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

    // Setter methods
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
    public function createWiki()
    {
        $conn = $this->connect();
        $query = "INSERT INTO wikis (title, content, visibility, user_id, category_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getTitle(), $this->getContent(), $this->getVisibility(), $this->getUserId(), $this->getCategoryId()]);

        return $stmt->rowCount();
    }

    public function updateWiki($id, $title, $content, $visibility, $category_id)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setVisibility($visibility);
        $this->setCategoryId($category_id);

        $conn = $this->connect();
        $query = "UPDATE wikis SET title = ?, content = ?, visibility = ?, category_id = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$this->getTitle(), $this->getContent(), $this->getVisibility(), $this->getCategoryId(), $id]);

        return $stmt->rowCount();
    }

    public function deleteWiki($id)
    {
        $conn = $this->connect();
        $query = "DELETE FROM wikis WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}

