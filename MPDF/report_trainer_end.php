<?php
	include('mpdf.php');
	ob_start();
	include("../connect/conn.php");
$bus=$_POST['bus'];
$tream=$_POST['tream'];
$year=$_POST['year'];
$connect=$conn;
$res_major=select_major($connect,$major_id);
$res_school=select_school($connect);
$res_bus=select_bus($connect,$bus);
$row_bus=mysqli_fetch_assoc($res_bus);
$row_school=mysqli_fetch_assoc($res_school);
$res_all=select_all($connect,$bus,$major_id);
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
     <p align = "right"></p>
 <center>

 <table width="1000" >
	<tr>
		<td rowspan="5"><center><img src="../school/logo_school/<?php echo  $row_school["school_logo"]?>" width="150px"  height="170px"></center></td>
	<tr><td colspan="6"><h1><center><?php echo $row_school["school_name"]?></h1></center></td></tr>
	<tr><td colspan="6"><center><h2>รายงานข้อมูลครูฝึก ภาคเรียนที่  <?php echo $tream?> ปีการศึกษา <?php echo $year?></h2></td></center></tr>
	</tr>
	<tr> 
		<td colspan="6"><h4></h4></td>
		<td></td>
	</tr> 
 </table>
 
 <table width="1000" align="center" border="1">
 <tr>

	<td><center><h3>ลำดับที่</center></font></td>
	<td><center><h3>ชื่อครูฝึก</center></td>
	<td><center><h3>วุฒิการศึกษาสูงสุด</center></td>
	<td><center><h3>วิชาที่สอน</center></td>
	<td><center><h3>ชื่อสถานประกอบการ</center></td>
	<td><center><h3>หมายเหตุ</center></td>

 </tr>
<?php 
	$i=1;
	while ($row_all=mysqli_fetch_assoc($res_all)){
	$std_id=substr($row_all["std_id"],0,2); 
	$std_id=$date-$std_id;
	if ($row_all['edu_id']=='2'){
		if ($std_id >'3'){
		$std_id='3';
		}
	}
	if ($row_all['edu_id']=='3'){
		if ($std_id >'2'){
		$std_id='2';
		}
	}

	?>
 <tr>
	<td align="center"><font size = "16px"><?php echo $i?></h3></td>
	<td><font size = "16px"><?php echo $row_all['trainer_name']?></font></td>
	<td><font size = "16px"><?php echo $row_all['edu_name']?></td>
    <td></td>
    <td><font size = "16px"><?php echo $row_all['business_name']?></td>
    <td></td>
 </tr>
<?php $i++; }?>
 </table>

 <table width="1000">
   <tr>
     <td colspan="7" align = "right">วันที่ทำรายงาน<?php echo " ".$day_de." ".$mouth_de." ".$year_de?></td>
	</tr>
  </table>

  </center>
  
  
 </body>
</html>
<?php
function select_major($connect,$major_id){
$sql="select * from business,student,normal,major where normal.business_id ='$major_id' normal.citizen_id = student.id_card and student.major_id = major.major_id";
$res=mysqli_query($connect,$sql);
return $res;
}
function select_school($connect){
$sql="select * from school";
$res=mysqli_query($connect,$sql);
return $res;
}
function select_bus($connect,$bus){
	$sql="select * from business,district,amphur,province
	where business_id='$bus' and business.district_id = district.DISTRICT_CODE and district.AMPHUR_CODE = amphur.AMPHUR_CODE and amphur.PROVINCE_CODE = province.PROVINCE_CODE";
	$res=mysqli_query($connect,$sql);
	return $res;
	}
function select_all($connect,$bus,$major_id){
	$sql="select * from trainer,education,business where trainer.educational_id = education.edu_id and trainer.business_id = business.business_id" ;
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
