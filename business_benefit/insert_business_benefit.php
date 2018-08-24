<?php 
	include('../connect/conn.php');

	$benefit_id = $_POST["benefit_id"];
	$name = $_POST["name"];
	

	$sql = "insert into business_benefit values('','$name')";

	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_business_benefit.php");
	} else {
		echo "insert error";
	}
?>
