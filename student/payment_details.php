<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  $user=$_SESSION['student_id'];
 ?>
<?php 
      
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     $fn= $userData['fname'];
     $ln= $userData['lname'];
       $em= $userData['email'];
       $po= $userData['photo'];
        
      ?>
<?php
                                    // $i=1;
                                     $query="SELECT * FROM students ";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                   
                                 
                                  $semail=$row['email'];
                                
                       }
                                   ?>


                                    <?php
                                    // $i=1;
                                     $querys="SELECT * FROM bkashonlinebook WHERE email='$em'";
                $all_studentss=mysqli_query($db,$querys);
                while($row=mysqli_fetch_assoc($all_studentss) ){
                       $id=$row['id'];
                      $fullname=$row['fullname'];
                      $email=$row['email'];
                      $phone=$row['phone'];
                      $pmethod=$row['pmethod'];
                      $bnumber=$row['bnumber'];
                      $btrx=$row['btrx'];
                      $bmethod=$row['bmethod'];
                       
                      $roll=$row['roll'];
                      $reg=$row['reg'];
                      $dep=$row['dep'];
                       
                      $timedate=$row['timedate'];
                      $otpactive=$row['otpactive'];
                      }
                       ?>




 <div class="content" style="background-color: #f7f7f7;">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="payment_details.php">Payemnt Details</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>
 
<h3 style="text-align: center;margin-top:100px;font-weight: 600;">Payment Information</h3>
<div class="pull-right">
      <a href="print_payment.php?print=<?php echo $id;?>" target="_blank"title=""class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;Print</a>
      
    </div>
                <table class="table table-bordered">
  <!-- <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead> -->
  <!-- <tbody> -->
    <tr>
      <th scope="col">Full Name</th>
      <td> <?php $query=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query)==0){echo "";}else{echo $fullname;} ?>
</td>
       
    </tr>
    <tr>
      <th scope="col">Roll</th>
      <td> <?php $query1=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query1)==0){echo "";}else{echo $roll;} ?></td>
       
    </tr>
     <tr>
      <th scope="col">Registation Number</th>
      <td> <?php $query2=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query2)==0){echo "";}else{echo $reg;} ?></td>
       
    </tr>
     <tr>
      <th scope="col">Department</th>
      <td> <?php $query3=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query3)==0){echo "";}else{echo $dep;} ?></td>
       
    </tr>
    <tr>
      <th scope="col">Email</th>
      <td> <?php $query4=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query4)==0){echo "";}else{echo $email;} ?></td>
       
    </tr>
    <tr>
      <th scope="col">Phone</th>
      <td> <?php $query5=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query5)==0){echo "";}else{echo $phone;} ?></td>
       
    </tr>
    <tr>
      <th scope="col">Method</th>
      <td>
         <?php $query6=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query6)==0){echo "";}else{


 if($pmethod==0){ ?>
                             
                          <img style="height:50px"src="../image/nogod.png" alt="">
                    <?php   
                   } elseif($pmethod==1){ ?>
                          
                            <img style="height:50px; width: 86px;"src="../image/roket.jpg" alt="">
                          
                   <?php    
                     } else {
                    ?>
                       <img style="height:50px"src="../image/bkash.png" alt="">

                  <?php }



                                } ?>



       
                           </td>
       
    </tr>
    <tr>
      <th scope="col">Payment Number</th>
      <td><?php $query7=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query7)==0){echo "";}else{echo $bnumber;} ?></td>
       
    </tr>
    <tr>
      <th scope="col">Trx ID</th>
      <td><?php $query8=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query8)==0){echo "";}else{echo $btrx;} ?></td>
       
    </tr>
    <tr>
      <th scope="col">Payment method</th>
      <td>

        <?php $query9=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query9)==0){echo "";}else{ 
    if($bmethod==1){ ?>
                            <div class="label label-success">Personal</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-info">Agent</div>
                            
                          
                   <?php    
                     } 




                                } ?>




       
                      
                   </td>
       
    </tr>
      <tr>
      <th scope="col">Payment Time</th>
      <td>
        <?php $query10=mysqli_query($db,"SELECT * FROM bkashonlinebook WHERE  email='$em'");
                                if(mysqli_num_rows($query10)==0){echo "";}else{ echo date('d-M-Y',strtotime($timedate));} ?>

 </td>
       
    </tr>
    
   
  <!-- </tbody> -->
</table>

                
                </div>


 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?> 