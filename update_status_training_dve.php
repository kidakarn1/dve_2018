<?php
  include("/connect/conn.php");
  $training_status = $_POST["training_status"];
  $training_id = $_POST["training_id"];
  $sql = "update training_dve set training_status = '$training_status' where training_id = '$training_id'";
  $res = mysqli_query($conn,$sql);
  if($res) {
    echo "แก้ไขสำเร็จ";
  } else {
    echo "แก้ไขไม่สำเร็จ";
  }
?>
