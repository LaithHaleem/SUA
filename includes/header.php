<?php 
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Short Url Application</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body id="body">
<div class="navbar">
   <div class="container">
	   	<div class="logo"><h2><a href="index.php">SUA</a></h2></div>
		<div class="nav">
			<ul>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</div>
		<div class="users">
			<ul>
				<li>
					<?php 
                      if(isset($_SESSION['username'])) {
                      	echo '<a href="logout.php">Logout</a>';
                      }else {
                      	echo '<a href="login.php">Login</a>';
                      }
					?>
				</li>
				<li>
					<?php 
                      if(isset($_SESSION['username'])) {
                      	echo '<a href="dashboard.php">Profile</a>';
                      }else {
                      	echo '<a href="register.php">Register</a>';
                      }
					?>
				</li>
			</ul>
		</div>
   </div>
</div>