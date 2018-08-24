<?php 
  function thaiMonth($index) {
    if (substr($index,0,1) == 0) {
      $index = str_replace("0","",$index);
    } 
    $thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    return $thai_month_arr[$index];
  }
  function dateThai($d) {
    $d_arr = explode('-',$d);
    $thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
    $yTH = $d_arr[0]+543;
    if (substr($d_arr[1],0,1) == 0) {
      $d_arr[1] = str_replace("0","",$d_arr[1]);
    } 
    $dTH = $d_arr[2]." ".$thai_month_arr[$d_arr[1]]." ".$yTH;
    return $dTH;
  }
?>
