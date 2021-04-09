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
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>











<div class="row animated fadeInUp">
    
 
  <div class="col-sm-12">
                    <h4 style="    position: relative;"class="section-subtitle"><b>Issue  Books  </b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>

                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        
                                        <th>Book Issue Date</th>

                                        
                                    </tr>
                                    </thead> 
                                    
                             
                                    <tbody>  
                                        <?php
                                         $student_id=$_SESSION['student_id'];  
                            $result=mysqli_query($db,"SELECT issue_book.`book_issue_date`,books.`book_name`,books.`book_image`
FROM books INNER JOIN issue_book ON issue_book.`book_id`=books.`id`
WHERE issue_book.`st_id`='$student_id'");
                            
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                         <tr>
                          <td>
                            <?php  echo $row['book_name']; ?>
                            
                           </td>
                          
                                       
                              <td>

                                <?php
                          if($row['book_image']==""){ ?>
                            
                         <img style="height: 80px;
                        width: 70px;
                        border-radius: 10px;"alt="profile photo" src="../files/photo/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 80px;
                        width: 70px;
                        border-radius: 10px;"src="../imgbook/photo/<?php echo $row['book_image'];?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>
                              
                               </td>
                                        
                            <td> <?php echo $row['book_issue_date']; ?> </td>
                                       
                      </tr>

                         <?php   }



                            ?>



                           

                                     
                                    </tbody>

                              
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


</div>


               
              
                      
            </div>
 
    
  

 

            
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
             
  <?php
 include 'footer.php';

 ?>
 <?php
 ob_end_flush();
 ?>