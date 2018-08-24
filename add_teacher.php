<?php
  include("connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  ini_set('max_execution_time', 900); //300 seconds = 5 minutes
  $school_id = $_POST["school_id"];
  $today = date("Y-m-d");
  $sqlDel = "delete from user where user_type_id = '5'";
  $resDel = mysqli_query($conn,$sqlDel);
  $sql = "select * from teacher";
  $res = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($res)) {
    $username = $row["citizen_id"];
    $password = md5($row["citizen_id"]);
    $teacher_name = $row["teacher_name"];
    $teacher_name_arr = explode(" ",$teacher_name);
    $fname = $teacher_name_arr[0];
    $lname = $teacher_name_arr[1];
    if ($lname == "") {
      $teacher_name_arr = explode("  ",$teacher_name);
      $fname = $teacher_name_arr[0];
      $lname = $teacher_name_arr[1];  
    }
    $sqlUser = "insert into user values(
      '0',
      '$username',
      '$password',
      '$fname',
      '$lname',
      '',
      '',
      '$school_id',
      '5',
      'N',
      '$today',
      ''
    )";
    $resUser = mysqli_query($conn,$sqlUser);
  }
  header("location: index.php");
?>