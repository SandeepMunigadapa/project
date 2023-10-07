<!DOCTYPE html>
<html lang="en">
<?php include('session.php');?>
<?php include('dbconfig.php');?>
<?php include('head.php');?>

<body>

  <!-- ======= Header ======= -->
  <?php include('header.php');?>   

  <?php include('sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
            <h1>Welcome <?php echo $_SESSION['user_name'];?></h1>
              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
</body>

</html>