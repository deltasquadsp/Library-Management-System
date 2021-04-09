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
                        <li> <a href="pro_user.php">Online Students</a></li>
                        </ul>
                        <ul>
                          
                        </ul>
                    </div>
                </div>

 <!----datatablle--->

<div class="row animated fadeInUp">
  
 
  <div class="col-sm-12">
                    <h4 style="    position: relative;"class="section-subtitle"><b>  All Students Information <span 
                      style="    font-size: 10px;
    font-weight: 600;
    /* margin-bottom: 110px; */
    padding-top: -12px;
    position: absolute;
       top: 2px;
    left: 216px;"



                      class="label label-danger">(pro)</span></b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        
                                        <th>Phone</th>
                                        <th>Method</th>
                                        <th>B Number</th>
                                        <th>B Trx</th>
                                         <th>B method</th>                                  
                                        <th>Time</th>
                                        <th>Action</th>
                                      
                                    </tr>
                                    </thead> 
                                    <?php
                                    // $i=1;
                                     $querys="SELECT * FROM bkashonlinebook";
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
                       
                      
                       
                      $timedate=$row['timedate'];
                      $otpactive=$row['otpactive'];
                      // $otpactive=$row['otpactive'];
                       ?>
                  <tbody>  
                  <td><?php echo ucwords($fullname);?></td>
                                      <!-- <td><?php// echo $i;?></td> -->
                                      <td> 

                                    <?php echo $email;?>
                        
                         
                      

                                      </td>
                                      
                                      <td><?php echo $phone;?></td>
                                      <td>
                                       <?php
                          if($pmethod==0){ ?>
                             
                          <img style="height:50px"src="../image/nogod.png" alt="">
                    <?php   
                   } elseif($pmethod==1){ ?>
                          
                            <img style="height:50px; width: 86px;"src="../image/roket.jpg" alt="">
                          
                   <?php    
                     } else {
                    ?>
                       <img style="height:50px"src="../image/bkash.png" alt="">

                  <?php } ?>
                                      </td>
                                      <td><?php echo $bnumber;?></td>
                                      <td><?php echo $btrx;?></td>
                                      <td> <?php
                          if($bmethod==1){ ?>
                            <div class="label label-success">Personal</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-info">Agent</div>
                            
                          
                   <?php    
                     } 
                    ?></td>
                                      <td><?php echo date('d-M-Y',strtotime($timedate));?></td>
                                       
                                      <td>
                                      <!--    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#info-modal"><i class="fas fa-eye"></i></button> -->
                                          <a href="#" title=""class="btn btn-success btn-sm"data-toggle="modal" data-target="#book-<?php echo $row['id'];?>"><i class="fas fa-eye"></i></a>
                                          <a href="oview.php?oprint=<?php echo $id;?>" title=""class="btn btn-info btn-sm"target="_blank"><i class="fas fa-print"></i></a>


                                            <?php
                          if($otpactive==1){ ?>

                             <a href="otp_active.php?id=<?php echo base64_encode($id); ?>" title=""class="btn btn-primary btn-sm"><i class="fas fa-arrow-up"></i></a>
                                            
                            
                    <?php   
                   } else{ ?>
                           <a href="otp_inactive.php?id=<?php echo base64_encode($id); ?>" title=""class="btn btn-warning btn-sm"><i class="fas fa-arrow-down"></i></a>
                                            
                            
                          
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








            </div>


<?php
  $querys="SELECT * FROM bkashonlinebook";
                $all_studentss=mysqli_query($db,$querys);
                while($row=mysqli_fetch_assoc($all_studentss) ){
                       $id=$row['id'];
                      $fullname=$row['fullname'];
                      $email=$row['email'];
                      $phone=$row['phone'];
                      $bnumber=$row['bnumber'];
                      $btrx=$row['btrx'];
                      $bmethod=$row['bmethod'];
                       
                      
                       
                      $timedate=$row['timedate'];
                      $otpactive=$row['otpactive'];
                      // $otpactive=$row['otpactive'];
                       ?>





            <div class="modal fade" id="book-<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                                <div   class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-info">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="modal-info-label" >Information</h4>
                                        </div>
                                        <div class="modal-body">
                                          <table class="table table-bordered">
   
    <tr>
      <th scope="col">Fullname:</th>
      <td> <?php echo ucwords($fullname);?></td>

                                   
    </tr>
    <tr>
      <th scope="col">Email:</th>
      <td> <?php echo $email;?></td>

                                   
    </tr>
    <tr>
      <th scope="col">Phone:</th>
      <td> <?php echo $phone;?></td>

                                   
    </tr>
    <tr>
      <th scope="col">Bkash Number:</th>
      <td> <?php echo $bnumber;?></td>

                                   
    </tr>
    <tr>
      <th scope="col">Bkash Trx Id:</th>
      <td> <?php echo $btrx;?></td>

                                   
    </tr>
    <tr>
      <th scope="col">Bkash Method:</th>
        <td> <?php
                          if($bmethod==1){ ?>
                            <div class="label label-success">Personal</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-info">Agent</div>
                            
                          
                   <?php    
                     } 
                    ?></td>
    </tr>
    <tr>
      <th scope="col">Date:</th>
      <td><?php echo date('d-M-Y',strtotime($timedate));?></td>
    </tr> 
   
</table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info"  data-dismiss="modal"  >Ok</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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