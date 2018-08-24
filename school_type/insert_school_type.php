<?php 
	include('../connect/conn.php');

	$school_type_id = $_POST["school_type_id"];
	$type_name = $_POST["type_name"];
	
	

	$sql = "insert into school_type values('$school_type_id','$type_name')";

	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_school_type.php");
	} else {
		echo "insert error";
	}
?>
