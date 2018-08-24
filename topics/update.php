<?php
include("../connect/conn.php");
$connect = $conn;
$id = $_POST['id'];
$topics_name = $_POST['topics_name'];
$sql = "update topics set topics_name='$topics_name' where topics_id='$id'";
if ($res1 = mysqli_query($conn, $sql)) {
    echo "บันทึกสำเร็จนะจ๊ะ";
    header("location: show_top.php");
} else {
    echo "ไม่สำเร็จ";
    echo '$sql';
}
?>