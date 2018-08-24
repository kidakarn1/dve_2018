<?php 
	include('../connect/conn.php');

	$end_edu_id = $_POST["end_edu_id"];
	$edu_name = $_POST["edu_name"];
	
	

	$sql = "insert into status_education values('$end_edu_id','$edu_name')";

	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_status_education.php");
	} else {
		echo "insert error";
	}
?>
