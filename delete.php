<?php
 include('config.php');
  session_start();

if(isset($_GET) && !empty($_GET)) {
	$delid = $_GET['del'];

	$sqlget = "SELECT * FROM shrt_u WHERE id_u = $delid";
	$resget = mysqli_query($con, $sqlget);
	$rowget = mysqli_fetch_assoc($resget);

	if($delid == $rowget['id_u']) {

	$sqld = "DELETE FROM shrt_u WHERE id_u = '$delid'";
	$resdel = mysqli_query($con, $sqld);

		if($resdel) {
			header('Location: dashboard.php');
		}

	}else {
		header('Location: dashboard.php');
	}
	
}else {
		header('Location: dashboard.php');
}