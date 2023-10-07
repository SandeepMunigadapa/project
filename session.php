<?php
session_start();
$username = $_SESSION['user_name'];
if(!isset($username))
{
// not logged in
header('Location: index.php');
exit();
}
?>