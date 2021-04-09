<?php
ob_start();
 include 'header.php';
 include '../dbcon.php';
 ?>


<?php 
      $user=$_SESSION['student_id'];
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
      
       $po= $userData['photo'];
       $un= $userData['username'];
        
      ?>
      <?php

  $query="SELECT * FROM stuinfo WHERE email = '$em'";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc($all_users) ){
           $e_mail=$row['email'];
          $mo=$row['phone'];
          $add=$row['address'];
          $link=$row['flink'];
          $dep=$row['department'];
          $roll=$row['roll'];
          $reg=$row['reg'];
          $faname=$row['faname'];
          $mname=$row['mname'];
          $jd=$row['datetime'];

          echo $faname;
          
      }



 
 ?>
<?php
if(isset($_POST['update'])){
     
      
     
    
    if(!$_FILES['newphoto']['name']==""){



	$newphoto=$_FILES['newphoto']['name'];
    $newphoto=explode('.',$_FILES['newphoto']['name']);
    $newphoto = end($newphoto);
    $random=rand(0,100000);
    unlink('../images/user/'.$po);
   
    $new_photo_name=$random.$un.'.'.$newphoto;
    
    	$upadte=mysqli_query($db,"UPDATE students SET photo='$new_photo_name'  WHERE email = '$em'");
 
      move_uploaded_file($_FILES['newphoto']['tmp_name'], '../images/user/'.$new_photo_name);	header("Location:profile.php");
    }else{
    	$upadte=mysqli_query($db,"UPDATE students SET photo='$po'  WHERE email = '$em'");

    }
}

?>


 
 

    <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="profile_update.php">Update Info</a></li>
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
                        }">Update Information</h5> 
                                        
              </div>
               <form   action="profile_update.php" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body">
             <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control" id="fullname"  autocomplete="off" placeholder="Enter your full name"name="fullname" disabled value="<?php echo  $fn.' '. $ln;?>" > 
                  </div>
                   
             
                   

          <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="username" autocomplete="off"   placeholder="Your username"name="username"   disabled   value="<?php echo $userData['username'];?> " > 
                  </div>
                    
          <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"   autocomplete="off"   placeholder="Your email id" name="email"  disabled value="<?php echo $userData['email'];?>" > 
                  </div>
                   
                    <div class="form-group">
                    <label for="fname">Father's Name</label>
                    <input type="text" class="form-control" id="faname" autocomplete="off" placeholder="Father's Name" value="<?php $querys=mysqli_query($db,"SELECT * FROM stuinfo WHERE username = '$un'");
                                if(mysqli_num_rows($querys)==0){echo "";}else{echo $faname;} ?> "name="faname">                      
                         
 
                  </div>
                   
                  <div class="form-group">
                    <label for="mname">Mother's Name</label>
                    <input type="text" class="form-control"  id="mname" autocomplete="off" placeholder="Mother's Name" value="<?php $query1=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query1)==0){echo "";}else{echo $mname;} ?> "name="mname">
                  </div>
                  



                  <div class="form-group">
                    <label for="roll">Roll or ID</label>
                    <input type="text" class="form-control" id="roll" autocomplete="off" placeholder="Enter Your roll" value="<?php $query2=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query2)==0){echo "";}else{echo $roll;} ?> " name="roll">
                  </div>
                   
                  <div class="form-group">
                    <label for="reg">Registation Number:</label>
                    <input type="text" class="form-control" id="reg" autocomplete="off" placeholder="Enter Your registation" value="<?php $query3=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query3)==0){echo "";}else{echo $reg;} ?>" name="reg">
                  </div>
                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
           	
            <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" autocomplete="off" placeholder="Department Name" value="<?php $query4=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query4)==0){echo "";}else{echo $dep;} ?>" name="department">
                  </div>
                  
 
            <div class="form-group"> 
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone"autocomplete="off"  placeholder="Phone Number" value="<?php $query5=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query5)==0){echo "";}else{echo $mo;} ?>" name="phone">
            </div>
             

             <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address"autocomplete="off"  placeholder="Address" value="<?php $query6=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query6)==0){echo "";}else{echo $add;} ?>"name="address">
                  </div>
        

                  <div class="form-group">
                    <label for="protfolio_link">Protfolio Link</label>
                    <input type="url" class="form-control" id="plink" autocomplete="off" placeholder="Protfolio Link" value="<?php $query7=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$un'");
                                if(mysqli_num_rows($query7)==0){echo "";}else{echo $link;} ?>" name="plink">
                  </div>
 
                    
                  <div class="form-group">
                    <label for="exampleInputFile">Upload a profile image</label><br>
                    <!-- <img src="../images/user/<?//php echo $po;?>" alt="<?//php echo $row['username'];?> "  style="height:40px;">
                     -->
                        <input type="file" class="form-control"  name="newphoto" > 
                    
                       
                    </div>
                
                  <!-- <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div> -->
         
                <div class="card-footer">
                  <button type="Update" id="submit"  class="btn btn-primary" 

                 

                  name="update">Submit</button>
                </div>
                



 
            
         </div>            
                   
        </div>
    
<?php

if(isset($_POST['update'])){
  $u_fname=$_POST['faname'];
  $u_mname=$_POST['mname'];
  $u_roll=$_POST['roll'];
  $u_reg=$_POST['reg'];
  $u_department =$_POST['department'];
  $u_phone =$_POST['phone'];
   $u_address =$_POST['address'];
  $u_flink=$_POST['plink'];
    
   $update=mysqli_query($db,"UPDATE stuinfo SET faname='$u_fname',mname='$u_mname',roll='$u_roll',reg='$u_reg',department='$u_department',phone='$u_phone',address='$u_address',flink='$u_flink'  WHERE email = '$em'");
   if($update){
    header("Location:profile.php");

     }
   }

?>

                    

               
        </form> 
    </div>


    </div>










<?php
 ob_end_flush();

 include 'footer.php';
 ?>