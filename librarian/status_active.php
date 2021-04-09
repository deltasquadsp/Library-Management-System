<?php
  ob_start();
  
 include '../dbcon.php';
  $id=base64_decode($_GET['id']);


  $sets="UPDATE students SET status=0 WHERE id = '$id'";
        
        $update=mysqli_query($db,$sets);

header("Location:students.php");

 ?>

 <?php

ob_end_flush();
 ?>


