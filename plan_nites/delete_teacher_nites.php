<?php
include('../connect/conn.php');
echo $id = $_GET['id'];
$sql = "delete from plan_nites where plan_id = '$id'";
if ($res = mysqli_query($conn, $sql)) {
    echo "ลบสำเร็จ";
    header("location: table_teacher_nites.php");
} else {
    echo 'ลบไม่สำเร็จ';
}
?>
