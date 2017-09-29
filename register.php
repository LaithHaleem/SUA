<?php
 include('includes/header.php');
 include('config.php');
 if(isset($_SESSION['username'])) {
 	header("Location: index.php");
 }else {
 	if(isset($_POST['submit']) && !empty($_POST)) {
 		if($_POST['user'] == '' || $_POST['mail'] == '' || $_POST['pass'] == '') {
 			
 		}else {
            $usercheck = $_POST['user'];
 			$sqlgetuser = "SELECT * FROM users WHERE username = '$usercheck'";
 			$resusercheck = mysqli_query($con, $sqlgetuser);
 			$rowusercheck = mysqli_num_rows($resusercheck);

 			if($rowusercheck < 1) {

		 		$username = mysqli_real_escape_string($con, $_POST['user']);
		 		$email = mysqli_real_escape_string($con, $_POST['mail']);
		  		$password = mysqli_real_escape_string($con, md5($_POST['pass']));
		 		$_SESSION['username'] = $username;

		  		$sql = "INSERT INTO users (username, email, password, image) VALUES ('$username', '$email', '$password', 'default.png')";

		  		$res = mysqli_query($con, $sql);

		  		if($res) {
		  			header("Refresh:2; url=dashboard.php");

		  		}


 			}

  	 	}

 	}

 }
?>

<div class="RAL">
	<div class="container">
	   <?php if(isset($res)) { ?><div class="success">Good Register Successfully</div> <?php }
	   ?>
	   <?php
	   if(isset($_POST['submit']) && !empty($_POST)) {
	   if($_POST['user'] == '' || $_POST['mail'] == '' || $_POST['pass'] == '') { 

	   	?><div class="error">Sorry... Please Complete All Require Inputs To Contenue</div>

	   <?php } } ?>
	   <?php if(isset($_POST['submit'])) { if($rowusercheck > 0) { ?>
	   <div class="error">Sorry... This Username Already Taken Please Choose Another</div>
	   <?php } } ?>
		<div class="loginBox">
		    <h2>Register New Account</h2>
			<form action="register.php" method="POST" id="ral">
				<p><i class="fa fa-user"></i><input type="text" name="user" placeholder="Username"></p>
				<p><i class="fa fa-at"></i><input type="email" name="mail" placeholder="Email"></p>
				<p><i class="fa fa-key"></i><input type="password" name="pass" placeholder="Password"></p>
				<p><input type="submit" name="submit" id="subBtn" value="Register"></p>
			</form>
		</div>
    </div>
</div>
<script>
	var formral = document.getElementById('ral');

	formral.onsubmit = function (){

		element = document.getElementById('subBtn');
		element.style.border = '1px solid #CCC';
		element.style.background = "#CCC";
		element.style.cursor = 'not-allowed';
		element.value = 'Proccessing...';

	}
</script>
<?php
 include('includes/footer.php')
?>