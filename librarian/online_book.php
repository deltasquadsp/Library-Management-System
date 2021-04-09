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
                        <li> <a href="online_book.php"> Book</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>


         
<div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Book Information 

                       



                     <span class="label label-danger">(pro)</span> 

                    </b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr><th>Photo</th>
                                        <th>Publication Name</th>
                                        
                                        
                                        <th>Book Name</th>                                 
                                        <th>Author Name </th>
                                         <th>Book Type</th>                                  
                                        
                                        <th>Department</th>
                                        <th>P_Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead> 
                                    
                              <?php

   
                                     $query="SELECT * FROM onlinebook";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                $id=$row['id'];
                                   $publication_name=$row['publication_name'];
                                  $book_name=$row['book_name'];
                                  $author_name=$row['author_name'];                             
                                  $book_type=$row['book_type'];
                                  $department=$row['department'];
                                  $photo=$row['photo'];
                                  $date_time=$row['date_time'];
                                
                           

                                   ?>


                                    <tbody>  
                                        <td>  

                                             <?php
                          if($photo==""){ ?>
                            
                         <img style="height: 41px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 41px;" src="../files/photo/<?php echo $photo;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>





                                        </td>
                                    <td> <?php echo $publication_name;?></td>
                                        <!-- <td><?php// echo $i;?></td> -->
                                        <td>
                                            <?php echo $book_name;?>

  
                      

                                        </td>
                                        <td><?php echo $author_name;?></td>
                                        <td><?php echo $book_type;?></td>
                                        <td><?php echo $department;?></td>

                                         
                                      <td><?php echo date('d-M-Y',strtotime($date_time));?></td>
                                        <td>  
                                        <a href="#" title=""class="btn btn-success btn-sm view_payment"data-toggle="modal" data-target="#book-<?php echo $row['id'];?>" ><i class="fas fa-eye"></i></a> 
                                            <a href="online_book_update.php?edit=<?php echo $id;?>" title=""class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
 
                                             
                                   <a href="online_book.php?delete=<?php echo $id;?>" title=""class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
 
                         


                                                            


                                         
                                     </td>
                                         

                                     
                                    </tbody>

                               <?php  }
                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

 

                <!---data table end--->


<?php

if (isset($_GET['delete'])) {
          

          $id= $_GET['delete'];
          $deleteInfo="DELETE FROM  onlinebook WHERE  id='$id'";
          $deletusersInfo= mysqli_query($db,$deleteInfo);
          if ($deletusersInfo) {
             header("Location:online_book.php");
          }

        }
         
?>

 <a href="#" class="scroll-to-top" style="display: inline;"><i class="fa fa-angle-double-up"></i></a>

                  </div>
              

 

                


</div>




 
       
                              <?php

   
                                     $query="SELECT * FROM onlinebook";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                $id=$row['id'];
                                   $publication_name=$row['publication_name'];
                                  $book_name=$row['book_name'];
                                  $author_name=$row['author_name'];                             
                                  $book_type=$row['book_type'];
                                  $department=$row['department'];
                                  $photo=$row['photo'];
                                  $date_time=$row['date_time'];
                                
                            

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
                                              <th scope="col">Book Image:</th>
                                              <td> 

 
                         <?php
                          if($photo==""){ ?>
                            
                         <img style="height: 80px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 80px;" src="../files/photo/<?php echo $photo;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>

                         
                      

                                      </td>
                                            </tr>
   
    <tr>
      <th scope="col">Publication Name:</th>
       <td ><?php echo $publication_name;?></td>
                                   
    </tr>
    <tr>
      <th scope="col">Book Name:</th>
     <td ><?php echo $book_name;?></td>
                                   
    </tr>
    <tr>
      <th scope="col">Author Name:</th>
      <td ><?php echo $author_name;?></td>
       
                                   
    </tr>
    
    <tr>
      <th scope="col">Book Type:</th>
     <td ><?php echo $book_type;?></td>
    </tr> 
   <tr>
      <th scope="col">Department:</th>
     <td ><?php echo $department;?></td>
    </tr> 
    <tr>
      <th scope="col">Publish Date:</th>
     <td ><?php echo $date_time;?></td>
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