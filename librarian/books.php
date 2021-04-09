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
                        <li> <a href="books.php"> Book</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>


         
<div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Book Information 

                       



                     
                    </b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr> <th>Book Name</th> 
                                     <th>Book Image</th>
                                     <th>Author Name </th>
                                        <th>Publication Name</th>
                                        
                                        
                                                                      
                                        
                                         <th>Purchase Date</th>                                  
                                        
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        <th>Available Book</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead> 
                               <?php

   
                                     $query="SELECT * FROM books";
                            $all_books=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_books) ){
                                $id=$row['id'];
                                   $book_name=$row['book_name'];
                                  $book_image=$row['book_image'];
                                  $book_author_name=$row['book_author_name'];                             
                                  $book_pulication_name=$row['book_pulication_name'];
                                  $book_purchase_date=$row['book_purchase_date'];
                                  $book_price=$row['book_price'];
                                  $book_qty=$row['book_qty'];
                                   $available_qty=$row['available_qty'];
                                
                        

                                   ?>



                                    <tbody>  
                                        <td>
                                        <?php echo $book_name;?>  
 

                                        </td>
                                    <td> 
                                    <?php 

                                       if($book_image==""){ ?>
                            
                         <img style="height: 41px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 41px;" src="../imgbook/photo/<?php echo $book_image;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>




                                    </td>  
                                        <td>  <?php echo $book_author_name;?>                          

                                        </td>
                                        <td><?php echo $book_pulication_name;?></td> 
                                           <td> <?php echo $book_purchase_date;?></td>
                                        <td> <?php echo $book_price;?></td>
                                        <td> <?php echo $book_qty;?></td>
                                        <td> <?php echo $available_qty;?></td>

                                         
                                      <td>
                                        <a href="#" title=""class="btn btn-success btn-sm view_payment"data-toggle="modal" data-target="#book-<?php echo $row['id'];?>" ><i class="fas fa-eye"></i></a> 
                                            <a href="books_update.php?edit=<?php echo $id;?>" title=""class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
 
                                             
                                   <a href="books.php?delete=<?php echo $id;?>" title=""class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
 
                         


                                                            


                                         
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
          $deleteInfo="DELETE FROM  books WHERE  id='$id'";
          $deletusersInfo= mysqli_query($db,$deleteInfo);
          if ($deletusersInfo) {
             header("Location:books.php");
          }

        }
         
?>

 

                  </div>
              

 

                


</div>


<?php

   
                                     $query="SELECT * FROM books";
                            $all_books=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_books) ){
                                $id=$row['id'];
                                   $book_name=$row['book_name'];
                                  $book_image=$row['book_image'];
                                  $book_author_name=$row['book_author_name'];                             
                                  $book_pulication_name=$row['book_pulication_name'];
                                  $book_purchase_date=$row['book_purchase_date'];
                                  $book_price=$row['book_price'];
                                  $book_qty=$row['book_qty'];
                                   $available_qty=$row['available_qty'];
                                
                        

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
                          if($book_image==""){ ?>
                            
                         <img style="height: 80px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 80px;" src="../imgbook/photo/<?php echo $book_image;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>

                         
                      

                                      </td>
                                            </tr>
   
    <tr>
      <th scope="col">Book Name:</th>
       <td ><?php echo $book_name;?></td>
                                   
    </tr>
   
    <tr>
      <th scope="col">Author Name:</th>
      <td ><?php echo $book_author_name;?></td>
       
                                   
    </tr>
     <tr>
      <th scope="col">Publication Name:</th>
     <td ><?php echo $book_pulication_name;?></td>
                                   
    </tr>
    <tr>
      <th scope="col">Publish Date:</th>
     <td ><?php echo $book_purchase_date;?></td>
    </tr> 
    <tr>
      <th scope="col">Price:</th>
     <td ><?php echo $book_price;?></td>
    </tr> 
   <tr>
      <th scope="col">Book Quantity:</th>
     <td ><?php echo $book_qty;?></td>
    </tr> 
     <tr>
      <th scope="col">Available Quantity:</th>
     <td ><?php echo $available_qty;?></td>
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