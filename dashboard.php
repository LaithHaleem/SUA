<?php
 include('includes/header.php');
 include('config.php');
 include('includes/randchar.php');

 if(!$_SESSION['username']) {
 	header("Location: login.php");
 }else {
 	$username = $_SESSION['username'];
 }

 $sqlu = "SELECT * FROM users WHERE username = '$username'";
 $resu = mysqli_query($con, $sqlu);
 $rowu = mysqli_fetch_assoc($resu);

$sqluser = "SELECT * FROM shrt_u WHERE user_id = '$rowu[id]'";
$resuser = mysqli_query($con, $sqluser);

?>

<div class="dashBox">
   <div class="container">
        <div id="alerts"></div>
   	  	<div class="titleBox">
		<div class="img" id="imgBoxParent">
			<div class="imgplace" id="imgplace" style="

                 <?php

		               $sqlpic = "SELECT * FROM users WHERE username = '$username'";
		               $respic = mysqli_query($con, $sqlpic);
		               $rowpic = mysqli_fetch_assoc($respic);

		          	   $pthpic = "images/$username/$rowpic[image]";

		               if(file_exists($pthpic)) {

                         echo "background: url(images/$username/$rowpic[image]), no-repeat; background-size: cover ";

		               }else {


                          echo "background: url(images/default.png)";

		               }  


                ?>
                ">

                <?php

	               if(file_exists($pthpic)) {

                     echo "<img src='images/$username/$rowpic[image]' title=''>";

	               }else {

                     echo "<img src='images/default.png' title=''>";

	               }
            	?>
				
			</div>
			<div class="uploadBox">
				<form action="dashboard.php" method="POST" id="frm" enctype="multipart/form-data">
				<lable for="imginp" class="la"><i id="camera" class="fa fa-camera"></i></lable>
				<input type="file" name="imginp" class="imginput" id="imginput" title="Choose Your Pic">
				</form>
			</div>
		</div>
		<div class="username">
			<h3><?php if(isset($username)) {echo $username;} ?></h3>
		</div>
	</div>
	<hr>
	<div class="table">
		<div class="table-row">
			<div class="table-ceil">Links</div>
			<div class="table-ceil">Visits</div>
			<div class="table-ceil">Links Ip</div>
			<div class="table-ceil">Edition</div>
		</div>
		<?php
		while($rowuser = mysqli_fetch_assoc($resuser)) {


          echo "

		<div class='table-row'>
			<div class='table-ceil'><a href='" . $rowuser['code_u'] ."'>shorurlsys.rf.gd/" . $rowuser['code_u'] ."</a></div>
			<div class='table-ceil'>". $rowuser['visit_u'] ."</div>
			<div class='table-ceil'>". $rowuser['ip_u'] ."</div>
			<div class='table-ceil'>
				<a href='edit.php?edit=$rowuser[id_u]'><i class='fa fa-pencil-square-o'></i></a>
				<a href='delete.php?del=$rowuser[id_u]'><i class='fa fa-trash-o'></i></a>
			</div>
		</div>

          ";

		}

		?>
		</div>
   </div>
</div>
<script src="jquery.js"></script>
<script src="jx.js"></script>
<?php
 include('includes/footer.php')
?>