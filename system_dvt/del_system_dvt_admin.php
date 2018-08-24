<?php
include("../connect/conn.php");
$id=$_GET['id'];
$sql="delete from system_dvt where dvt_id='$id'";
if ($res=mysqli_query($conn,$sql)){
echo "ลบสำเร็จ";
header("location: select_system_dve.php");
}
else{
echo"ไม่สำเร็จ";
}
?>