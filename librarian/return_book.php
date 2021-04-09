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
                        <li> <a href="students.php">Return Book</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                   
                </div>

 <!----datatablle--->

<div class="row animated fadeInUp">
	
 
  <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Return Book</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        
                                        <th>Username</th>
                                        <th>Book Name</th>
                                         <th>Book Image</th>                                  
                                        <th>Book Issue Date</th>
                                        <th>Return Book</th>
                                      
                                    </tr>
                                    </thead> 
                                    <?php
                                   
            $query="SELECT issue_book.id,issue_book.book_issue_date,
            issue_book.book_id,students.fname,students.lname,students.email,students.username,
books.book_name,books.book_image
FROM issue_book INNER JOIN students ON students.id=issue_book.st_id 
INNER JOIN books ON books.id=issue_book.book_id
WHERE issue_book.book_return_date=''";
						    $all_students=mysqli_query($db,$query);
						    while($row=mysqli_fetch_assoc($all_students) ){
						          
						          $fname=$row['fname'];
						          $lname=$row['lname'];
						          $username=$row['username'];
						          $email=$row['email'];
						          
						           ?>
									<tbody>  
									
                                    
                                    	<td> 
                                      <?php echo $fname.' '.$lname; ?>            
                         
                      

                                    	</td>
                                    	<td> <?php echo $email; ?>            
                         </td>
                                    	<td> <?php echo $username; ?></td>
                                    	<td><?php echo $row['book_name']; ?> </td>
                                      <td> <?php
                          if($row['book_image']==""){ ?>
                            
                         <img style="height: 50px;
                        width: 50px;
                        border-radius: 10px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 50px;
                        width: 50px;
                        border-radius: 10px;"src="../imgbook/photo/<?php echo $row['book_image'];?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?></td>
                                
                                     <td> <?php echo $row['book_issue_date']; ?></td>
                                     <td><a href="return_book.php?id=<?php echo $row['id'];?>&bookid=<?php echo $row['book_id'];?> " title="" class="btn btn-success btn-sm">Return Book</a></td>
                                    </tbody>

                              <?php   }?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


</div>

<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
    $b_id=$_GET['bookid']; 
     
    
  $date=date('d-m-y');
  $resultt=mysqli_query($db,"UPDATE issue_book SET book_return_date='$date' WHERE id=$id"); 
   
  if($resultt){
   mysqli_query($db,"UPDATE books SET available_qty=available_qty+1 WHERE id='$b_id'");
    header("Location:return_book.php");
  }
}
?>

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