<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
 ?>
                   
<?php

if(isset($_GET['edit'])){

  $id=$_GET['edit'];
  
}
 
  $mentorInfo="SELECT * FROM books WHERE id = '$id'";
  $mntrinfo= mysqli_query($db,$mentorInfo);

  while ($row=mysqli_fetch_assoc($mntrinfo)) {
    $book_name=$row['book_name'];
    
    $book_author_name=$row['book_author_name'];
    $book_pulication_name=$row['book_pulication_name'];
    $book_price=$row['book_price'];
    $book_qty=$row['book_qty'];
    $available_qty=$row['available_qty'];
    $photo=$row['book_image'];
       
  }

?>

  <?php



if(isset($_POST['update'])){
     
      
     
    
    if(!$_FILES['newphoto']['name']==""){


   $bookname=$_POST['bookname'];
   $authorname=$_POST['authorname'];
  $publication=$_POST['publication'];
 
  
  $price =$_POST['price'];
  $bquantity =$_POST['bquantity'];
  $aquentity =$_POST['aquentity'];
 
    $newphoto=$_FILES['newphoto']['name'];
    $newphoto=explode('.',$_FILES['newphoto']['name']);
    $newphoto = end($newphoto);
    $random=rand(0,100000);
    unlink('../imgbook/photo/'.$photo);
   
    $new_photo_name=$random.$un.'.'.$newphoto;
    
        $upadte=mysqli_query($db,"UPDATE books SET book_image='$new_photo_name'  WHERE id = '$id'");
 
      move_uploaded_file($_FILES['newphoto']['tmp_name'], '../imgbook/photo/'.$new_photo_name);   header("Location:books.php");
    }else{
        $upadte=mysqli_query($db,"UPDATE books SET book_image='$photo'  WHERE id = '$id'");

    }
}

 

 
 





?>
  

 
<?php



if(isset($_POST['update'])){
     
 
     
  $bookname=$_POST['bookname'];
   $authorname=$_POST['authorname'];
  $publication=$_POST['publication'];
 
  
  $price =$_POST['price'];
  $bquantity =$_POST['bquantity'];
  $aquentity =$_POST['aquentity'];
  
 
    
        $upadte=mysqli_query($db,"UPDATE books SET book_name='$bookname',book_author_name='$authorname',book_pulication_name='$publication',book_price='$price',book_qty='$bquantity',available_qty='$aquentity' WHERE id = '$id'");

        if($upadte){


            header("Location:books.php");
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
                            <li> <a href="books_update.php"> Book Edit</a></li>
                        </ul>
                    </div>
                </div>



              
                   
<div class="card card-primary card-outline ">
              <div class="card-header">
                 <h5 class="m-0 text-center" style="    border-bottom: 2px solid #41f535;
                            font-size: 20px;
                            font-weight: 600;
                        }"> Book Update</h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body"> 
           
                   
            <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" class="form-control" id="bookname"  autocomplete="off" placeholder="Book Name"   value="<?php echo $book_name;?>"name="bookname"  >
                  </div>
                 
                    <div class="form-group">
                    <label for="exampleInputFile">Book Image</label>
                    <span class="input-with-icon"> 
                    
                        <input type="file" class="form-control"  name="newphoto" > 
                    <i class="fas fa-id-badge"></i>    
                       
                    </div> 
                      <div class="form-group">
                    <label for="publication">Publication Name</label>
                    <input type="text" class="form-control" id="publication"    autocomplete="off"   placeholder="Publication Name" value="<?php echo $book_pulication_name;?>"name="publication"  > 
                  </div>

          <div class="form-group">
                    <label for="authorname">Author Name</label>
                    <input type="text" class="form-control" id="authorname" autocomplete="off"   placeholder="Author Name"name="authorname"  value="<?php echo $book_author_name;?>"     > 
                  </div>
                  
                    
         
                   
                     <!-- <div class="form-group">
                    <label for="type">Purchase Date</label>
                    <input type="date" class="form-control" id="date" autocomplete="off"  name="date">
                  </div>
                 
 -->

               

                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
            <div class="form-group">
                    <label for="price">Book Price</label>
                    <input type="number" class="form-control" id="price" autocomplete="off" value="<?php echo $book_price;?>"placeholder="Book Price" name="price">
                  </div>
                  <div class="form-group">
                    <label for="bquantity">Book Quantity</label>
                    <input type="number" class="form-control" id="bquantity" autocomplete="off" placeholder="Book quantity" value="<?php echo $book_qty; ?>"name="bquantity">
                  </div>
                  <div class="form-group">
                    <label for="aquentity">Available Quantity</label>
                    <input type="number" class="form-control" id="aquentity" autocomplete="off" placeholder="Book Available" value="<?php echo $available_qty;?>" name="aquentity">
                  </div> 
                 
                     
                     
         
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" name="update">Update</button>

                 

                  
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