<?php
  

  include '../dbcon.php';
  include 'header.php';
   $user=$_SESSION['student_id'];
   
  
 ?>
 <?php 
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
    
     $userData=mysqli_fetch_assoc($user_name);
     $fullname=$userData['fname'].' '.$userData['lname'];

     $u_name= $userData['username'];
      
     
     
     ?>
 
<?php

$POST=filter_var_array($_POST, FILTER_SANITIZE_STRING);
$POST1=filter_var_array($_POST, FILTER_SANITIZE_NUMBER_INT);



if(isset($_POST['starRate'])){
  $starRate=mysqli_real_escape_string($db,$_POST['starRate']);
  $rateMsg=mysqli_real_escape_string($db,$_POST['rateMsg']);
  $date=mysqli_real_escape_string($db,$_POST['date']);
  $name=mysqli_real_escape_string($db,$_POST['name']);


  $sql = $db->prepare("SELECT * FROM rate WHERE userName=?");
  $sql->bind_param("s", $name);
  $sql->execute();
  $res= $sql->get_result();
  $rst=$res->fetch_assoc();
  $val=$rst["userName"];
    $querys=mysqli_query($db,"SELECT * FROM rate WHERE userName ='$name'");
                                if(mysqli_num_rows($querys)==0){

  if($fullname==$name){
   if(!$val){
  	$stmt=$db->prepare("INSERT INTO rate(userName,userReview,userMessage,dateReviewed)VALUES(?,?,?,?)");
  	$stmt->bind_param("ssss",$name,$starRate,$rateMsg,$date);
  	$stmt->execute();
  	echo "Insert Successfully!";
  }else{
  	$stmt=$db->prepare("UPDATE rate SET userName=?,userReview=?,userMessage=?,dateReviewed=? WHERE userName=?");
  	$stmt->bind_param("sssss",$name,$starRate,$rateMsg,$date,$name);
  	$stmt->execute();
  	echo "Update Successfully!";
  }
}else{

}
}else{
	$suberror= "You already Submit!";
}
 
}
 
  
 


?>
