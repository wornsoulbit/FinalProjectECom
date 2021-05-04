<?php
namespace App\controllers;

class DefaultController extends \App\core\Controller{
	function index(){
		$this->view('Default/index');
	}

	function register(){
		if(isset($_POST['action'])){
			if($_POST['password'] == $_POST['password_confirm']){
				$user = new \App\models\User();
				$user->username = $_POST['username'];
				$user->password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
				if($user->insert()){
					$user = $user->find($_POST['username']);
					$_SESSION['user_id'] = $user->user_id;
					header('location:'.BASE.'/Profile/createProfile');
				}else{
					header('location:'.BASE.'/Default/register?error=The user was not registered!');
				}
				
			}else
				header('location:'.BASE.'/Default/register?error=Passwords do not match!');
		}else{
			$this->view('Login/Register');
		}
	}


	function login(){
		if(isset($_POST['action'])){
			$user = new \App\models\User();
			
			$user = $user->find($_POST['username']);
			if($user != null && password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
				$_SESSION['timeout'] = $user->timeout; // timeout is by default the current timestamp-> the day and time the account has been created
				$profile = new \App\models\Profile();
				$profile = $profile->findUserId($_SESSION['user_id']);
				$_SESSION['profile_id'] = $profile->profile_id;

				header("location:" . BASE . "/Profile/index/$profile->profile_id");
			}else
				header('location:'.BASE.'/Default/login?error=Username/password mismatch!');
		}else{
			$this->view('Login/login');
		}
	}



	function logout(){
		session_destroy();
		header('location:'.BASE.'/');
	}

	#[\App\core\LoginFilter]
	function somewhereSecure(){
		$this->view('Default/secure');
	}

}
?>