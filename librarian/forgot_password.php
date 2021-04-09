<?php
ob_start();
include '../dbcon.php';

 

?>


<?php

if(isset($_POST['Submit'])){

     $email           =$_POST['email'];
      $password        =$_POST['password'];
      $cpassword        =$_POST['cpassword'];
       $pass=password_hash($password, PASSWORD_DEFAULT); 
        $email_check= mysqli_query($db,"SELECT * FROM librarian WHERE email = '$email'");
         if(mysqli_num_rows($email_check) > 0){
            $row = mysqli_fetch_assoc($email_check);

                          if(strlen($password)>7){
                            if(!$cpassword == ""){
                                        if($password == $cpassword){
                                              

                                                $query1="UPDATE librarian SET password='$pass' WHERE email = '$email'";
                                                $query_run=mysqli_query($db,$query1);
                                                if($query_run){
                                                     $update_sucess="Password update sucessfully";
                                                }else{
                                                    $update_error="Password not update!";
                                                }


                                                


                                            }else{
                                            $confirms_password_error= "Password not match";
                                        }

                                    }else{
                                        $confirm_password_error= "Confirm Password fild is required";
                                    }



                             }else{
                                  $rpasseord_error= "Password must be 8 character"; 
                                }
         }else{
            $email_error="Wrong email or username id";
         }
   
}else{
    //not connect
}




?>


<!doctype html>
<html lang="en" class="fixed accounts forgot-password">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <script src="../assets/javascripts/fontawesome.js"></script>
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    <style >
        .error{
  color: red;
  font-style: italic;
   
  font-weight: bold;

}
        
    </style>
}
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body  animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h2 class="text-center">LMS</h2>
        </div>
        <div class="box">
             
            <!--FORGOT PASSWPRD FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($update_sucess)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$update_sucess.'</p>';}?> 
            </div>
            <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($update_error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$update_error.'</p>';}?>
             </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <h4 class="text-center">Forgot your password?</h4> 
                        <div class="form-group mt-md">
                                <span class="input-with-icon">
                                        <input type="text" class="form-control" id="email" placeholder="Email or Username"autocomplete="off" name="email" value="<?php if(isset($email)){echo $email;}?>">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                        </div>
                           <div class="form-group mt-md">
                                <span class="input-with-icon">
                                        <input type="password" class="form-control"   placeholder="New Password"autocomplete="off" name="password"    >
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <span class="error"><?php if(isset($rpasseord_error)){echo $rpasseord_error;}?></span>
                                    
                        </div>
                        <div class="form-group mt-md">
                                <span class="input-with-icon">
                                        <input type="password" class="form-control"  placeholder="Confirm Password"autocomplete="off" name="cpassword" id="myInput" >
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <span class="error"><?php if(isset($confirm_password_error)){echo $confirm_password_error;}?></span>
                                    <span class="error"><?php if(isset($confirms_password_error)){echo $confirms_password_error;}?></span>
                                    <span class="error"><?php if(isset($password_error)){echo $password_error;}?></span>
                                    <br>
                            
                            <input style="height: 12px;
                            width: 21px;"class="check" type="checkbox" onclick="myFunction()"><span style=" font-size: 14px;
                               margin-left: 15px;
                            color: #2828fd;" >
                                                        
                            </style>Show Password
                        </div>
                          
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block " name="Submit">Submit</button>
                        </div>
                        <div class="form-group text-center">
                            You remembered?, <a href="login.php">Sign in!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<script>
 
 function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}  
 

</script>
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>
<?php
ob_end_flush();


?>
