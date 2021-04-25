<?php

namespace App\models;

class Star extends \App\core\Model {

    public $profile_id;
    public $page_id;


    public function find($profile_id, $page_id) {
        $stmt = self::$connection->prepare("SELECT * FROM star WHERE profile_id = :profile_id AND page_id=:page_id");
        $stmt->execute(['profile_id' => $profile_id, 'page_id' => $page_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\star");
        return $stmt->fetch();
    }

    public function findPage($page_id) {
        $stmt = self::$connection->prepare("SELECT * FROM star WHERE page_id=:page_id");
        $stmt->execute(['page_id' => $page_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\star");
        return $stmt->fetch();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO star(profile_id, page_id) VALUES (:profile_id, :page_id)");
        $stmt->execute(['profile_id' => $this->profile_id, 'page_id' => $this->page_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM star WHERE page_id=:page_id AND profile_id=:profile_id");
        $stmt->execute(['page_id' => $this->page_id, 'profile_id' => $this->profile_id]);
    }

    public function deleteAll() {
        $stmt = self::$connection->prepare("DELETE FROM star WHERE page_id=:page_id");
        $stmt->execute(['page_id' => $this->page_id]);
    }
}

?>