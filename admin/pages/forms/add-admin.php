<?php

    session_start(); 
    include 'Assets/navbar.php';
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">

      <div class="container">
        <div class="row">

        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">

              <?php if(isset($_SESSION['message'])){ ?>
              
               <div class="alert alert-success" role="alert">
                   <?= $_SESSION['message']; ?>
               </div>
              
              <?php 
              
               session_unset();
              
               } 
              ?>
           <?php if(isset($_SESSION['message'])){ ?>

            <div class="alert alert-success" role="alert">
                <?= $_SESSION['message']; ?>
            </div>

          <?php 

            session_unset();
        
            } 
          ?>

              <div class="card-header">
                <h3 class="card-title">Add Admin</h3>
          </div>

         

            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="../../backend/admins.php">

                <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Admin Name">
                </div>

                <div class="form-group">
                    <label for="name">Admin Email</label>
                    <input type="text" name="email" class="form-control" id="name" placeholder="Enter Admin Email">
                </div>

                <div class="form-group">
                    <label for="name">Admin Password</label>
                    <input type="password" name="password" class="form-control" id="name" placeholder="Enter Admin Password">
                </div>



              <div class="card-footer">
                <button type="submit" name="add-submit" class="btn btn-primary">Submit</button>
              </div>
            </form>


          



          </div>

        </div>

        </div>
        </div>
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include 'Assets/footer.php';
?>