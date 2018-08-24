<?php 
	include('../connect/conn.php');

	$eva_id = $_POST["eva_id"];
	$Que_name = $_POST["Que_name"];
	$topics_id = $_POST["topics_id"];

	$sql = "insert into question values('','$eva_id','$Que_name','$topics_id')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: que_f_insert.php");
	} else {
		echo "insert error";
	}
?>
