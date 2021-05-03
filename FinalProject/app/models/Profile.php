<?php

namespace App\models;

class Profile extends \App\core\Model {

    public $first_name;
    public $last_name;
    public $user_id;

    public function __construct() {
        parent::__construct();
    }

    public function find($profile_id) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id' => $profile_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function findUserId($user_id) {
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetch();
    }

    public function search($searchProfile){
        $searchTerm = "%$searchProfile%";
        $stmt = self::$connection->prepare("SELECT * FROM profile WHERE 
            concat(first_name, ' ', last_name) LIKE :term");
        $stmt->execute(['term'=>$searchTerm]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Profile");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO profile(user_id, first_name, last_name) VALUES (:user_id, :first_name, :last_name)");
        $stmt->execute(['user_id' => $this->user_id, 'first_name' => $this->first_name, 'last_name' => $this->last_name]);
    }

    public function update() {
        $stmt = self::$connection->prepare("UPDATE profile SET first_name=:first_name, last_name=:last_name WHERE profile_id=:profile_id");
        $stmt->execute(['first_name' => $this->first_name, 'last_name' => $this->last_name, 'profile_id' => $this->profile_id]);
    }

}

?>