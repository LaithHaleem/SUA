<?php
 include('config.php');

   session_start();

  $username = $_SESSION['username'];

 if(isset($_POST)) {

    $imagename = $_FILES['imginp']['name'];
    $ex = end(explode('.', $imagename));
    $tmpname = $_FILES['imginp']['tmp_name'];
    $imgsize = $_FILES['imginp']['size'];
    $allowsize = 200001;
    $allowfile = array('png', 'jpg', 'jpeg');
    if(!file_exists('images/'. $username)) {
      mkdir('images/'. $username);
    }

    if(in_array($ex, $allowfile)) {

         if($imgsize < $allowsize) {

               $newname = rand() . '.' . $ex;
               $path = 'images/'. $username . '/'. $newname;

               if(move_uploaded_file($tmpname, $path)) {

         
                  $sql = "UPDATE users SET image = '$newname' WHERE username = '$username'";

                  $res = mysqli_query($con, $sql);

                  if($res) {

                       $sqlpic = "SELECT * FROM users WHERE username = '$username'";
                       $respic = mysqli_query($con, $sqlpic);
                       $rowpic = mysqli_fetch_assoc($respic);

                       echo "<img src='images/$username/$rowpic[image]'>";

                  }

               }


           }else {

               echo '00'; 
           }

      }else {
        echo '0';
      }

 }

?>