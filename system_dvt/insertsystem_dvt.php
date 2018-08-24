<?php
include("../connect/conn.php");
$dvt_id=$_POST['dvt_id'];
$dvt_name=$_POST['dvt_name'];
$sql="insert into system_dvt values(
'$dvt_id',
'$dvt_name'
)";
if ($res1=mysqli_query($conn,$sql)){
echo "บันทึกสำเร็จนะจ๊ะ";
header("location: select_system_dve.php");
}
else{
	echo "ไม่สำเร็จ";
}
?>