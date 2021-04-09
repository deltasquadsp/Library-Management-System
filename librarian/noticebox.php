 <?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>
<?php

if(isset($_POST['Submit'])){
            $name=$_POST['name'];
            $message=$_POST['message'];
        

            $query = "INSERT INTO notice (name,message) VALUES ('$name','$message')";
            $addUser=mysqli_query($db,$query);
            if($addUser){
              
               
                header("Location:noticebox.php");
              
            }else{
              die("Database Not Connected".mysqli_error($db));
            }

          }


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
                
<div class="panel b-primary bt-md" style="    margin-top: 20px;">
                            <div class="panel-content">
                                <h4 class="mb-md">Notice Board</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Subject</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off" name="name">
                                    </div>
                                     
                                    <span class="error"></span>
                                    <div class="form-group">
                                        <label for="question" class="control-label">Message</label>
                                        <textarea class="form-control" rows="3" name="message" id="question" placeholder="Write your question"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                    </div>
                                     
                                    
                                </form>
                            </div><div class="col-sm-12 offset-sm-6">
                  
            </div>
                        </div>








</div>
 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>