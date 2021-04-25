<?php

namespace App\controllers;

class ProfileController extends \App\core\Controller {
    
    function index() {

    }

    function add() {
        if (isset($_POST["action"])) {
            $star = new \App\models\Star();
            $star->profile_id = $_SESSION['profile_id'];
            $star->page_id = $_POST['page_id'];

            $star->find($_SESSION['profile_id'], $_SESSION['page_id']);
            if (mysqli_num_rows($star) == 0) {
                $star->insert();
            }
        } else {
            
        }
    }

    function delete() {
        
    }

}

?>