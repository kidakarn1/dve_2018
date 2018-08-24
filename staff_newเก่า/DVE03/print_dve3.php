<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resi Bootstrap Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/responsive-slider.css" rel="stylesheet">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">	
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<?php 
		@SESSION_START();
			include('../connect/conn.php');
			$connect=$conn;
			$id=$_GET['id'];
			$sql_student="select * from student,major,district,amphur,province where student.citizen_id='{$_SESSION['citizen_id']}' and 
			student.major_id = major.major_id and 
			student.district = district.DISTRICT_CODE and
			district.AMPHUR_CODE = amphur.AMPHUR_CODE and 
			amphur.PROVINCE_CODE = province.PROVINCE_CODE";
			$res_student=mysqli_query($conn,$sql_student);
			$row_student=mysqli_fetch_assoc($res_student);
			$edu = substr($row_student['std_id'], 0, 2);
			date_default_timezone_set("asia/bangkok");
			$year1=date("y")+43;
			$year=date("Y-m-d")+543;
			$level=$year1-$edu;
			$level=$level+1;
			$year1;
			$birthday=explode("/",$row_student['dateofbirth']);
			$birthday_year=$birthday[0]+543;
			$birthday_year=$birthday[0]+543;
			$age1=substr($birthday[0],2,2);
			$age1=$age1+43;
			$bd=$year1-$age1;
			$sql_teacher = "select * from teacher";
			$res_teacher=mysqli_query($conn,$sql_teacher);
		?>
    </head>
    <body>
        <!--        <header>
                    <div class="container">
                        <div class="row">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <div class="navbar-brand">
                                            <a href="index.html"><h1>Resi</h1></a>
                                        </div>
                                    </div>
                                    <div class="menu">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="index.html">Home</a></li>
                                            <li role="presentation"><a href="dve01.php">DVE01</a></li>
                                            <li role="presentation"><a href="dve03.php">DVE03</a></li>
                                            <li role="presentation"><a href="yinyom.php">หนังสือยินยอม</a></li>
                                            <li role="presentation"><a href="book.php">หนังสือแจ้งการฝึกงาน</a></li>
                                            <li role="presentation"><a href="book2.php">หนังสืออนุญาตการฝึกงาน</a></li>	
        
                                        </ul>
                                    </div>
                                </div>			
                            </nav>
                        </div>
                    </div>
                </header>-->
				<center>
        <table>
            <tr>
                <tr><TD ALIGN = "RIGHT">DVE.03</TD></tr>
                <tr><td><h4><center>ประวัตินักเรียน นักศึกษาฝึกอาชีพ/ฝึกงาน</center></h4></td></tr>
                <tr><td><h4>๑.ชื่อ - สกุล </h4></td></tr>
				<tr><td><?php echo  $row_student['head_name_std']." ".$row_student['std_name']." ".$row_student['std_lastname'];?> </td></tr>
				<tr><td>ชั้น 

			<p> ปวช (<?php if ($row_student['edu_id'] == 2) {echo "&#x2714;";
	$level1=$row_student['edu_id'];} ?>)
	ปวส (<?php if ($row_student['edu_id'] == 3) {echo "&#x2714;";
	$level1=$row_student['edu_id'];} ?> )
	 ปีที่ <?php if ($row_student['edu_id'] == 1){
					if ($level > 3){
						echo "3";
						}
			echo $level;
		}
		if ($row_student['edu_id'] == 2){
			if ($level > 2){
				echo "2";
				}
				echo $level;
			}
		?>
		กลุ่ม <?php echo $row_student['group_id']?>
						</tr>
						<tr>
						<td>สาขาวิชา <?php echo $row_student['major_name']?></td>
						</tr>
						<tr>
						<td>
