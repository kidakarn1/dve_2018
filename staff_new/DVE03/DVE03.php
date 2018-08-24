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
			include('../../connect/conn.php');	
			$sex = $_POST["sex"];
			if ($sex = "นาย") { $sexs = "M"; } else { $sexs = "F"; }
			$std_fname = $_POST["std_fname"];
			$std_lname = $_POST["std_lname"];
			$edu = $_POST["edu"];
			$moo = $_POST["moo"];
			$eduYear = $_POST["eduYear"];
			$group = $_POST["group"];
			$std_id = $_POST["std_id"];
			$birthday = $_POST["birthday"];
			$age = $_POST["age"];
			$tall = $_POST["tall"];
			$weight = $_POST["weight"];
			$phone = $_POST["phone"];
			$home_id = $_POST["home_id"];
			$soi = $_POST["soi"]; if (!$soi) $soi = " - ";
			$raod = $_POST["raod"];if (!$raod) $raod = " - ";
			$district = $_POST["district"];
			$amphur = $_POST["amphur"];
			$province = $_POST["province"];
			$fat_fname = $_POST["fat_fname"];
			$fat_lname = $_POST["fat_lname"];
			$fage = $_POST["fage"];
			$fhome_id = $_POST["fhome_id"];
			$fmoo = $_POST["fmoo"];
			$fsoi = $_POST["fsoi"];if (!$raod) $raod = " - ";
			$fraod = $_POST["fraod"];if (!$raod) $raod = " - ";
			$fdistrict = $_POST["fdistrict"];
			$famphur = $_POST["famphur"];
			$fprovince = $_POST["fprovince"];
			$msex = $_POST["msex"];
			$mot_fname = $_POST["mot_fname"];
			$mot_lname = $_POST["mot_lname"];
			$mage = $_POST["mage"];
			$memployment = $_POST["memployment"];
			$femployment = $_POST["femployment"];
			$mhome_id = $_POST["mhome_id"];
			$mmoo = $_POST["mmoo"];
			$msoi = $_POST["msoi"];
			$mraod = $_POST["mraod"];
			$mdistrict = $_POST["mdistrict"];
			$mamphur = $_POST["mamphur"];
			$mprovince = $_POST["mprovince"];
			$gpa = $_POST["gpa"];
			$genius1 = $_POST["genius1"];if (!$genius1) $genius1 = " - ";
			$genius2 = $_POST["genius2"];if (!$genius2) $genius2 = " - ";
			$genius3 = $_POST["genius3"];if (!$genius3) $genius3 = " - ";
			$psex = $_POST["psex"];
			$par_fname = $_POST["par_fname"];
			$par_lname = $_POST["par_lname"];
			$concerned = $_POST["concerned"];
			$phome_id = $_POST["phome_id"];
			$pmoo = $_POST["pmoo"];
			$psoi = $_POST["psoi"];if (!$psoi) $psoi = " - ";
			$praod = $_POST["praod"];if (!$praod) $praod = " - ";
			$genius = $genius1."-".$genius2."-".$genius3;
			$pdistrict = $_POST["pdistrict"];
			$pamphur = $_POST["pamphur"];
			$pprovince = $_POST["pprovince"];
			$par_tell = $_POST["par_tell"];
			$teacher_name = $_POST["teacher_name"];
			$rowEdu = select_edu($conn,$edu);

			$sqlCheck = "select *from student where std_id = '$std_id' ";
			$resCheck = mysqli_query($conn,$sqlCheck);
			$numCheck = mysqli_num_rows($resCheck);
			if ($numCheck) {
				$sqlStd = "update student set 
				birthday = '',
				age = '',
				height = '',
				weight = '',
				phone = '',
				address_number = '',
				moo = '',
				soi = '',
				road = '',
				district = '',
				aumpher = '',
				province = '',
				zipcode = '',
				genius = '',
				dad_id = '',
				mom_id = '',
				parent_id = '' where 
				std_id = '$std_id'
				";
			} else {
				$sqlstd = "replace into student values(
				'$std_id',
				'$sex',
				'$std_fname',
				'$std_lname',
				'$gpa',
				'',
				'$group',
				'$edu',
				'$birthday',
				'$age',
				'$tall',
				'$weight',
				'$phone',
				'$home_id',
				'$moo',
				'$soi',
				'$road',
				'$district',
				'$amphur',
				'$province',
				'',
				'',
				'$genius',
				'$sexs',
				'',
				'',
				'',
				'',
				'',
				'',
				)";
			}
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
				<tr><td><?php echo $sex." ".$std_fname." ".$std_lname;?></td></tr>
				<tr><td>ชั้น <?php echo $rowEdu['edu_name'].$eduYear;?> 
				กลุ่ม <?php echo $group;?></td></tr> 
				<tr><td>รหัสประจำตัว <?php echo $std_id;?></td></tr>
                <tr><td>วัน/เดือน/ปี เกิด <?php echo $birthday;?>&nbsp;&nbsp;อายุ <?php echo $age;?>&nbsp;&nbsp;ปี สูง<?php echo $tall;?>&nbsp;&nbsp;เซนติเมตร น้ำหนัก<?php echo $weight;?>กก</td></tr>
                <tr><td>โทรศัพท์ <?php echo $phone;?></td></tr>
                <tr><td><h4>๒.ที่อยู่ปัจจุบัน</h4></td></tr>
				<tr><td><?php echo " บ้านเลขที่ ".$home_id." หมู่ ".$moo." ซอย ".$soi." ถนน ".$raod." ตำบล ".$district." อำเถอ ".$amphur." จังหวัด ".$province;?></td></tr>
                <tr><td><h4>๓.ชื่อบิดา  </h4></td></tr>
				<tr><td>นาย<?php echo $fat_fname." ".$fat_lname?>&nbsp;&nbsp;อายุ <?php echo $fage ?>ปี&nbsp;&nbsp;อาชีพ <?php echo $femployment?></td></tr>
                <tr><td>ที่อยู่ <?php echo " เลขที่ ".$fhome_id." หมู่ ".$fmoo." ซอย ".$fsoi." ถนน ".$fraod." ตำบล ".$fdistrict." อำเถอ ".$famphur." จังหวัด ".$fprovince;?></td></tr>
                <tr><td>ชื่อมารดา <?php echo $msex." ".$mot_fname." ".$mot_lname?>&nbsp;&nbsp;อายุ <?php echo $mage ?>ปี &nbsp;&nbsp;อาชีพ <?php echo $memployment?></td></tr>
                <tr><td>ที่อยู่ <?php echo " เลขที่ ".$mhome_id." หมู่ ".$mmoo." ซอย ".$msoi." ถนน ".$mraod." ตำบล ".$mdistrict." อำเถอ ".$mamphur." จังหวัด ".$mprovince;?></td></tr>
                <tr><td><h4>๔.คะแนนเฉลี่ยสะสมถึงภาคเรียนสุดท้าย</h4></td></tr>
				<tr><td>คะแนนเฉลี่ยสะสม<?php echo $gpa;?></td></tr>
                <tr><td><h4>๕.ความสามารถพิเศษ</h4></td></tr>
                <tr><td>๑<?php echo $genius1 ?></td></tr>
                <tr><td>๒<?php echo $genius2 ?></td></tr>
                <tr><td>๓<?php echo $genius3 ?></td></tr>
                <tr><td><h4>๖.ชื่อผู้ปกครอง(ที่จะต้องมาประชุมการฝึกงาน/ฝึกอาชีพ พร้อมนักเรียน/นักศึกษา)</h4></td></tr>
                <tr><td><?php echo $psex." ".$par_fname." ".$par_lname ?>&nbsp;&nbsp;เกี่ยวข้องเป็น <?php echo $concerned ?></td></tr>
				<tr><td>ที่อยู่ปัจจุบัน <?php echo " เลขที่ ".$phome_id." หมู่ ".$pmoo." ซอย ".$psoi." ถนน ".$praod." ตำบล ".$pdistrict." อำเถอ ".$pamphur." จังหวัด ".$pprovince;?></td></tr>
                <tr><td>โทรศัพท์ &nbsp;&nbsp;<?php echo $par_tell ?></td></tr>
               <tr><td><h4>๗.ครูที่ปรึกษา</h4></td></tr>
			   <tr><td><?php echo $teacher_name ?></td></tr>
     
    </tr>
</table>
]</center>
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
















