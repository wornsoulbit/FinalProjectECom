<?php

namespace App\controllers;

class StarController extends \App\core\Controller {

    function add($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        
        $star->insert();
        header("location:" . BASE . "/Page/viewPage/$page_id");
    }

    function delete($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        $star->delete();
        header("location:" . BASE . "/Page/viewPage/$page_id");
    }

}

?>