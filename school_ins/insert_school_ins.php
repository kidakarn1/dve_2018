<?php 
	include('../connect/conn.php');

	$sch_ins_id = $_POST["sch_ins_id"];
	$sch_ins_name = $_POST["sch_ins_name"];
	
	

	$sql = "insert into school_ins values('$sch_ins_id','$sch_ins_name')";

	$res = mysqli_query($conn,$sql);
	if ($res){
		
		header("location: show_school_ins.php");
	} else {
		echo "insert error";
	}
?>
