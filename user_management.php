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
      <h1>Users list</h1>
      
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      <div class="col-lg-12">
        <a href="add_user.php">
          <button type="button" class="btn btn-primary" style="float:right;margin:20px;">Add User</button></a>
        </div>
      </div>
      <div class="row">
        
        <div class="col-lg-12">
        
          <div class="card">
            <div class="card-body">
             
                Add User
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">FirstName</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Favourite Colour</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Password</th>
                    <th>Role</th>
                    <th scope="col">Datetime</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>

<?php 
$s=1;
$sql="SELECT * FROM users WHERE is_exist='1'";
//echo $sql;
$res = mysqli_query($db,$sql);
while ($row = mysqli_fetch_assoc($res)){ 
$gender = $row['gender'];

?>
<tr>
<td><?php echo $s; ?></td>
<td><?php echo $row['first_name']; ?></td>
<td><?php echo $row['last_name']; ?></td>


<td><?php echo $row['email_id']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['fav_colors']; ?></td>
<td><?php echo $row['user_name']; ?></td>
<td><?php echo $row['password']; ?></td>
<td><?php if($row['role']=='1'){echo 'Admin';} else{echo 'User';}?></td>
<td><?php echo date("d M Y h:i A",strtotime($row['datetime'])); ?></td>

<td><a href="edit_user.php?user_id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
<td><a  onclick="return confirm('Are you sure you want to delete user?');" href="user_delete.php?user_id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger">Delete</button></a></td>

</tr>

<?php $s++;} ?>
</tbody>
              </table>
              <!-- End Table with stripped rows -->

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