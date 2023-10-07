<!DOCTYPE html>

<?php
include('dbconfig.php');
if(isset($_POST['login']))
{
	
	extract($_POST);
	$sql ="SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
	//echo $sql;
	$res = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
	$name = $row['user_name'];
	$role = $row['role'];
	$count = mysqli_num_rows($res);

	if($count==1)
	{
session_start();
$_SESSION['user_name']=$name;
$_SESSION['role']=$role;
if($role==1){
  
  header("location:user_management.php");
}
else{
  header("location:thanks.php");
}
       
		
		
		}
	
	else {
		echo "<script>alert('Please Enter Correct Cerdentials')</script>";
	}
	
	
          } 

?>
<html lang="en">

<?php include('head.php');?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

             

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3" method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group">
                        
                        <input type="text" name="user_name" class="form-control" id="yourUsername" placeholder="User Name" required>
                        
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" placeholder="Password" required>
                      
                    </div>

                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('footer.php');?>

</body>

</html>