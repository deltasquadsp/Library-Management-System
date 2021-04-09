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
                        </ul>
                    </div>
                </div>
               <div style="margin-top:25px;"class="row  ">
    
                    <!--BOX Style 1-->
                    <?php
                    $re=mysqli_query($db,"SELECT * FROM students");
                   
                    $st=mysqli_num_rows($re);
                    ?>
                       <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php  echo $st; ?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Student</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    $ore=mysqli_query($db,"SELECT * FROM bkashonlinebook");
                   
                    $ost=mysqli_num_rows($ore);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-dark-2 color-dark">
                            <a href="pro_user.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php  echo $ost; ?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Paid Student</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                     <?php
                    $mre=mysqli_query($db,"SELECT * FROM messagebox");
                   
                    $mst=mysqli_num_rows($mre);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="messagebox.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-envelope"></i> <?php  echo $mst; ?> </h1>
                                    <h4 class="subtitle">Total Messages</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                  
                    <!--BOX Style 1-->
                    <?php
                    $bre=mysqli_query($db,"SELECT * FROM books");
                   
                    $bst=mysqli_num_rows($bre);
                    ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-light color-darker-2">
                            <a href="books.php">
                                <div class="panel-content">
                                   <h1 class="title color-light-1"> <i class="fas fa-book-open"></i>&nbsp;<?php  echo $bst; ?> </h1>
                                    <h4 class="subtitle">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

<!-- 
chart -->


              <div class="col-sm-12 col-md-6  ">
               <table class="graph">
                <?php
                    $req=mysqli_query($db,"SELECT * FROM students");
                   
                    $stq=mysqli_num_rows($req);
                    ?>
 
    <thead>
        <tr>
            <th scope="col">Item</th>
            <th scope="col">Percent</th>
        </tr>
    </thead><tbody>
        <tr style="height:<?php echo $stq*5;?>%">
            <th scope="row">Students</th>
            <td><span><?php echo $stq*5;?>%</span></td>
        </tr>
        <?php
                    $pore=mysqli_query($db,"SELECT * FROM bkashonlinebook");
                   
                    $post=mysqli_num_rows($pore);
                    ?>
        <tr style="height:<?php echo $post*5;?>%">
            <th scope="row">Paid Students</th>
            <td><span><?php echo $post*5;?>%</span></td>
        </tr>
         
    </tbody>
</table>

  
                </div>

                <div class="col-sm-12 col-md-6 ">
                    
                
                 <div style="position: absolute;
"class="img">
                     <a target="_blank"href="https://www.google.com/maps/place/Daffodil+International+University+(DIU)/@23.7549184,90.3741778,17z/data=!3m1!4b1!4m5!3m4!1s0x3755b8ada2664e21:0x3c872fd17bc11ddb!8m2!3d23.7549184!4d90.3763665" title=""><img style="height: 342px;
    width: 468px;
    position: relative;
    left: 73px;
}"src="../image/map.png" alt=""></a>
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