<?php
 ob_start();

  include '../dbcon.php';
 include 'header.php';
  
 ?>
<!-- ========================================================= -->
 <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="books.php">Books</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>



<div class="col-sm-12" style="margin-top:25px;">
                        <div class="panel">
                            <div class="panel-content">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row pt-md">
                                        <div class="form-group col-sm-9 col-lg-10">
                                                <span class="input-with-icon">
                                            <input name="result"type="text" autocomplete="off"class="form-control" id="lefticon" placeholder="Search" required >
                                            <i class="fa fa-search"></i>
                                        </span>
                                        </div>
                                        <div class="form-group col-sm-3  col-lg-2 ">
                                            <button type="submit" class="btn btn-primary btn-block"name="books">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<?php

if(isset($_POST['books'])){
   $result=$_POST['result'];

    ?>
<div class="col-sm-12" style="margin-top:15px;">
    <div class="panel">
        <div class="panel-content">
       
    <div class="row">
        <?php
           $result=mysqli_query($db,"SELECT * FROM books WHERE book_name LIKE '%$result%'");
           $temp=mysqli_num_rows($result);
            if($temp > 0){?>
  <?php
while($row=mysqli_fetch_assoc($result)){
            $book_image=$row['book_image'];
            $book_name=$row['book_name'];
            $available_qty=$row['available_qty'];
        ?>
        <div class="col-sm-3 col-md-2">
               <?php 

                                       if($book_image==""){ ?>
                            
                         <img style="height: 200px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 200px;" src="../imgbook/photo/<?php echo $book_image;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>

            <p><b>Book Name:&nbsp;</b><?php echo $book_name;?></p>
            <span><b>Available:
<?php echo $available_qty;?></b></span>
       </div>
   <?php } ?>
         
            <?php }else{
            echo "<h3 style=' 
    text-align: center;
    color: rebeccapurple;
'>Books not found</h3>";
           }?>
         
    
    </div>
        
    </div>     
        </div>
        
    </div>  
        
<?php }else{ ?>

 <div class="col-sm-12" style="margin-top:15px;">
    <div class="panel">
        <div class="panel-content">
       
    <div class="row">
        <?php
           $result=mysqli_query($db,"SELECT * FROM books");
           while($row=mysqli_fetch_assoc($result)){
            $book_image=$row['book_image'];
            $book_name=$row['book_name'];
            $available_qty=$row['available_qty'];
        ?>
        <div class="col-sm-3 col-md-2">
               <?php 

                                       if($book_image==""){ ?>
                            
                         <img style="height: 200px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 200px;" src="../imgbook/photo/<?php echo $book_image;?>"  alt="Book photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>

            <p><b>Book Name:&nbsp;</b><?php echo $book_name;?></p>
            <span><b>Available:
<?php echo $available_qty;?></b></span>
       </div>
   <?php } ?>
         
    
    </div>
        
    </div>     
        </div>
        
    </div>  
        
<?php }

        ?>
         


 
</div>












             
  <?php
 include 'footer.php';

 ?>
 <?php
 ob_end_flush();
 ?>