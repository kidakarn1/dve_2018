<?php 
include("connect/conn.php");
$sql = "select * from trainer";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res)) {
  if(!checkID($row["trainer_citizen"])){
    $id = $row["trainer_id"];
    $sqlDel = "delete from trainer where trainer_id = '$id'";
    $sqlDel = mysqli_query($conn,$sqlDel);
  }
}
function checkID($id){
  if(strlen($id) != 13) return false;
  for($i=0, $sum=0; $i < 12; $i++)
    $sum += (float)$id{$i}*(13-$i); 
  if((11-$sum%11)%10!=(float)$id{12})
    return false; 
  return true;
}
?>