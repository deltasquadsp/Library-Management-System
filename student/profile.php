
<?php
ob_start();
 include 'header.php';
 include '../dbcon.php';
 ?>


<?php 
      $user=$_SESSION['student_id'];
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     $fn= $userData['fname'];
     $ln= $userData['lname'];
     $en=$userData['username'];
       $em= $userData['email'];
       $po= $userData['photo'];
        
      ?>
      <?php

  $query="SELECT * FROM stuinfo WHERE email = '$em'";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc($all_users) ){
           
          $mo=$row['phone'];
          $add=$row['address'];
          $link=$row['flink'];
          $dep=$row['department'];
          $roll=$row['roll'];
          $reg=$row['reg'];
          $fname=$row['faname'];
          $mname=$row['mname'];
          $jd=$row['datetime'];
      }

?>


<div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                         
                        <li> <a href="profile.php">Profile</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>


 
<div class="col-md-12 col-lg-12 ">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--PROFILE-->
                    <div>
                        <div class="profile-photo " >

                             <?php
                          if($po==""){ ?>
                            
                         <img alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>
 
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name"><?php echo  $fn.' '. $ln;?></h2>

                            <h5 class="user-position"><?php $querys=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($querys)==0){echo "";}else{echo $dep;} ?></h5>
                             
         
 
                            <div class="user-social-media">
                                <span class="text-lg"><a href="#" class="fa fa-twitter-square"></a> <a href="<?php $query10=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query10)==0){echo "";}else{echo $link;} ?>" class="fa fa-facebook-square"></a> <a href="" class="fa fa-linkedin-square"></a> <a href="#" class="fa fa-google-plus-square"></a></span>
                            </div>
                        </div>
                    </div>
              
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                       
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
 
                        <div class="panel-content">

                            <h4 class="text-center" style="
                                  font-size: 20px;
								    font-weight: 600;
								    font-style: italic;
                                "><b  >Contact Information</b>
                              <a href="profile_update.php" title=""><input type="submit" class="form-group btn btn-primary btn-sm pull-right" value="Edit" name="edit" ></a></h4>
                                

                             

                            <ul class="user-contact-info ph-sm">
                                <li style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b>
                                	<i class="color-primary mr-sm fa fa-envelope"></i>
                                	</b><span style="color:#ca2727;">Email</span>: 
                                 <?php  echo $em; ?>
                                </li style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                ">
                                <li style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fa fa-phone"></i></b> 

                                 <span style="color:#ca2727;">Phone:</span><?php $query3=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query3)==0){echo "";}else{echo $mo;} ?>


                                </li>
                                <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fa fa-globe"></i></b>  

                                 <span style="color:#ca2727;">Address:</span><?php $query2=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query2)==0){echo "";}else{echo $add;} ?>


                                </li>
                                 <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fas fa-file-signature"></i></b>  

                                 <span style="color:#ca2727;">Father's Name:</span><?php $query4=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query4)==0){echo "";}else{echo $fname;} ?>


                                </li>
                                <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fas fa-file-signature"></i></b>  

                                 <span style="color:#ca2727;">Mother's Name:</span><?php $query5=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query5)==0){echo "";}else{echo $mname;} ?>
                                </li>
                                <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fas fa-sort-numeric-up-alt"></i></b>  
 
                                 <span style="color:#ca2727;">Roll:</span><?php $query6=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query6)==0){echo "";}else{echo $roll;} ?>


                                </li>
                                <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fas fa-sort-numeric-up-alt"></i></b>  

                                 <span style="color:#ca2727;">Registation Number:</span><?php $query8=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query8)==0){echo "";}else{echo $reg;} ?>


                                </li>
                                 
                                  <li 
                                style="
                                  font-size: 15px;
								    font-weight: 600;
								    font-style: italic;
                                "><b><i class="color-primary mr-sm fas fa-calendar-day"></i></b>  

                                 <span style="color:#ca2727;">Join Date:</span>
                                 <?php $query9=mysqli_query($db,"SELECT * FROM stuinfo WHERE  username = '$en'");
                                if(mysqli_num_rows($query9)==0){echo "";}else{echo date('d-M-Y',strtotime($jd)) ;} ?>

                                  

                                </li>
                               <!--  <li class="mt-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorem error itaque maxime minus saepe similique voluptatibus. Beatae cumque dolore doloribus impedit omnis porro tempore tenetur. Aperiam dolorum odio quo?</li> -->

            
         </ul>

                       
                         
                        </div>


                    </div>

                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--LIST-->
                  <!--   <div class="panel  b-primary bt-sm ">
                        <div class="panel-content">
                            <div class="widget-list list-sm list-left-element ">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-check color-success"></i></div>
                                            <div class="text">
                                                <span class="title">95 Jobs</span>
                                                <span class="subtitle">Completed</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-clock-o color-warning"></i></div>
                                            <div class="text">
                                                <span class="title">3 Proyects</span>
                                                <span class="subtitle">working on</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                            <div class="text">
                                                <span class="title">Leave a Menssage</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>


                <div class="col-md-6 col-lg-6">
                	<br>
                	<br>
                	<br>
                	<br>
                	<br>
                	<br>
                	<br>
                   <!--    
                	<div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                        	sjiousiousdhu

                        </div>
                    </div> -->
                </div>


</div>



 <?php
 ob_end_flush();

 include 'footer.php';
 ?>
   