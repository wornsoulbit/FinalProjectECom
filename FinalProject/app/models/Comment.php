<?php

namespace App\models;

class Comment extends \App\core\Model {

    public $profile_id;
    public $page_id;
    public $comment_text;

    public function find($comment_id) {
        $stmt = self::$connection->prepare("SELECT * FROM comment WHERE comment_id = :comment_id");
        $stmt->execute(['comment_id' => $comment_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Comment");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO comment(profile_id, page_id, comment_text) VALUES (:profile_id, :page_id, :comment_text)");
        $stmt->execute(['profile_id' => $this->profile_id, 'page_id' => $this->page_id, 'comment_text' => $this->comment_text]);
    }

    // public function update() {
    //     $stmt = self::$connection->prepare("UPDATE comment SET comment_text =:comment_text WHERE comment_id=:comment_id");
    //     $stmt->execute(['comment_text' => $this->comment_text]);
    // }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM comment WHERE comment_id=:comment_id");
        $stmt->execute(['comment_id' => $this->comment_id]);
    }

    public function deleteAllPageComments() {
        $stmt = self::$connection->prepare("DELETE FROM comment WHERE page_id=:page_id");
        $stmt->execute(['page_id' => $this->page_id]);
    }

    public function getAll($page_id) {
        $stmt = self::$connection->prepare("SELECT * FROM comment WHERE page_id = :page_id");
        $stmt->execute(['page_id' => $page_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Comment");
        return $stmt->fetchAll();
    }

}

?>