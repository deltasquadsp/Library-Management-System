 <?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
 $user=$_SESSION['student_id'];
   
 ?>
   
 

 
<?php 
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
    
     $userData=mysqli_fetch_assoc($user_name);

     $u_name= $userData['username'];
     $ssid= $userData['sid'];
     
     
     ?>
     

  <?php

  $query="SELECT * FROM students ";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc( $all_users) ){
          $id=$row['id'];
          $fname=$row['fname'];
          $lname=$row['lname'];
           $username=$row['username'];
          $email=$row['email'];
          $sid=$row['sid'];

           
      }

 

?>

 


<?php
    
   
    
      if(isset($_POST['submit'])){
        
        $set="UPDATE students SET sid=1 WHERE username = '$u_name'";
        
        $update=mysqli_query($db,$set);
 
      }

 
?>








 <?php



  $errors='';
 
     if($sub=isset($_POST['submit'])){
     
        if (isset($_POST['checked'])){

            $fullname           =$_POST['fullname'];
            $username           =$_POST['username'];
            $email            =$_POST['email'];
            $faname             =$_POST['faname'];
             
            $mname        =$_POST['mname'];

            $roll             =$_POST['roll'];
            $reg           =$_POST['reg'];
            $department        =$_POST['department'];            
             
            $phone           =$_POST['phone'];

            $address           =$_POST['address'];
            $plink           =$_POST['plink'];

           // $photo = explode('.',$_FILES['photo']['name']);
           // $photo  = end($photo);
            // $random=rand(0,100000);
       
             // $photo_name = $random.$username.'.'.$photo;
              
              
             if(!$fullname ==""){
                if(!$username ==""){
                     $querys=mysqli_query($db,"SELECT * FROM stuinfo WHERE username ='$username'");
                      if(mysqli_num_rows($querys)==0){
                   if(!$email ==""){
                    $query=mysqli_query($db,"SELECT * FROM stuinfo WHERE email ='$email'");
                        if(mysqli_num_rows($query)==0){  
                    if(!$faname ==""){
                      if(!$mname ==""){
                 

                   if(!$roll ==""){
                    if(strlen($reg)>7){
                
                            if(!$department ==""){ 
                                if(!$phone ==""){ 
                                     if(!$address ==""){ 
                                        if(!$plink ==""){ 
                               
            
       
           $result=mysqli_query($db,"INSERT INTO stuinfo (name,username,email,faname,mname,roll,reg,department,phone,address,flink) VALUES ('$fullname','$username','$email','$faname','$mname','$roll','$reg','$department','$phone','$address','$plink')");
           if($result){
            $success="Data insert successfully";
           }else
           {
            $e_error="Data not insert!";
           }


 
          //   if($photo==""){
          //       $result=mysqli_query($db,"INSERT INTO stuinfo (name,username,email,faname,mname,roll,reg,department,phone,address,flink) VALUES ('$fullname','$username','$email','$faname','$mname','$roll','$reg','$department','$phone','$address','$plink')");
          
                   
          
          // }else{

          //   $result=mysqli_query($db,"INSERT INTO stuinfo (name,username,email,faname,mname,roll,reg,department,phone,address,flink,photo) VALUES ('$fullname','$username','$email','$faname','$mname','$roll','$reg','$department','$phone','$address','$plink','$photo_name')");
          //     move_uploaded_file($_FILES['photo']['tmp_name'], '../images/user/'.$photo_name);
                    //        if($result){
                    //     $success= "Data insert succesfully";
                    // }  else{
                    //     $error= "Data insert Error!";
                    // }   
            // } 
                                                         
                                                 
                              }else{
                                $plink_error="Protfolio Link fild is required";
                            }
                             }else{
                                $address_error="address fild is required";
                            }
   
                             }else{
                                $phone_error="Phone fild is required";
                            }

                
                            }else{
                                $department_error="Department fild is required";
                            }

                
                     }else{
                        $registation_error= "Registation must be 8 character"; 
                    }
                   }else{
                    $roll_error="Roll fild is required";
                   }
                        }else{
                        $mname_error= "Mother's name fild is required";
                    }

                    }else{
                        $faname_error= "Father's name fild is required";
                    }
                    }else{
                         $email_exist= "This email already exist";
                            }

                        }else{
                          $email_error="Email fild is required";
                        }
                           }else{
                                $usernames_exist="This Username already exist";
                            }


                    }else{
                        $uname_error= "Last name fild is required";
                    }

                    }else{
                        $name_error= "Fullname fild is required";
                    }
                      
            
 
            }else{
 $errors=  '<div class="alert alert-danger mt-3" role="alert">
  Please, check me out!
</div> ';
}
 

   }          


