<?php

include 'dbcont.php';
include 'imageTrait.php';
include 'coursesTrait.php';

class courses{

    use imageTrait;
    use coursesTrait;



    //CRUD functions
    //add
    //get
    //update
    //delete




    /**
     * get avatar values
     * insert into courses
     * session with message
     * header with location.
     */
    public static function addCourse(){

        global $cont;

        if (!empty($_POST['script'])) {
            session_start();
            $_SESSION['message'] = 'You Are script';
            header('location:../../admin/pages/forms/add-course.php');
            die();
        }

        $title = $_POST['title'];
        $price = $_POST['price'];
        $body = $_POST['body'];
        $category_id = $_POST['category_id'];

        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTmp = $_FILES['image']['tmp_name'];

        $avatarName = time() . '_' . $imageName;

        /*  print_r($imageType);
         die(); */

        /*  print_r($avatarName);
         die();  */

        /* if ($imageType != 'image/jpeg' || $imageType != "image/png"){
            print_r($imageType);
            die();
        } */



        /* $ext = ['image/jpeg', 'image/png'];

        if(! in_Array($imageType, $ext)){
            session_start();
            
            $_SESSION['error'] = 'You must upload correct file';
            
            header('location:../../admin/pages/forms/add-course.php');
            
            die();
           
        }  */






       $avatarName = courses::checkImageExist($avatarName);

      /*  print_r($imageName);
       die(); */

      




        $imageExt = courses::checkImage($imageType);

        if($imageExt == 0){
            session_start();
            
            $_SESSION['error'] = 'You must upload correct file';
            
            header('location:../../admin/pages/forms/add-course.php');
            
            die();
           
        } 


        $imageLink = dirname(__FILE__) . '/../pages/upload/';

        /* print_r($imageLink . $avatarName);
         die();  */

        move_uploaded_file($imageTmp, $imageLink . $avatarName);

        /* print_r($imageLink . $avatarName);
         die(); */

        $course = $cont->prepare(
            'INSERT INTO courses(title, price, body, category_id, image) VALUES(?, ?, ?, ?, ?)'
        );
        $course->execute([$title, $price, $body, $category_id, $avatarName]);

        session_start();
        $_SESSION['message'] = 'Course Was Created';
        header('location:../../admin/pages/forms/add-course.php');
        
    }



    public static function getCourses(){
        global $cont;
        // $courses = $cont->prepare("SELECT * FROM courses ");

        $courses = $cont->prepare(
            'SELECT courses.id, courses.title, courses.price, courses.body, courses.image, categories.name FROM courses INNER JOIN categories ON courses.category_id = categories.id '
        );

        $courses->execute();

        return $courses;
    }



    public static function deleteCourse(){
        global $cont;
        $courseId = $_POST['course_id'];

        /* print_r($courseId);
         die(); */

        /*  $courseRequests = $cont->prepare("SELECT * FROM requests WHERE course_id  = ?");
        $courseRequests->execute([$courseId]);

         */

        $courseRequests = courses::checkCourseRequests($courseId);

        $totalRequests = $courseRequests->fetchColumn();

        /* print_r($totalRequests);
         die();  */

        if (!empty($totalRequests)) {
            session_start();

            $_SESSION['message'] =
                "Can't Delete Course, this course has requests";
            header('location:../../admin/pages/tables/courses.php');
            print_r($totalRequests);
        } else {
            $course = $cont->prepare('DELETE FROM courses WHERE id = ?');
            $course->execute([$courseId]);

            session_start();
            $_SESSION['message'] = 'Course Was Deleted';
            header('location:../../admin/pages/tables/courses.php');
        }
    }





    public static function getCourseData($id){
        global $cont;
        // $courseData = $cont->prepare("SELECT * FROM courses WHERE id = ? LIMIT 1");
        $courseData = $cont->prepare("SELECT courses.id, courses.title, courses.price, courses.body, courses.image, courses.category_id, categories.name FROM courses INNER JOIN categories ON courses.category_id = categories.id WHERE courses.id = ? LIMIT 1");
        $courseData->execute([$id]);
        return $courseData->fetchObject();
    }










    /**
     * get new data
     * check if user upload new image
     * update into database
     * se sessions
     * location update cours page
     */

    public static function updateCourse(){

        global $cont;


        $title = $_POST['title'];
        $price = $_POST['price'];
        $body = $_POST['body'];
        $categoryId = $_POST['category_id'];
        $courseId = $_POST['course_id'];

        

        if(! empty($_FILES['image']['name'])){


            $imageName = $_FILES['image']['name'];
            $imageType = $_FILES['image']['type'];
            $imageTmp = $_FILES['image']['tmp_name'];



            $imageExt = courses::checkImage($imageType);

           

            if($imageExt == 0){
                session_start();
                
                $_SESSION['error'] = 'You must upload correct file';
                
                header('location:../../admin/pages/forms/update-course.php?id=' . $courseId);
                die();              
            } 

            
            $avatarName = courses::checkImageExist(time() . '_' . $imageName);
           

            $imageLink = dirname(__FILE__) . '/../pages/upload/';
            move_uploaded_file($imageTmp, $imageLink . $avatarName);

        }else {

            $avatarName = $_POST['old_image'];
           

        }

         /* print_r($title);
         print_r($body);
         print_r($avatarName);
         print_r($price);
         print_r($categoryId);
         print_r($courseId);
        die(); */
     
        
        $course = $cont->prepare("UPDATE courses SET title=?, price=?, body=?, image=?, category_id =? WHERE id=?");
     
       /*  print_r($title) ;
        echo '<br>';
         print_r($body) ;
         echo '<br>';
         print_r($avatarName);
         echo '<br>';
         print_r($price);
         echo '<br>';
         print_r($categoryId);
         echo '<br>';
        print_r($courseId);
        
        die(); */

        if($course->execute([$title, $price, $body, $avatarName, $categoryId, $courseId])){
            
            session_start();
            $_SESSION['message'] = 'Course Was Updated';
            header('location:../../admin/pages/forms/update-course.php?id=' . $courseId);
      
            die();
        }

        $_SESSION['error'] = 'Some Errors';
        header('location:../../admin/pages/forms/update-course.php?id=' . $courseId);


    }




    public static function getCategoryCourses($id){

        global $cont;
        $courses = $cont->prepare("SELECT * FROM courses WHERE category_id = ?");
        $courses->execute([$id]);
        return $courses;
    }

    
}

if (isset($_POST['add-submit'])) {
    courses::addCourse();
}

if (isset($_POST['delete_submit'])) {
    courses::deleteCourse();
}


if (isset($_POST['update_submit'])) {
    courses::updateCourse();
}