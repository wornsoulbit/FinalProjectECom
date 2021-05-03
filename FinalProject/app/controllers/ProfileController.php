<?php

namespace App\controllers;

class ProfileController extends \App\core\Controller {
    
    #[\App\core\LoginFilter]
    function index() {
        $profile = new \App\models\Profile();
        $profile = $profile->find($_SESSION['profile_id']);

        $page = new \App\models\Page();
        $page = $page->getAll($profile->profile_id);

        $star = new \App\models\Star();
        $star = $star->findAllStar($_SESSION['profile_id']);

        $pageName = new \App\models\Star();
        $pageNames[] = null;
        for ($i = 0; $i < count($star); $i++) {
            array_push($pageNames, $pageName->getPageName($star[$i]->page_id));
        }

        $this->view('Profile/profilePage', ['profile' => $profile, 'page' => $page, 'star' => $star, 'pageNames' => $pageNames]);
    }

    #[\App\core\LoginFilter]
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

    #[\App\core\LoginFilter]
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
            if ($_SESSION['profile_id'] != null) {
                $profile = $profile->find($_SESSION['profile_id']);
            } else {
                $profile->profile_id = null;
            }
            
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