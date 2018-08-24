<?php
	include('mpdf.php');
	ob_start();
	include("../connect/conn.php");
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
$bus=$_POST['bus'];
$tream=$_POST['tream'];
$year=$_POST['year'];
$connect=$conn;
$res_school=select_school($connect);
$res_bus=select_bus($connect,$bus);
$row_bus=mysqli_fetch_assoc($res_bus);
$row_school=mysqli_fetch_assoc($res_school);
$res_all=select_all($connect,$bus,$business_id,$trainer_id,$school,$res_bus);
//$res_group_by=select_group_by($connect);

date_default_timezone_set('asia/bangkok');
$date=date("Y");
$year_de=date("Y");
$year_de=$year_de+543;
$mouth_de=date("m");
$day_de=date("d");
$date=substr($date,2,2);
$date=$date+43;
$number2 = array('01' => 'มกราคม',
'02' => 'กุมภาพันธ์',
'03' => 'มีนาคม',
'04' => 'เมษายน',
'05' => 'พฤษภาคม',
'06' => 'มิถุนายน',
'07' => 'กรกฎาคม',
'08' => 'สิงหาคม',
'09' => 'กันยายน',
'10' => 'ตุลาคม',
'11' => 'พฤศจิกายน',
'12' => 'ธันวาคม',
);
$mouth_de = $number2[$mouth_de];
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

 </head>
 <body>

 <center>

 <table width="1000" align="center" border="0">
	<tr>
	<tr><td colspan="5"><h1><center><?php echo $row_school["school_name"]?></center></h1></td></tr>
	<tr><td colspan="5"><center><h2>รายงานจำนวนครูฝึกในสถานประกอบการ</center></h2></td></tr>
	<tr><td colspan="5"><center><h2>ภาคเรียนที่ <?php echo $tream?>   ปีการศึกษา<?php echo $year?></h2> </td></center></tr>
	</tr>
 </table>
 <table width="1000" align="center" border="1">
 <tr>
	<td><center><h3>ลำดับที่</h3></center></td>
	<td><center><h3>ชื่อสถานประกอบการ</h3></center></td>
	<td><center><h3>ที่อยู่</h3></center></td>
	<td><center><h3>จำนวนครูฝึกในสถานประกอบการ</h3></center></td>
	<td><center><h3>หมายเหตุ</h3></center></td>
 </tr>
<?php 
	$i=1;
	while ($row_all=mysqli_fetch_assoc($res_all)){
	?>
 <tr>
	<td><center><font size = "16px"><?php echo $i?></font></center></td>
	<td><font size = "16px"><?php echo $row_all['business_name']?></font></td>
	<td><font size = "16px"><?php echo $row_all['address_no']." ".$row_all['road']." ".$row_all['DISTRICT_NAME']." ".$row_all['AMPHUR_NAME']." ".$row_all['PROVINCE_NAME']?></font></td>
    <td><center><font size = "16px"><?php echo $row_all['nub']?></center></font></td>
    <td><font size = "16px"><?php echo $row_all['select_2t']?></font></td>
 </tr>
<?php $i++; }?>
 </table>

 <table width="1000" border="1">
   <tr>
     <td colspan="7" align = "right"><p>วันที่ทำรายงาน<?php echo " ".$day_de." ".$mouth_de." ".$year_de?></p></td>
 </tr>
  </table>

  </center>
  
  
 </body>
</html>
<?php

function select_school($connect){
$sql="select * from school";
$res=mysqli_query($connect,$sql);
return $res;
}
function select_bus($connect,$bus){
	$sql="select * from business,district,amphur,province
	where business_id='$bus' and business.district_id = district.DISTRICT_CODE and district.AMPHUR_CODE = amphur.AMPHUR_CODE and amphur.PROVINCE_CODE = province.PROVINCE_CODE ";
	$res=mysqli_query($connect,$sql);
	return $res;
	}

	//function select_all($connect,$bus,$business_id){
	//$sql="select * from trainer,business where trainer.business_id = business.business_id" ;
	//$res=mysqli_query($connect,$sql);
	//return $res; 
	//}
	function select_all($connect){
	$sql="select count(trainer.trainer_id) as nub, business.business_name,business.address_no,business.road,district.DISTRICT_NAME,amphur.AMPHUR_NAME,province.PROVINCE_NAME FROM trainer,business,district,amphur,province where trainer.business_id = business.business_id and business.district_id = district.DISTRICT_CODE and district.AMPHUR_CODE = amphur.AMPHUR_CODE and amphur.PROVINCE_CODE = province.PROVINCE_CODE GROUP BY trainer.business_id" ;
		$res=mysqli_query($connect,$sql);
		return $res; 
		}
	

?>
<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4-L', '', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("PDF/MyPDF.pdf");         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสด
	function thaiMonth($index) {
		$thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"                 
		);
		return $thai_month_arr[$index];
	}
?>
ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: PDF/MyPDF.pdf');?>
