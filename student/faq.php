<?php
 ob_start();
  
 include '../dbcon.php';
 include 'header.php';
  
 ?>
 <?php 
      $user=$_SESSION['student_id'];
      $user_name=mysqli_query($db,"SELECT * FROM students WHERE id = '$user'");
     
     $userData=mysqli_fetch_assoc($user_name);
     $fn= $userData['fname'];
     $ln= $userData['lname'];
     $en=$userData['username'];
       $em= $userData['email'];
       $po= $userData['photo'];
        
      ?>
<?php

if(isset($_POST['Submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $message=$_POST['message'];
             


             if($fn.' '.$ln==$name){
             	if($em==$email){
             		$query = "INSERT INTO messagebox (name,email,message ) VALUES ('$name','$email','$message' )";
		            $addUser=mysqli_query($db,$query);
		            // if($addUser){
		            //   header("Location:faq.php");
		            // }else{
		            //   die("Database Not Connected".mysqli_error($db));
		            // }
		            if($addUser){
		                 $success_message="Insert Message Successfully!";
		            }else{

		            }




		        }else{
                   	$email_error="Email not match";
                   }
                   


             }else{
                 
             	$name_error="Fullname Not match";
             }

             
           

     
            }
         


?>



 <div class="content">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li> <a href="faq.php">FAQ</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>
<div class="row" style="padding-top:10px">
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--QUESTIONS-->
                    <div class="col-sm-12 col-md-8">
                        <div class="panel">
                            <div class="panel-content">
                                <!--GENERAL QUESTIONS-->
                                <h4><b>Library Question</b></h4>
                                <div class="panel-group faq-accordion" id="accordion_faq">
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq" href="#q1" aria-expanded="false">
                                                <span class="color-primary text-bold">Q:</span> Where to download e-books?
                                            </a>
                                        </div>
                                        <div id="q1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-content">
                                                <h5><b>Download</b></h5>
                                                <p>To download e-books please go the the following link. You need to login with your e-book identity and password to search or download e-books.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq" href="#q2" aria-expanded="false">
                                                <span class="color-primary text-bold">Q:</span> What do I need to borrow items from the Library?
                                            </a>
                                        </div>
                                        <div id="q2" class="panel-collapse collapse" aria-expanded="false">
                                            <div class="panel-content">
                                                <p>You must have  a valid library membership to check out library materials</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq" href="#q3" aria-expanded="false">
                                                <span class="color-primary text-bold">Q:</span>How can I find out when a library item is due?
                                            </a>
                                        </div>
                                        <div id="q3" class="panel-collapse collapse" aria-expanded="false">
                                            <div class="panel-content">
                                                <p>You can find the due date for any item by looking at its record in the catalog. By logging into your Library Account, you can see the due dates of items you have borrowed.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq" href="#q4" aria-expanded="false">
                                                <span class="color-primary text-bold">Q:</span> What happens if an item checked out in my name is lost or damaged?
                                            </a>
                                        </div>
                                        <div id="q4" class="panel-collapse collapse" aria-expanded="false">
                                            <div class="panel-content">
                                                <!-- <h5><b>Rariatur perferendis praesentium:</b></h5> -->
                                                <p> All items checked out to you are your responsibility until returned. If an item is lost or damaged, you must have replaced the item by the same as it was during the check-out. Your library account will be blocked until charges are paid.</p>
                                               <!--  <ul>
                                                    <li>Lorem ipsum dolor sit.</li>
                                                    <li>Eligendi facilis rem repellendus.</li>
                                                    <li>Dicta fugit molestiae rerum.</li>
                                                    <li>Deserunt molestias saepe sit!</li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq" href="#q5" aria-expanded="false">
                                                <span class="color-primary text-bold">Q:</span> How can I hold any item?
                                            </a>
                                        </div>
                                        <div id="q5" class="panel-collapse collapse" aria-expanded="false">
                                            <div class="panel-content">
                                                <p>You can also reserve an item by selecting ‘hold’ option through which you will enjoy priority to check out or borrow on those materials.  To hold a book you need to first log in with your Library ID & Password. Then you can "Place hold" on items which are already checked out to another.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--SHIPPING QUESTIONS-->
                                <h4><b>General Question</b></h4>
                                <div class="panel-group faq-accordion" id="accordion_faq2">
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title" data-toggle="collapse" data-parent="#accordion_faq2" href="#q1-ship">
                                                <span class="color-primary text-bold">Q:</span> How can I pay my fees?
                                            </a>
                                        </div>
                                        <div id="q1-ship" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <!-- <h5><b>Rariatur perferendis praesentium:</b></h5> -->
                                                <p> You can pay your fees by selecting payment option. First login with your id and password.then click on payment and pay your dues.</p>
                                                <!-- <ul>
                                                    <li>Lorem ipsum dolor sit.</li>
                                                    <li>Eligendi facilis rem repellendus.</li>
                                                    <li>Dicta fugit molestiae rerum.</li>
                                                    <li>Deserunt molestias saepe sit!</li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq2" href="#q2-ship">
                                                <span class="color-primary text-bold">Q:</span> Can I register by myself?
                                            </a>
                                        </div>
                                        <div id="q2-ship" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <p>Yes, This is a self registered website you can register by using registration form</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq2" href="#q3-ship">
                                                <span class="color-primary text-bold">Q:</span> How many day I can hold any book?
                                            </a>
                                        </div>
                                        <div id="q3-ship" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <p>You can hold 7 days after taking the book</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-accordion">
                                        <div class="panel-header bg-scale-0">
                                            <a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion_faq2" href="#q4-ship">
                                                <span class="color-primary text-bold">Q:</span> Do the Library have group study facilities? 
                                            </a>
                                        </div>
                                        <div id="q4-ship" class="panel-collapse collapse">
                                            <div class="panel-content">
                                               <!--  <h5><b>Anim pariatur cliche reprehenderit</b></h5> -->
                                                <p>Yes, library have group study facilities. You can access more than 40 people in group study</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--RIGHT SIDE OPTIONS-->
                    <div class="col-sm-12 col-md-4">
                        <!--CONTACT SUPPORT-->
                        <div class="panel b-primary bt-md">
                            <div class="panel-content">
                                <h4 class="mb-md"> Contact Support </h4>
                                <ul class="list-unstyled ml-sm">
                                    <li>
                                        <h6><i class="mr-sm fa fa-clock-o"></i>Sat-
                                        Thu 8:00 - 18:00</h6></li>
                                    <li>
                                        <h6><i class="mr-sm fa fa-phone"></i>(012) 234 4321</h6></li>
                                    <li>
                                        <h6><i class="mr-sm fa fa-envelope"></i>admin@delta.com</h6></li>
                                </ul>
                            </div>
                        </div>
                        <!--SUBMIT A TICKET-->
                        <div class="panel b-primary bt-md">
                            <div class="panel-content">
                                <h4 class="mb-md">Question Box</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Full Name" autocomplete="off" name="name">
                                    </div>
                                    <span class="error"><?php if(isset($name_error)){echo $name_error;}?></span>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off" name="email">
                                    </div>
                                    <span class="error"><?php if(isset($email_error)){echo $email_error;}?></span>
                                    <div class="form-group">
                                        <label for="question" class="control-label">Question</label>
                                        <textarea class="form-control" rows="3" name="message"id="question" placeholder="Write your question"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
                                    </div>
                                    
                                </form>
                            </div><div class="col-sm-12 offset-sm-6">
                 <?php if(isset($success_message)){echo '<p class="alert alert-success" role="alert col-sm-4 offset-sm-3">'.$success_message.'</p>';}?> 
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