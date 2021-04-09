<?php
  ob_start();
  
 include '../dbcon.php';
  $id=base64_decode($_GET['id']);


  $sets="UPDATE bkashonlinebook SET otpactive=0 WHERE id = '$id'";
        
        $update=mysqli_query($db,$sets);

header("Location:pro_user.php");

 ?>

 <?php

ob_end_flush();
 ?>


