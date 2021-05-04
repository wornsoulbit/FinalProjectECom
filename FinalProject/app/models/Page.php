<?php

namespace App\models;

class Page extends \App\core\Model {

    public $profile_id;
    public $page_title;
    public $page_text;

    public function find($page_id) {
        $stmt = self::$connection->prepare("SELECT * FROM page WHERE page_id = :page_id");
        $stmt->execute(['page_id' => $page_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function getAll($profile_id){
        $stmt = self::$connection->prepare("SELECT * FROM page WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id'=>$profile_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Page");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO page(profile_id, page_title, page_text) VALUES (:profile_id, :page_title, :page_text)");
        $stmt->execute(['profile_id' => $this->profile_id, 'page_title' => $this->page_title, 'page_text' => $this->page_text]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE page SET profile_id=:profile_id, page_title=:page_title, page_text=:page_text WHERE page_id=:page_id");
        $stmt->execute(['profile_id' => $this->profile_id, 'page_title' => $this->page_title, 'page_text' => $this->page_text, 'page_id' => $this->page_id]);
    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM page WHERE page_id=:page_id");
        $stmt->execute(['page_id' => $this->page_id]);
    }

}

?>