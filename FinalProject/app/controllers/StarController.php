<?php

namespace App\controllers;

class StarController extends \App\core\Controller {

    function add($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        
        $star->insert();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewPage/$page_id");
    }

    function delete($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        $star->delete();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewPage/$page_id");

    }

    function add2($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        
        $star->insert();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewSearchPage/$page_id");
    }

    function delete2($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        $star->delete();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewSearchPage/$page_id");

    }

    function add3($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        
        $star->insert();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewStarPage/$page_id");
    }

    function delete3($page_id) {
        $star = new \App\models\Star();
        $star->profile_id = $_SESSION['profile_id'];
        $star->page_id = $page_id;
        $star->delete();

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        header("location:" . BASE . "/Page/viewStarPage/$page_id");

    }

}

?>