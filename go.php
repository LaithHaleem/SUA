<?php
 include('includes/header.php');
 include('config.php');
 include('includes/randchar.php');
?>

<?php

 if(isset($_GET['code'])) {

 	$rcode = $_GET['code'];

	$sqlu = "SELECT * FROM shrt_u WHERE code_u = '$rcode'";
	$resu = mysqli_query($con, $sqlu);
	$rowu = mysqli_fetch_assoc($resu);

	$sqlp = "SELECT * FROM shrt_p WHERE code_p = '$rcode'";
	$resp = mysqli_query($con, $sqlp);
	$rowp = mysqli_fetch_assoc($resp);

	if($rcode == $rowu['code_u']) {
		header("Location: $rowu[url_u]");
		$upu = "UPDATE shrt_u SET visit_u = visit_u + 1 WHERE code_u = '$rcode'";
		mysqli_query($con, $upu);
	}elseif($rcode == $rowp['code_p']) {
		header("Location: $rowp[url_p]");
	}else {
		header("Location: index.php");
	}

 }else {
 	header("Location: index.php");
 }


?>


<?php
 include('includes/footer.php');

?>