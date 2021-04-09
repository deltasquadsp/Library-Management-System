<?php
ob_start();
 include 'header.php';
 include '../dbcon.php';
  $user=$_SESSION['student_id'];
 ?>
  <?php 
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
    
     $userData=mysqli_fetch_assoc($user_name);
      
     $emi= $userData['email'];
      $otps= $userData['otp'];
      
     
     ?>
     <?php 

     $query="SELECT * FROM bkashonlinebook WHERE email='$emi'";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc( $all_users) ){
      
     $otpactive = $row['otpactive'];
  
        }

     
     ?>


<?php

if(isset($_POST['subin'])){
         

            $email           =$_POST['email'];
             
            $otp        =$_POST['otp'];

           $email_check = mysqli_query($db,"SELECT * FROM students WHERE email = '$emi'");
            
           
                          
                               if($otp==$otps){
                                if($otpactive==1){
                                    header("Location:online_books.php");
                                  }else{
                                    $status_error="Your status inactive wait for admin message!";
                                  }
                                 
                                
                                }else{
                                  $otp_error="Wrong Otp!";
                                }
                   


    
   

         

   } 


?>










 <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="register_online_book.php">Pro Version</a></li>
                        </ul>
                         
                    </div>
                </div>
               <div class="panel col-md-3">
               </div>
                <div class="panel col-md-6"style="margin-top:80px;">
                        <div class="panel-content">
                            <div class="row ">
                                <div class="col-md-12">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-md text-center">Get pro version</h5>
                                         <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($status_error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$status_error.'</p>';}?> 
            </div>
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $emi;?>">
                                        </div>
                                         
                                        <div class="form-group">
                                            <label for="password">OTP </label>
                                            <input type="password" class="form-control"   placeholder="OTP" id="myInput" name="otp"value="<?php echo $otps;?>">
                                            <span class="error"><?php if(isset($otp_error)){echo $otp_error;}?></span>
                                       <br>
                          
                                        <input style="height: 12px;
                            width: 21px;"class="check" type="checkbox" onclick="myFunction()"><span style=" font-size: 14px;
                               margin-left: 15px;
                            color: #2828fd;" >

                                                        
                            </style>Show Password </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="subin">Submit</button>
                                        </div>
                                        <div class="form-group text-center">
                             
                             <span>Don't have an account?</span>
                            <a href="proversion_register.php" class="btn btn-block mt-sm">Pro Version</a>
                        </div>
                                    </form>
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