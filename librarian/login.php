<?php
session_start();
ob_start();
include '../dbcon.php';
if(isset($_SESSION['librarian_id'] )){
header('Location: index.php');
}



?>
 
 <?php







     if(isset($_POST['signin'])){
        if (isset($_POST['checked'])) { 

            $email           =$_POST['email'];
             
            $password        =$_POST['password'];

           $email_check = mysqli_query($db,"SELECT * FROM librarian WHERE email = '$email' OR username = '$email'");
            
   
            if(mysqli_num_rows($email_check) > 0){
                   $row = mysqli_fetch_assoc($email_check);
                    
                    if( password_verify($password, $row['password']) ){
                        $_SESSION['librarian_id'] = $row['id'];
                            header("Location:index.php ");

                   }else{
                         $password_error="Wrong Password";
                   }
            }else{
                $email_error="Wrong email or username id";
    }


            }else{
 $errors=  '<div class="alert alert-danger mt-3" role="alert">
  Please, check me out!
</div> ';
}

   }          



?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">


 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
     
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
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
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>
        </div>
       <div class="box">
           <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($status_error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$status_error.'</p>';}?> 
            </div>   
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email or Username" autocomplete="off" value="<?php if(isset($email)){echo $email;}?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" name="password" class="form-control"   placeholder="Password"  autocomplete="off" id="myInput">
                                <i class="fa fa-key"></i>
                            </span>
                             <span class="error"><?php if(isset($password_error)){echo $password_error;}?></span>
                            <br>
                            
                            <input style="height: 12px;
                            width: 21px;"class="check" type="checkbox" onclick="myFunction()"><span style=" font-size: 14px;
                               margin-left: 15px;
                            color: #2828fd;" >
                                                        
                            </style>Show Password
                         </span>    
                           <br>
                    
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" name="checked">
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                            <?php if(isset($errors)){echo $errors;}?>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="signin" value="Sign In" class="form-control btn-primary" >
                        </div>
                        <div class="form-group text-center">
                            <a href=" forgot_password.php">Forgot password?</a>
                            <!-- <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-block mt-sm">Register</a> -->
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
<!-- ========================================================= -->
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
</body>

 
</html>
<?php
ob_end_flush();



?>