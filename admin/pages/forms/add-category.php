<?php

    session_start(); 
    include 'Assets/navbar.php';
?>
    <!-- Main content -->
    <section class="content">
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
                <h3 class="card-title">Add Category</h3>
          </div>

         

            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="../../backend/categories.php">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Category">
                </div>

              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>


          



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