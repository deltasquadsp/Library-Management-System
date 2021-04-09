<?php
 ob_start();

  include '../dbcon.php';
 include 'header.php';
  $user=$_SESSION['student_id'];
 ?>

<?php 
      
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     
       $em= $userData['email'];
        
        
      ?>
<?php
if(isset($_GET['id'])){
	$main_id=$_GET['id'];
	$sql_update=mysqli_query($db,"UPDATE notice SET status=1 WHERE id='$main_id'");
}

?>












 <div class="content" style="background-color: #f7f7f7">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="read_msg.php">Notice Board</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>
 <div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Online Books</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        
                                        <th>Date</th>

                                       

                                         
                                    </tr>
                                    </thead> 
                                    
                              <?php

                             
               

   
                                     $query="SELECT * FROM notice WHERE status=1";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                $id=$row['id'];
                                   $name=$row['name'];
                                  $message=$row['message'];
                                  $date=$row['datetimes'];                             
                                  
                                   ?>


                                    <tbody>  
                                    
                                        
                                        <td><?php echo $name;?> </td>
                                         
                                      <td> <?php echo $message;?> </td>
                                        <td>                                    
                                  <?php echo date('d-M-Y',strtotime($date));?>
                                         
                                     </td>
                                      
                                         
                                         

                                     
                                    </tbody>
                                    <?php

                                }
                                ?>
 
                                </table>
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