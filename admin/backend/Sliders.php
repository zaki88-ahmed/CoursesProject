<?php


include "dbcont.php";
include "imageTrait.php";


class Sliders{

    use imageTrait;

    public static function getSliders(){

        global $cont;
        $sliders = $cont->prepare("SELECT * FROM sliders");
        $sliders->execute();
        return $sliders;
    }




    public static function addSlider(){


        global $cont;


        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTmp = $_FILES['image']['tmp_name'];

        $avatarName = time() . '_' . $imageName;

       $avatarName = self::checkImageExist($avatarName);


        $imageExt = self::checkImage($imageType);

        if($imageExt == 0){
            session_start();
            
            $_SESSION['error'] = 'You must upload correct file';
            
            header('location:../../pages/forms/add-slider.php');
            
            die();
           
        } 


        $imageLink = dirname(__FILE__) . '/../pages/upload/';

        move_uploaded_file($imageTmp, $imageLink . $avatarName);


        $sliders = $cont->prepare("INSERT INTO sliders(image) VALUE(?)");
        $sliders->execute([$avatarName]);

        /* print_r($avatarName);
        die(); */

        session_start();
            
        $_SESSION['message'] = 'Slider was added';
        
        header('location:../../pages/forms/add-slider.php');
        
    }
}







if (isset($_POST['add_submit'])) {
    Sliders::addSlider();
}