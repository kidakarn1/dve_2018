<?php

include('../connect/conn.php');
$topics_name = $_POST["topics_name"];

$sql = "insert into topics values('','$topics_name')";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("location: show_top.php");
} else {
    echo "insert error";
}
?>
