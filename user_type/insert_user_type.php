<?php 
	include('../connect/conn.php');

	$user_type_id = $_POST["user_type_id"];
	$user_type_name = $_POST["user_type_name"];
	$user_type_desc = $_POST["user_type_desc"];
	

	$sql = "insert into user_type values('$user_type_id','$user_type_name','$user_type_desc')";

	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_user_type.php");
	} else {
		echo "insert error";
	}
?>
