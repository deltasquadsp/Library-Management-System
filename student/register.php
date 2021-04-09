<?php
ob_start();
include '../dbcon.php';

 

?>
 
 <?php





     if(isset($_POST['register'])){
        if (isset($_POST['checked'])) {

            $fname           =$_POST['fname'];
            $lname           =$_POST['lname'];
            //$roll            =$_POST['roll'];
            //$reg             =$_POST['reg'];
            $email           =$_POST['email'];
            $username        =$_POST['username'];
            $password        =$_POST['password'];

            $cpassword=$_POST['cpassword'];
             $pass=password_hash($password, PASSWORD_DEFAULT); 

              
            
            $photo = explode('.',$_FILES['photo']['name']);
            $photo  = end($photo);
             $random=rand(0,100000);
       
              $photo_name = $random.$fname.'.'.$photo;

             if(!$fname ==""){
                if(!$lname ==""){
                    
                        if(!$email ==""){
                            if(!$username ==""){
                                $querys=mysqli_query($db,"SELECT * FROM students WHERE username ='$username'");
                                if(mysqli_num_rows($querys)==0){

                                if(strlen($password)>7){
                                    if(!$cpassword == ""){
                                        if($password == $cpassword){

                                            $query=mysqli_query($db,"SELECT * FROM students WHERE email ='$email'");
                                                 if(mysqli_num_rows($query)==0){
                                                   
                                                    

                                                                                           
                                                         if($photo==""){
                $result=mysqli_query($db,"INSERT INTO students (fname,lname,email,username,password) VALUES ('$fname','$lname','$email','$username','$pass')");
           $update_sucess="Register sucessfully";
                   
          
          }else{

            $result=mysqli_query($db,"INSERT INTO students (fname,lname,email,username,password,photo) VALUES ('$fname','$lname','$email','$username','$pass','$photo_name')");
              move_uploaded_file($_FILES['photo']['tmp_name'], '../images/user/'.$photo_name);
               $update_sucess="Register sucessfully";
                      
            }  
                                                 
                                                }else{
                                                      $email_exist= "This email already exist";
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
                                $usernames_error="This Username already exist";
                            }

                            }else{
                                $username_error="Username fild is required";
                            }

                        }else{
                          $email_error="Email fild is required";
                        }

                     
                    }else{
                        $lname_error= "Last name fild is required";
                    }

                    }else{
                        $fname_error= "First name fild is required";
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
            <h3 class="text-center">LMS</h3>
        </div>
        <div class="box">
             <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($update_sucess)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$update_sucess.'</p>';}?> 
            </div>
           <!--  <div class="col-sm-12 offset-sm-6">
                 <?php //if(isset($success)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$success.'</p>';}?> 
            </div>
            <div class="col-sm-12 offset-sm-6">
                 <?php//if(isset($error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$error.'</p>';}?> 
            </div> -->
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  name="fname" placeholder="First Name"autocomplete="off">
                                <i class="fa fa-user"></i>

                            </span>
                            <span class="error"><?php if(isset($fname_error)){echo $fname_error;}?></span>
                        </div>
                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="text" class="form-control"  name="lname" placeholder="Last Name"autocomplete="off">
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="error"><?php if(isset($lname_error)){echo $lname_error;}?></span>
                        </div>
                         <!-- <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="text" class="form-control"  name="roll" placeholder="Enter Your Roll"autocomplete="off">
                                  
                                <i class="fas fa-sort-numeric-up-alt"></i>
                            </span>
                            <span class="error"><?php //if(isset($roll_error)){echo $roll_error;}?></span>
                        </div>

                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="text" class="form-control"  name="reg" placeholder="Enter Your Registation"autocomplete="off">
                                <i class="far fa-registered"></i>
                            </span>
                            <span class="error"><?php //if(isset($registation_error)){echo $registation_error;}?></span>
                        </div>
 -->

                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="email" class="form-control"  name="email" placeholder="Enter Your Email"autocomplete="off">
                                <i class="fas fa-envelope-open-text"></i>
                            </span>
                            <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                            <span class="error"><?php if(isset($email_exist)){echo $email_exist;}?></span>
                        </div>
                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="text" class="form-control"  name="username" placeholder="Enter Your Username "autocomplete="off">
                               <i class="fas fa-users"></i>
                            </span>
                            <span class="error"><?php if(isset($username_error)){echo $username_error;}?></span>
                            <span class="error"><?php if(isset($usernames_error)){echo $usernames_error;}?></span>
                        </div>
                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="password" class="form-control"  name="password" placeholder="Enter Your password "autocomplete="off">
                                <i class="fas fa-key"></i>
                            </span>
                            <span class="error"><?php if(isset($rpasseord_error)){echo $rpasseord_error;}?></span>
                        </div>
                        <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="password" class="form-control"  name="cpassword" placeholder="Confirm password "autocomplete="off">
                                <i class="fas fa-key"></i>
                            </span>
                            <span class="error"><?php if(isset($confirm_password_error)){echo $confirm_password_error;}?></span>
                            <span class="error"><?php if(isset($confirms_password_error)){echo $confirms_password_error;}?></span>

                        </div>
                       <!--  <div class="form-group mt-md">
                           <span class="input-with-icon">
                                <input type="text" class="form-control"  name="phone" placeholder="Enter Your Phone " autocomplete="off">
                                <i class="fas fa-phone"></i>
                            </span>
                              
                        </div>--->
                        <div class="form-group mt-md ">
                            <span class="input-with-icon">
                            <input type="file" class="form-control"  name="photo" >               
                            <i class="fas fa-id-badge"></i>    
                        </div> 
                                
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="terms" value="option1" name="checked">
                                <label class="check" for="terms">I agree </label>  to the <a href="#">Terms and Conditions</a>
                            </div>
                            <?php if(isset($errors)){echo $errors;}?>
                             
                        </div>
                       <div class="form-group">
                            <input type="submit" name="register" value="Register" class="form-control btn-primary" >
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="signin.php">Sign In</a>
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
 <script src="../assets/javascripts/fontawesome.js"></script>
 
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


 </html>
<?php
ob_end_flush();


?>