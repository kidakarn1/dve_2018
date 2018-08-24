<?php
  include("connect/conn.php");
  $data_arr = array();
  if($_POST["PROVINCE_CODE"]) {
    $sqlD = "select * from amphur,province where province.PROVINCE_CODE = amphur.PROVINCE_CODE and province.PROVINCE_NAME like '%{$_POST["PROVINCE_CODE"]}%'";
    $resD = mysqli_query($conn,$sqlD);
    while($rowD = mysqli_fetch_array($resD)){
      array_push($data_arr,$rowD["AMPHUR_NAME"]);
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
  }
  if($_POST["AMPHUR_CODE"]) {
    $sqlA = "select * from district,amphur where amphur.AMPHUR_CODE = district.AMPHUR_CODE and amphur.AMPHUR_NAME like '%{$_POST["AMPHUR_CODE"]}%'";
    $resA = mysqli_query($conn,$sqlA);
    while($rowA = mysqli_fetch_array($resA)){
      array_push($data_arr,$rowA["DISTRICT_NAME"]);
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
  }
  if($_POST["DISTRICT_CODE"]) {
    $sqlZ = "select * from zipcodes,district where zipcodes.district_code = district.DISTRICT_CODE and district.DISTRICT_NAME like '%{$_POST["DISTRICT_CODE"]}%'";
    $resZ = mysqli_query($conn,$sqlZ);
    while($rowZ = mysqli_fetch_array($resZ)){
      array_push($data_arr,$rowZ["zipcode"]);
    }
    echo json_encode($data_arr, JSON_UNESCAPED_UNICODE);
  }
?>