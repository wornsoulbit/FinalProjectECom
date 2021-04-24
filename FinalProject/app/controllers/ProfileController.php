<?php

namespace App\controllers;

class ProfileController extends \App\core\Controller {
    
    function index() {

    }

    function edit($profile_id) {
        $profile = new \App\models\Profile();
        $profile = $profile->find($profile_id);
        $user_id = $profile->user_id;

        if (isset($_POST['action'])) {
            $profile->profile_id = $profile_id;
            $profile->user_id = $user_id;
            $profile->first_name = $_POST["first_name"];
            $profile->last_name = $_POST["last_name"];

            $profile->update();
        } else {
            $profile = new \App\models\Profile();
            $profile = $profile->find($profile_id);
            
            $this->view('Profile/editProfile', ['profile' => $profile]);
        }
    }

    function createProfile() {
        if (isset($_POST["action"])) {
            $profile = new \App\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['first_name'];
            $profile->last_name = $_POST['last_name'];
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