<?php
include '../dbcon.php';
$page=explode('/',$_SERVER['PHP_SELF']);
$page=end($page);
session_start();
if(!isset($_SESSION['student_id'] )){
header('Location: signin.php');
}
$user=$_SESSION['student_id'];

 
?>
<?php 
      
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     $fn= $userData['fname'];
     $ln= $userData['lname'];
       $em= $userData['email'];
       $po= $userData['photo'];
        
      ?>
      
 <?php

  $query="SELECT * FROM students";
    $all_users=mysqli_query($db,$query);
    while($row=mysqli_fetch_assoc( $all_users) ){
          //$id=$row['id'];
          $fname=$row['fname'];
          $lname=$row['lname'];
           $username=$row['username'];
          $email=$row['email'];
          
           
      }

?>


 <!-- <?php



// $sql="SELECT students.id,students.sid,stuinfo.photo,stuinfo.email,stuinfo.username FROM students INNER JOIN stuinfo ON
//  students.username=stuinfo.username AND students.email=stuinfo.email";

// $check = mysqli_query($db,$sql);  
 // while($r= mysqli_fetch_array($check)){
    
 //    $um=$r['email'];
 //    $ip=$r['photo'];
   
    
 // }
  


?>
 -->
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
     
    <!--load progress bar-->
    <script src="../assets/javascripts/fontawesome.js"></script>
   <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />
   <!--  <script src="https://kit.fontawesome.com/9fb987007f.js" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
     <script src="../developer/js/db.min.js" type="text/javascript"  ></script>
    
     <script src="../developer/js/jquery.min.js" type="text/javascript"  ></script>
     <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
  <link rel="stylesheet" href="../feedback/css/style.css">
    <link rel="stylesheet" href="../developer/css/style.css">
    <!-- <link rel="stylesheet" href="../developer/css/db.min.css"> -->
  <link rel="stylesheet" href="../chatbot/style.css">
<style>
      .error{
  color: red;
  font-style: italic;
   
  font-weight: bold;

}
        
    </style>

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

 
 

<!-- <div class="rightside-header">

 <div class="header-section hidden-xs" id="notice-headerbox">
                     
                    <div class="notice" id="messages-notice">
                         
                       
                        <a href="http://localhost/online_chat/login.php" title="Messenger"><i style="color: #e8dad5;
    font-size: 22px;"class="fab fa-facebook-messenger"></i></a>
                    </div>
                    
                    
                    
                </div>
            </div> -->
















            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <!-- <div class="header-middle"></div> -->
                

<!-- messenger -->


                










                <!--NOCITE HEADERBOX-->



<?php
$sql_get=mysqli_query($db,"SELECT * FROM notice WHERE status=0");
$count=mysqli_num_rows($sql_get);


?>

                <div class="header-section hidden-xs" id="notice-headerbox">
                    <!--messages-->
                    <div class="notice" id="messages-notice">
                        <i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><?php echo $count;?></span>
                        </i>
                        <div class="dropdown-box basic">
                            <div class="drop-header ">
                                <h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
                                <!-- <span class="badge x-danger b-rounded">120</span> -->
                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element text-center">
                                    <ul>

                                        <?php

                        $sql_get=mysqli_query($db,"SELECT * FROM notice WHERE status=0");
                        if(mysqli_num_rows($sql_get)>0){
                           while($result=mysqli_fetch_assoc($sql_get)){
                            
                            ?><li>
                            <?php
                            echo '<a class="dropdown-item  text-primary" href="read_msg.php?id='.$result['id'].'">'.$result['message'].'</a>';
                            echo '<div class="dropdown-divider"></div>';?>
                            </li><?php
                           }
                        }else{
                            echo '<a href="#" class="dropdown-item  text-danger font-weight-bold"><i class="fas fa-frown-open"></i> Sorry! No message</a>';

                        }

                                        ?>
                                         
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a href="read_msg.php">See all messages</a>
                            </div>
                        </div>
                    </div>

                     <div class="notice" id="messages-notice">
                        <!-- <i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"> </span>
                        </i> -->
                         
                       
                        <a href="http://localhost/ChatApp/login.php" title="Messenger"><i style="color: #e8dad5;
    font-size: 22px;"class="fab fa-facebook-messenger"></i></a>
                    </div>
                    
                    
                    
                    
                </div>



















                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <!-- <img alt="profile photo" src="../images/user/default.png" /> -->
                        <?php
                          if($po==""){ ?>
                            
                         <img alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>


                   


                        </div>
                        <div class="user-info">
                            <span class="user-name"><?php echo $fn.' '.$ln;?></span>
                            <span class="user-profile"><?php echo $em;?></span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                
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
                                <li class="<?= $page == 'insert_info.php' ? 'active-item':''?>"><a href="insert_info.php"><i class="fas fa-user-edit"></i><span>Insert Info</span></a></li>


                                <li class="has-child-item close-item">
                                    <a><i class="fas fa-book-reader"></i><span>Books</span></a>
                                        <ul class="nav child-nav level-1">
                                          <li class="<?= $page == 'books.php' ? 'active-item':''?>"><a href="books.php">Books</a></li>
                                        <li class="<?= $page == 'register_online_book.php' ? 'active-item':''?>"><a href="register_online_book.php"> <h6 style="    position: relative;"class="section-subtitle"><b>  Books <span 
                      style="    font-size: 10px;
    font-weight: 600;
    /* margin-bottom: 110px; */
    padding-top: -12px;
    position: absolute;
       top: 2px;
    left: 59px;"



                      class="label label-danger">(pro)</span></b></h6></a></li>
                         
 
                                       
                                    </ul>
                                </li>
                             

                               <li class="<?= $page == 'payment_details.php' ? 'active-item':''?>"><a href="payment_details.php"><i class="fas fa-money-check-alt"></i>Payment Details &nbsp;<span 
                       


                      class="label label-danger">(pro)</span></a></li>


                                <li class="<?= $page == 'feedback.php' ? 'active-item':''?>"><a href="feedback.php"><i class="fas fa-comment-alt"></i><span>Feedback</span></a></li>
                                <!--UI ELEMENTENTS-->

                                 <li class="has-child-item close-item">
                                    <a><i class="fas fa-user-cog"></i> <span>Setting</span></a>
                                    <ul class="nav child-nav level-1">
                                       <li class="<?= $page == 'profile_update.php' ? 'active-item':''?>"><a href="profile_update.php">Profile Update</a></li>
                                        <li class="<?= $page == 'bot.php' ? 'active-item':''?>"><a href="bot.php">Help!</a></li>
                                         <li class="<?= $page == 'user_password_change.php' ? 'active-item':''?>"><a href="user_password_change.php"> Password Change</a></li> 
                                          <li class="<?= $page == 'developer.php' ? 'active-item':''?>"><a href="developer.php">Developer</a></li>
                                           <li class="<?= $page == 'faq.php' ? 'active-item':''?>"><a href="faq.php">FAQ</a></li> 
 


                                        <!-- <li><a href="widgets_posts.html">Posts</a></li>
                                        <li><a href="widgets_timelines.html">Timelines</a></li> -->
                                    </ul>
                                </li>
                                  
                                 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
       
            <!-- CONTENT -->
            <!-- ========================================================= -->
