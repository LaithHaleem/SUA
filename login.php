<?php
 include('includes/header.php');
 include('config.php');
 if(isset($_SESSION['username'])) {
 	header("Location: index.php");
 }else {
 	if(isset($_POST['submit']) && !empty($_POST)) {
 		if($_POST['username'] == '' || $_POST['password'] == '') {
 		}else{
 		$username = mysqli_real_escape_string($con, $_POST['username']);
  		$password = mysqli_real_escape_string($con, md5($_POST['password']));

  		$sql = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND password = '$password'";

  		$result = mysqli_query($con, $sql);

  		$row = mysqli_fetch_assoc($result);

  		if($row['username'] == $username || $row['email'] == '$username' && $row['password'] == $password) {
  			$_SESSION['username'] = $username;
  			header("Location: index.php");
  		}
      
      }
  		
 	}
 }
?>


<div class="RAL">
	<div class="container">
	    <?php 

        if(isset($_POST['submit'])) {

          if($_POST['username'] != '' & $_POST['password'] != '') {

          if($row['username'] != $username || $row['email'] != '$username' && $row['password'] != $password) { 

	    ?>

	    <div class="error">Sorry. Your inputs details is wrong</div><?php } } } 

	    ?>
	   <?php
	   if(isset($_POST['submit']) && !empty($_POST)) {
	   if($_POST['username'] == '' || $_POST['password'] == '') { 

	   	?><div class="error">Sorry... Please Complete All Require Inputs To Login</div>

	   <?php } } ?>
		<div class="loginBox">
		    <h2>Login Now</h2>
			<form action="login.php" method="POST" id="ral">
				<p><i class="fa fa-user"></i><input type="text" id="loginUser" name="username" value="<?php 
				if(isset($_POST['username'])) {
					if($_POST['username'] != '' && $_POST['password'] != '') {
					   echo $username;
					}} ?>" placeholder="Username"></p>
				<p><i class="fa fa-key"></i><input type="password" id="loginPass" name="password" placeholder="Password"></p>
				<p><input type="submit" name="submit" id="subBtn" value="Login"></p>
				<p><a href="reset.php" class="reset">Forget Your Username or Password?</a></p>
			</form>
		</div>
    </div>
</div>
<?php
 include('includes/footer.php')
?>