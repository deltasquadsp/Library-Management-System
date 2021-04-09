<?php
 ob_start();
  
 include '../dbcon.php';
 
 ?>
                   
<?php

if(isset($_GET['print'])){

  $id=$_GET['print'];


 
 
 
   
   
 
    
}

 






 $query="SELECT * FROM students WHERE id='$id'";
                $all_students=mysqli_query($db,$query);
                while($row=mysqli_fetch_assoc($all_students) ){
                       $id=$row['id'];
                      $fname=$row['fname'];
                      $lname=$row['lname'];
                      $username=$row['username'];
                      $email=$row['email'];
                      $po=$row['photo'];
                      $jo=$row['date_time'];
                       
                      
                       
                      $status=$row['status'];

                         
                    }
                      
                       ?>


        <!DOCTYPE html>
        <html>
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title></title>
          <link rel="stylesheet" href="">
          <style >
            @import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);
@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css);
@import url(https://fonts.googleapis.com/css?family=Lato);

body {
          font-family: "Lato", sans-serif;
          background-color: #d9dbdc;
      }
.container {
          padding-top: 50px;
      }
article {
  margin-bottom: 30px;
}
      .img-responsive {
          width: 150px;
          height: 150px;
      }
      figcaption {
          margin-top: 20px;
      }
      
      figcaption > h3 {
          font-weight: bolder;
          font-size: xx-large;
      }
      dt, dd {
          margin-bottom: 5px;
      }
            
          </style>
        </head>
        <body onload="window.print()">
          <div class="container">
  <div class="row">
    <div class="col-lg-offset-2 col-lg-8">
      <section class="panel panel-default">
        <div class="panel-body">
          <article class="panel-body">
            <figure class="text-center">
              <?php
                          if($po==""){ ?>
                            
                         <img class="img-thumbnail img-circle img-responsive"  alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img class="img-thumbnail img-circle img-responsive"  src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?>
                          
              <figcaption>
                <h3><?php echo ucwords($fname.' '.$lname);?></h3>
                
                <br>
                
              </figcaption> 
            </figure>
          </article>
          <br>
          <article>
            <h4>
              <strong>Personal Details</strong>
            </h4>
            <hr>
            <dl class="dl-horizontal">
              <dt>Email |</dt>
              <dd><?php echo $email;?></dd>
              <dt>Username |</dt>
              <dd><?php echo $username;?></dd>
              <dt>Join Date |</dt>
              <dd><?php echo $jo;?></dd>

              
            </dl>
          </article>
        
        </div>
      </section>
    </div>
  </div>
</div>
        </body>
        </html>


 