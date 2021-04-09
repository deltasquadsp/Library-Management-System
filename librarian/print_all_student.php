<?php
 ob_start();
  
 include '../dbcon.php';
 
 ?>

<!-- <?php
   
//    $query="SELECT  count(*) as total FROM students ";
//       $result5=mysqli_query($db,$query);                                
// while($row=mysqli_fetch_assoc( $result5) ){
// 	$total= $row['total'];
 
// }
?> -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Print All Student</title>
	 <style>
	 	body{
	 		margin:0;
	 		padding:0;
	 		font-family: kalpurush;
	 	}
	 	.print-area{
            width: 750px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
	 	}
	 	.header,.page-info{
	 		text-align: center;
	 	}
 	.header h3{
 		margin: 0;
 	}
	 	.data-info{}
	 	.data-info table{
	 		width: 100%;
	 		border-collapse: collapse;
	 	}
	 	.data-info table th,
	 	.data-info table td{
	 		border:1px solid #555;
	 		padding: 4px;
	 		line-height: 1em;
	 	}

	 </style>
</head>
<body onload="window.print()">
	 
				 <?php
				 $i=1;
				 $page=1;
				 $per_page=30;
$query="SELECT  count(*) as total FROM students ";
      $result5=mysqli_query($db,$query);                                
while($row=mysqli_fetch_assoc( $result5) ){
	$total= $row['total'];
  
}








                                     $query="SELECT * FROM students ";
                                     
						    $all_students=mysqli_query($db,$query);
						     
						    while($row=mysqli_fetch_assoc($all_students) ){
						    	if($i % $per_page ==1){
                                   echo page_header();
						    	}
						           $id=$row['id'];
						          $fname=$row['fname'];
						          $lname=$row['lname'];
						          $username=$row['username'];
						          $email=$row['email'];
						          $po=$row['photo'];
                      $jo=$row['date_time'];
                   
						          
						           ?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $fname.' '.$lname;?></td>
					<td><?php echo $username;?></td>
					<td>  <?php
                          if($po==""){ ?>
                            
                         <img style="height: 50px;
					    width: 50px;
					    border-radius: 10px;"alt="profile photo" src="../images/user/default.png" />
                    <?php   
                   } else{ ?>
                          <img style="height: 50px;
					    width: 50px;
					    border-radius: 10px;"src="../images/user/<?php echo $po;?>"  alt="profile photo" >  
                         
                            
                          
                   <?php    
                     } 
                    ?></td>
					<td><?php echo $email;?></td>
					<td><?php echo date('d-M-Y',strtotime($jo));?></td>
				</tr>
			<?php
			if($i % $per_page == 0 || $total == $per_page){
                                   echo page_footer($page++);
						    	}


			 $i++; } ?>
			 
			 
</body>
</html>

<?php

function page_header(){
	$data='
	<div class="print-area">
		<div class="header">
			<h3>Daffodil International University Library</h3>
			<h4>Dhanmondi,Dhaka,Bangladesh</h4>
			
		</div>
		<div class="data-info">
			 
			<table>
				<tr>
				<th>SI NO:</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Photo</th>
					<th>Email</th>
					<th>Join Date</th>
					 
				</tr>
	';
	return $data;
}
function page_footer($page){
	$data='
	</table>
			<div class="page-info">Page:- '.$page.'<?php echo $page;?></div>
		</div>
		
	</div>
	
	';
	return $data;
}

?>