<?php

include("../connect/conn.php");
$dep_id= $_POST['dep_id'];
$dep_name= $_POST['dep_name'];
$teacher_id= $_POST['teacher_id'];		
$sql = "insert into department values('$dep_id','$dep_name','teacher_id')";
if ($res = mysqli_query($conn, $sql)) {
    echo "บันทึกสำเร็จ";
    header("location: select_department.php");
} else {
    echo "ไม่สำเร็จ";
}
?>