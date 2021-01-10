<?php

include 'dbcont.php';

class auth{

    public static function login(){

        global $cont;

        $email = $_POST['email'];
        $password = SHA1($_POST['password']);

        /* print_r($password);
        die(); */

        $auth = $cont->prepare("SELECT role FROM users WHERE email=? AND password=? LIMIT 1");
        $auth->execute([$email, $password]);

        /* print_r($auth->fetch());
        die(); */


        $authData = $auth->fetchObject();

        session_start();

        if($authData){

            /* print_r("found");
            die(); */

            $_SESSION['role'] = $authData->role;
            header('location:../index.php');


        }else {
            /* print_r("not found");
            die(); */

            $_SESSION['error'] = 'Email or Password is Invalid';
            header('location:../login.php');
        }

    }

}




if (isset($_POST['login'])) {
    auth::login();
}