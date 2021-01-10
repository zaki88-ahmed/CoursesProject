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




          <?php if (isset($_SESSION['message'])) { ?>
              
              <div class="alert alert-success" role="alert">
                  <?= $_SESSION['message'] ?>
              </div>
             
             <?php session_unset();} ?>


             
             <?php if(! empty($_SESSION['error'])){ ?>
              
              <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['error']; ?>
              </div>
             
            <?php 
        
            session_unset();
        
           } 
           ?>





            <div class="card-header">
           
              <h3 class="card-title">Add Course</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="../../backend/courses.php" enctype="multipart/form-data"> 
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Course Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                </div>

                <div class="form-group">
                  <label for="price">Course Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                  </div>
                </div>


                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Body</span>
                  </div>
                  <textarea class="form-control" name="body" aria-label="With textarea"></textarea>
                </div>


              
                <br>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select name="category_id" class="custom-select" id="inputGroupSelect01">
                       <?php
                          include '../../backend/categories.php';
                          $categories = categories::getCategories();
                          while ($row = $categories->fetch()) { ?>
                              # code...
                              <option value=<?= $row['id']; ?>><?= $row['name']; ?></option>

                          <?php }
                          ?>
                        
                      </select>

                      <input type="hidden" name="script" >


                    </div>



                
                

                      
           
<!--                  <div class="card-footer">-->
<!--                    Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.-->
<!--                  </div>-->

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="add-submit" class="btn btn-primary">Submit</button>
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

<?php include 'Assets/footer.php';
?>
