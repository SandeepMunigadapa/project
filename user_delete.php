<?php include('session.php');?>
<?php include('dbconfig.php');?>
<?php include('head.php');
$user_id = $_GET['user_id'];

  date_default_timezone_set("Asia/Kolkata");
  extract($_POST);
  $datetime=date("Y-m-d H:i:s");
  
  //echo $sql;
  $sql1="UPDATE `users` SET `is_exist`='0' WHERE id='$user_id'";
  //echo $sql;exit();
  if (mysqli_query($db, $sql1)) {
      $last_id = mysqli_insert_id($db);
     
           
      echo "<script>alert('Successfully Deleted.')</script>";
      header("Refresh:0;url=user_management.php");

    }
  else {
    echo "<script>alert('Please Try Again')</script>";
  }



?>

