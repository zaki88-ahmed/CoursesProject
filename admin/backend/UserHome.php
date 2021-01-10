<?php

include "dbcont.php";

class UserHome{

    public static function newCourses(){

        global $cont;
        $courses = $cont->prepare("SELECT * FROM courses LIMIT 6");
        $courses->execute();
        return $courses;
    }
}