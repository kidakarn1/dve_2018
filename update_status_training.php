<?php
  include("/connect/conn.php");
  $normal_status = $_POST["normal_status"];
  $normal_id = $_POST["normal_id"];
  $sql = "update training_normal set normal_status = '$normal_status' where normal_id = '$normal_id'";
  $res = mysqli_query($conn,$sql);
  if($res) {
    echo "แก้ไขสำเร็จ";
  } else {
    echo "แก้ไขไม่สำเร็จ";
  }
?>
