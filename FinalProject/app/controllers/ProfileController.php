<?php

namespace App\controllers;

class ProfileController extends \App\core\Controller {
    
    function index() {
        
    }

    function createProfile() {
        if (isset($_POST["action"])) {
            $profile = new \App\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_SESSION['first_name'];
            $profile->last_name = $_SESSION['last_name'];
            $profile->insert();
            header("location:" . BASE . "Profile/index/$profile->profile_id");
        } else {
            $profile = new \App\models\Profile();
            $profile = $profile->findUserId($_SESSION['user_id']);
            $this->view('Profile/createProfile', $profile);
        }
    }

}

?>