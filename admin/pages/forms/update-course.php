<?php
    session_start();
    include 'Assets/navbar.php';
    include "../../backend/courses.php";

    $id = $_GET['id'];

    $courseData = courses::getCourseData($id);
   
   
?>
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">



        <?php if (isset($_SESSION['message'])) { ?>
              
              <div class="alert alert-success" role="alert">
                  <?= $_SESSION['message'] ?>
              </div>
             
             <?php session_unset();} ?>


             
             <?php if(!empty($_SESSION['error'])){ ?>
              
              <div class="alert alert-danger" role="alert">
                  <?= $_SESSION['error']; ?>
              </div>
             
        <?php 
        
            session_unset();
        
        } 
        ?>





          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Course</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  method="post" action="../../backend/courses.php" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="title">Course Title</label>
                  <input name="title" type="text" class="form-control" id="title" value="<?= $courseData->title ?>">
                </div>

                <div class="form-group">
                  <label for="price">Course Price</label>
                  <input name="price" type="text" class="form-control" id="price" value="<?= $courseData->price ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>

                  </div>
                </div>


              




                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Body</span>
                  </div>
                  <textarea class="form-control" name="body" aria-label="With textarea"><?= $courseData->body ?></textarea>
                </div>


              
                <br>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                      </div>
                      <select name="category_id" class="custom-select" id="inputGroupSelect01">
                        <option value="<?= $courseData->category_id ?>" selected><?= $courseData->name ?></option>
                        
                       <?php
                     
                          include '../../backend/categories.php';
                          $categories = categories::getCategories();
                          while ($row = $categories->fetch()) { 
                            
                            if($row['name'] != $courseData->name){

                            
                            ?>
                             
                              <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                             

                          <?php } 
                          }
                          
                          ?>
                        
                      </select>

                      <input type="hidden" name="script" >
                      <input type="hidden" name="old_image"  value="<?= $courseData->image; ?>">
                    
                     
                      <input type="hidden" name="course_id"  value="<?= $courseData->id; ?>">




                    </div>



<!--                  <div class="card-footer">-->
<!--                    Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.-->
<!--                  </div>-->

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="update_submit" class="btn btn-primary">Submit</button>
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