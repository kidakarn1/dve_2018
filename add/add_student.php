<?php
  include("../connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  ini_set('max_execution_time', 900); //300 seconds = 5 minutes


  move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

  $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
  
  $sqlDel = "delete from user where user_type_id = '1'";
  mysqli_query($conn,$sqlDel);

  $sqlDelS = "delete from student";
  mysqli_query($conn,$sqlDelS);


  // $select_col = array(2,7,8,43,60,46,55,10,17,18,12,13,14,15,5,42,19,20,25,26,34,35,63);
  // echo count($select_col);
  while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

    // $number_col = count($objArr);
    // for($i = 0;$i<$number_col;$i++) {
    //   $sqlS = "insert into student values(";
    //   if(array_search($i,$select_col)) {
    //     $sqlT = $sqlT."'".$objArr[$i]."',";
    //   }
    //   $sqlD = ");";
    // }
    // $sqlStd = $sqlS.$sqlT.$sqlD;
  if ($objArr[44]) {
     $today = date("Y-m-d");
     $std_id = $objArr[44];
     $std_name = $objArr[6];
     $std_lastname = $objArr[7];
     $GPA = $objArr[42];
    // $major_id = $row["major_id"];
  
    // $sqlMinor = "select * from minor where major_id = '$major_id'";
    // $resMinor = mysqli_query($conn,$sqlMinor);
    // $rowMinor = mysqli_fetch_array($resMinor);
     $group_id = $objArr[45];
    // $minor_id = $rowMinor["minor_id"];
     $edu_id = substr($std_id, 2, 1);
     $birthday = $objArr[9];
     $pass = md5($birthday);
     $birthyear =  explode("/",$birthday);
     $age = (date("Y")+543)-$birthyear[2];
     $height = $objArr[16];
     $weight = $objArr[17];
    //phone
     $address_number = $objArr[11];
     $moo = $objArr[12];
    //soi
     $road = $objArr[13];
     $district = $objArr[14];
     $id_card = $objArr[4];
    //genius
    //sex
     $system_id = $objArr[54];
     $dep_id = substr($std_id, 3, 3);
    //head_dad_name
     $dad_name = $objArr[18];
     $dad_lname = $objArr[19];
    //head_mom_name
     $mom_name = $objArr[24];
     $mom_lname = $objArr[25];
     $parent_name = $objArr[33];
    //head_parent_name
     $parent_lname = $objArr[34];
     $end_edu_id = $objArr[62];
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
  }
  
  fclose($objCSV);
  echo "<script>alert(Upload & Import Done.)</script>";
  echo "<meta http-equiv='refresh' content='0; url=f_add_student.php'/>"

?>
