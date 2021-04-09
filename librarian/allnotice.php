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
                        <li> <a href="noticebox.php">Notice Board</a></li> 
                        <li> <a href="allnotice.php">All Notice</a></li> 
                            
                        
                        </ul>
                        
                    </div>
                </div>


<div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Notice</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        
                                        <th>Message</th>
                                         
                                         <th>Date</th>                                  
                                        
                                        <th>Action</th>
                                    </tr>
                                    </thead> 
                                    
                              <?php

   
                                     $query="SELECT * FROM notice";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                $id=$row['id'];
                                   $name=$row['name'];
                                  
                                  $message=$row['message'];                             
                                  $datetime=$row['datetimes'];
                                
                           

                                   ?>


                                    <tbody>  
                                    <td> <?php echo $name;?></td>
                                        <!-- <td><?php// echo $i;?></td> -->
                                         
                                        
                                        <td><?php echo $message;?></td>
                                         
                                      <td><?php echo date('d-M-Y',strtotime($datetime));?></td>
                                        <td>   
                                             
                                   <a href="allnotice.php?delete=<?php echo $id;?>" title=""class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
 
                         


                                                            


                                         
                                     </td>
                                         

                                     
                                    </tbody>

                               <?php  }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


</div>

                <!---data table end--->


<?php

if (isset($_GET['delete'])) {
          

          $id= $_GET['delete'];
          $deleteInfo="DELETE FROM  notice WHERE  id='$id'";
          $deletusersInfo= mysqli_query($db,$deleteInfo);
          if ($deletusersInfo) {
             header("Location:allnotice.php");
          }

        }
         
?>











</div>
 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>