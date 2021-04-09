<?php
 ob_start();
  
 include '../dbcon.php';
  
 ?>
                   
<?php

if(isset($_GET['oprint'])){

  $id=$_GET['oprint'];


 
 
 
   
   
 
    
}

 






  
  $querys="SELECT * FROM bkashonlinebook WHERE id='$id'";
                $all_studentss=mysqli_query($db,$querys);
                while($row=mysqli_fetch_assoc($all_studentss) ){
                       $id=$row['id'];
                      $fullname=$row['fullname'];
                      $username=$row['username'];
                      $email=$row['email'];
                      $phone=$row['phone'];
                      $bnumber=$row['bnumber'];
                      $btrx=$row['btrx'];
                      $bmethod=$row['bmethod'];
                      $roll=$row['roll'];
                      $reg=$row['reg'];
                      $dep=$row['dep'];
                       
                      
                       
                      $timedate=$row['timedate'];
                      $otpactive=$row['otpactive'];}
                      // $otpactive=$row['otpactive'];
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
          background-color: #3498db;
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
              
                            
                         
                           <img class="img-thumbnail img-circle img-responsive"  alt="profile photo" src="../images/user/default.png" >
                          
                    
                          
              <figcaption>
                <h3><?php echo ucwords($fullname);?></h3>
                  
                
              </figcaption> 
            </figure>
          </article>
         
          <article>
            <h4>
              <strong>Payment Details</strong>
            </h4>
            <hr>
            <dl class="dl-horizontal">
              <dt>Username |</dt>
              <dd><?php echo $username;?></dd>
              <dt>Roll |</dt>
              <dd><?php echo $roll;?></dd>
              <dt>Registation No |</dt>
              <dd><?php echo $reg;?></dd>
              <dt>Email |</dt>
              <dd><?php echo $email;?></dd>
              <dt>Depertment |</dt>
              <dd><?php echo $dep;?></dd>
              <dt>Phone |</dt>
              <dd><?php echo $phone;?></dd>
              <dt>Bkash Number |</dt>
              <dd><?php echo $bnumber;?></dd>
              <dt>Bkash Trx Id |</dt>
              <dd><?php echo $btrx;?></dd>
              <dt>Bkash Method |</dt>
              <dd><?php
                          if($bmethod==1){ ?>
                            <div class="label label-success">Personal</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-info">Agent</div>
                            
                          
                   <?php    
                     } 
                    ?></dd>
              <dt>Join Date |</dt>
              <dd><?php echo $timedate;?></dd>

              
            </dl>
          </article>
        
        </div>
      </section>
    </div>
  </div>
</div>
        </body>
        </html>










