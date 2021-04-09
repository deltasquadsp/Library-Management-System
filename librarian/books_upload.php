 <?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>

  
<?php





     if(isset($_POST['submit'])){
        if (isset($_POST['checked'])) {

             
             
            $bookname           =$_POST['bookname'];
          
            
            $photo = explode('.',$_FILES['photo']['name']);
            $photo  = end($photo);
             $random=rand(0,100000);
       
              $photo_name = $random.$bookname.'.'.$photo;


               
              $publication            =$_POST['publication'];
             $authorname            =$_POST['authorname'];
            $date             =$_POST['date'];
            $price           =$_POST['price'];
            $bquantity           =$_POST['bquantity'];
            $aquentity           =$_POST['aquentity'];
            




               if($photo==""){
                $result=mysqli_query($db,"INSERT INTO books (book_name,book_author_name,book_pulication_name,book_purchase_date,book_price,book_qty,available_qty) VALUES ('$bookname','$authorname','$publication','$date','$price','$bquantity','$aquentity')");
                if($result){
                  $success_message="Books Upload Successfully";
                }
   
          }else{
 
            $result=mysqli_query($db,"INSERT INTO books (book_name,book_image,book_author_name,book_pulication_name,book_purchase_date,book_price,book_qty,available_qty) VALUES ('$bookname','$photo_name','$authorname','$publication','$date','$price','$bquantity','$aquentity')");
              move_uploaded_file($_FILES['photo']['tmp_name'], '../imgbook/photo/'.$photo_name);
              if($result){
                  $success_message="Books Upload Successfully";
                }
               
            }  
                                               
                       
            
            }else{
 $errors=  '<div class="alert alert-danger mt-3" role="alert">
  Please, check me out!
</div> ';
}

   }          

?>


 
















<div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="books_upload.php">Books</a></li>
                        </ul>
                        <ul>
                            
                        </ul>
                    </div>
                </div>
 




<div class="card card-primary card-outline ">
              <div class="card-header">
                 <h5 class="m-0 text-center" style="    border-bottom: 2px solid #41f535;
                            font-size: 20px;
                            font-weight: 600;
                        }">Add Books </h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body"> 
          
                   
                        
             <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" class="form-control" id="bookname"  autocomplete="off" placeholder="Book Name"   name="bookname"  >
                  </div>
                 
                    <div class="form-group">
                    <label for="exampleInputFile">Book Image</label>
                    <span class="input-with-icon"> 
                    
                        <input type="file" class="form-control"  name="photo" > 
                    <i class="fas fa-id-badge"></i>    
                       
                    </div> 
                      <div class="form-group">
                    <label for="publication">Publication Name</label>
                    <input type="text" class="form-control" id="publication"    autocomplete="off"   placeholder="Publication Name" name="publication"  > 
                  </div>

          <div class="form-group">
                    <label for="authorname">Author Name</label>
                    <input type="text" class="form-control" id="authorname" autocomplete="off"   placeholder="Author Name"name="authorname"       > 
                  </div>
                  
                    
         
                   
                    <div class="form-group">
                    <label for="type">Purchase Date</label>
                    <input type="date" class="form-control" id="date" autocomplete="off"  name="date">
                  </div>
                 
                  
                   



               

                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
            <div class="form-group">
                    <label for="price">Book Price</label>
                    <input type="number" class="form-control" id="price" autocomplete="off" placeholder="Book Price" name="price">
                  </div>
                  <div class="form-group">
                    <label for="bquantity">Book Quantity</label>
                    <input type="number" class="form-control" id="bquantity" autocomplete="off" placeholder="Book quantity" name="bquantity">
                  </div>
                  <div class="form-group">
                    <label for="aquentity">Available Quantity</label>
                    <input type="number" class="form-control" id="aquentity" autocomplete="off" placeholder="Book Available" name="aquentity">
                  </div>
                 
                 
 
                     
                       <!--    <div class="form-group mt-md ">
                    <label for="file">Pdf</label>
                            <span class="input-with-icon"> 
                            <input type="file" class="form-control" name="file">
                            
                    
                            <i class="fas fa-id-badge"></i>    
                        </div>   -->
               
                  <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div>
          <?php if(isset($errors)){echo $errors;}?>
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" name="submit"><i class="fas fa-save"></i>&nbsp;&nbsp;Add book</button>

                 

                  
                </div>
                
              <div class="col-sm-12 offset-sm-6">
                 <?php if(isset($success_message)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$success_message.'</p>';}?> 
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