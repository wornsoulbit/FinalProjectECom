<?php
namespace App\models;

class User extends \App\core\Model{
	public $username;
	public $password_hash;
	public $timeout;
	public $role;

	public function __construct(){
		parent::__construct();
	}

	public function isValid(){
		return !empty($this->username) && !password_verify('', $this->password_hash);
	}

	public function find($username){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE username = :username");
		$stmt->execute(['username'=>$username]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function findId($user_id){
		$stmt = self::$connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
		$stmt->execute(['user_id'=>$user_id]);
		$stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\User");
		return $stmt->fetch();
	}

	public function updateBan() {
        $stmt = self::$connection->prepare("UPDATE user SET role= 'ban' WHERE user_id=:user_id");
        $stmt->execute(['user_id' => $this->user_id]);
    }

	public function updateTimeout() {
        $stmt = self::$connection->prepare("UPDATE user SET timeout=:timeout WHERE user_id=:user_id");
        $stmt->execute(['timeout' => $this->timeout, 'user_id' => $this->user_id]);
    }

	public function insert(){
		if($this->isValid()){
			$stmt = self::$connection->prepare("INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)");
			return $stmt->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);		
		}else
			return false;
	}

}