(<?php if ($row_student['system_id'] == 1) {echo "&#x2714;";} ?> ) ระบบปกติ (<?php if ($row_student['system_id'] == 2) {echo "&#x2714;";} ?> ) ระบบทวิภาคี 	
				<tr><td>รหัสประจำตัว <?php echo $row_student['std_id'];?></td></tr>
                <tr><td>วัน/เดือน/ปี เกิด <?php echo $birthday[0]."-".$birthday[1]."-".$birthday[2];?>&nbsp;&nbsp;อายุ <?php echo $row_student['age'];?>&nbsp;&nbsp;ปี สูง<?php echo $row_student['height'];?>&nbsp;&nbsp;เซนติเมตร น้ำหนัก <?php echo $row_student['weight'];?> กก</td></tr>
                <tr><td>โทรศัพท์ <?php echo $row_student['phone'];?></td></tr>
                <tr><td><h4>๒.ที่อยู่ปัจจุบัน</h4></td></tr>
				<tr><td><?php echo " บ้านเลขที่ ".$row_student['address_number']." หมู่ ".$row_student['moo']." ซอย ".$row_student['soi']." ถนน ".$row_student['road']." ตำบล ".$row_student['DISTRICT_NAME']." อำเถอ ".$row_student['AMPHUR_NAME']." จังหวัด ".$row_student['PROVINCE_NAME'];?></td></tr>
                <tr><td><h4>๓.ชื่อบิดา  </h4></td></tr>
				<tr><td>นาย <?php echo $row_student['dad_name']." ".$row_student['dad_lname']?></td></tr>
                <tr><td><?php echo " บ้านเลขที่ ".$row_student['address_number']." หมู่ ".$row_student['moo']." ซอย ".$row_student['soi']." ถนน ".$row_student['road']." ตำบล ".$row_student['DISTRICT_NAME']." อำเถอ ".$row_student['AMPHUR_NAME']." จังหวัด ".$row_student['PROVINCE_NAME'];?></td></tr>
                <tr><td>ชื่อมารดา <?php echo $row_student['mom_name']." ".$row_student['mom_lname']?></td></tr>
                <tr><td><?php echo " บ้านเลขที่ ".$row_student['address_number']." หมู่ ".$row_student['moo']." ซอย ".$row_student['soi']." ถนน ".$row_student['road']." ตำบล ".$row_student['DISTRICT_NAME']." อำเถอ ".$row_student['AMPHUR_NAME']." จังหวัด ".$row_student['PROVINCE_NAME'];?></td></tr>
                <tr><td><h4>๔.คะแนนเฉลี่ยสะสมถึงภาคเรียนสุดท้าย</h4></td></tr>
				<tr><td>คะแนนเฉลี่ยสะสม <?php echo $row_student['GPA'];?></td></tr>
                <tr><td><h4>๕.ความสามารถพิเศษ</h4></td></tr>
                <tr><td>๑ <?php echo $row_student['genius'] ?></td></tr>
                <tr><td><h4>๖.ชื่อผู้ปกครอง(ที่จะต้องมาประชุมการฝึกงาน/ฝึกอาชีพ พร้อมนักเรียน/นักศึกษา)</h4></td></tr>
                <tr><td><?php echo $row_student['head_parent_name']." ".$row_student['parent_name']." ".$row_student['parent_lname']; ?>&nbsp;&nbsp;เกี่ยวข้องเป็น <?php if($row_student['parent_name']==$row_student['dad_name']and $row_student['parent_lname']==$row_student['dad_lame']){
				echo "บิดา";
				}
				else if ($row_student['parent_name']==$row_student['mom_name'] and $row_student['parent_lname']==$row_student['mom_lname']){
				echo "มารดา";
				}
				else{
				echo "ญาติ";
				}
				
				?></td></tr>
				<tr><td>ที่อยู่ปัจจุบัน <?php echo " บ้านเลขที่ ".$row_student['address_number']." หมู่ ".$row_student['moo']." ซอย ".$row_student['soi']." ถนน ".$row_student['road']." ตำบล ".$row_student['DISTRICT_NAME']." อำเถอ ".$row_student['AMPHUR_NAME']." จังหวัด ".$row_student['PROVINCE_NAME'];?></td></tr>
               <tr><td><h4>๗.ครูที่ปรึกษา  <?php echo  $row_student['advisor'];?></h4></td></tr>
			   </td></tr>
     
    </tr>
</table>
</center>
<!-- Responsive slider - START -->
<!-- <div class="slider">
        <div class="">
                <div class="">
                        <div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
                                <div class="slides" data-group="slides">						
                                        <ul>
                                                <li>
                                                        <div class="slide-body" data-group="slide">
                                                                <img src="img/3.jpg" alt="" class="img-responsive" >
                                                        </div>					
                                                </li>
                                                <li>
                                                        <div class="slide-body" data-group="slide">
                                                                <img src="img/6.jpg" alt="" class="img-responsive" >
                                                        </div>
                                                </li>
                                                <li>
                                                        <div class="slide-body" data-group="slide">
                                                                <img src="img/5.jpg" alt="" class="img-responsive" >									
                                                        </div>
                                                </li>					
                                        </ul>
                                </div>		 -->	   

<!--start footer-->
<!--    <footer>
        

        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="social-network">
                            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
                            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
                            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
                            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
                            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
                        </ul>
                    </div>
                  

                </div>
            </div>
        </div>
    </footer>-->

<!--end footer-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/responsive-slider.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>
<?php
	function select_edu($connect, $id) {
		$sql = "select * from education where edu_id = '$id' ";
		$res = mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($res);
		return $row;
	}
?>
















