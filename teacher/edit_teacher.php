<?php

include("../connect/conn.php");
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$position = $_POST['position'];
$dep_id = $_POST['dep_id'];
$citizen_id = $_POST['citizen_id'];
$sql = "update  teacher set 
teacher_name='$teacher_name',
position='$position',
dep_id='$dep_id',
citizen_id='$citizen_id'
where teacher_id='$teacher_id'";
if ($res1 = mysqli_query($conn, $sql)) {
    echo "บันทึกสำเร็จนะจ๊ะ";
    header("location: select_teacher.php");
} else {
    echo "ไม่สำเร็จ";
    echo '$sql';
}
?>