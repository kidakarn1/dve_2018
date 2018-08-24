<?php 
include("../connect/conn.php");
$username = $_POST['username'];
$id = $username;
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$school_id = $_POST['school_id'];
$user_type_id = $_POST['user_type_id'];
$position = $_POST['position'];
$register_date = $_POST['register_date'];

$password_md5=md5($password);
$sql="insert into user values('$id','$username','$password_md5','$fname','$lname','$email','$phone','$school_id','$position'"
        . ",'Y','$register_date','')";

if ($res=mysqli_query($conn,$sql)){
	echo "บันทึกสำเร็จนะจ๊ะ";
        header("location: view.php");
}?>
	
