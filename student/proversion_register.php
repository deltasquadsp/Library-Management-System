<?php
ob_start();
 include 'header.php';
 include '../dbcon.php';
 $user=$_SESSION['student_id'];
 ?>
 <?php 
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
    
     $userData=mysqli_fetch_assoc($user_name);
     $f_name= $userData['fname'];
     $l_name= $userData['lname'];
     $u_name= $userData['username'];
     $em= $userData['email'];
      $oids= $userData['oids'];
        
       
     
     
     ?>
<?php

  $query="SELECT * FROM stuinfo WHERE email='$em'";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc( $all_users) ){
          $id=$row['id'];
          // $fname=$row['fname'];
          // $lname=$row['lname'];
           $username=$row['username'];
          $email=$row['email'];
          $phone=$row['phone'];
          $roll=$row['roll'];
          $reg=$row['reg'];
          $dep=$row['department'];
          
          

           
      }

 

?>

<?php
    
   
    $otp=$l_name.rand(0,1000000);

      if(isset($_POST['submit'])){
        
       $set="UPDATE students SET otp='$otp' WHERE username = '$u_name'";
        
        $update=mysqli_query($db,$set);
 
      }

 
?>
<?php
    
   
    
      if(isset($_POST['submit'])){
        
        $set="UPDATE students SET oids=1 WHERE username = '$u_name'";
        
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
            $phone             =$_POST['phone'];
             
            $bnumber        =$_POST['bnumber'];

            $btnumber             =$_POST['btnumber'];
            $pmethod=$_POST['pmethod'];
            $method=$_POST['method'];
             
            $roll        =$_POST['roll'];            
             
            $reg           =$_POST['reg'];

            $department           =$_POST['department'];
             
 
              
              
             if(!$fullname ==""){
                // if(!$username ==""){
                //      $querys=mysqli_query($db,"SELECT * FROM stuinfo WHERE username ='$u_name'");
                //       if(mysqli_num_rows($querys)==0){
                //    if(!$email ==""){
                //     $query=mysqli_query($db,"SELECT * FROM stuinfo WHERE email ='$em'");
                //         if(mysqli_num_rows($query)==0){  
                    if(!$phone ==""){
                      if(!$bnumber ==""){
                 

                  
                               
            
       
           $result=mysqli_query($db,"INSERT INTO bkashonlinebook (fullname,username,email,phone,pmethod,bnumber,btrx,bmethod,roll,reg,dep) VALUES ('$fullname','$username','$email','$phone','$pmethod','$bnumber','$btnumber','$method','$roll','$reg','$department')");
           
           if($result){
            header("Location:register_online_book.php");
            $success="Data insert successfully please wait for admin message!";
           }else
           {
            $e_error="Data not insert!";
           }


  
                                                         
                               
                    }else{
                       $bkash_error= "Bkash Number fild is required";
                    }
                    // }else{
                    //      $email_exist= "This email already exist";
                    //         }

                    //     }else{
                    //       $email_error="Email fild is required";
                    //     }
                    //        }else{
                    //             $usernames_exist="This Username already exist";
                    //         }


                    // }else{
                    //     $uname_error= "Username fild is required";
                    // }

                    }else{
                        $name_error= "Fullname fild is required";
                    }
                      
            
 
            }else{
 $errors=  '<div class="alert alert-danger mt-3" role="alert">
  Please, check me out!
</div> ';
}
 

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

<div class="card card-primary card-outline ">
              <div class="card-header">
                 <h5 class="m-0 text-center" style="    border-bottom: 2px solid #41f535;
                            font-size: 20px;
                            font-weight: 600;
                        }">Payment Information</h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body">
             <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname"  autocomplete="off" placeholder="Enter your full name"   name="fullname" value="<?php echo $f_name.' '.$l_name;?>"  readonly> 
                  </div>
                   <span class="error"><?php if(isset($name_error)){echo $name_error;}?></span>

          <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" autocomplete="off"   placeholder="Your username"name="username"  value="<?php echo $u_name;?>"  readonly > 
                  </div>
                    
          <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"    autocomplete="off"   placeholder="Your email id" name="email" value="<?php echo $em;?>" readonly> 
                  </div>
                  
                   
                  <div class="form-group"> 
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone"autocomplete="off"  placeholder="Phone Number" name="phone" >
            </div>
            <span class="error"><?php if(isset($uname_error)){echo $uname_error;}?></span>
             
           <div class="form-group">
                  <label>Method</label>
                  <div class="form-inline">
                    <input type="radio" name="pmethod" value="2">
                    <label>&nbsp;<img style="height:50px"src="../image/bkash.png" alt=""></label>                    
                  </div>
                  <div class="form-inline">
                    <input type="radio" name="pmethod" value="1">
                    <label>&nbsp;<img style="height:50px; width: 86px;"src="../image/roket.jpg" alt=""></label>                    
                  </div>
                   <div class="form-inline">
                    <input type="radio" name="pmethod" value="0">
                    <label>&nbsp;<img style="height:50px"src="../image/nogod.png" alt=""></label>                    
                  </div>
                </div>

 



                   
 <div class="form-group">
                    <label for="bnumber">Bkash/Roket/Nogod Number <span style="color:red;">Send Money(550 Taka) :01860585081 <br>
                     <!--  <img style="height:50px"src="../image/bkash.png" alt=""><img style="height:50px"src="../image/roket.jpg" alt=""><img style="height:50px"src="../image/nogod.png" alt=""> --></span></label>
                    <input type="text" class="form-control" id="bnumber" autocomplete="off" placeholder="Your BKash/Roket/Nogod Number "name="bnumber">
                  </div>
                  <span class="error"><?php if(isset($bkash_error)){echo $bkash_error;}?></span>
                  

                 </div>
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
<div class="form-group">
                    <label for="btbnumbernumber"> BKash/Roket/Nogod Transaction ID (Trxid)</label>
                    <input type="text" class="form-control" id="btnumber" autocomplete="off" placeholder="Bkash Trx Number" name="btnumber">
                   
              </div> 
<div class="form-group">
                  <label>Bkash Method</label>
                  <div class="form-inline">
                    <input type="radio" name="method" value="1">
                    <label>&nbsp;Personal</label>                    
                  </div>
                  <div class="form-inline">
                    <input type="radio" name="method" value="0">
                    <label>&nbsp;Agent</label>                    
                  </div>
                </div>
                  
  
 




                  <div class="form-group">
                    <label for="roll">Roll or ID</label>
                    <input type="number" class="form-control" id="roll" autocomplete="off" placeholder="Enter Your roll" name="roll" >
                  </div>
                   
                  <div class="form-group">
                    <label for="roll">Registation Number:</label>
                    <input type="text" class="form-control" id="reg" autocomplete="off" placeholder="Enter Your registation" name="reg" >
                  </div>



            <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" autocomplete="off" placeholder="Department Name" name="department" >
                  </div>
                   
 
             
           
 

             
                     
                  <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div>
         
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" 
                   <?php

                 if($oids==1){
                  echo 'disabled';
                }else{
                  
               }

                 ?>
                 
                  name="submit">Submit</button>
                </div>
                <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($success)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$success.'</p>';}?> 
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





