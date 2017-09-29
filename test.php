<?php
 include('includes/header.php');
 include('config.php');
 include('includes/randchar.php');

 if(isset($_SESSION['username'])) {
   	$userget = $_SESSION['username'];
   	$sqlget = "SELECT * FROM users WHERE username = '$userget'";
   	$result = mysqli_query($con, $sqlget);
   	$row = mysqli_fetch_assoc($result);
   	$userid = $row['id'];

    if(isset($_POST['submit'])) {
        if(!empty($_POST['linkurl'])) {
             $randcode = randchar();
             $linkurl = $_POST['linkurl'];
             $userip = $_SERVER['REMOTE_ADDR'];
             $sqlins = "INSERT INTO shrt_u(url_u, code_u, visit_u, ip_u, user_id) VALUES ('$linkurl', '$randcode', 0, '$userip', '$userid')";
             $queryresult = mysqli_query($con, $sqlins);

             if($queryresult) {
              echo 'good';
             }
        }
    }
 	
 }else {
    if(isset($_POST['submit'])) {
       if(!empty($_POST['linkurl'])) {
             $randcode = randchar();
             $linkurl = $_POST['linkurl'];
             $sqlins = "INSERT INTO shrt_p(url_p, code_p, visit_p) VALUES ('$linkurl', '$randcode', 0)";
             $queryresult = mysqli_query($con, $sqlins);

             if($queryresult) {
              echo 'good ppp';
             }
       }
    }
 }


?>