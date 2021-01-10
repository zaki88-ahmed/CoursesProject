<?php

include 'dbcont.php';

class AdminHome{

    public static function getCounters(){
        global $cont;

        $coursesCounter = $cont->prepare("SELECT COUNT('id') FROM courses");
        $coursesCounter->execute();

        $requestsCounter =  $cont->prepare("SELECT COUNT('id') FROM requests");
        $requestsCounter->execute();

        $data = [
            'coursesCount' => $coursesCounter->fetchcolumn(),
            'requestsCount' => $requestsCounter->fetchcolumn()
        ];

       return $data;
    }

}