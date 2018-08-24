<?php
include("../connect/conn.php");
$type_code=$_GET['type_code'];
$sql="delete from edu_type where type_code='$type_code'";
if ($res=mysqli_query($conn,$sql)){
echo "ลบสำเร็จ";
header("location: show.php");
}
else{
echo"ไม่สำเร็จ";

}
?>