?>





<!--  -->
 
<!-- ========================================================= -->
 
    <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="insert_info.php">Insert Info</a></li>
                        </ul>
                        <ul>
                            
                        </ul>
                    </div>
                </div>

<div class="card card-primary card-outline ">
              <div class="card-header">
                 <h5 class="m-0 text-center" style="    border-bottom: 2px solid #41f535;
                            font-size: 20px;
                            font-weight: 600;
                        }">Personal Information</h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body">
             <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname"  autocomplete="off" placeholder="Enter your full name"   name="fullname" value="<?php echo $userData['fname'].' '.$userData['lname'];?>" readonly> 
                  </div>
                  <span class="error"><?php if(isset($name_error)){echo $name_error;}?></span>


          <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" autocomplete="off"   placeholder="Your username"name="username"      value="<?php echo $userData['username'];?> " readonly> 
                  </div>
                   <span class="error"><?php if(isset($uname_error)){echo $uname_error;}?></span>
                   <span class="error"><?php if(isset($usernames_exist)){echo $usernames_exist;}?></span>

          <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"    autocomplete="off"   placeholder="Your email id" name="email" value="<?php echo $userData['email'];?>" readonly> 
                  </div>
                  <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                  <span class="error"><?php if(isset($email_exist)){echo $email_exist;}?></span>
                    <div class="form-group">
                    <label for="fname">Father's Name</label>
                    <input type="text" class="form-control" id="faname" autocomplete="off" placeholder="Father's Name" name="faname">
                  </div>
                  <span class="error"><?php if(isset($faname_error)){echo $faname_error;}?></span>
                  <div class="form-group">
                    <label for="fname">Mother's Name</label>
                    <input type="text" class="form-control" id="fname" autocomplete="off" placeholder="Father's Name" name="mname">
                  </div>
                  <span class="error"><?php if(isset($mname_error)){echo $mname_error;}?></span>




                  <div class="form-group">
                    <label for="roll">Roll or ID</label>
                    <input type="number" class="form-control" id="roll" autocomplete="off" placeholder="Enter Your roll" name="roll">
                  </div>
                  <span class="error"><?php if(isset($roll_error)){echo $roll_error;}?></span>
                  <div class="form-group">
                    <label for="roll">Registation Number:</label>
                    <input type="text" class="form-control" id="reg" autocomplete="off" placeholder="Enter Your registation" name="reg">
                  </div>
                   <span class="error"><?php if(isset($registation_error)){echo $registation_error;}?></span>

                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
            <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" autocomplete="off" placeholder="Department Name" name="department">
                  </div>
                  <span class="error"><?php if(isset($department_error)){echo $department_error;}?></span>
 
            <div class="form-group"> 
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone"autocomplete="off"  placeholder="Phone Number" name="phone">
            </div>
            <span class="error"><?php if(isset($phone_error)){echo $phone_error;}?></span>
 

             <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address"autocomplete="off"  placeholder="Address" name="address">
                  </div>
       <span class="error"><?php if(isset($address_error)){echo $address_error;}?></span>

                  <div class="form-group">
                    <label for="protfolio_link">Protfolio Link</label>
                    <input type="url" class="form-control" id="plink" autocomplete="off" placeholder="Protfolio Link" name="plink">
                  </div>
 
                    <span class="error"><?php if(isset($plink_error)){echo $plink_error;}?></span>
                 <!--  <div class="form-group">
                    <label for="exampleInputFile">Upload a profile image</label>
                    
                        <input type="file" class="form-control"  name="photo" > 
                    
                       
                    </div> -->
                
                  <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div>
         
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" 

                 <?php

                 if($ssid==1){
                  echo 'disabled';
                }else{
                  
               }

                 ?>

                  name="submit">Submit</button>
                </div>
                <?php echo  $errors;?>
                 <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($success)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$success.'</p>';}?> 
            </div>  
            <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($e_error)){echo '<p class="alert alert-danger" role="alert col-sm-4 offset-sm-3">'.$e_error.'</p>';}?> 
            </div>



 
            
         </div>            
                   
        </div>
    

                    

               
        </form> 
    </div>


    </div>


     
<?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>
