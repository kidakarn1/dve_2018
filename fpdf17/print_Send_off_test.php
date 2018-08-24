<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
		include("../connect/conn.php");
		 include("function_date.php");
date_default_timezone_set('asia/bangkok');
$id=$_PORT['id'];
$sql_bus = "select * from training_normal,business,student,major,department 
where training_normal.citizen_id = '$id' 
and  training_normal.business_id = business.business_id 
and training_normal.citizen_id = student.std_id
and student.major_id = major.major_id 
and student.dep_id = department.dep_id 
and training_normal.business_id = business.business_id  ";

$business_id=$_POST["business_id"];
$sql_b="select *,business.road from business,district,amphur,province,training_normal,student,major,department 
where business.district_id=district.DISTRICT_CODE 
and business.aumphur_id=amphur.AMPHUR_CODE 
and business.province_id=province.PROVINCE_CODE 
and business.business_id=training_normal.business_id 
and training_normal.citizen_id=student.citizen_id
and student.major_id = major.major_id 
and student.dep_id = department.dep_id 
and business.business_id= '$business_id'";
$res_b=mysqli_query($conn,$sql_b);
$row_b=mysqli_fetch_assoc($res_b);


$res_bus=mysqli_query($conn,$sql_b);
$res_bus1=mysqli_query($conn,$sql_b);
$res_while=mysqli_query($conn,$sql_b);
$row_bus=mysqli_fetch_assoc($res_bus);
$nub=mysqli_num_rows($res_bus1);
$day=date("d");
$y=date("y")+43;
$year=date("Y")+543;
$year1=$date[0]+543;
$year_end=$date_1[0]+543;
$month=date("m");
$date[1]."-".$date[0]."<br>";
$date_1[1]."-".$date_1[0];
$day12=date("d",strtotime("+10 day"));
$std=$row_b['std_id'];
$sub_std=substr($std,0,2);
$sub_std_edu=substr($std,2,1);
$y=$y-$sub_std;
$y=$y+1;		  
if ($sub_std_edu=='2'){
		   $edu = 'ปวช';
		   }
		   if ($sub_std_edu=='3'){
		   $edu = 'ปวส';
		   }

//echo $date12 = $date+10;
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
$number2[$month];
$mouth_number=$date[1];
$number2[$mouth_number];
$mouth_number_end=$date_1[1];
$number2[$mouth_number_end];
$m=$number2[$month];//เดือน
$date_1[$month];
$date_end=$date_1[1];
$date_naja=$row_bus['internship_date'];
$date_naja_b=$row_bus['internship_date_end'];
$date_naja1=explode("-",$date_naja);
$date_naja_b1=explode("-",$date_naja_b);
$date_na_a=$date_naja1[0]+543;
$date_na_b=$date_naja_b1[0]+543;
$mouth1=$date_naja1[1];
$mouth2=$date_naja_b1[2];
		  require('fpdf.php');
        define('FPDF_FONTPATH', 'font/');
		?>
            <?php
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->Ln(5); //เว้นบรรทัด
        $pdf->AddFont('angsa', '', 'angsa.php');
        $pdf->SetFont('angsa', '', 16);
		$pdf->Image('b.jpg',91,12,30,0,'','http://www.chontech.ac.th/');
        ?>
