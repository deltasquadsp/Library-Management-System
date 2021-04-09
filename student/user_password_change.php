<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>

<?php
 
if(isset($_POST['Submit'])){

     $s_email           =$_POST['email'];
      $password        =$_POST['password'];
      $cpassword        =$_POST['cpassword'];
       $pass=password_hash($password, PASSWORD_DEFAULT); 
        $email_check= mysqli_query($db,"SELECT * FROM students WHERE email = '$s_email' ");
         if(mysqli_num_rows($email_check) > 0){
            $row = mysqli_fetch_assoc($email_check);

                          if(strlen($password)>7){
                            if(!$cpassword == ""){
                                        if($password == $cpassword){
                                              

                                                $query1="UPDATE students SET password='$pass' WHERE email = '$s_email'";
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
















<div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><a href="user_password_change.php">Password Change </a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3">
                </div>
                 

                <div class="col-sm-6 col-md-6 animated fadeInUp">


                    <div class="panel-content bg-scale-0">
                    <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($update_sucess)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$update_sucess.'</p>';}?> 
            </div>
            <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($update_error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$update_error.'</p>';}?>
             </div>
                    <!-- <h4 class="section-subtitle "><b>password</b> </h4> -->
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-md text-center">Password Change</h5>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" autocomplete="off">
                                            
                                        </div><span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password"autocomplete="off">
                                           
                                        </div> <span class="error"><?php if(isset($rpasseord_error)){echo $rpasseord_error;}?></span>
                                        <div class="form-group">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Confirm Password" name="cpassword"  autocomplete="off">

                                     
                                        </div>                                            <span class="error"><?php if(isset($confirm_password_error)){echo $confirm_password_error;}?></span>
                                    <span class="error"><?php if(isset($confirms_password_error)){echo $confirms_password_error;}?></span>
                                    <span class="error"><?php if(isset($password_error)){echo $password_error;}?></span>
                                    <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            

            </div>










 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>