<?php 
	include('../connect/conn.php');

	$edu_id = $_POST["edu_id"];
	$edu_name = $_POST["edu_name"];

	$sql = "insert into education values('$edu_id','$edu_name')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: show_edu.php");
	} else {
		echo "insert error";
	}
?>