<?php
		
		$pdf->Ln(20);
			$pdf -> SetLeftMargin(20);
			$pdf ->Cell(10,7,iconv( 'UTF-8','TIS-620','ที่ ศธ ๐๖๒๓.๑/'), 0 ,0,"C");
			$pdf ->Cell(305,7,iconv( 'UTF-8','TIS-620','วิทยาลัยเทคนิคชลบุรี'), 0 ,1,"C");
			

			$pdf->Cell(330, 7, iconv('UTF-8', 'TIS-620', '๒๐๕ ม. ๓ ต.หนองชาก'), 0, 1, "C");
			$pdf->Cell(322, 7, iconv('UTF-8', 'TIS-620', 'อ.บ้านบึง จ.ชลบุรี '), 0, 1, "C");
            $pdf->Cell(308, 7, iconv('UTF-8', 'TIS-620', '๒๐๑๗๐'), 0, 1, "C");
			$pdf->Ln(2);
            $pdf->Cell(200, 7, iconv('UTF-8', 'TIS-620', 
			$day." ".$number2[$month]." ".$year
			), 0, 1, "C");
			$pdf->Ln(2);
		   $pdf->Cell(100, 7, iconv('UTF-8', 'TIS-620', 'เรื่อง ขอความอนุเคราะห์รับนักเรียน / นักศึกษาเข้าฝึกประสบการณ์วิชาชีพ'), 0, 1, "C");
		   $pdf->Ln(1);
		   $pdf->Cell(78, 7, iconv('UTF-8', 'TIS-620', 'เรียน ผู้จัดการ '.$row_bus['business_name']), 0, 1, "C");
		   $pdf->Ln(1);
			 $pdf->Cell(145, 7, iconv('UTF-8', 'TIS-620', 'สิ่งที่ส่งมาด้วย   ๑. หนังสือตอบรับนักเรียน / นักศึกษาเข้ารับการฝึกประสบการณ์วิชาชีพ จำนวน ๑ ฉบับ'), 0, 1, "C");
		  $pdf->Cell(138, 7, iconv('UTF-8', 'TIS-620', '๒. แบบสอบถามข้อมูลครูฝึกในสถานประกอบการ จำนวน ๑ ฉบับ'), 0, 1, "C");
		  $pdf->Ln(5);
		  $pdf->Cell(173, 7, iconv('UTF-8', 'TIS-620', 'ด้วยวิทยาลัยเทคนิคชลบุรีได้จัดการเรียนการสอนอาชีวศึกษา ประเภทวิชาช่าง'.$row_bus['dep_name']), 0, 1, "C");
		  $pdf->Cell(148, 7, iconv('UTF-8', 'TIS-620', 'ระดับชั้น ปวช และ ปวส. ซึ่งตามหลักสูตรกำหนดให้ ผู้ที่สำเร็จการศึกษาจะต้องเข้ารับการฝึกประสบการณ์'), 0, 1, "C");
		   $pdf->Cell(153,7, iconv('UTF-8', 'TIS-620', 'วิชาชีพในสถานประกอบการ วิทยาลัยฯ เห็นว่าหน่วยงานของท่านมีการดำเนินงานที่เหมาะสม ควรที่นักเรียน/'), 0, 1, "C");
		    $pdf->Cell(145,7, iconv('UTF-8', 'TIS-620', 'นักศึกษาจะได้เรียนรู้และฝึกประสบการณ์วิชาชีพ วิทยาลัยฯ จึงขอความอนุเคราะห์จากท่านได้อนุญาตให้'), 0, 1, "C");
			$pdf->Cell(155,7, iconv('UTF-8', 'TIS-620', 'นักเรียน/นักศึกษา เข้าฝึกประสบการณ์วิชาชีพในสถานประกอบการและโปรดกรอกข้อความในหนังสือตอบรับ'), 0, 1, "C");
			$pdf->Cell(160,7, iconv('UTF-8', 'TIS-620', 'พร้อมส่งคืนกลับคืนให้วิทยาลัยฯ ทาง e-mail. dvtchontech@gmail.com หรือ Fax. ๐๓๘-๔๘๕-๒๐๕+
			'), 0, 1, "C");
			//$pdf->Ln(5); 
			$pdf->Cell(42,7, iconv('UTF-8', 'TIS-620', 'ภายในวันที่'." ".$day12." ".$m." ".$year), 0, 1, "C");
			 $pdf->Cell(170,7, iconv('UTF-8', 'TIS-620', 'วิทยาลัยฯ หวังเป็นอย่างยิ่งว่าจะได้รับความอนุเคราะห์จากท่านด้วยดีและขอขอบคุณมา'), 0, 1, "C");
			  $pdf->Cell(10,7, iconv('UTF-8', 'TIS-620', 'ณ โอกาสนี้'), 0, 1, "C");		
					 $pdf->Ln(5);
					 $pdf->Cell(80,7, iconv('UTF-8', 'TIS-620', 'จึงเรียนมาเพื่อโปรดทราบ'), 0, 1, "C");
					  $pdf->Ln(10);
					 $pdf->Cell(194,7, iconv('UTF-8', 'TIS-620', 'ขอแสดงความนับถือ'), 0, 1, "C");
					  $pdf->Ln(12);
					  $pdf->Cell(198,7, iconv('UTF-8', 'TIS-620', '( นายชลวัฒน์ ศิริวาจา )'), 0, 1, "C");
					  $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', 'รองผู้อำนวยการ รักษาการในตำแหน่ง'), 0, 1, "C");
					  $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', 'ผู้อำนวยการวิทยาลัยเทคนิคชลบุรี'), 0, 1, "C");
					  $pdf->Ln(30);$pdf->SetFont('angsa', '', 14);
					  $pdf->Cell(33,4, iconv('UTF-8', 'TIS-620', 'งานอาชีวศึกษาระบบทวิภาคี/ฝ่ายวิชาการ'), 0, 1, "C");
					  $pdf->Cell(60,4, iconv('UTF-8', 'TIS-620', 'โทร. ๐-๓๘๔๘-๕๒๐๒ ต่อ ๑๖๖ โทรสาร. ๐-๓๘๔๘-๕๒๐๕'), 0, 1, "C");
					  $pdf->Cell(24,4, iconv('UTF-8', 'TIS-620', 'E-mail : dvtchontech@gmail.com'), 0, 1, "C");


$pdf->Ln(10);
$pdf->SetFont('angsa', '', 16);
			$pdf -> SetLeftMargin(20);
			$pdf ->Cell(280,7,iconv( 'UTF-8','TIS-620',$row_b['business_name']), 0 ,1,"C");

			$pdf->Cell(270, 7, iconv('UTF-8', 'TIS-620',$row_b['address_no']."  ".$row_b['road']."  ".$row_b['DISTRICT_NAME']), 0, 1, "C");
			$pdf->Cell(260, 7, iconv('UTF-8', 'TIS-620',$row_b['AMPHUR_NAME']."  ".$row_b['PROVINCE_NAME']."  ".$row_b['postcode']), 0, 1, "C");
            $pdf->Cell(250, 7, iconv('UTF-8', 'TIS-620', ''), 0, 1, "C");
			$pdf->Ln(2);
            $pdf->Cell(210, 7, iconv('UTF-8', 'TIS-620', 'วันที่'." ".$day." ".$number2[$month]." ".$year), 0, 1, "C");
			$pdf->Ln(2);
		   $pdf->Cell(100, 7, iconv('UTF-8', 'TIS-620', 'เรื่อง การตอบรับนักเรียน / นักศึกษาเข้าฝึกงานในสถานประกอบการ'), 0, 1, "C");
		   $pdf->Ln(1);
		   $pdf->Cell(58, 7, iconv('UTF-8', 'TIS-620', 'เรียน ผู้อำนวยการวิทยาลัยเทคนิคชลบุรี'), 0, 1, "C");
			 $pdf->Ln(1);
			 $pdf->Cell(145, 7, iconv('UTF-8', 'TIS-620', 'ตามหนังสือของวิทยาลัยเทคนิคชลบุรี ที่ ศธ 0623.1/1397 ลงวันที่ '.$day." ".$number2[$month]." ".$year." ".'เรื่องขอ'), 0, 1, "C");
		  $pdf->Cell(100, 7, iconv('UTF-8', 'TIS-620', 'ความอนุเคราะห์นักเรียน'.$row_b['business_name']), 0, 1, "C");
		  $pdf->Ln(5);
		  $pdf->Image('4.jpg',28,83,7,0,'','http://www.chontech.ac.th/');
		  $pdf->Cell(135, 7, iconv('UTF-8', 'TIS-620', 'ยินดีรับนักเรียน/นักศึกษาเข้าฝึกงานตามวันที่ทางสถานศึกษากำหนด'), 0, 1, "C");
		  $pdf->Cell(135, 7, iconv('UTF-8', 'TIS-620', '( ฝึกงานระหว่าง วันที่'."  ".dateThai($row_b['start_date'])." ".'ถึง'."  ".dateThai($row_b['end_date'])." ".')'), 0, 1, "C");
		   $pdf->Cell(140,7, iconv('UTF-8', 'TIS-620', 'ระดับชั้น '.$edu." ".
		   'สาขาวิชา'.$row_b['major_name']." ".'จำนวน '.$nub." ".'คน'." ".'ดังนี้'), 0, 1, "C");
			$i=1;
            while ($row_select=mysqli_fetch_assoc($res_while)){
			$pdf->Cell(135,7, iconv('UTF-8', 'TIS-620', $i."".'.'." ".$row_b['std_name']."  ".$row_b['std_lastname'].'รหัส'."  ".	
			$row_b['std_id']." "."เบอร์โทร." .$row_b['phone']), 0, 1, "C");
			$i++;
            }
			$pdf->Ln(5);
			$pdf->Image('4.jpg',28,115,7,0,'','http://www.chontech.ac.th/');
			$pdf->Cell(110,7, iconv('UTF-8', 'TIS-620', 'ขออภัยไม่สามารถรับนักเรียน/นักศึกษาเข้าฝึกงานได้'), 0, 1, "C");
			$pdf->Ln(5); 
			$pdf->Cell(20,7, iconv('UTF-8', 'TIS-620', 'เนื่องจาก'), 0, 1, "C");
			 $pdf->Cell(165,7, iconv('UTF-8', 'TIS-620', '...........................................................................................................................................................................................'), 0, 1, "C");
					 $pdf->Ln(5);
					 $pdf->Cell(40,7, iconv('UTF-8', 'TIS-620', 'จึงเรียนมาเพื่อโปรดทราบ'), 0, 1, "C");
					  $pdf->Ln(10);
					 $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', 'ขอแสดงความนับถือ'), 0, 1, "C");
					  $pdf->Ln(12);
					  $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', '(ลงชื่อ)..................................................'), 0, 1, "C");
					  $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', '(.........................................................)'), 0, 1, "C");
					  $pdf->Cell(200,7, iconv('UTF-8', 'TIS-620', 'ตำแหน่ง..............................................'), 0, 1, "C");
               
            $pdf->Output("MyPDF/MyPDF.pdf", "F");
            ?>
        </table>
		ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: MyPDF/MyPDF.pdf');?>

    </body>
</html>