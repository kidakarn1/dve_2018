<?php
  include("../connect/conn.php");
  date_default_timezone_set("asia/bangkok");
  ini_set('max_execution_time', 900); //300 seconds = 5 minutes


  move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV

  $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
  
  $sqlDel = "delete from minor";
  mysqli_query($conn,$sqlDel);

  // $select_col = array(2,7,8,43,60,46,55,10,17,18,12,13,14,15,5,42,19,20,25,26,34,35,63);
  // echo count($select_col);
  while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {    
    $sqlM = "insert into minor values('{$objArr[0]}','{$objArr[1]}','{$objArr[2]}','{$objArr[3]}','{$objArr[4]}')";
    mysqli_query($conn,$sqlM);
  }
  
  fclose($objCSV);
  echo "<script>alert(Upload & Import Done.)</script>";
  echo "<meta http-equiv='refresh' content='0; url=f_add_minor.php'/>"

?>
