 
<?php
 ob_start();

  include '../dbcon.php';
 include 'header.php';
  
 ?>
<?php
$mytime= getdate(date("U"));
 $date="$mytime[weekday],$mytime[month],$mytime[mday],$mytime[year]";


$sql =$db->query("SELECT id FROM rate");
$numR=$sql->num_rows;

$sql =$db->query("SELECT SUM(userReview) AS total FROM rate");

$data=$sql->fetch_array();

$total=$data["total"];
$avg=' ';
if($numR !=0){
if(is_nan(round(($total/$numR),1))){
$avg=0;
}else{
$avg=round(($total/$numR),1);
}
}else{ $avg=0;
}

 ?>
   

 <!-- ========================================================= -->
 <div class="content" style="background-color: #f7f7f7">
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        <li><i class="fa fa-home" aria-hidden="true"></i><a href="feedback.php">Feedback</a></li>
                        </ul>
                        <ul>
                        	
                        </ul>
                    </div>
                </div>



                <div class="col-md-12 col-lg-12 ">
                    <div class="containers">
                         <div class="rating-review">
                             <div class="tri table-flex">
                                <table>
                                     
                                 
                                    <tbody>
                                        <tr>
                                            <td> 
                                               <div class="rnb rv1">
                                               <h3><?php echo $avg;?>/5.0</h3>

                                               </div>
                                               <div class="pdt-rate">
                                               <div class="pro-rating">
                                                <div class="clearfix rating mart8">
                                                    <div class="rating-stars">
                                                        <div class="grey-stars"></div>
                                                        <div class="filled-stars" style="width: <?php echo $avg*20;?>%"></div>
                                                    </div>

                                                    </div>
                                               </div>

                                               </div>
                                               <div class="rnrn">
                                                <p class="rars"><?php

                                                 if($numR==0){
                                                  echo "No";
                                                 }else{
                                                  echo $numR;
                                                 }
                                                ?>&nbsp Reviews</p>

                                               </div>




                                            </td>
                                             <td> 

                                                <div class="rpb">
                           <?php
                            $sqlp6="SELECT count(*) as r6 FROM rate WHERE userReview=5; ";
                            $result6=mysqli_query($db,$sqlp6);
                             while($row=mysqli_fetch_assoc( $result6) ){
                              $r6=$row['r6'];
                             }
                            ?>

                                                   <div class="rnpb">

                                                      <label class="boo">5<i class="fas fa-star"></i></label>
                                                      <div class="ropb">
                          <div class="ripb" style="width:<?php echo $r6*10;?>%"></div>
                                                      </div>
                                                      <div class="labels">( 



   <?php $sqlp5="SELECT count(*) as r5 FROM rate WHERE userReview=5  ; ";$result5=mysqli_query($db,$sqlp5); while($row=mysqli_fetch_assoc( $result5) ){echo $row['r5'];}?>)
                          
    

                                                        
                                                      </div>


                                                    </div>
                                                    <div class="rnpb">
                                                      <?php
                            $sqlp7="SELECT count(*) as r7 FROM rate WHERE userReview=4; ";
                            $result7=mysqli_query($db,$sqlp7);
                             while($row=mysqli_fetch_assoc( $result7) ){
                              $r7=$row['r7'];
                               
                             }
                            ?>

                                                      <label class="boo">4<i class="fas fa-star"></i></label>
                                                      <div class="ropb">
                                                        <div class="ripb" style="width:<?php echo $r7*10;?>%"></div>
                                                      </div>
                                                      <div class="labels">(




  <?php $sqlp4="SELECT count(*) as r4 FROM rate WHERE userReview=4 ; ";$result4=mysqli_query($db,$sqlp4);while($row=mysqli_fetch_assoc( $result4) ){echo $row['r4'];}?>)
  
                                                        
                                                      </div>


                                                    </div>
                                                    <div class="rnpb">
                                                       <?php
                            $sqlp8="SELECT count(*) as r8 FROM rate WHERE userReview=3; ";
                            $result8=mysqli_query($db,$sqlp8);
                             while($row=mysqli_fetch_assoc( $result8) ){
                              $r8=$row['r8'];
                               
                             
                             }
                            ?>

                                                      <label class="boo">3<i class="fas fa-star"></i></label>
                                                      <div class="ropb">
                                                        <div class="ripb" style="width:<?php echo $r8*10;?>%"></div>
                                                      </div>
                                                      <div class="labels">( 




   <?php $sqlp3="SELECT count(*) as r3 FROM rate WHERE userReview=3; "; $result3=mysqli_query($db,$sqlp3);while($row=mysqli_fetch_assoc( $result3) ){ echo $row['r3'];}?>)
                            
         
                                                        
                                                      </div>


                                                    </div>
                                                    <div class="rnpb">
                                                      <?php
                            $sqlp9="SELECT count(*) as r9 FROM rate WHERE userReview=2; ";
                            $result9=mysqli_query($db,$sqlp9);
                             while($row=mysqli_fetch_assoc( $result9) ){
                              $r9=$row['r9'];
                               
                             
                             }
                            ?>

                                                      <label class="boo">2<i class="fas fa-star"></i></label>
                                                      <div class="ropb">
                                                        <div class="ripb" style="width:<?php echo $r9*10;?>%"></div>
                                                      </div>
                                                      <div class="labels">( 



  <?php $sqlp2="SELECT count(*) as r2 FROM rate WHERE userReview=2; "; $result2=mysqli_query($db,$sqlp2);while($row=mysqli_fetch_assoc( $result2) ){echo $row['r2'];}?>)</div>

  


                                                    </div>
                                                    <div class="rnpb">
                                                      <?php
                            $sqlp10="SELECT count(*) as r10 FROM rate WHERE userReview=1; ";
                            $result10=mysqli_query($db,$sqlp10);
                             while($row=mysqli_fetch_assoc( $result10) ){
                              $r10=$row['r10'];
                               
                             
                             }
                            ?>

                                                      <label class="boo">1<i class="fas fa-star"></i></label>
                                                      <div class="ropb">
                                                        <div class="ripb" style="width:<?php echo $r10*10;?>%"></div>
                                                      </div>
 <div class="labels">(<?php $sqlps="SELECT count(*) as r1 FROM rate WHERE userReview=1; "; $result1=mysqli_query($db,$sqlps); while($row=mysqli_fetch_assoc( $result1) ){
echo $row['r1']; }?>)

 

                                                      
                                                      </div>

 
                                                    </div>


                                                </div>




                                             </td>
                                              <td>

                                                <div class="rrb">
                                                    <p>Any suggestion for our library!!</p>
                                                    <button class="rbtn opmd" >  Add Feedback </button>

                                                </div>


                                               </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="review-model" style="display:none;"  >

                                <div class="review-bg"></div> 
                                <div class="rmp">

                                <div class="rpc">

                                <span><i class="fas fa-times"></i></span>
                                 </div> 

                                <div class="rps" align="center">
                                  <i class="fas fa-star" data-index="0" style="display:none;"></i>

                                  <i class="fas fa-star" data-index="1"></i>
                                  <i class="fas fa-star" data-index="2"></i>
                                  <i class="fas fa-star" data-index="3"></i>
                                  <i class="fas fa-star" data-index="4"></i>
                                  <i class="fas fa-star" data-index="5"></i>

                                </div>
                                <input type="hidden" value="" class="starRateV">
                                <input type="hidden" value="<?php echo $date;?>" class="rateDate">
                                <div class="rptf" align="center">
                                  <input type="text" value=""  class="raterName" placeholder="Enter your full name..">

                                </div>
                                <div class="rptf" align="center">
                                  <textarea  class="rateMsg" id="rate-field"placeholder="Describe your problem"></textarea>
                                </div>
                                <div class="rate-error" align="center">
                                </div>
                                <div  class="rpsb" align="center">
                                  <button class="rpbtn">Post Review</button>
                                </div>

                                </div>

                                </diν>
                             </div>   
                         </div>
                     </div>




                     <div class="bri">
                      <div class="uscm">
                        <?php
                            $sqlp="SELECT * FROM rate ";
                            $result=$db->query($sqlp);
                            if(mysqli_num_rows($result) > 0){

                            While($row=$result->fetch_assoc()){
                            
                            ?>
                        <div class="uscm-secs">
                          <div class="us-img">
                            <p><?php echo substr($row['userName'],0,1);?></p>
                          </div>
                          <div class="uscms">
                            
                            <div class="us-rate">
                              <div class="pdt-rate">
                                               <div class="pro-rating">
                                                <div class="clearfix rating mart8">
                                                    <div class="rating-stars">
                                                        <div class="grey-stars"></div>
                                                        <div class="filled-stars" style="width:<?php echo $row['userReview']*20;?>%"></div>
                                                    </div>

                                                    </div>
                                               </div>

                                               </div>
                            </div>
                            <div class="us-cmt">
                              <p><?php echo $row['userMessage'];?></p>
                            </div>
                            <div class="us-nm">
                              <p><i>By <span class="cmnm"><?php echo $row['userName'];?></span>&nbsp on <span class="cmdt"><?php echo $row['dateReviewed'];?></span></i></p>
                            </div>
                          </div>
                        </div>
                      <?php } }?>
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