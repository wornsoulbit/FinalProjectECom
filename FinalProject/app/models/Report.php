<?php

namespace App\models;

class Report extends \App\core\Model {

    public $report_id;
    public $profile_id;
    public $comment_id;
    public $report_reason;

    public function find($report_id) {
        $stmt = self::$connection->prepare("SELECT * FROM report WHERE report_id = :report_id");
        $stmt->execute(['report_id' => $report_id]);
        $stmt->setFetchMode(\PDO::FETCH_GROUP | \PDO::FETCH_CLASS, "App\\models\\Report");
        return $stmt->fetch();
    }

    public function getReports() {
        $stmt = self::$connection->prepare("SELECT * FROM report");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_GROUP|\PDO::FETCH_CLASS, "App\\models\\Report");
        return $stmt->fetchAll();
    }

    public function insert() {
        $stmt = self::$connection->prepare("INSERT INTO report(profile_id, comment_id, report_reason) VALUES (:profile_id, :comment_id, :report_reason)");
        $stmt->execute(['profile_id' => $this->profile_id, 'comment_id' => $this->comment_id, 'report_reason' => $this->report_reason]);
    }

    public function update() {

    }

    public function delete() {
        $stmt = self::$connection->prepare("DELETE FROM report WHERE report_id=:report_id");
        $stmt->execute(['report_id' => $this->report_id]);
    }

}

?>