<?php
include("../connect/conn.php");
$id=$_GET['id'];
$sql="delete from topics where topics_id=$id";
if ($res=mysqli_query($conn,$sql)){
echo "ลบสำเร็จ";
header("location: show_top.php");
}

?>
