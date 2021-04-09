<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?><!-- 
<?php
     
    // if(isset($_POST['submit'])){
    //     $fileName = $_FILES['file']['name'];
    //     $fileTmpName = $_FILES['file']['tmp_name'];
    //     $path = "../files/".$fileName;
        
    //     $query = "INSERT INTO onlinebook(filename) VALUES ('$fileName')";
    //     $run = mysqli_query($db,$query);
        
    //     if($run){
    //         move_uploaded_file($fileTmpName,$path);
    //         echo "success";
    //     }
    //     else{
    //         echo "error".mysqli_error($db);
    //     }
        
    // }
    
    ?>
 -->
  
<?php





     if(isset($_POST['submit'])){
        if (isset($_POST['checked'])) {

            $publication           =$_POST['publication'];
            $bookname           =$_POST['bookname'];
            $authorname            =$_POST['authorname'];
            $booktype             =$_POST['booktype'];
            $department           =$_POST['department'];
             

           
            
            $photo = explode('.',$_FILES['photo']['name']);
            $photo  = end($photo);
             $random=rand(0,100000);
       
              $photo_name = $random.$bookname.'.'.$photo;

              $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $path = "../files/".$fileName;
        

             if(!$publication ==""){
                if(!$bookname ==""){
                    
                        if(!$authorname ==""){
                            if(!$booktype ==""){
                                 

                                 
                                    if(!$department == ""){
                                         

                                             
                                                    

                                                                                           
                                                         if($photo==""){
                $result=mysqli_query($db,"INSERT INTO onlinebook (publication_name,book_name,author_name,book_type,department,filename) VALUES ('$publication','$bookname','$authorname','$booktype','$department','$fileName')");
          move_uploaded_file($fileTmpName,$path);
          if($result){
                  $success_message="Books Upload Successfully";
                }
                   
          
          }else{

            $result=mysqli_query($db,"INSERT INTO onlinebook (publication_name,book_name,author_name,book_type,department,photo,filename) VALUES ('$publication','$bookname','$authorname','$booktype','$department','$photo_name','$fileName')");
              move_uploaded_file($_FILES['photo']['tmp_name'], '../files/photo/'.$photo_name);
              move_uploaded_file($fileTmpName,$path);
              if($result){
                  $success_message="Books Upload Successfully";
                }
                      
            }  
                                                 
                                 
                                 }else{
                                $department_error="Department fild is required";
                            }

                            }else{
                                $booktype_error="Book type fild is required";
                            }

                        }else{
                          $authorname_error="Authorname fild is required";
                        }

                     
                    }else{
                        $bookname_error= "Book name fild is required";
                    }

                    }else{
                        $publication_error= "Publication fild is required";
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
                     
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="online_book_upload.php">Books Upload <span
                          

                        class="label label-danger">(pro)</span></a></li>
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
                        }">Books Information  </h5> 
                                        
              </div>
               <form   action="" method="POST" enctype="multipart/form-data">
              <div class="row">
               <div class="col-lg-6">

 
           <div class="card-body"> 
            <div class="form-group">
                    <label for="publication">Publication Name</label>
                    <input type="text" class="form-control" id="publication"    autocomplete="off"   placeholder="Publication Name" name="publication"  > 
                  </div>
                   <span class="error"><?php if(isset($publication_error)){echo $publication_error;}?></span>
                        
             <div class="form-group">
                    <label for="bookname">Book Name</label>
                    <input type="text" class="form-control" id="bookname"  autocomplete="off" placeholder="Book Name"   name="bookname"  >
                  </div>
                   <span class="error"><?php if(isset($bookname_error)){echo $bookname_error;}?></span>
                  

          <div class="form-group">
                    <label for="authorname">Author Name</label>
                    <input type="text" class="form-control" id="authorname" autocomplete="off"   placeholder="Author Name"name="authorname"       > 
                  </div>
                  <span class="error"><?php if(isset($authorname_error)){echo $authorname_error;}?></span>
                    
         
                   
                    <div class="form-group">
                    <label for="type">Book Type</label>
                    <input type="text" class="form-control" id="booktype" autocomplete="off" placeholder="Book Type" name="booktype">
                  </div>
                  <span class="error"><?php if(isset($booktype_error)){echo $booktype_error;}?></span> 
                  
                   



               

                   
              </div> 
                 
            </div>
                   



              <div class="col-lg-6">

           
           <div class="card-body">
            <div class="form-group">
                    <label for="department">Department</label>
                    <input type="text" class="form-control" id="department" autocomplete="off" placeholder="Department Name" name="department">
                  </div>
                  <span class="error"><?php if(isset($department_error)){echo $department_error;}?></span> 
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label>
                    <span class="input-with-icon"> 
                    
                        <input type="file" class="form-control"  name="photo" > 
                    <i class="fas fa-id-badge"></i>    
                       
                    </div> 
 
                     
                          <div class="form-group mt-md ">
                    <label for="file">Pdf</label>
                            <span class="input-with-icon"> 
                            <input type="file" class="form-control" name="file">
                            
                    
                            <i class="fas fa-id-badge"></i>    
                        </div>  
               
                  <div class="form-check">
                    <input type="checkbox"   class="form-check-input  " id="checkme" name="checked">
                    <label class="form-check-label " for="checkme">Check me out</label>
                   
                    
                </div>
         <?php if(isset($errors)){echo $errors;}?>
                <div class="card-footer">
                  <button type="submit" id="submit"  class="btn btn-primary" name="submit">Submit</button>

                 

                  
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