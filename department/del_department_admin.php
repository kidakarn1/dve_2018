<?php
include("../connect/conn.php");
$id=$_GET['id'];
$sql="delete from department where dep_id='$id'";
if ($res=mysqli_query($conn,$sql)){
echo "ลบสำเร็จ";
header("location: select_department.php");
}
else{
echo"ไม่สำเร็จ";

}
?>