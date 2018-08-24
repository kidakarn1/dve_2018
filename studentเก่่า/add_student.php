<?php
  include("../connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  ini_set('max_execution_time', 900); //300 seconds = 5 minutes
  $sqlDel = "delete from user where user_type_id = '1'";
  $resDel = mysqli_query($conn,$sqlDel);
  $today = date("Y-m-d");
  $school_id = $_POST["school_id"];
  $sql = "select 
  student_id,
  stu_fname,
  stu_lname,
  gpa,
  minor_name,
  group_id,
  std_edu_id,
  birthday,
  tall,
  weight,
  home_id,
  moo,
  street,
  tumbol_id,
  people_id,
  major_id,
  fat_fname,
  fat_lname,
  mot_fname,
  mot_lname,
  par_fname,
  par_lname,
  end_edu_id
  from std";

  $res = mysqli_query($conn,$sql);
  while ($row = mysqli_fetch_array($res)) {
    $std_id = $row["student_id"];
    $std_name = $row["stu_fname"];
    $std_lastname = $row["stu_lname"];
    $GPA = $row["gpa"];
    // $major_id = $row["major_id"];
  
    // $sqlMinor = "select * from minor where major_id = '$major_id'";
    // $resMinor = mysqli_query($conn,$sqlMinor);
    // $rowMinor = mysqli_fetch_array($resMinor);
    $group_id = $row["group_id"];
    // $minor_id = $rowMinor["minor_id"];
    $edu_id = substr($std_id, 2, 1);
    $birthday = $row["birthday"];
    $pass = md5($birthday);
    $birthyear =  explode("/",$birthday);
    $age = (date("Y")+543)-$birthyear[2];
    $height = $row["tall"];
    $weight = $row["weight"];
    //phone
    $address_number = $row["home_id"];
    $moo = $row["moo"];
    //soi
    $road = $row["street"];
    $district = $row["tumbol_id"];
    $id_card = $row["people_id"];
    //genius
    //sex
    $system_id = $row["std_edu_id"];
    $dep_id = substr($std_id, 3, 3);
    //head_dad_name
    $dad_name = $row["fat_fname"];
    $dad_lname = $row["fat_lname"];
    //head_mom_name
    $mom_name = $row["mot_fname"];
    $mom_lname = $row["mot_lname"];
    $parent_name = $row["par_fname"];
    //head_parent_name
    $parent_lname = $row["par_lname"];
    $end_edu_id = $row["end_edu_id"];
    /////////////////////////////////
    $std_name_m = $std_name." ".$std_lastname;

    $sqlStd = "insert into student values(
    '$std_id',
    '',
    '$std_name_m',
    '$GPA',
    '$minor_id',
    '$group_id',
    '$edu_id',
    '$birthday',
    '$age',
    '$height',
    '$weight',
    '',
    '$address_number',
    '$moo',
    '',
    '$road',
    '$district',
    '$id_card',
    '',
    '',
    '$system_id',
    '$dep_id',
    '',
    '',
    '$dad_name',
    '$dad_lname',
    '',
    '$mom_name',
    '$mom_lname',
    '$parent_name',
    '',
    '$parent_lname',
    '$end_edu_id',
    '',
    '',
    '')";
    $resStd = mysqli_query($conn,$sqlStd);

    $sqlUser = "insert into user values('0','$std_id','$pass','$std_name','$std_lastname','','','$school_id','1','Y','$today','')";
    $resUser = mysqli_query($conn,$sqlUser);

    
  }
  header("location: ../index.php");

  ?>