<?php 
	include('../connect/conn.php');

	$major_id = $_POST["major_id"];
	$major_name = $_POST["major_name"];
	$type_code = $_POST["type_code"];
	$major_eng = $_POST["major_eng"];

	$sql = "insert into major values('$major_id','$major_name','$type_code','$major_eng')";
	
	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_major.php");
	} else {
		echo "insert error";
	}
?>
