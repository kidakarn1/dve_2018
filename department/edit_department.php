<?php
include("../connect/conn.php");
$id = $_POST['dep_id'];
$dep = $_POST['dep_name'];
$teacher_id = $_POST['teacher_id'];

$sql="update department set teacher_id='$teacher_id',dep_name='$dep' where dep_id='$id'";
if($res=mysqli_query($conn,$sql)){
echo "แก้ไขสำเร็จ";
header("location: select_department.php");
}
else{
echo "แก้ไขไม่สำเร็จ";
}



?>