<?php

include "dbcont.php";

class Requests{

    public static function addRequest(){

        global $cont;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $courseId = $_POST['course_id'];
        /* print_r($name);
        die(); */
        
        $request = $cont->prepare("INSERT INTO requests(name, email, phone, course_id) VALUES(?, ?, ?, ?)");
        $request->execute([$name, $email, $phone, $courseId]);

        session_start();
        $_SESSION['message'] = "Request has been Added Successfully";
        header("location:../../course-details.php?course_id=" . $courseId);

    }





    public static function getRequests(){
        global $cont;
        
        $requests = $cont->prepare(
            'SELECT requests.id, requests.name, requests.email, requests.status, requests.phone, courses.title FROM requests INNER JOIN courses ON requests.course_id = courses.id '
        );

        $requests->execute();

        return $requests;
    }




    public static function updateRquestStatus(){
        global $cont;
        $id = $_POST['id'];
        $request = $cont->prepare("UPDATE requests SET STATUS=? WHERE id=? ");
        $request->execute([1, $id]);
    }

} 


if (isset($_POST['add_submit'])) {
    Requests::addRequest();
}


if (isset($_POST['id'])) {
    Requests::updateRquestStatus();
}