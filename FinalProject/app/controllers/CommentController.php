<?php

namespace App\controllers;

class CommentController extends \App\core\Controller {

    function index() {

    }

    function add($page_id) {
        if (isset($_POST["action"])) {
            $comment = new \App\models\Comment();
            $comment->profile_id = $_SESSION['profile_id'];
            $comment->page_id = $page_id;
            $comment->comment_text = $_POST['comment_text'];
            $comment->insert();

            header("location:" . BASE . "/Page/viewPage/$page_id");
        } else {
            $page = new \App\models\Page();
            $page->page_id = $page_id;
            $this->view('Comment/createComment', ['page' => $page]);
        }
    }

    function delete($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);
        $comment->delete();
        header("location:" . BASE . "/Page/viewPage/$comment->page_id");
    }

    function add2($page_id) {
        if (isset($_POST["action"])) {
            $comment = new \App\models\Comment();
            $comment->profile_id = $_SESSION['profile_id'];
            $comment->page_id = $page_id;
            $comment->comment_text = $_POST['comment_text'];
            $comment->insert();
            
            header("location:" . BASE . "/Page/viewSearchPage/$page_id");
        } else {
            $page = new \App\models\Page();
            $page->page_id = $page_id;
            $this->view('Comment/createComment', ['page' => $page]);
        }
    }

    function delete2($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);
        $comment->delete();
        header("location:" . BASE . "/Page/viewSearchPage/$comment->page_id");
    }

    function add3($page_id) {
        if (isset($_POST["action"])) {
            $comment = new \App\models\Comment();
            $comment->profile_id = $_SESSION['profile_id'];
            $comment->page_id = $page_id;
            $comment->comment_text = $_POST['comment_text'];
            $comment->insert();
            
            header("location:" . BASE . "/Page/viewStarPage/$page_id");
        } else {
            $page = new \App\models\Page();
            $page->page_id = $page_id;
            $this->view('Comment/createComment', ['page' => $page]);
        }
    }

    function delete3($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);
        $comment->delete();
        header("location:" . BASE . "/Page/viewStarPage/$comment->page_id");
    }

}

?>