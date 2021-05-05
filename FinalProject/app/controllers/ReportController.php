<?php

namespace App\controllers;

class ReportController extends \App\core\Controller {

    function index() {

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