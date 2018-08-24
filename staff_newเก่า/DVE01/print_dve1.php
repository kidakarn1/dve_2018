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
            date_default_timezone_set("asia/bangkok");
            $connect=$conn;
            $res_school=select_school($connect);
            $row_school=mysqli_fetch_assoc($res_school);
            $id=$_GET['id'];
			$date=date("Y-m-d");
			$year=date("Y")+543;
			$year1=date("y")+43;
			$thMonth = thaiMonth(date("m"));
			$std_fname = $_POST["std_fname"];
			$std_lname = $_POST["std_lname"];
			$std_id = $_POST["std_id"];
			$edu = $_POST["edu"];
			$groups = $_POST["group"];
			$major_name = $_POST["major_name"];
			$system = $_POST["system"];
			$par_name = $_POST["par_name"];
			$edu_year = $_POST["edu_year"];
			$gpa = $_POST["gpa"];
            $sex = $_POST["sex"];
            $res_student=check_student($connect);
            $row_student=mysqli_fetch_assoc($res_student);
            $sql_select="";
            if ( $row_student["system_id"]==1){
			$sql_select="select * from student,major,normal where student.citizen_id = '{$_SESSION["citizen_id"]}' and student.major_id = major.major_id and student.citizen_id = normal.citizen_id";
            //echo $sql_select;   
            }
            if ( $row_student["system_id"]==2){
            $sql_select="select * from student,major,training where student.citizen_id = '{$_SESSION["citizen_id"]}' and student.major_id = major.major_id and student.citizen_id = training.citizen_id";
            //  echo $sql_select;
           // exit;    
            }
            $res_select=mysqli_query($conn,$sql_select);
			$row_select=mysqli_fetch_assoc($res_select);
			$edu = substr($row_select['std_id'], 0, 2);
			$edu_id = substr($row_select['std_id'], 2, 1); 
			$level=$year1-$edu;
			$level=$level+1;
            $year1;
            $year_start=substr( $row_select["start_date"],0,4);
            $mouth_start=substr( $row_select["start_date"],6,1);
            $day_start=substr( $row_select["start_date"],8,7);
            $year_start=$year_start+543;
           $mouth_start = thaiMonth($mouth_start);
           
           $year_end=substr( $row_select["end_date"],0,4);
           $mouth_end=substr( $row_select["end_date"],6,1);
           $day_end=substr( $row_select["end_date"],8,7);
           $year_end=$year_end+543;
           $mouth_end = thaiMonth($mouth_end);
			$major_id = select_major($conn,$major_name);
			if ($sex == "M") {$hName = "นาย";} else {$hName = "นางสาว";}
		?>
    </head>
    <body >
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

        <table>
	<p>DVE.01</p>
    <center>หนังสือคำร้องขอฝึกงานในสถานประกอบการ</center>
    <p>เขียนที่ <?php echo $row_school["school_name"]?></p>
   <!-- <p style="margin-left:70%">....................................................................</p>-->
    <p>วันที่ <?php echo date("d");?> เดือน <?php echo $thMonth;?> พ.ศ <?php echo date("Y")+543;?> </p>
    <p>เรื่อง ขอฝึกอาชีพ/ฝึกงานในสถานประกอบการ</p>
    <p>เรียน ผู้อำนวยการ <?php echo $row_school["school_name"]?></p>
    <p>สิ่งที่ส่งมาด้วย รายละเอียดสถานประกอบการ(DVE.02)</p>
    <p>ข้าพเจ้า <?php echo  $row_select['head_name_std']." ".$row_select['std_name']." ".$row_select['std_lastname'];?>  
	รหัสประจำตัว <?php echo $row_select['std_id'];?></p>
    <p>นักศึกษาระดับ (<?php if ($row_select['edu_id'] == 2) {echo "&#x2714;";
	$level1=$row_select['edu_id'];} ?>)
	ปวช (<?php if ($row_select['edu_id'] == 3) {echo "&#x2714;";
	$level1=$row_select['edu_id'];} ?>)
	ปวส ปีที่ <?php if ($row_select['edu_id'] == 2){
					if ($level > 2){
						echo "3";
						}
			echo $level;
		}
		if ($row_select['edu_id'] == 3){
			if ($level > 2){
				echo "2";
				}
            }

		?>
	กลุ่ม <?php echo $row_select['group_id']; ?> แผนกวิชา <?php echo $row_select['major_name'] ?> </p>
    <p>(<?php if ($row_select['system_id'] == 1) {echo "&#x2714;";} ?> ) ระบบปกติ (<?php if ($row_select['system_id'] == 2) {echo "&#x2714;";} ?> ) ระบบทวิภาคี   
	มีผลการเรียนเฉลี่ยสะสม <?php echo $row_select['GPA']?>
	มีความประสงค์ขอฝึกอาชีพ/ฝึกงานในภาคเรียนที่<?php echo " ".$_SESSION["tream_start"]?>/<?php echo $_SESSION['year_start'];?> ถึงภาคเรียนที่<?php echo " ".$_SESSION["tream_end"]?>/<?php echo " ".$_SESSION['year_end']?></p>
    <p><?php echo $_SESSION['start_date'];?> ระหว่างวันที่ <?php echo $day_start." ".$mouth_start." ".$year_start?> ถึงวันที่
	<?php echo $day_end." ".$mouth_end." ".$year_end?> 
    <p>โดยข้าพเจ้าจึงเรียนมาเพื่อโปรดพิจารณา</p>
    <table><tr><center>ลงชื่อ ................................................................. นักเรียน/นักศึกษา<br>
    (<?php echo  $row_select['head_name_std']." ".$row_select['std_name']." ".$row_select['std_lastname'];?> )</tr></center></table>
