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
            $this->view('Comment/createComment');
        }
    }

    function delete($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);        
        $comment->delete();
    }

}

?>