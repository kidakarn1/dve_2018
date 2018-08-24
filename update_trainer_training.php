<?php
  include("/connect/conn.php");
  echo $training_id = $_POST["training_id"];
  $trainer_id = $_POST["trainer_id"];
  $teacher_id = $_POST["teacher_id"];
  echo $sql = "update training_dve set trainer_id = '$trainer_id', teacher_id = '$teacher_id'  where training_id = '$training_id'";
  $res = mysqli_query($conn,$sql);
  if($res) {
    echo "แก้ไขสำเร็จ";
  } else {
    echo "แก้ไขไม่สำเร็จ";
  }
?>