</table>
    <table border="1" width="700">

        <tr>
            <td>๑.ความเห็นของผู้ปกครอง<br>
        <center>
            ........................................................................<br>
            ........................................................................<br><br>
            ลงชื่อ ..............................................<br>
            (<?php echo $row_select['head_parent_name']." ".$row_select['parent_name']." ".$row_select['parent_lname'];?>)<br>
            .............../.............../...............
        </center>
    </td>
    <td>๒.ความเห็นของครูนิเทศ/ครูทวิภาคี ประจำแผนก<br>
        (  ) อนุญาต<br>
        (  ) ไม่อนุญาตเพราะ ..............................................<br><br><center>
        ลงชื่อ......................................................<br>
        (...........................................................)<br>
        .............../.............../...............
    </center>
</td>

</tr>

<tr>
    <td>
        ๓.ความเห็นของหัวหน้าแผนกวิชา <br>เห็นสมควรพิจารณาอนุญาต<br><center><br>
    ลงชื่อ .....................................................<br>
    (.....................................................)<br>
    .............../.............../...............
</center></td>
<td>
    ๔.ความเห็นของหัวหน้างานทวิภาคี<br>ตรวจสอบแล้วเห็นสมควรอนุญาต<br><center><br>
    ลงชื่อ .....................................................<br>
    (<?php echo $row_school["deputy_plan"];?>)<br>
    .............../.............../...............
</center></td>
</tr>
<tr>
    <td>
        ๕.รองผู้อำนวยการฝ่ายวิชาการ<br>อนุญาติให้ฝึกอาชีพ/ฝึกงานได้<br><br><center>
    ลงชื่อ .....................................................<br>
    (<?php echo $row_school["deputy_academic"];?>)<br>
    ............./.............../...............
</center></td>
<td>
    ๖.ผู้อำนวยการ<br>
    อนุญาต<br><br><center>
    ลงชื่อ .....................................................<br>
    (<?php echo $row_school["name_dir"];?>)<br>
    ............./.............../...............
</center></td>
</tr>
</table>

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
<!--<footer>


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
	function thaiMonth($index) {
		$thai_month_arr=array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"                 
		);
		return $thai_month_arr[$index];
	}

	function select_major($conn,$name) {
		$sql = "select * from major where major_name = '$name' ";
		$res = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($res);
		return $row["major_id"];
    }
    function select_school($connect) {
		$sql = "select * from school ";
		$res = mysqli_query($connect,$sql);
		return $res;
    }
    function check_student($connect) {
		$sql = "select * from student where citizen_id = '{$_SESSION["citizen_id"]}' ";
		$res = mysqli_query($connect,$sql);
		return $res;
	}
?>





















