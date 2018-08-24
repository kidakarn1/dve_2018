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
        date_default_timezone_set("asia/bangkok");
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
        $major_id = select_major($conn, $major_name);
        $group_id = select_group($conn, $groups);
        if ($sex == "M") {
            $hName = "นาย";
        } else {
            $hName = "นางสาว";
        }
        $sql = "replace into student values('$std_id',
			'$hName',
			'$std_fname',
			'$std_lname',
			'$gpa',
			'',
			'$group_id',
			'$edu',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'',
			'$sex',
			'',
			'',
			'$major_id',
			'',
			'',
			''
			)";
        $res = mysqli_query($conn, $sql);
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

        <table>
            <p>DVE.01</p>
            <center>หนังสือคำร้องขอฝึกงานในสถานประกอบการ</center>
            <p>เขียนที่ วิทยาลัยเทคนิคชลบุรี</p>
           <!-- <p style="margin-left:70%">....................................................................</p>-->
            <p>วันที่ <?php echo date("d"); ?> เดือน <?php echo $thMonth; ?> พ.ศ <?php echo date("Y") + 543; ?> </p>
            <p>เรื่อง ขอฝึกอาชีพ/ฝึกงานในสถานประกอบการ</p>
            <p>เรียน ผู้อำนวยการวิทยาลัยเทคนิคชลบุรี</p>
            <p>สิ่งที่ส่งมาด้วย รายละเอียดสถานประกอบการ(DVE.02)</p>
            <p>ข้าพเจ้า <?php if ($sex == "M") {
            echo "นาย";
        } else {
            echo "นางสาว";
        } echo " " . $std_fname . " " . $std_lname; ?>  
                รหัสประจำตัว <?php echo $std_id ?></p>
            <p>นักศึกษาระดับ (<?php if ($edu == 2) {
            echo "&#x2714;";
        } ?>)
                ปวช (<?php if ($edu == 3) {
            echo "&#x2714;";
        } ?> )
                ปวส ปีที่ <?php echo $edu_year ?> กลุ่ม <?php echo $groups ?> แผนกวิชา <?php echo $major_name ?> </p>
            <p>(<?php if ($system == 1) {
            echo "&#x2714;";
        } ?> ) ระบบปกติ (<?php if ($system == 5) {
            echo "&#x2714;";
        } ?> ) ระบบทวิภาคี    
                มีผลการเรียนเฉลี่ยสะสม <?php echo $gpa ?>
                มีความประสงค์ขอฝึกอาชีพ/ฝึกงานในภาคเรียนที่............/............ถึงภาคเรียนที่....../.......</p>
            <p>ระหว่างวันที่..........เดือน..........พ.ศ...... ถึงวันที่...........เดือน...........พ.ศ.............. โดยข้าพเจ้า ( )หาสถานที่ฝึกอาชีพ/ฝึกงานเอง</p>
            <p>( )ให้วิทยาลัยหาสถานที่ฝึกอาชีพ/ฝึกงานเองให้ มีรายเอียดของสถานประกอบดังแบบมาพร้อมนี้</p>
            <p>จึงเรียนมาเพื่อโปรดพิจารณา</p>
            <table><tr><center>ลงชื่อ ................................................................. นักเรียน/นักศึกษา<br>
                    (<?php echo $std_name ?>)</tr></center></table>
        </table>
        <table border="1" width="700">

            <tr>
                <td>๑.ความเห็นของผู้ปกครอง<br>
            <center>
                ........................................................................<br>
                ........................................................................<br><br>
                ลงชื่อ ..............................................<br>
                (<?php echo $par_name ?>)<br>
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
    (นายสุทธิกร สมทรง)<br>
    .............../.............../...............
</center></td>
</tr>
<tr>
    <td>
        ๕.รองผู้อำนวยการฝ่ายวิชาการ<br>อนุญาติให้ฝึกอาชีพ/ฝึกงานได้<br><br><center>
    ลงชื่อ .....................................................<br>
    (นายชลวัฒน์ ศิริวาจา)<br>
    ............./.............../...............
</center></td>
<td>
    ๖.ผู้อำนวยการ<br>
    อนุญาต<br><br><center>
    ลงชื่อ .....................................................<br>
    (นายสุทธิกร สมทรง)<br>
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
    $thai_month_arr = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    );
    return $thai_month_arr[$index];
}

function select_group($conn, $name) {
    $sql = "select * from groups where group_name = '$name' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["group_id"];
}

function select_major($conn, $name) {
    $sql = "select * from major where major_name = '$name' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row["major_id"];
}
?>





















