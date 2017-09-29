<?php
 include('includes/header.php');
 include('config.php');

   if(isset($_REQUEST['rc']) && !empty($_REQUEST['rc'])) {

       $rc = $_REQUEST['rc'];
       $sqlget = "SELECT * FROM users WHERE rc = '$rc'";
       $resget = mysqli_query($con, $sqlget);
       $rowget = mysqli_fetch_assoc($resget);

   }else {
       header("Location: reset.php");
   }

?>


<div class="RAL">
	<div class="container">
        <?php 
            if(isset($_POST['submit'])) {

               $newpass1 = $_POST['newpass'];
               $newpass2 = $_POST['aginpass'];
               $id = $_POST['uid'];

               if($newpass2 == $newpass1) {
                 $newpass = md5($newpass1);
                 $sql = "UPDATE users SET password = '$newpass' WHERE id = '$id'";
                 $res = mysqli_query($con, $sql);

                   if($res) {
                      $sqlr = "UPDATE users SET rc = '' WHERE id = '$id'";
                      $resr = mysqli_query($con, $sqlr);

                      if($resr) {
                          echo '<div class="success">Your Password Chnaged Successfuly, You Can Login Now!</div>';
                          header("Refresh:2; url=login.php"); 
                      }

                   }

               }
            }
      ?>
      <?php
          if(isset($_REQUEST['rc'])) {
          if($rowget['rc'] == $rc) {
      ?>
		<div class="loginBox">
		    <h2>Reset Your Info</h2>
			<form action="newpass.php" method="POST">
        <input type="hidden" name="uid" value="<?php echo $rowget['id']; ?>">
				<p><i class="fa fa-key"></i><input type="password" name="newpass" placeholder="New Password"></p>
				<p><i class="fa fa-key"></i><input type="password" name="aginpass" placeholder="Rewrite New Password"></p>
				<p><input type="submit" name="submit" id="subBtn" value="Reset"></p>
			</form>
		</div>
    <?php }else {
         echo '<div class="error">Sorry... This Link Is Invalid, Please Try Again</div>';
      }} ?>
    </div>
</div>
<?php
 include('includes/footer.php');
?>