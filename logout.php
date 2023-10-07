<?php

   session_start();
   date_default_timezone_set("Asia/Kolkata");
          
   if(session_destroy()) {
      header("Location: index.php");
   }
?>