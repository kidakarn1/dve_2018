<?php
  include("connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  ini_set('max_execution_time', 900); //300 seconds = 5 minutes
  $school_id = $_POST["school_id"];
  $sqlDel = "delete from user where user_type_id = '4'";
  $resDel mysqli_query($conn,$sqlDel);
  $today = date("Y-m-d");
  $sql = "select * from trainer";
  $res = mysqli_query($conn,$sql);password username
  while ($row = mysqli_fetch_array($res)) { 
    $password = $row["trainer_citizen"];
    if (strlen($row["trainer_citizen"]) == 13) {
      $username = md5($row["trainer_citizen"]);
    } else {
      $username = md5($row["trainer_id"]);
    }
    $trainer_name = $row["trainer_name"];
    $trainer_name_arr = explode(" ",$trainer_name);
    $fname = $trainer_name_arr[0];
    $lname = $trainer_name_arr[1];
    $sqlUser = "insert into user values(
      '0',
      '$username',
      '$password',
      '$fname',
      '$lname',
      '',
      '',
      '$school_id',
      '4',
      'N',
      '$today',
      ''
    )";
    $resUser = mysqli_query($conn,$sqlUser);
  }
  header("location: index.php");
?>