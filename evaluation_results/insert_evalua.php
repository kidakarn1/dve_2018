<?php 
	include('../connect/conn.php');
	$Que_id = $_POST["Que_id"];
	$score = $_POST["score"];
	$student_id = $_POST["student_id"];
	$assessor = $_POST["assessor"];

	$sql = "insert into evaluation_results values('','$Que_id','$score','$student_id','$assessor')";
	$res = mysqli_query($conn,$sql);
	if ($res){
		header("location: evalua_f_insert.php");
	} else {
		echo "insert error";
	}
?>
