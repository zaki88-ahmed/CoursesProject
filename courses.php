<?php
    include 'Assets/navbar.php';
?>


<div class="category">
    <div class="container">
        <h3>Category Course</h3>
        <div class="row">


            <?php 
            
                include "admin/backend/courses.php";
                $courses = courses::getCourses();

                $imagepath = "admin/pages/upload/";

                while ($row = $courses->fetch()) {
               
            ?>

            <div class="course col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $imagepath . $row['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['title']; ?></h5>
                        <p class="card-text"><?= substr($row['body'], 0, 50); ?></p>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary">See More</button>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>




<?php
    include 'Assets/footer.php';
?>
