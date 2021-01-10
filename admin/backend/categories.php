<?php 

include 'dbcont.php';

class categories{



    /**
     * get category name
     * insert nto categories
     * session with message
     * header location
     */

    public static function addCategory(){
      
        global $cont;
      
        $name = $_POST['name'];

       

        $category = $cont->prepare("INSERT INTO categories (name) VALUES(?)");
        $category->execute([$name]);
        session_start();
        $_SESSION['message'] = "Category was created";

        header("location:../pages/forms/add-category.php");
    
    }


    /**
     * get categories
     * return bool
     */

    public static function getCategories(){
        
        global $cont;
        
        $categories = $cont->prepare("SELECT * FROM categories");
        $categories->execute();
        return $categories;
    }



    /**
     * get category id
     * get script valuescheck f user is real or script
     * delete category
     * session with message
     * header location
     */

     public static function deleteCategory(){

         global $cont;

        $scriptData = $_POST['script'];

         if (!empty($scriptData)) {
            session_start();
            $_SESSION['message'] = "Not Allowed";
            header("location:../pages/tables/categories.php");

         }
         else{
             
            $categoryId = $_POST['category_id'];
            $category = $cont->prepare("DELETE FROM categories WHERE id = ? ");
            $category->execute([$categoryId]);
            session_start();
            $_SESSION['message'] = "Category was Deleted";
            header("location:../pages/tables/categories.php");

         }

     }
    
}



if(isset($_POST['submit'])){
    categories:: addCategory();
}

if(isset($_POST['delete_submit'])){
    categories:: deleteCategory();
}

