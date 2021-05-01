<?php

namespace App\controllers;

class PageController extends \App\core\Controller {

    function index($profile_id) {
        $profile = new \App\models\Profile();
        $profile = $profile->find($profile_id);

        $page = new \App\models\Page();
        $page = $page->getAll($profile->profile_id);
        $this->view('Page/listPages', ['page' => $page]);
    }

    function createPage() {
        if (isset($_POST["action"])) {
            $page = new \App\models\Page();
            $page->profile_id = $_SESSION['profile_id'];
            $page->page_title = $_POST['page_title'];
            $page->page_text = $_POST['page_text'];
            $page->insert();
            header("location:" . BASE . "Page/index/$page->page_id");
        } else {
            $page = new \App\models\Page();
            $this->view('Page/createPage', $page);
        }
    }

    function edit($page_id) {
        $page = new \App\models\Page();
        $page = $page->find($page_id);

        if (isset($_POST["action"])) {
            $page->page_title = $_POST["page_title"];
            $page->page_text = $_POST["page_text"];
            $page->page_id = $page_id;

            $page->update();
        } else {
            $page = new \App\models\Page();
            $page = $page->find($page_id);

            $this->view('Page/editPage', $page);
        }
    }

    function delete($page_id) {
        $star = new \App\models\Star();
        $star->page_id = $page_id;
        $star->deleteAll();

        $page = new \App\models\Page();
        $page = $page->find($page_id);        
        $page->delete();
    }

}

?>