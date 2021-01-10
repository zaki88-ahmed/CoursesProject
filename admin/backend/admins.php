<?php

include 'dbcont.php';

class admins{
    
    public static function addAdmin(){

        global $cont;

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = SHA1($_POST['password']);

        $admin = $cont->prepare("INSERT INTO users(name, email, password, role) VALUES(?,?,?,?)");
        $admin->execute([$name, $email, $password, 0]);

        session_start();
        $_SESSION['message'] = 'Admin Was Created';
        header('location:../pages/forms/add-admin.php');
    }
}






if (isset($_POST['add-submit'])) {
    admins::addAdmin();
}