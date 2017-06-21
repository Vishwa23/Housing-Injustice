
<?php
	include 'dbcon.php';
	$search=(isset($_POST['s']) ? $_POST['s'] : 'hi');
	
	$db=mysqli_query($con, "SELECT * FROM `fulton_parcels_v1` Where Address='$search' ") or die(mysqli_error($con));
	if($db->num_rows){
		$housedb=mysqli_fetch_array($db, MYSQL_ASSOC);
		echo json_encode($housedb);
		}
	else{
		$error="$search: The address you typed was not found. Please try again!";
		echo $error;
	}
	$_POST['s']="";
	mysqli_close($con);
	
?>