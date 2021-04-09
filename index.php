<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
 
	<style >
		body{
			 background: url(image/bg2.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			 
		}

		.cssmarquee {
height: 50px;
overflow: hidden;
position: relative;
}
.cssmarquee h1 {
font-size: 2em;
    color: #ca2e3c;
    position: absolute;
    width: 100%;
    height: 100%;
    font-weight: 600;
    margin: 0;
    line-height: 50px;
    text-align: center;
    transform: translateX(100%);
    animation: cssmarquee 10s linear infinite;
}
@keyframes cssmarquee {
0% {
transform: translateX(100%);
}
100% {
transform: translateX(-100%);
}
}
		 
	</style>
</head>
<body>
	 
	 
	<div class="container ">
		<div class="row ">
			<div class="col-sm-4 col-sm-offset-4 justify-content-center">
				<div class="cssmarquee">
				<h1>Welcome! DIU Library</h1>
				</div>
								<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<a href="student/index.php" title="" class="btn btn-primary btn-block">Student</a>
				<a href="librarian/index.php" title="" class="btn btn-primary btn-block">Librarian</a>
			</div>
		</div>
	</div>
 
</body>
</html>