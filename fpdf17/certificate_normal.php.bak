<html>
    <head>
        <title>หนังสือรับรองการฝึกงาน(ทวิ)</title>
    </head>
    <body>
		<?php
		$id=$_GET['id'];
		include("../connect/conn.php");
		$connect=$conn;
		$res_school=school($connect);
		$row_school=mysqli_fetch_assoc($res_school);
		$res_pra=select_b($id,$connect);
		$row_pra=mysqli_fetch_assoc($res_pra);
		$group=$row_pra['group_id'];
		$start_date=$row_pra['start_date'];
		$start_date1=$row_pra['start_date'];
		$start_date1=$row_pra['start_date'];
		$end_date=$row_pra['end_date'];

		$year_start=substr($start_date,0,4);
		$day=substr($start_date1,8,11);
		$mouth=substr($start_date1,5,2);
		$year_start=$year_start+543;
		//สิ้นสุดการฝึก
		$year_end=substr($end_date,0,4);
		$mouth_end=substr($end_date,5,2);
		$day_end=substr($end_date,8,11);
		$year_end=$year_end+543;

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
		  $group=substr($group,7);
			if ($row_pra['system_id']=="1"){
				$system = "การฝึกงาน";
			}
			else{
				$system = "การฝึกอาชีพ";	
			}
			if ($row_pra['edu_id']=="1"){
				$level = "";
				$edu="(ปวช)";
			}
			else{
				$level = "ชั้นสูง";
				$edu="(ปวส)";
			}
		  require('fpdf.php');
        define('FPDF_FONTPATH', 'font/');
		?>
            <?php
        
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->Ln(5); //เว้นบรรทัด
        $pdf->AddFont('angsa', '', 'angsa.php');
        $pdf->SetFont('angsa', '', 36);
		
        ?>
<?php
		
			$pdf->Ln(35);
			$pdf -> SetLeftMargin(20);
			$pdf ->Cell(260,10,iconv( 'UTF-8','TIS-620',$row_pra["school_name"]), 0 ,1,"C");
			$pdf->SetFont('angsa', '', 22);
			$pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'หนังสือรับรองการฝึกงาน'), 0, 1, "C");
			$pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'หนังสือรับรองสำคัญฉบับนี้ให้ไว้เพื่อแสดงว่า'), 0, 1, "C");
			$pdf->Ln(5);
			$pdf->SetFont('angsa', '', 30);
            $pdf->Cell(260, 10, iconv('UTF-8', 'TIS-620', $row_pra["head_name_std"]." ".$row_pra["std_name"]." ".$row_pra["std_lastname"]), 0, 1, "C");
			$pdf->SetFont('angsa', '', 22);
            $pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'แผนก'.$row_pra["major_name"].' กลุ่ม'." ".$group." ".'รหัสประจำตัว'." ".$row_pra["std_id"]), 0, 1, "C");
		   $pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'ได้ผ่าน'.$system.'ในสถานประกอบการตามหลักสูตรประกาศนียบัตรวิชาชีพ'.$level ." ".$edu), 0, 1, "C");
		   $pdf->Cell(260, 10, iconv('UTF-8', 'TIS-620', 'โดยได้รับการฝึกงานใน'), 0, 1, "C");
		   $pdf->SetFont('angsa', '', 30);
		   $pdf->Ln(1);
			 $pdf->Cell(260, 10, iconv('UTF-8', 'TIS-620', $row_pra["business_name"]), 0, 1, "C");
			 $pdf->SetFont('angsa', '', 22);
		  $pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'ระหว่างวันที่ '.$day." ".$moth_start." ".$year_start." ".'ถึงวันที่'." ".$day_end." ".$moth_end." ".$year_end), 0, 1, "C");
		  $pdf->Cell(260, 9, iconv('UTF-8', 'TIS-620', 'ออกให้ ณ วันที่'." ".$day_pagubun." ".'เดือน'." ".$mouth_pagubun." ".'พุทธศักราช'." ".$year_pagubun), 0, 1, "C");
		  $pdf->SetFont('angsa', '', 17);
		  $pdf->Ln(15);
		  $pdf->Cell(100, 8, iconv('UTF-8', 'TIS-620', '........................................................'), 0, 0, "C");
		  $pdf->Cell(250, 8, iconv('UTF-8', 'TIS-620',  $row_school["deputy_academic"]), 0, 1, "C");
		   $pdf->Cell(100, 8, iconv('UTF-8', 'TIS-620', '('.$row_pra["name_of_the_signatory"].')'), 0, 0, "C");
		   $pdf->Cell(250, 8, iconv('UTF-8', 'TIS-620', 'รองผู้อำนวยการ รักษาการในตำแหน่ง'), 0, 1, "C");
		   $pdf->Cell(100, 8, iconv('UTF-8', 'TIS-620', '   ตำแหน่ง'." ".$row_pra["position"]), 0, 0, "C");
		   $pdf->Cell(250, 8, iconv('UTF-8', 'TIS-620', ' ผู้อำนวยการ'.$row_pra["school_name"]), 0, 1, "C");
		  
               
            $pdf->Output("MyPDF/MyPDF.pdf", "F");
            ?>
			
        </table>
       ดาวโหลดรายงานในรูปแบบ PDF<?php header('Location: MyPDF/MyPDF.pdf');?>

    </body>
</html>
<?php function select_b($id,$connect){
	 $sql="select * from training_normal,business,minor,student,major
	 where training_normal.normal_status = 'อนุมัติสถานประกอบการ' and training_normal.business_id = business.business_id and training_normal.minor_id = minor.minor_id and training_normal.citizen_id = student.citizen_id and student.major_id = major.major_id and student.citizen_id='$id'";
	 $res=mysqli_query($connect,$sql);
	 return $res;
}
function school($connect){
	$sql="select * from school";
	$res=mysqli_query($connect,$sql);
	return $res;
}
?>