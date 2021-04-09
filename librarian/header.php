<?php
include '../dbcon.php';
session_start();
$page=explode('/',$_SERVER['PHP_SELF']);
$page=end($page);

if(!isset($_SESSION['librarian_id'] )){
header('Location: login.php');
}
$user=$_SESSION['librarian_id'];
?>




  <?php 
      
      $user_name=mysqli_query($db,"SELECT * FROM librarian WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     $afn= $userData['fname'];
     $aln= $userData['lname'];
       $aem= $userData['email'];
       // $apo= $userData['photo'];
        
      ?>  
 <!-- <?php

  // $query="SELECT * FROM librarian";
  //   $all_users=mysqli_query($db,$query);
  //   while($row=mysqli_fetch_assoc( $all_users) ){
  //         //$id=$row['id'];
  //         $fname=$row['fname'];
  //         $lname=$row['lname'];
  //          $username=$row['username'];
  //         $email=$row['email'];
          
           
  //     }

?> -->









<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
     <!--dataTable-->
    
    <!--load progress bar-->
     <!-- <link rel="stylesheet" href="../calender/app.css"> -->
    <script src="../assets/javascripts/fontawesome.js"></script>
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
   <!--  <script src="https://kit.fontawesome.com/9fb987007f.js" crossorigin="anonymous"></script> -->

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
   <!--    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css"> -->
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    <link rel="stylesheet" href="../developer/style1.css">
     


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
                    <!--check list-->
                 
                    <!--messages-->
                    
                    
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                           <img alt="profile photo" src="../images/user/default.png" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?php echo $afn.' '.$aln;?></span>
                            <span class="user-profile"><?php echo $aem;?></span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item':''?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <!--UI ELEMENTENTS-->
                               <!--  <li class="<?= $page //== 'test.php' ? 'active-item':''?>"><a href="test.php"><i class="fa fa-home" aria-hidden="true"></i><span>Test</span></a></li> -->
                                <li class="<?= $page == 'students.php' ? 'active-item':''?>"><a href="students.php"><i class="fas fa-users" aria-hidden="true"></i><span>Students</span></a></li>
                                <!--UI ELEMENTENTS-->
                                <li class="<?= $page == 'pro_user.php' ? 'active-item':''?>"><a href="pro_user.php"><i class="fas fa-users" aria-hidden="true"></i><span> 

                                 Students  <span class="label label-danger">(pro)</span> 





                                </span></a></li>

                                 <li class="<?= $page == 'issue_book.php' ? 'active-item':''?>"><a href="issue_book.php"><i class="fas fa-book"></i><span> 

                                 Issue Book   





                                </span></a></li>
                                <li class="<?= $page == 'return_book.php' ? 'active-item':''?>"><a href="return_book.php"><i class="fas fa-book"></i><span> 

                                 Return Book   





                                </span></a></li>
                                 
                                
                                 <li class="has-child-item close-item">
                                    <a><i class="fas fa-book-reader"></i> <span>Books</span></a>
                                        <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'online_book.php' ? 'active-item':''?>"><a href="online_book.php"> 



                                             <h6 style="    position: relative;"class="section-subtitle"><b>  Books
                                              <span
                          

                        class="label label-danger">(pro)</span>



                                             </b></h6>  
 

                                        </a></li>
                                         <li class="<?= $page == 'books.php' ? 'active-item':''?>"><a href="books.php"> 



                                             <h6 style="    position: relative;"class="section-subtitle"><b>  Books
                                              


                                             </b></h6>  











                                        </a></li>
                                        <!--  <li class="<?= $page //== 'user_password_change.php' ? 'active-item':''?>"><a href="user_password_change.php"> Password Change</a></li> 
                                          <li class="<?= $page// == 'developer.php' ? 'active-item':''?>"><a href="developer.php">Developer</a></li>
                                           <li class="<?= $page// == 'faq.php' ? 'active-item':''?>"><a href="faq.php">FAQ</a></li>  -->
 


                                        <!-- <li><a href="widgets_posts.html">Posts</a></li>
                                        <li><a href="widgets_timelines.html">Timelines</a></li> -->
                                    </ul>
                                </li>
                                 <li class="has-child-item close-item">
                                    <a><i class="fas fa-book"></i> <span>Books Upload</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'online_book_upload.php' ? 'active-item':''?>"><a href="online_book_upload.php"> 


                                            <h6 style="    position: relative;"class="section-subtitle"><b>  Books <span
                          

                        class="label label-danger">(pro)</span> </b></h6>












                                         </a></li>
                                         <li class="#"><a href="books_upload.php">   Books</a></li>
                                    </ul>
                                </li>
                                <!-- <li class="<?= $page// == 'messagebox.php' ? 'active-item':''?>"><a href="messagebox.php"><i class="fas fa-envelope-square"></i><span>Message Box</span></a></li> -->
                                <li class="<?= $page == 'messagebox.php' ? 'active-item':''?>"><a href="messagebox.php"><i class="fas fa-question-circle"></i><span>Question Box</span></a></li>
                                 

                                 <li class="<?= $page == 'noticebox.php' ? 'active-item':''?>"><a href="noticebox.php"><i class="fas fa-clipboard-list"></i><span>Notice Board</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
       
            <!-- CONTENT -->
            <!-- ========================================================= -->
