<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
 ?>
                   
<?php

if(isset($_GET['edit'])){

  $id=$_GET['edit'];


 
 
 
   
   
 
    
}

 







  $mentorInfo="SELECT * FROM onlinebook WHERE id = '$id'";
  $mntrinfo= mysqli_query($db,$mentorInfo);

  while ($row=mysqli_fetch_assoc($mntrinfo)) {
    $publication_name=$row['publication_name'];
    $book_name=$row['book_name'];
    $author_name=$row['author_name'];
    $book_type=$row['book_type'];
    $department=$row['department'];
    $photo=$row['photo'];
       
  }

?>

<?php



if(isset($_POST['update'])){
     
      
     
    
    if(!$_FILES['newphoto']['name']==""){


    $publication=$_POST['publication'];
  $bookname=$_POST['bookname'];
  $authorname=$_POST['authorname'];
  $booktype=$_POST['booktype'];
  $department =$_POST['department'];
  

    $newphoto=$_FILES['newphoto']['name'];
    $newphoto=explode('.',$_FILES['newphoto']['name']);
    $newphoto = end($newphoto);
    $random=rand(0,100000);
    unlink('../files/photo/'.$photo);
   
    $new_photo_name=$random.$un.'.'.$newphoto;
    
        $upadte=mysqli_query($db,"UPDATE onlinebook SET photo='$new_photo_name'  WHERE id = '$id'");
 
      move_uploaded_file($_FILES['newphoto']['tmp_name'], '../files/photo/'.$new_photo_name);   header("Location:online_book.php");
    }else{
        $upadte=mysqli_query($db,"UPDATE students SET photo='$photo'  WHERE id = '$id'");

    }
}

 

 
 





?>


 
<?php



if(isset($_POST['update'])){
     
      
     
    
     


    $publication=$_POST['publication'];
  $bookname=$_POST['bookname'];
  $authorname=$_POST['authorname'];
  $booktype=$_POST['booktype'];
  $department =$_POST['department'];
  
 
    
        $upadte=mysqli_query($db,"UPDATE onlinebook SET publication_name='$publication',book_name='$bookname',author_name='$authorname',book_type='$booktype',department='$department' WHERE id = '$id'");

        if($upadte){


            header("Location:online_book.php");
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
                            <li> <a href="online_book_update.php">Pro Book Edit</a></li>
                        </ul>
                    </div>
                </div>



              
                   
<div class="card card-primary card-outline ">
              <div class="card-header">
                 <h5 class="m-0 text-center" style="    border-bottom: 2px solid #41f535;
                            font-size: 20px;
                            font-weight: 600;
                        }">Pro Book Update</h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body"> 
            <div class="form-group">
                    <label for="publication">Publication Name</label>
                    <input type="text" class="form-control" id="publication"    autocomplete="off"   placeholder="Publication Name" name="publication" name="publication"value="<?php echo $publication_name;?>"> 
                  </div>
                   
             <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" class="form-control" id="bookname"  autocomplete="off" placeholder="Book Name"   name="bookname"value="<?php echo $book_name;?>"  >
                  </div>
                  
                  

          <div class="form-group">
                    <label for="authorname">Author Name</label>
                    <input type="text" class="form-control" id="authorname" autocomplete="off"   placeholder="Author Name"name="authorname"      value="<?php echo $author_name;?>"  > 
                  </div>
                  
                    
         
                   
                    <div class="form-group">
                    <label for="type">Book Type</label>
                    <input type="text" class="form-control" id="booktype" autocomplete="off" placeholder="Book Type" name="booktype"value="<?php echo $book_type;?>" >
                  </div>
                  
                   



               

                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
            <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" autocomplete="off" placeholder="Department Name" name="department"value="<?php echo $department;?>" >
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <span class="input-with-icon"> 
                    
                        <input type="file" class="form-control"  name="newphoto" > 
                    <i class="fas fa-id-badge"></i>    
                       
                    </div> 
 
                     
                        <!--   <div class="form-group mt-md ">
                    <label for="file">Pdf</label>
                            <span class="input-with-icon"> 
                            <input type="file" class="form-control" name="file">
                            
                    
                            <i class="fas fa-id-badge"></i>    
                        </div>  --> 
               <!-- 
                  <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div> -->
         
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" name="update">Submit</button>

                 

                  
                </div>
                
                 



 
            
        </div>
                   
        </div>
    

        </div>            

               
        </form> 
    </div>

   







            </div>

 
            
   <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?>