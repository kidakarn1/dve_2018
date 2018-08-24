<?php
  include("../connect/conn.php");
  $id = $_GET["id"];
  $sql = "delete from trainer where trainer_citizen = '$id'";
  $res = mysqli_query($conn,$sql);

  $sqlUser = "delete from user where username = '$id'";
  $resUser = mysqli_query($conn,$sqlUser);

  if($res && $resUser) {
    header("location: show_trainer.php");
  } 
?>
