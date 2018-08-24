<?php
	include('../connect/conn.php');	
	$id=$_GET['id'];
	$sql="delete from business where business_id='$id'";
	if ($res=mysqli_query($conn,$sql)){
	header("location: select_businessT.php");
	}
	else{
	echo "ERROR"."<br>".$sql;
	}
	?>