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
            $report->profile_id = $_SESSION['profile_id'];
            $report->comment_id = $comment_id;
            $report->report_reason = $_POST['report_reason'];
            $report->insert();
            header("location:" . BASE . "/Page/viewPage/$comment->page_id");
        } else {
            $this->view('Report/reportReport', ['comment' => $comment, 'profile' => $profile]);
        }
    }

    function report2($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);

        $profile = new \App\models\Profile();
        $profile = $profile->find($comment->profile_id);

        if (isset($_POST["action"])) {
            $report = new \App\models\Report();
            $report->profile_id = $_SESSION['profile_id'];
            $report->comment_id = $comment_id;
            $report->report_reason = $_POST['report_reason'];
            $report->insert();
            header("location:" . BASE . "/Page/viewSearchPage/$comment->page_id");
        } else {
            $this->view('Report/reportReport', ['comment' => $comment, 'profile' => $profile]);
        }
    }


    function report3($comment_id) {
        $comment = new \App\models\Comment();
        $comment = $comment->find($comment_id);

        $profile = new \App\models\Profile();
        $profile = $profile->find($comment->profile_id);

        if (isset($_POST["action"])) {
            $report = new \App\models\Report();
            $report->profile_id = $_SESSION['profile_id'];
            $report->comment_id = $comment_id;
            $report->report_reason = $_POST['report_reason'];
            $report->insert();
            header("location:" . BASE . "/Page/viewStarPage/$comment->page_id");
        } else {
            $this->view('Report/reportReport', ['comment' => $comment, 'profile' => $profile]);
        }
    }


    function delete($report_id){
        $report = new \App\models\Report();
        $report = $report->find($report_id);

        $report->delete();

        header("location:" . BASE . "/Report/getReports");
    }

    function getReports() {
        $reports = new \App\models\Report();
        $reports = $reports->getReports();
        // var_dump($reports);

        //person who made the report.
        $reporter = new \App\models\Profile();
        $reporterArr = [];

        //Need to get the comment text.
        $comment = new \App\models\Comment();
        $commentArr = [];

        //report against this person.
        $reportee = new \App\models\Profile();
        $reporteeArr = [];

        foreach($reports as $report) {
            array_push($reporterArr, $reporter->find($report->profile_id));
            $comment = $comment->find($report->comment_id);
            array_push($commentArr, $comment->find($report->comment_id));
            array_push($reporteeArr, $reportee->find($comment->profile_id));
        }

        // var_dump($reports, $reporterArr, $reporteeArr, $commentArr);

        $this->view('Report/inboxReport', ['report' => $reports, 'comment' => $commentArr, 'reporter' => $reporterArr, 'reportee' => $reporteeArr]);
    }

}

?>