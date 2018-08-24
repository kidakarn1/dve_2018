<?php 
	include('../connect/conn.php');

	$minor_id = $_POST["minor_id"];
	$minor_name = $_POST["minor_name"];
	$major_id = $_POST["major_id"];
	$minor_eng = $_POST["minor_eng"];

	$sql = "insert into minor values('$minor_id','$minor_name','$major_id','$minor_eng')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: minor_f_insert.php");
	} else {
		echo "insert error";
	}
?>
