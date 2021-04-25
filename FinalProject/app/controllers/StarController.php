<?php

namespace App\controllers;

class StarController extends \App\core\Controller {

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

    function delete($profile_id, $page_id) {
        $star = new \App\models\Star();
        $star->find($profile_id, $page_id);
        $star->delete();
    }

}

?>