<?php
	include('mpdf.php');
	ob_start();
	include("../connect/conn.php");
$bus=$_POST['bus'];
$major_id=$_POST['major_id'];
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


 <table width="1000">
	<tr>
		<td rowspan="5"><img src="../school/logo_school/<?php echo  $row_school["school_logo"]?>" width="150px"  height="250px"></td>
	<tr><td colspan="6"><h2><center><?php echo $row_school["school_name"]?></h2></center></td></tr>
	<tr><td colspan="6"><h3>สรุปรายชื่อนักศึกษาฝึกงาน</h3></td></tr>
	</tr>
	<tr>
		<td colspan="6"><h3>ภาคเรียนที่  <?php echo $tream?> ปีการศึกษา <?php echo $year?>ระหว่างวันที่ .... ถึงวันที่....</h3></td>
	</tr> 
	<tr>
		<td colspan="6"><h3>ชื่อสถานประกอบการ</h3> <?php echo $row_bus["business_name"]?> <b>ที่อยู่</b> <?php echo  $row_bus["address_no"]?> ตำบล <?php echo  $row_bus["DISTRICT_NAME"]?>  อำเภอ <?php echo  $row_bus["AMPHUR_NAME"]?> จังหวัด <?php echo  $row_bus["PROVINCE_NAME"]?>เบอร์โทรศัพท์ <?php echo $row_bus["contact_phone"]?></td>
	</tr>
 </table>


 <table  width="1000" align="center">
 <tr>
	<td><center><b>ลำดับที่</b></center></td>
	<td><center><b>รหัสนักศึกษา</b></center></td>
	<td><center><b>ชื่อนักศึกษา</b></center></td>
	<td><center><b>ระดับชั้น</b></center></td>
	<td><center><b>แผนกวิชา</b></center></td>
	<td><center><b>หมายเลขโทรศัพท์</b></center></td>
	<td><center><b>หมายเหตุ</b></center></td>
 </tr>
<?php 
	$i=1;
	while ($row_all=mysqli_fetch_assoc($res_all)){
	$std_id=substr($row_all["std_id"],0,2); 
	$std_id=$date-$std_id;
	$year_start=$row_all["start_date"];
	$day_start=$row_all["start_date"];
	$year_start=substr($year_start,0,4);
	$day_start=substr($day_start,8,10);
	$year_start=$year_start+543;

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
	<td align="center"><?php echo $i?></td>
	<td align="center"><?php echo $row_all['std_id']?></td>
	<td align="center"><?php echo $row_all['head_name_std']." ".$row_all['std_name']." ".$row_all['std_lastname']?></td>
	<td align="center"><?php echo $row_all['edu_name']." ".$std_id?></td>
	<td align="center"><?php echo  $row_all['major_name']?></td>
	<td align="center"><?php echo  $row_all['phone']?></td>
	<td align="center"></td>
 </tr>
<?php $i++; }?>
 </table>

 <table width="1000">
   <tr>
     <td colspan="7" align = "right"><p>วันที่ทำรายงาน<?php echo " ".$day_de." ".$mouth_de." ".$year_de?></p></td>
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
	$sql="select * from normal,student,major,business,education where normal.citizen_id = student.citizen_id and student.major_id = major.major_id and major.major_id = '$major_id' and normal.business_id = business.business_id and business.business_id = '$bus' and student.edu_id = education.edu_id" ;
	$res=mysqli_query($connect,$sql);
	return $res; 
	}	
?>
<?php
$html = ob_get_contents();        //เก็บค่า html ไว้ใน $html 
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', '');   //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
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
