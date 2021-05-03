<?php

namespace App\controllers;

class ProfileController extends \App\core\Controller {
    
    function index($profile_id) {
        $profile = new \App\models\Profile();
        $profile = $profile->find($profile_id);
        $this->view('Profile/profilePage', ['profile' => $profile]);
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
            header("location:" . BASE . "/Profile/index/$profile->profile_id");
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
            header('location:'.BASE.'/Default/login');
            //header("location:" . BASE . "Profile/index/$profile->profile_id");
        } else {
            $profile = new \App\models\Profile();
            $profile = $profile->findUserId($_SESSION['user_id']);
            $this->view('Profile/createProfile', $profile);
        }
    }

    function search(){
        $profile = new \App\models\Profile();
        if(isset($_POST["action"])){
            $profile = $profile->search($_POST["searchProfile"]);
            $this->view('Profile/listProfile', ['profiles' => $profile]);
        }else{
            $profile = $profile->find($_SESSION['profile_id']);
            $this->view('Profile/searchProfile', ['profile' => $profile]);
        }
    }

    function viewProfile($profile_id){
        $profile = new \App\models\Profile();
        $profile = $profile->find($profile_id);

        $page = new \App\models\Page();
        $page = $page->getAll($profile->profile_id);
        $this->view('Profile/viewProfile', ['page' => $page, 'profile' => $profile]);
    }

}

?>