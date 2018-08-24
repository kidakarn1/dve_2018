<?php
  include("../connect/conn.php");
  $inter_year = $_POST["inter_year"];
  $term = $_POST["term"];
  $start_date	= $_POST["start_date"];
  $end_date = $_POST["end_date"];
  $edu_id_p = $_POST["edu_id"];
  $edu_id_arr = explode('_',$edu_id_p);
  $system_id = $edu_id_arr[1];
  $edu_year = $_POST["edu_year"];
  $group_id =  $_POST["group_id"]; 

  $sql = "insert into training_plan values('0','$inter_year','$term','$start_date','$end_date','$group_id','$system_id')";
  $res = mysqli_query($conn,$sql);
  if($res) {
    echo "เพิ่มสำเร็จ";
  } else {
    echo "เพิ่มไม่สำเร็จ";
  }
?>