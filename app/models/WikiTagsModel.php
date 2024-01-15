<?php


namespace App\models;

use App\core\Database;
use PDO;


class WikiTagsModel extends Database
{
    private $id;
    private $wiki_id;
    private $tag_id;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getWikiId()
    {
        return $this->wiki_id;
    }


    public function setWikiId($wiki_id)
    {
        $this->wiki_id = $wiki_id;
    }


    public function getTagId()
    {
        return $this->tag_id;
    }

    public function setTagId($tag_id)
    {
        $this->tag_id = $tag_id;
    }

    public function create()
    {
        $conn =  $this->connect();
        $sql = "INSERT INTO `wikitags`(`wiki_id`, `tag_id`) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getWikiId(), $this->getTagId()]);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }


    public function deleteByWiki()
    {
        $conn =  $this->connect();
        $sql = "DELETE FROM `wikitags` WHERE `wiki_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getWikiId()]);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteByTags()
    {
        $conn =  $this->connect();
        $sql = "DELETE FROM `wikitags` WHERE `tag_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getTagId()]);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }
    public function getTagsOfWiki()
    {
        $conn =  $this->connect();
        $sql = "SELECT  tags.name FROM wikitags
        JOIN tags ON wikitags.tag_id = tags.id
        WHERE wikitags.wiki_id = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$this->getWikiId()]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }
}
