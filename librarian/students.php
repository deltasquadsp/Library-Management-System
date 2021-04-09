<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>


<div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="students.php">Students</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                   
                </div>

 <!----datatablle--->

<div class="row animated fadeInUp">
	
 
  <div class="col-sm-12" style=" 
    margin-top: 20px;
">

<div class="pull-left">
                      <h4 class="section-subtitle"><b>All Students Information</b></h4>
</div>
                    <div class="pull-right">
      <a href="print_all_student.php" target="_blank"title=""class="btn btn-primary"><i class="fas fa-print"></i>&nbsp;Print</a>
      
    </div>
    <div class="clearfix">
      
    </div>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Photo</th>
                                        
                                        <th>Username</th>
                                        <th>Email</th>
                                         <th>Join Date</th>                                  
                                        <th>Status</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                    </thead> 
                                    <?php
                                    // $i=1;
                                     $query="SELECT * FROM students ";
						    $all_students=mysqli_query($db,$query);
						    while($row=mysqli_fetch_assoc($all_students) ){
						           $id=$row['id'];
						          $fname=$row['fname'];
						          $lname=$row['lname'];
						          $username=$row['username'];
						          $email=$row['email'];
						          $po=$row['photo'];
                      $jo=$row['date_time'];
                       
						          
						           
						          $status=$row['status'];
                      // $otpactive=$row['otpactive'];
						           ?>
									<tbody>  
									<td><?php echo ucwords($fname.' '.$lname);?></td>
                                    	<!-- <td><?php// echo $i;?></td> -->
                                    	<td> 

 
                        <?php
                          if($po==""){ ?>
                            
                         <img style="height: 50px;
					    width: 50px;
					    border-radius: 10px;"alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 50px;
					    width: 50px;
					    border-radius: 10px;"src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>
                         
                      

                                    	</td>
                                    	
                                    	<td><?php echo $username;?></td>
                                    	<td><?php echo $email;?></td>
                                      <td><?php echo date('d-M-Y',strtotime($jo));?></td>
                                    	<td>   


                                            <?php
                          if($status==1){ ?>
                            <div class="label label-success">Active</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-danger">Inactive</div>
                            
                          
                   <?php    
                     } 
                    ?>
                         


                                                            


                                         
                                     </td>
                                    	<td>
                                         <a href="#" title=""class="btn btn-success btn-sm view_payment"data-toggle="modal" data-target="#book-<?php echo $row['id'];?>" ><i class="fas fa-eye"></i></a>
                                         <a href="view.php?print=<?php echo $id;?>" title=""class="btn btn-info btn-sm"target="_blank"><i class="fas fa-print"></i></a>


                                            <?php
                          if($status==1){ ?>

                             <a href="status_active.php?id=<?php echo base64_encode($id); ?>" title=""class="btn btn-primary btn-sm"><i class="fas fa-arrow-up"></i></a>
                                            
                            
                    <?php   
                   } else{ ?>
                           <a href="status_inactive.php?id=<?php echo base64_encode($id); ?>" title=""class="btn btn-warning btn-sm"><i class="fas fa-arrow-down"></i></a>
                                            
                            
                          
                   <?php    
                     } 
                    ?>
                         




                                            

                                         


                                        </td>
                                        

                                     
                                    </tbody>

                              <?php   }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


</div>


                <!---data table end--->






<a href="#" class="scroll-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i></a>

          
 
  </div>
              
 
<?php
  $query="SELECT * FROM students";
                $all_students=mysqli_query($db,$query);
                while($row=mysqli_fetch_assoc($all_students) ){
                       $id=$row['id'];
                      $fname=$row['fname'];
                      $lname=$row['lname'];
                      $username=$row['username'];
                      $email=$row['email'];
                      $po=$row['photo'];
                      $jo=$row['date_time'];
                       
                      
                       
                      $status=$row['status'];
                      // $otpactive=$row['otpactive'];
                       ?>




            
    
            <div class="modal fade" id="book-<?php echo $row['id'];?>"  tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
               
               
                                <div   class="modal-dialog" role="document">
                                    <div  class="modal-content">
                                        <div  class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="modal-info-label" >Information</h4>
                                        </div>
                                        <div class="modal-body">
                                          <table class="table table-bordered">

                                            <tr>
                                              <th scope="col"> Image:</th>
                                              <td> 

 
                        <?php
                          if($po==""){ ?>
                            
                         <img class="align-center"style="height: 50px;
              width: 50px;
              border-radius: 10px;"alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 50px;
              width: 50px;
              border-radius: 10px;"src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>
                         
                      

                                      </td>
                                            </tr>
   
    <tr>
      <th scope="col">Fullname:</th>
       <td ><?php echo ucwords($fname.' '.$lname);?></td>
                                   
    </tr>
    <tr>
      <th scope="col">Username:</th>
     <td ><?php echo $username;?></td>
                                   
    </tr>
    <tr>
      <th scope="col">Email:</th>
      <td ><?php echo $email;?></td>
       
                                   
    </tr>
    
    <tr>
      <th scope="col">Date:</th>
     <td ><?php echo $jo;?></td>
    </tr> 
   
</table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info"  data-dismiss="modal"   >Ok</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>

              
<?php } ?>



 
  
 
 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>