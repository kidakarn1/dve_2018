<?php
  include("connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  @SESSION_START();
  $_SESSION["citizen_id"] = $citizen_id = $_POST["citizen_id"];
  $business_id = $_POST["business_id"];
  $school_id = $_POST["school_id"];
  $major_minor_id = $_POST["major_minor_id"];
  $major_minor_id_arr = explode(",",$major_minor_id);
  $minor_id = $major_minor_id_arr[0];
  $major_id = $major_minor_id_arr[1];
  $sqlTrainer = "select * from trainer where business_id = '$business_id'";
  $resTrainer = mysqli_query($conn,$sqlTrainer);
  $rowTrainer = mysqli_fetch_array($resTrainer);
  $trainer_id = $rowTrainer["trainer_id"];
  $contract_date = date("Y-m-d");
  $std_id = $_POST["std_id"];
  $edu_id = substr($_POST["std_id"],2,1);
  $dep_id = substr($_POST["std_id"],3,3);
  $system_id = $_POST["system_id"];
  $level = $_POST["level"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $h_name_std = $_POST["h_name_std"];
  $h_parent_std = $_POST["h_parent_std"];
  $h_mom_std = $_POST["h_mom_std"];
  $h_dad_std = $_POST["h_dad_std"];
  $genius = $_POST["genius"];

  if ($edu_id == 2) {
    if ($level > 3) {
        $level =  "3";
    } else {
      $level =  $level;
    }
  }
  if ($edu_id == 3) {
    if ($level > 2) {
        $level =  "2";
    } else {
      $level =  $level;
    }
  }
  $group_id = $_POST["group_id"];
  $sub_std_groups=substr($std_id,0,6);
  $sub_std_groups=$sub_std_groups.$group_id;
  if (strpos($group_id,'0') == 0) {
    $group_id = substr($_POST["group_id"],1);
  }
  $sqlInter = "select * from  training_plan where group_id = '{$sub_std_groups}'and system_id = '{$system_id}'";
  $resInter = mysqli_query($conn,$sqlInter);
  $rowInter = mysqli_fetch_array($resInter);
  $start_date = $rowInter["start_date"];
  $end_date = $rowInter["end_date"];
  $semester = $rowInter["term"];
  $year_n = $rowInter["inter_year"];

  $sqlUser = "update user set email = '$email', phone = '$phone' where username = '$std_id'";
  $resUser = mysqli_query($conn,$sqlUser);

  $sqlStd = "update student set head_name_std = '$h_name_std', head_dad_name = '$h_dad_std', head_mom_name = '$h_mom_std', head_parent_name = '$h_parent_std', 
  phone = '$phone', genius = '$genius', major_id = '$major_id' where std_id = '$std_id'";
  $resStd = mysqli_query($conn,$sqlStd);

  $training_status = "อื่นๆ";
  if ($system_id == 2) {

    echo $sqlCheckT = "select * from training_dve where citizen_id = '$citizen_id'";

    $resCheckT = mysqli_query($conn,$sqlCheckT);
    $rowCheckT = mysqli_fetch_array($resCheckT);
    if ($rowCheckT["citizen_id"]) {
      $sqlDel = "delete from training_dve where citizen_id = '$citizen_id'";
      $resDel = mysqli_query($conn,$sqlDel);
    }
    $sql= "insert into training_dve values('0','$citizen_id','$business_id','$minor_id','0','0','$contract_date','$start_date','$end_date','$training_status')";
    $res = mysqli_query($conn,$sql);
    echo "<script> alert('บันทึกข้อมูลการฝึกอาชีพเรียบร้อย');
     window.location.href='staff_new/menu_dve.php';
          </script>";
  } else if ($system_id ==1) {

    
    echo $sqlCheck = "select * from training_normal where citizen_id = '$citizen_id'";
   
    $resCheck = mysqli_query($conn,$sqlCheck);
    $rowCheck = mysqli_fetch_array($resCheck);
    if ($rowCheck["citizen_id"]) {
      $sqlDel = "delete from training_normal where citizen_id = '$citizen_id'";
      $resDel = mysqli_query($conn,$sqlDel);
    }
     $sqlN= "insert into training_normal values('0','$citizen_id','$business_id','$minor_id','$contract_date','$start_date','$end_date','$training_status')";
     $resN = mysqli_query($conn,$sqlN);
     echo "<script> alert('บันทึกข้อมูลการฝึกงานเรียบร้อย');
     window.location.href='staff_new/menu_dve.php';
          </script>";
  }
  // header("location:index.php");
?>