<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>
 <div class="content" style="background-color: #f7f7f7;">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="online_books.php">Books</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>





<div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 style="    position: relative;"class="section-subtitle"><b>  Books <span 
                      style="    font-size: 10px;
    font-weight: 600;
    /* margin-bottom: 110px; */
    padding-top: -12px;
    position: absolute;
       top: 2px;
    left: 59px;"



                      class="label label-danger">(pro)</span></b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Publication Name</th>
                                        
                                        <th>Book Name</th>

                                        <th>Author Name</th>
                                         <th>Book Type</th>                                  
                                        
                                        <th>Department</th>
                                        <th>Pdf</th>
                                    </tr>
                                    </thead> 
                                    
                              <?php

                             
               

   
                                     $query="SELECT * FROM onlinebook";
                            $all_students=mysqli_query($db,$query);
                            while($row=mysqli_fetch_assoc($all_students) ){
                                $id=$row['id'];
                                   $photo=$row['photo'];
                                  $publication_name=$row['publication_name'];
                                  $book_name=$row['book_name'];                             
                                  $author_name=$row['author_name'];
                                $book_type=$row['book_type'];
                                    $department=$row['department'];
                                     $filename=$row['filename'];

                                   ?>


                                    <tbody>  
                                    <td> <?php
                          if($photo==""){ ?>
                            
                         <img style="height: 50px;
                        width: 50px;
                        border-radius: 10px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 50px;
                        width: 50px;
                        border-radius: 10px;"src="../files/photo/<?php echo $photo;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?></td>
                                        <!-- <td><?php// echo $i;?></td> -->
                                        <td>
                                            <?php echo $publication_name;?>

  
                      

                                        </td>
                                        
                                        <td><?php echo $book_name;?></td>
                                         
                                      <td><?php echo $author_name;?> </td>
                                        <td>   
                                      <?php echo $book_type;?>

                                         
                                     </td>
                                      <td>   
                                      <?php echo $department;?>

                                         
                                     </td>
                                          <td>   
                                        
                        
                                      <a class="btn btn-success btn-sm" href="download.php?file=<?php echo $row['filename']; ?>">Download</a>
                                 

                                         
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







                </div>


 <?php
 include 'footer.php';
 ?>
   

<?php
ob_end_flush();


?> 