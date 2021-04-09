 <?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
 ?>
 <?php

 if(isset($_POST['issue_book'])){
            $student_id=$_POST['student_id'];
            $book_id=$_POST['book_id'];
            $date=$_POST['date'];
          
            $query = "INSERT INTO issue_book (st_id,book_id,book_issue_date) VALUES ('$student_id','$book_id','$date')";

            $addUser=mysqli_query($db,$query);
           
            if($addUser){
               mysqli_query($db,"UPDATE books SET available_qty=available_qty-1 WHERE id='$book_id'");
              $update_sucess="Book Issue sucessfully";

              
            }else{
              die("Database Not Connected".mysqli_error($db));
            }

          }
 ?>










<!-- ========================================================= -->
 <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="issue_book.php">Issue Book</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>

                
                
                    <div class="col-md-6 col-sm-offset-3">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline"action="" method="POST" enctype="multipart/form-data">
                                         
                                        <div class="form-group">
                                             
                                             <select name="student_id" class="form-control" required>
                                                 <option value="">Select</option>
                                                 <?php
                                    // $i=1;
                                     $query="SELECT * FROM students WHERE status='1' ORDER BY CONCAT(fname,' ',lname)";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){?>
                                <option value="<?php echo $row['id'];?>"><?php echo ucwords($row['fname'].' '.$row['lname']).' - ('.$row['username'].')';?></option>
                                                 <?php
                            }
                            ?>
                                                 
                                             </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="search">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            
                            if(isset($_POST['search'])){
                                $id=$_POST['student_id'];


                                 $query="SELECT * FROM students WHERE id='$id' AND status='1'";
                            $all_students=mysqli_query($db,$query);
                             
                      $row=mysqli_fetch_assoc($all_students);
                      ?>

                   

                       
                    
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline"action="" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="name">Student Name:</label>
                                            <input type="text" class="form-control" id="name" value="<?php echo ucwords($row['fname'].' '.$row['lname']);?>" readonly>
                                            <input type="hidden" name="student_id" value="<?php echo $row['id'];?>">
                                            <br>
                                            <br>
                                        </div>

                                        <div class="form-group">
                                         <label for="name">Book Name: &nbsp; &nbsp;</label>
                                          <select name="book_id" class="form-control">
                                                 <option value="">Select</option>
                                                 <?php
                              
                                     $query="SELECT * FROM books WHERE available_qty > 0";
                            $all_students=mysqli_query($db,$query);
                            while($rows=mysqli_fetch_assoc($all_students) ){?>
                                   <option value="<?php echo $rows['id'];?>"><?php echo $rows['book_name'];?></option>






              
                                                 <?php
                            }
                            ?>
                                                 
                                             </select>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                             <label for="name">Book Issue Date: &nbsp; &nbsp;</label>
                                             <input  type="text" name="date"value="<?php echo date('d-m-y');?>" readonly>
                                        </div>
                                        <br>
                                        <br>

                                         
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="issue_book">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                
                           <?php }



                            ?>
                        </div>
                    </div>
                 
</div>



<div class="col-md-6 col-sm-offset-3">
                 <?php if(isset($update_sucess)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$update_sucess.'</p>';}?> 
            </div>





            </div>
  <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>