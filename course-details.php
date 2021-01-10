
<?php

    session_start();
    include 'Assets/navbar.php';
    include 'admin/backend/courses.php';

    $id = $_GET['course_id'];
    $courseData = courses::getcourseData($id);

    $imagePath = "admin/pages/upload/";


?>



<div class="course-details">
    <div class="container">
        <div class="row">



        <?php if(isset($_SESSION['message'])){ ?>
              
              <div class="alert alert-success col-md-3" role="alert">
                  <?= $_SESSION['message']; ?>
              </div>
             
             <?php 
             
              session_unset();
             
              } 
             ?>
          <?php if(isset($_SESSION['error'])){ ?>

           <div  class="alert alert-success col-md-3" role="alert">
               <?= $_SESSION['error']; ?>
           </div>

         <?php 

           session_unset();
       
           } 
         ?>




            <div class="col-md-6 image">
                <img src="<?= $imagePath . $courseData->image; ?>" class="card-img-top" alt="...">
            </div>

            <div class="col-md-6">
                <h4><?= $courseData->title; ?></h4>
                <p><?= $courseData->body; ?></p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">

        <div class="col-md-12">




        <form class="needs-validation" novalidate method="POST" action="admin/backend/requests.php">
              <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">Name</label>
                  <input type="text" name="name" class="form-control" id="validationTooltip01" placeholder="First name" required>
                  
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip02">Phone</label>
                  <input type="text" name="phone" class="form-control" id="validationTooltip02" placeholder="XX-XXXXXXXX" required>
                  
                </div>
                
                </div>
              </div>
              

              <input type="hidden" name="course_id" value="<?= $id; ?>">
                

                <div class="col-md-6 mb-3">
                  <label for="validationTooltipUsername">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                    </div>
                    <input type="mail" name="email" class="form-control" id="validationTooltipUsername" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
                    
                  </div>


              </div>
              <div class="col-md-12">
              <button class="btn btn-primary" name="add_submit" type="submit">Submit form</button>
              </div>
        </form>





        </div>
        

    </div>
    <br><br>

</div>




<?php
    include 'Assets/footer.php';
?>
