<?php 
  include("connect/conn.php");
  $id = $_GET["id"];
  $sql = "delete from training_plan where inter_id = '$id'";
  $res = mysqli_query($conn,$sql);
  if ($res) {
    header("location: del_training_plan.php");
  }
?>