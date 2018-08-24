<?php
include("../connect/conn.php");
$id=$_GET['id'];
$citizen_id=$_GET['citizen_id'];
$sql="delete from teacher where teacher_id=$id";
$sqlU = "delete from user where username = '$citizen_id'";

if (mysqli_query($conn,$sql) && mysqli_query($conn,$sqlU)){
echo "ลบสำเร็จ";
header("location: select_teacher.php");
}

?>
