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
       }
    }
 	
 }else {
    if(isset($_POST['submit'])) {
      if(!empty($_POST['linkurl'])) {
           $randcode = randchar();
           $linkurl = $_POST['linkurl'];
           $sqlins = "INSERT INTO shrt_p(url_p, code_p, visit_p) VALUES ('$linkurl', '$randcode', 0)";
           $queryresult = mysqli_query($con, $sqlins);
      }
    }
 }


?>
<div class="content">
	<div class="container">
    <?php if(isset($queryresult)) { ?><div class="success"><input type="text" class="hidelink" id="hidelink" value="<?php echo 'shorurlsys.rf.gd/' . $randcode; ?>"><span id="shrtlink"><?php echo 'localhost/sua/' . $randcode;?></span><span onclick="copy(this)" id="cBtn" style="width: 45px;height: 30px;background: #FFF;padding: 5px;font-size: 15px;border-radius: 2px;color: #333;margin-left: 10px;user-select: none;cursor: pointer;" onclick="copy(this, 'shrtlink');">Copy</span></div><?php } ?>
    <?php if(isset($_POST['submit'])) { if(empty($_POST['linkurl'])) {?>
    <div class="error">Opps... Url Input Musn't Be Empty So You Should Complete It</div>
    <?php } } ?>
		<div class="formBox">
		    <h2>Get Small Link Now!</h2>
			<form action="index.php" method="POST">
				<p><i class="fa fa-link"></i><input type="url" name="linkurl" placeholder="Put Your Url Here">
				<input type="submit" name="submit" value="Upload"></p>
			</form>
		</div>
	</div>
</div>
<script>
  function copy(elem) {
     var linkurl = document.getElementById('hidelink');

     var range = document.createRange();
     range.selectNode(linkurl);
     window.getSelection().addRange(range);
     document.execCommand('copy');
     elem.textContent = 'Coppid';
  }
</script>
<?php
 include('includes/footer.php');

?>
