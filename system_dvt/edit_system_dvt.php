<?php
include("../connect/conn.php");
$dvt_id=$_POST['dvt_id'];
$dvt_name=$_POST['dvt_name'];
$sql="update system_dvt set dvt_name='$dvt_name' where dvt_id='$dvt_id'";
if($res=mysqli_query($conn,$sql)){
echo "แก้ไขสำเร็จ";
header("location: select_system_dve.php");
}
else{
echo "แก้ไขไม่สำเร็จ";
}



?>