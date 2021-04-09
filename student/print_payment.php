 <?php
 ob_start();
  
 include '../dbcon.php';
  
 ?>

 

<?php

if(isset($_GET['print'])){

  $id=$_GET['print'];


 
 
 
   
   
 
    
}
                                     $querys="SELECT * FROM bkashonlinebook WHERE id='$id'";
                $all_studentss=mysqli_query($db,$querys);
                while($row=mysqli_fetch_assoc($all_studentss) ){
                       $id=$row['id'];
                      $fullname=$row['fullname'];
                      $email=$row['email'];
                      $phone=$row['phone'];
                      $pmethod=$row['pmethod'];
                      $bnumber=$row['bnumber'];
                      $btrx=$row['btrx'];
                      $bmethod=$row['bmethod'];
                       
                      $roll=$row['roll'];
                      $reg=$row['reg'];
                      $dep=$row['dep'];
                       
                      $timedate=$row['timedate'];
                      $otpactive=$row['otpactive'];
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
           
          
          <article>
            <h4 style="text-align: center;">
              <strong>Payment Details</strong>
            </h4>
            <hr>
            <dl class="dl-horizontal">
              <dt>Name |</dt>
              <dd> <?php echo $fullname;?></dd>
              <dt>Roll |</dt>
              <dd><?php echo $roll;?> </dd>
              <dt>Registation Number|</dt>
              <dd><?php echo $reg;?> </dd>
              <dt>Department|</dt>
              <dd><?php echo $dep; ?> </dd>
              <dt>Email|</dt>
              <dd><?php echo $email;?> </dd>
              <dt>Phone |</dt>
              <dd><?php echo $phone; ?></dd>
              <dt>Method|</dt>
              <dd> <?php
                          if($pmethod==0){ ?>
                             
                          <img style="height:50px"src="../image/nogod.png" alt="">
                    <?php   
                   } elseif($pmethod==1){ ?>
                          
                            <img style="height:50px; width: 86px;"src="../image/roket.jpg" alt="">
                          
                   <?php    
                     } else {
                    ?>
                       <img style="height:50px"src="../image/bkash.png" alt="">

                  <?php } ?></dd>
              <dt>Payment Number |</dt>
              <dd><?php echo $bnumber; ?> </dd>
              <dt>Trx ID |</dt>
              <dd> <?php echo $btrx;?></dd>
              <dt>Payment Method |</dt>
              <dd> <?php
                          if($bmethod==1){ ?>
                            <div class="label label-success">Personal</div>
                         
                    <?php   
                   } else{ ?>
                          <div class="label label-info">Agent</div>
                            
                          
                   <?php    
                     } 
                    ?></dd>
                    <dt>Payment Time |</dt>
              <dd><?php echo date('d-M-Y',strtotime($timedate));?></dd>

              
            </dl>
          </article>
        
        </div>
      </section>
    </div>
  </div>
</div>
        </body>
        </html>


 