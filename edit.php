<?php
 include('includes/header.php');
 include('config.php');

 if(isset($_GET) && !empty($_GET)) {

 	$ided = $_GET['edit'];

    $sqled = "SELECT * FROM shrt_u WHERE id_u = '$ided'";
    $resed = mysqli_query($con, $sqled);
    $rowed = mysqli_fetch_assoc($resed);

    if(isset($_POST['editurl'])) {
        
       $idu = $_GET['edit'];
       $newurl = $_POST['editlink'];
       $sqledit = "UPDATE shrt_u SET url_u = '$newurl' WHERE id_u = '$idu'";

       if($newurl != $rowed['url_u']) {
          $resedit = mysqli_query($con, $sqledit);
       }

    }

 }else {
 	header("Location: index.php");
 }

?>

<div class="content">
	<div class="container">
    <?php if (isset($resedit)) { ?> <div class="success">Your Url Edited Successfully</div><?php }?>
		<div class="formBox">
		    <h2>Edit Your Shrted Url Now</h2>
			<form action='edit.php?edit=<?php echo $ided ?>' method='POST'>
				<p><i class="fa fa-link"></i><input type="url" name="editlink" 
        value='
        <?php 
         if(isset($resedit)) {
            echo $newurl;
         }else {
            echo $rowed['url_u'];
         }

        ?>'>
				<input type="submit" name="editurl" value="Edit"></p>
			</form>
		</div>
	</div>
</div>

<?php
 include('includes/footer.php');
?>