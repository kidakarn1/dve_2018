<?php
	include('../connect/conn.php');	
	$id = $_GET['benefit_id'];
	$sql="delete from business_benefit where benefit_id='$id'";
	if ($res=mysqli_query($conn,$sql)){
	header("location:show_business_benefit.php");
	}
	else{
	echo "ERROR"."<br>".$sql;
	}
	?>