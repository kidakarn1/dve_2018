<?php

include("../connect/conn.php");
$connect = $conn;
$type_code = $_POST['type_code'];
$type_name = $_POST['type_name'];
$type_eng = $_POST['type_eng'];
$sql = "update  edu_type set
 type_name='$type_name',  
 type_eng='$type_eng'  
 where type_code ='$type_code'";

if ($res = mysqli_query($conn, $sql)) {
    echo "บันทึกสำเร็จ";
    header("refresh: 1; show.php");
} else {
    echo "ไม่สำเร็จ";
    echo $sql;
}
?>