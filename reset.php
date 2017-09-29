<?php
 include('includes/header.php');
 include('config.php');
 include('includes/randchar.php');

  if(isset($_POST['submit'])) {

  	 $user = $_POST['user'];
 
     $sql = "SELECT * FROM users WHERE email = '$user'";

     $res = mysqli_query($con, $sql);

     $row = mysqli_fetch_assoc($res);

     if($row['email'] == $user) {
        $rc = randchar();
        $sqlins = "UPDATE users SET rc = '$rc' WHERE id='$row[id]'";
        $resins = mysqli_query($con, $sqlins);
        if($resins) {
        mail('iraqresults@gmail.com', 'Reset Your Account', 'http://shorurlsys.rf.gd/newpass.php?id='.$rc);

    	}

     }


  }


?>


<div class="RAL">
	<div class="container">
	    <?php if(isset($_POST['submit'])) { if($row['email'] != $user) { ?>
	    <div class="error">Opss... This Email Not Registed In Our Website</div>
	    <?php } } ?>
		<div class="loginBox">
		    <h2>Reset Your Info</h2>
			<form action="reset.php" method="POST" id="ral">
				<p><i class="fa fa-user"></i><input type="text" name="user" placeholder="Your Email Here"></p>
				<p><input type="submit" name="submit" id="subBtn" value="Reset"></p>
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