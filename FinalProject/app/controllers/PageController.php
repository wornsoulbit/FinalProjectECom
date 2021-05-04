<?php

namespace App\controllers;

class PageController extends \App\core\Controller {

    function index($profile_id) {
        $profile = new \App\models\Profile();
        $profile = $profile->find($profile_id);

        $page = new \App\models\Page();
        $page = $page->getAll($profile->profile_id);
        $this->view('Page/listPages', ['page' => $page, 'profile' => $profile]);
    }
    
    function viewPage($page_id) {
        $getAllComments = new \App\models\Comment();
        $getAllComments = $getAllComments->getAll($page_id); 

        $page = new \App\models\Page();
        $page = $page->find($page_id);

        $star = new \App\models\Star();
        $star = $star->find($_SESSION['profile_id'], $page_id);

        $this->view('Page/pagePage', ['comments' => $getAllComments, 'page' => $page, 'star' => $star]);
    }

    function search(){
        $page = new \App\models\Page();
        if(isset($_POST["action"])){
            $page = $page->search($_POST["searchPage"]);
            $this->view('Page/listSearchPages', ['pages' => $page]);
        }else{
            $this->view('Profile/searchPage');
        }
    }

    
    #[\App\core\LoginFilter]
    function createPage() {
        if (isset($_POST["action"])) {
            $page = new \App\models\Page();
            $page->profile_id = $_SESSION['profile_id'];
            $page->page_title = $_POST['page_title'];
            $page->page_text = $_POST['page_text'];
            $page->insert();
            header("location:" . BASE . "/Page/index/$page->profile_id");
        } else {
            $page = new \App\models\Page();
            $this->view('Page/createPage', $page);
        }
    }

    #[\App\core\LoginFilter]
    function edit($page_id) {
        $page = new \App\models\Page();
        $page = $page->find($page_id);

        if (isset($_POST["action"])) {
            $page = new \App\models\Page();

            $page->page_title = $_POST["page_title"];
            $page->page_text = $_POST["page_text"];
            $page->profile_id = $_SESSION["profile_id"];
            $page->page_id = $page_id;

            $page->update();
            header("location:" . BASE . "/Page/index/$page->profile_id");
        
        } else {
            $page = new \App\models\Page();
            $page = $page->find($page_id);

            $this->view('Page/editPage', ['page' => $page]);
        }
    }

    #[\App\core\LoginFilter]
    function delete($page_id) {
        $star = new \App\models\Star();
        $star->page_id = $page_id;
        $star->deleteAll();

        $comments = new \App\models\Comment();
        $comments->page_id = $page_id;
        $comments->deleteAllPageComments();

        $page = new \App\models\Page();
        $page->page_id = $page_id;
        $page->delete();

        header("location:" . BASE . "/Page/index/" . $_SESSION['profile_id'] . "");
    }

}

?>