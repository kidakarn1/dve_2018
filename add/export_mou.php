<?php
include("connect/conn.php");
date_default_timezone_set("asia/bangkok");
$strExcelFileName="mou.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");
$sq = "select * from mou";
$sql=mysqli_query($conn,$sq);
$num=mysqli_num_rows($sql);


?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<strong>รายงานการลงนามความร่วมมือ วันที่ <?php echo date("d/m/Y");?> ทั้งหมด <?php echo number_format($num);?> การลงนามความร่วมมือ</strong><br>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
<tr>
  <?php
    $sqlCol = "SHOW COLUMNS FROM mou";
    $resultCol = mysqli_query($conn,$sqlCol);
    while($rowCol = mysqli_fetch_array($resultCol)){
  ?>

  <td align="center" valign="middle" ><strong><?php echo $rowCol['Field'];?></strong></td>
  
  <?php
    }
  ?>
</tr>
<?php
if($num>0){
while($row=mysqli_fetch_array($sql)){
?>
<tr>
  <?php
    $sqlCols = "SHOW COLUMNS FROM mou";
    $resultCols = mysqli_query($conn,$sqlCols);
    while($rowCols = mysqli_fetch_array($resultCols)){
  ?>
    <td align="center" valign="middle" ><?php echo $row[$rowCols['Field']];?></td>
  <?php
    }
  ?>
</tr>
<?php
}
}
?>
</table>
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>