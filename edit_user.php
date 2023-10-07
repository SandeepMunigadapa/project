<!DOCTYPE html>
<html lang="en">
<?php include('session.php');?>
<?php include('dbconfig.php');?>
<?php include('head.php');
$user_id = $_GET['user_id'];


if(isset($_POST['update'])) {
  date_default_timezone_set("Asia/Kolkata");
  extract($_POST);
  $datetime=date("Y-m-d H:i:s");
  $u_fav_color = implode(',',$u_fav_colors);
  //echo $sql;
  $sql1="UPDATE `users` SET `first_name`='$u_first_name',`last_name`='$u_last_name',`email_id`='$u_email_id',`gender`='$u_gender',`fav_colors`='$u_fav_color',`user_name`='$u_user_name',`password`='$u_password' WHERE id='$user_id'";
  //echo $sql;exit();
  if (mysqli_query($db, $sql1)) {
      $last_id = mysqli_insert_id($db);
     
           
      echo "<script>alert('Successfully Updated Data.')</script>";
      header("Refresh:0;url=user_management.php");

    }
  else {
    echo "<script>alert('Please Try Again')</script>";
  }
  

  }


?>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php');?>   

  <?php include('sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Users</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <?php 
              $sql="SELECT * FROM users WHERE id='$user_id'";
              $res = mysqli_query($db,$sql);
              $row = mysqli_fetch_assoc($res);
              $color = $row['fav_colors'];
              $each_color = explode(',',$color);

             
              ?>

<h5 class="card-title">Edit User</h5>
              <form class="row g-3" method="post">
            <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group">
                  
                  <input type="text" placeholder="Enter User Name" value="<?php echo $row['user_name'];?>" name="u_user_name" class="form-control" id="yourUsername" required>
                  
                </div>
              </div>
              <div class="col-12">
                <label for="yourName" class="form-label">First Name</label>
                <input type="text" value="<?php echo $row['first_name'];?>" name="u_first_name" placeholder="Enter First Name"  class="form-control" id="yourName" required>
                
              </div>
              <div class="col-12">
                <label for="yourName" class="form-label">First Name</label>
                <input type="text" value="<?php echo $row['last_name'];?>" name="u_last_name" placeholder="Enter Last Name"  class="form-control" id="yourName" required>
                
              </div>
              <div class="col-12">
                <label for="yourEmail" class="form-label">Email Address</label>
                <input type="email" value="<?php echo $row['email_id'];?>" placeholder="Enter Your Email" name="u_email_id" class="form-control" id="yourEmail" required>
                
              </div>
                    
                      <div class="form-check">
                        <label for="yourEmail" class="form-label">Male</label>
                        <input class="form-check-input" type="radio" name="u_gender" value="Male" <?php if($row['gender']=='Male'){echo 'Checked';}?>>
                      
                      </div>
                      <div class="form-check">
                        <label for="yourEmail" class="form-label">Female</label>
                        <input class="form-check-input" type="radio" name="u_gender" value="Female" <?php if($row['gender']=='Female'){echo 'Checked';}?>>
                      
                      </div>




                            


                      <div class="row mb-3">
                      <legend class="col-form-label pt-0">Favourite Colours</legend>
                      <div class="col-sm-10">


                      <div class="form-check">

                      <label class="form-check-label">
                        Yellow
                        </label>
                        <input class="form-check-input" name="u_fav_colors[]"  
                       value="Yellow"
                          <?php if(in_array("Yellow",$each_color)){echo 'Checked';}?>
                        type="checkbox" id="gridCheck2" >
                       
                      </div>


                      <div class="form-check">

                      <label class="form-check-label">
                        Brown
                        </label>
                        <input class="form-check-input" name="u_fav_colors[]"  
                       value="Brown"
                          <?php if(in_array("Brown",$each_color)){echo 'Checked';}?>
                        type="checkbox" id="gridCheck2" >
                       
                      </div>


                      <div class="form-check">

<label class="form-check-label" for="gridCheck2">
Orange
  </label>
  <input class="form-check-input" name="u_fav_colors[]"  
 value="Orange"
    <?php if(in_array("Orange",$each_color)){echo 'Checked';}?>
  type="checkbox" id="gridCheck2" >
 
</div>



                      
                  </div>
                    
              <div class="col-12">
                <label for="yourPassword"  class="form-label">Password</label>
                <input type="password" value="<?php echo $row['password'];?>" placeholder="Enter Password" name="u_password" class="form-control" id="yourPassword" required>
                
              </div>
             
              
              <div class="col-3">
                <button class="btn btn-primary w-100" type="submit" name="update">Update</button>
              </div>
             
            </form>


            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('footer.php');?>

</body>

</html>