<?php

namespace App\controllers;

class ReportController extends \App\core\Controller {

    function index() {

    }

    function report($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);

        $profile = new \App\models\Profile();
        $profile = $profile->find($comment->profile_id);

        if (isset($_POST["action"])) {
            $report = new \App\models\Report();
            $report->profile_id = $comment->profile_id;
            $report->comment_text = $comment->comment_text;
            $report->report_reason = $_POST['report_reason'];
            $report->insert();
            header("location:" . BASE . "/Page/viewPage/$comment->page_id");
        } else {
            $this->view('Report/reportReport', ['comment' => $comment, 'profile' => $profile]);
        }
    }

    function getReports() {
        $reports = new \App\models\Report();
        $reports->getReports();

        //Need to get the profile name.
        $profile = new \App\models\Profile();
        $profileArr[] = null;

        //Need to get the comment text.
        $comment = new \App\models\Comment();
        $commentArr[] = null;
        var_dump($reports, $profileArr, $commentArr);

        if ($reports->report_id != null) {
            foreach($reports as $report) {
                array_push($profileArr, $profile->find($report->profile_id));
                array_push($commentArr, $comment->find($report->comment_id));
            }
        }

        $this->view('Report/inboxReport', ['report' => $reports, 'comment' => $commentArr, 'profile' => $profileArr]);
    }

}

?>