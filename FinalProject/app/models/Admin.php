<?php

namespace App\models;

class Admin extends \App\core\Model {

    public $report_id;
    public $profile_id;
    public $comment_id;
    public $report_reason;

    public function getReports() {
        $stmt = self::$connection->prepare("SELECT * FROM report");
        $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Admin");
        return $stmt->fetchAll();
    }

    public function updateReport() {

    }

    public function deleteReport() {
        $stmt = self::$connection->prepare("DELETE FROM report WHERE report_id=:report_id");
        $stmt->execute(['report_id' => $this->report_id]);
    }

}

?>