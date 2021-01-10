<?php
    include 'Assets/navbar.php';
    include "admin//backend/courses.php";

    $id = $_GET['category_id'];
   
    $courses = courses::getCategoryCourses($id);

    

?>


<div class="category">
    <div class="container">
        <h3>Category Course</h3>
        <div class="row">
        

      
        <?php


            $imagePath = "admin/pages/upload/";

            $counter = 0;
            while ($row = $courses->fetch()) {
                $counter++;
        ?>

            <div class="course col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $imagePath . $row['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['title']; ?></h5>
                        <p class="card-text"><?= substr($row['body'], 0, 50); ?></p>
                    </div>
                    <div class="card-body">
                    <a  href="course-details.php?course_id=<?= $row['id'] ?>" type="button" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>

            <?php } 

                if ($counter == 0) { ?>
                    <div class="alert alert-primary" role="alert">
                        No Courses Found
                    </div>
                <?php } ?>
            
            

        </div>
    </div>
</div>




<?php
    include 'Assets/footer.php';
?>
