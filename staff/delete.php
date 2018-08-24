<?php

include('../connect/conn.php');
echo $user_id = $_GET['user_id'];
$sql = "delete from user where user_id = '$user_id'";
if ($res = mysqli_query($conn, $sql)) {
    echo "ลบสำเร็จ";
    header("location: view.php");
} else {
    echo 'ลบไม่สำเร็จ';
}
?>
