
<?php
    include 'Assets/navbar.php';
?>

<!-- Start Slider Section -->

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">

        <?php 
        include "admin/backend/Sliders.php";
        $sliders = Sliders::getSliders();

        $imagePath = 'admin/pages/upload/';

        $count = 0;

        while ($row = $sliders->fetch()) {
        
            if($count == 0){
                $count++;
        ?>
        <div class="carousel-item active">
            <img src="<?= $imagePath . $row['image']; ?>" class="d-block w-100" alt="..." height="500px">
        </div>

        <?php } else{?>

            <div class="carousel-item">
            <img src="<?= $imagePath . $row['image']; ?>" class="d-block w-100" alt="..." height="500px">
            </div>
        <?php 
            }
        } ?>
        

    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- End Slider Section -->

<!-- Start New Courses -->
<div class="new-courses">
    <div class="container">
        <h3> New Courses </h3>

        <div class="row">
           

           <?php 
           
           include "admin/backend/UserHome.php";
           $newCourses = UserHome::newCourses();

           while ($row = $newCourses->fetch()) {
            
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


            <?php } ?>
        </div>
    </div>

</div>



<?php
include 'Assets/footer.php';
?>

