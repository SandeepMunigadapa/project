<!DOCTYPE html>
<html lang="en">
<?php include('session.php');?>
<?php include('dbconfig.php');?>
<?php include('head.php');?>
<?php
if(isset($_POST['add'])) {
    date_default_timezone_set("Asia/Kolkata");
    extract($_POST);
    $datetime=date("Y-m-d H:i:s");
    $fav_color = implode(',',$fav_colors);
    $sql = "INSERT INTO users (`first_name`, `last_name`,`email_id`,`gender`,`fav_colors`,`user_name`,`password`,`role`,`datetime`)
    VALUES ('$first_name', '$last_name','$email_id','$gender','$fav_color','$user_name','$password','0','$datetime')";
    //echo $sql;
    
    if (mysqli_query($db, $sql)) {
        $last_id = mysqli_insert_id($db);
       
             
        echo "<script>alert('Successfully Added Data.')</script>";
        header("Refresh:0,URL=user_management.php");

      }
    else {
      echo "<script>alert('Please Try Again')</script>";
    }
    
    mysqli_close($db);
    }
    ?>
<body>

  <!-- ======= Header ======= -->
  <?php include('header.php');?>   

  <?php include('sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add User</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Add User</h5>
            <form class="row g-3" method="post">
            <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group">
                  
                  <input type="text" placeholder="Enter User Name" name="user_name" class="form-control" id="yourUsername" required>
                  
                </div>
              </div>
              <div class="col-12">
                <label for="yourName" class="form-label">First Name</label>
                <input type="text" name="first_name" placeholder="Enter First Name"  class="form-control" id="yourName" required>
                
              </div>
              <div class="col-12">
                <label for="yourName" class="form-label">First Name</label>
                <input type="text" name="last_name" placeholder="Enter Last Name"  class="form-control" id="yourName" required>
                
              </div>
              <div class="col-12">
                <label for="yourEmail" class="form-label">Email Address</label>
                <input type="email" placeholder="Enter Your Email" name="email_id" class="form-control" id="yourEmail" required>
                
              </div>
                    <div class="form-check">
                        <label for="yourEmail" class="form-label">Male</label>
                      <input class="form-check-input" type="radio" name="gender" value="Male">
                      
                    </div>
                    <div class="form-check">
                    <label for="yourEmail" class="form-label">Female</label>
                      <input class="form-check-input" type="radio" name="gender" value="Female">
                      
                    </div>
                    <div class="row mb-3">
                      <legend class="col-form-label pt-0">Favourite Colours</legend>
                      <div class="col-sm-10">

                      <div class="form-check">
                        <input class="form-check-input" name="fav_colors[]" type="checkbox"  value="Yellow" id="gridCheck1">
                        <label class="form-check-label" for="gridCheck1">
                        Yellow
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" name="fav_colors[]" value="Orange" 
                     
                        type="checkbox" id="gridCheck2" >
                        <label class="form-check-label" for="gridCheck2">
                         Orange
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="fav_colors[]" value="Brown"  type="checkbox" id="gridCheck2" >
                        <label class="form-check-label" for="gridCheck2">
                         Brown
                        </label>
                      </div>
                  </div>
                </div>
              <div class="col-12">
                <label for="yourPassword"  class="form-label">Password</label>
                <input type="password" placeholder="Enter Password" name="password" class="form-control" id="yourPassword" required>
                
              </div>
              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" placeholder="Enter Confirm Password"  name="password" class="form-control" id="yourPassword" required>
                
              </div>
              
              <div class="col-3">
                <button class="btn btn-primary w-100" type="submit" name="add">Submit</button>
              </div>
              
            </form>
            
              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
</body>

</html>