<html>
    <head>
        <title></title>
    </head>
    <body>
	
	<?php
		include("../connect/conn.php");
		$business_id=$_GET["business_id"];
$sql_b="select *from business,training_dve
where business.business_id=training_dve.business_id 
and business.business_id= '$business_id'";
$res_b=mysqli_query($conn,$sql_b);
$row_b=mysqli_fetch_assoc($res_b);
$connect=$conn;
 
 
 	date_default_timezone_set('asia/bangkok');
		$day_pagubun=date("d");
		$mouth_pagubun=date("m");
		$year_pagubun=date("Y");
		$year_pagubun=$year_pagubun+543;
		//
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
		  $mouth_pagubun = $number2[$mouth_pagubun];
		  $moth_start = $number2[$mouth];
		  $moth_end = $number2[$mouth_end];

		

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
			$pdf ->Cell(171,7,iconv( 'UTF-8','TIS-620','ที่ ศธ ๐๖๒๓.๑/                                                                                                                                           วิทยาลัยเทคนิคชลบุรี'), 0 ,1,"C");

			$pdf->Cell(330, 7, iconv('UTF-8', 'TIS-620', '๒๐๕ ม. ๓ ต.หนองชาก'), 0, 1, "C");
			$pdf->Cell(321, 7, iconv('UTF-8', 'TIS-620', 'อ.บ้านบึง จ.ชลบุรี '), 0, 1, "C");
            $pdf->Cell(307, 7, iconv('UTF-8', 'TIS-620', '๒๐๑๗๐'), 0, 1, "C");
$pdf->Cell(200, 7, iconv('UTF-8', 'TIS-620',''." ".$day_pagubun." ".$mouth_pagubun." ".$year_pagubun), 0, 1, "C");
		   $pdf->Cell(60, 7, iconv('UTF-8', 'TIS-620', 'เรื่อง ขอส่งรายชื่อนักเรียน / นักศึกษาเข้าฝึกปฏิบัติงาน'), 0, 1, "C");
		   $pdf->Cell(47, 7, iconv('UTF-8', 'TIS-620', 'เรียน ผู้จัดการฝ่ายบุคคล'." ".$row_b['contact']), 0, 1, "C");
		  $pdf->Cell(32, 7, iconv('UTF-8', 'TIS-620', 'สิ่งที่ส่งมาด้วย   ๑. รายชื่อนักศึกษา'), 0, 1, "C");
		  $pdf->Cell(72, 7, iconv('UTF-8', 'TIS-620', '๒. หนังสือยินยอมผู้ปกครอง'), 0, 1, "C");
		  $pdf->Cell(125, 7, iconv('UTF-8', 'TIS-620', '๓. สมุดลงเวลาการฝึกปฏิบัติงานและแบบประเมินผลการฝึกงาน'), 0, 1, "C");
		  $pdf->Ln(5);
		  $pdf->Cell(180, 7, iconv('UTF-8', 'TIS-620', 'ตามที่สถานประกอบการของท่านได้ให้ความร่วมมือ ให้ความอนุเคราะห์รับ นร./นศ. เข้าฝึกปฏิบัติงาน'), 0, 1, "C");
		  $pdf->Cell(160, 7, iconv('UTF-8', 'TIS-620', 'ในสถานประกอบการของท่าน ซึ่งวิทยาลัยฯ ได้กำหนดช่วงเวลาการฝึกปฏิบัติงาน ส่งไปยังสถานประกอบการของท่าน'), 0, 1, "C");
		   $pdf->Cell(150,7, iconv('UTF-8', 'TIS-620', 'และตอบรับมายังวิทยาลัยฯแล้วนั้นบัดนี้ทางวิทยาลัยฯ ขอส่งรายชื่อ นร./นศ. ที่จะออกฝึกปฏิบัติงานตามที่ส่งมา'), 0, 1, "C");
		 
			$pdf->Ln(5);
			 $pdf->Cell(162,7, iconv('UTF-8', 'TIS-620', 'วิทยาลัยฯ ใคร่ขอขอบพระคุณเป็นอย่างยิ่งและหวังว่าโอกาสหน้าคงได้รับความร่วมมือและ'), 0, 1, "C");
			 		 $pdf->Cell(60,7, iconv('UTF-8', 'TIS-620', 'ความอนุเคราะห์จากสถานประกอบการของท่านอีก'), 0, 1, "C");
					 $pdf->Ln(5);
					 $pdf->Cell(67,7, iconv('UTF-8', 'TIS-620', 'จึงเรียนมาเพื่อโปรดทราบ'), 0, 1, "C");
					  $pdf->Ln(10);
					 $pdf->Cell(194,7, iconv('UTF-8', 'TIS-620', 'ขอแสดงความนับถือ'), 0, 1, "C");
					  $pdf->Ln(12);
					  $pdf->Cell(196,7, iconv('UTF-8', 'TIS-620', '( นายชลวัฒน์ ศิริวาจา )'), 0, 1, "C");
					  $pdf->Cell(197,7, iconv('UTF-8', 'TIS-620', 'รองผู้อำนวยการ รักษาการในตำแหน่ง'), 0, 1, "C");
					  $pdf->Cell(197,7, iconv('UTF-8', 'TIS-620', 'ผู้อำนวยการวิทยาลัยเทคนิคชลบุรี'), 0, 1, "C");
					  $pdf->Ln(40	);$pdf->SetFont('angsa', '', 14);
					  $pdf->Cell(33,4, iconv('UTF-8', 'TIS-620', 'งานอาชีวศึกษาระบบทวิภาคี/ฝ่ายวิชาการ'), 0, 1, "C");
					  $pdf->Cell(60,4, iconv('UTF-8', 'TIS-620', 'โทร. ๐-๓๘๔๘-๕๒๐๒ ต่อ ๑๖๖ โทรสาร. ๐-๓๘๔๘-๕๒๐๕'), 0, 1, "C");
					  $pdf->Cell(24,4, iconv('UTF-8', 'TIS-620', 'E-mail : dvtchontech@gmail.com'), 0, 1, "C");



               
            $pdf->Output("MyPDF/MyPDF.pdf", "F");
            ?>
        </table>
        ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: MyPDF/MyPDF.pdf');?>
    </body>
</html>