<?php
include("../connect/conn.php");
$id=$_POST['dep_id'];
$edu_name=$_POST['dep_name'];
$sql="update department set dep_name='$edu_name' where dep_id='$id'";
if($res=mysqli_query($conn,$sql)){
echo "แก้ไขสำเร็จ";
header("location: select_department.php");
}
else{
echo "แก้ไขไม่สำเร็จ";
}



?>