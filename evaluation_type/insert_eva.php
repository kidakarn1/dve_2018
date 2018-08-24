<?php 
	include('../connect/conn.php');

	$eva_name = $_POST["eva_name"];

	$sql = "insert into evaluation_type values('','$eva_name')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: show_eva.php");
	} else {
		echo "insert error";
	}
?>
