<?php

namespace App\controllers;

class ReportController extends \App\core\Controller {


    function index() {

    }

    function getReports() {
        $reports = new \App\models\Report();
        $reports->getReports();

        //person who made the report.
        $reporter = new \App\models\Profile();
        $reporterArr = [];

        //Need to get the comment text.
        $comment = new \App\models\Comment();
        $commentArr[] = [];

        //report against this person.
        $reportee = new \App\models\Profile();
        $reporteeArr = [];


        if ($reports->report_id !== null) {
            foreach($reports as $report) {
                array_push($reporterArr, $profile->find($report->profile_id));
                array_push($commentArr, $comment->find($report->comment_id));
                $comment = $comment->find($report->comment_id);
                array_push($reporteeArr, $profile->find($comment->profile_id));
            }
        }

        $this->view('Report/inboxReport', ['report' => $reports, 'comment' => $commentArr, 'reporter' => $reporterArr, 'reportee' => $reporteeArr]);
    }

}

?>