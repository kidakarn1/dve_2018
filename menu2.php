<?php
@SESSION_START();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title></title>

        <!-- Bootstrap CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
        <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/fullcalendar.css">
        <link href="../css/widgets.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet" />
        <link href="../css/xcharts.min.css" rel=" stylesheet">
        <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <?php
        @SESSION_START();
        include 'connect/conn.php';
        ?>
        <!-- container section start -->
        <section id="container" class=" ">
            <div class='navbar navbar-fixed-top '>
                <div style="background-color: #660000" class="header dark-bg">
                    <div class="toggle-nav ">
                        <div class=" icon-reorder "data-original-title="Toggle Navigation" data-placement="bottom" ><i class="icon_menu "></i></div>
                    </div>
                    <img src="../img/logo.gif"width="60">
                    <a href="../index.html" class="logo">DVE<span class="lite">2017</span></a>
                    <!--logo end-->
                    <div class="top-nav notification-row">
                        <!-- notificatoin dropdown start-->
                        <ul class="nav pull-right top-menu">
                            <!-- user login dropdown start-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="profile-ava">
                                        <span class="username">

                                            <?php echo $_SESSION['staff_name'] . " " . $_SESSION['staff_lname'] ?>
                                        </span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
                                    <li class="fa fa-angle-right">
                                        <a href="update_pass.php">เปลี่ยนรหัสผ่าน</a>
                                    </li>
                                    <li>
                                        <a href="../login/logout.php">
                                            <i class="fa fa-angle-right">
                                            </i> Log Out</a>
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--header end-->
        <style>
            .red{
                background-color: #660000;
            }
        </style>
 

        <aside class="nav navbar-static-top">
            <div id="sidebar" class="">

                <ul class=" sidebar-menu">

<?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin" || $_SESSION['status'] == "Teacher" || $_SESSION['status'] == "Trainer" || $_SESSION['status'] == "Driver" || $_SESSION['status'] == "Business" || $_SESSION['status'] == "User") { ?>
                        <li  class="sub-menu ">
                            <a href="../index.php" class="red">
                                <i class="icon_house_alt"></i>
                                <span>หน้าหลัก</span>
                            </a>
                        </li>
<?php } ?>


<?php if ($_SESSION['status'] == "User") { ?>
                        <li  class="sub-menu ">
                            <a href="f_dve.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>คำร้องออกฝึก</span>
                            </a>
                        </li>

						 <li  class="sub-menu ">
                            <a href="check_status_student.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>เช็คสถานะตอบกลับ</span>
                            </a>
                        </li>
						<li  class="sub-menu ">
                            <a href="select_business_desire.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ความต้องการสถานประกอบการ</span>
                            </a>
                        </li>
 <?php } ?>
                
 <?php if ($_SESSION['status'] == "Admin" || $_SESSION['status'] == "Staff") { ?>
                        <li  class="sub-menu">
                            <a href="javascript:;" class="red">
                                 <i class="fa fa-cloud-download"></i>
                                <span>นำเข้าข้อมูล</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="red" href="../add/f_add_student.php">
									<i class="fa fa-angle-right"></i><span>นักเรียน</span>
                                    </a>
                                </li>
								 <li>
                                    <a class="red" href="../add/f_add_minor.php">
									<i class="fa fa-angle-right"></i><span>สาขางาน</span>
                                    </a>
                                </li> 
								  <li>
                                    <a class="red" href="../add/f_add_major.php">
									<i class="fa fa-angle-right"></i><span>สาขาวิชา</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>
 <?php } ?>

<?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?> 
                        <li  class="sub-menu">
                            <a href="javascript:;" class="red">
                            <i class="fa fa-server"></i>
                                <span>ฝึกงาน/ฝึกอาชีพ</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
							    <li>
                                    <a class="red" href="../add/show_search_major.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลสาขาวิชา</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../add/show_search_minor.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลสาขางาน</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../add/show_search_std.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลนักเรียน</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="red" href="../inter/inter_plan_f.php">
									<i class="fa fa-angle-double-right"></i>เพิ่มแผนการฝึก
                                    </a>
                                </li>
 <?php } ?>

<?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin" ) { ?>
                                <li >
                                    <a class="red" href="../inter/f_report_inter.php">
									<i class="fa fa-angle-right"></i>แผนการฝึก
                                    </a>
                                </li>
								 <li >
                                    <a class="red" href="../login_teacher/select_nites_normal.php">
									<i class="fa fa-angle-right"></i>ประเมินการฝึกงาน
                                    </a>
                                </li>
                                 <li >
                                    <a class="red" href="../plan_nites/from_number.php">
									<i class="fa fa-angle-double-right"></i><span>เพิ่มการออกนิเทศ</span>
                                    </a>
                                

								  <li>
                                    <a class="red"href="../plan_nites/table_teacher_nites.php">
									<i class="fa fa-angle-right"></i><span>ตารางนิเทศ</span>
                                    </a>
                                </li>

                                 <li>
                                    <a class="red"href="../staff_new/from_get_date.php">
									<i class="fa fa-angle-right"></i><span>คำร้องขอฝึกงาน</span>
                                    </a>
                                </li>

								<li>
                                    <a class="red" href="../chang_status_trannig.php">
									<i class="fa fa-angle-right"></i><span>สถานะปกติ</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../chang_status_training_dve.php">
									<i class="fa fa-angle-right"></i><span>สถานะทวิภาคี</span>
                                    </a>
                                </li>
								<li>

								 <li>
                                    <a class="red" href="../update_status/select_normal.php">
									<i class="fa fa-angle-right"></i><span>สถานะตอบกลับ</span>
                                    </a>
                                </li>
                                   <li> <a class="red" href="../chang_trainer_training.php">
									<i class="fa fa-angle-right"></i><span>สถานะครูฝึก/ครูนิเทศ</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../Report/form_print_Send_off_normal.php">
									<i class="fa fa-angle-right"></i><span>หนังสือตอบรับปกติ</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../Report/form_print_Send_off_dve.php">
									<i class="fa fa-angle-right"></i><span>หนังสือตอบรับทวิ</span>
                                    </a>
                                </li>
								<li>
                                    <a class="red" href="../Report/form_set3.php">
									<i class="fa fa-angle-right"></i><span>หนังสือส่งตัวปกติ</span>
                                    </a>
                                </li> 
								<li>
                                    <a class="red" href="../Report/form_set3_dve.php">
									<i class="fa fa-angle-right"></i><span>หนังสือส่งตัวทวิ</span>
                                    </a>
                                </li>
								 <!-- <li>
                                    <a class="red" href="../Report/select_certificate_normal.php">
									<i class="fa fa-angle-right"></i><span>หนังสือรับรองปกติ</span>
                                    </a>
                                </li> 
								  <li>
                                    <a class="red" href="../Report/select_certificate_bilateral.php">
									<i class="fa fa-angle-right"></i><span>หนังสือรับรองทวิภาคี</span>
                                    </a>
                                </li>  -->
								
                            </ul>
                        </li>
				
 <?php } ?>

<!-- <?php if ($_SESSION['status'] == "Business" ) { ?>  
                        <li  class="sub-menu ">
                            <a href="javascript:;" class="red">
							<i class="fa fa-building-o"></i>
                                <span>สถานประกอบการ</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="red" href="../login_business/show_eva_business.php">
									<i class="fa fa-angle-right"></i><span>จำนวนนักศึกษาฝึกงาน</span>
                                    </a>
                                </li>
								<li  class="sub-menu ">
                                    <a class="red" href="../evaluation/eva_1.php">
									<i class="fa fa-angle-right"></i>ประเมินความพึงพอใจ</a>
                                </li>

                            </ul>
                        </li>
<?php } ?>  -->

<?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?>
                        <li  class="sub-menu red">
                            <a href="javascript:;" class="">
							<i class="fa fa-cogs"></i>
                                <span>จัดการข้อมูล</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
							 <li class="sub-menu">
                                    <a class="red" href="../teacher/select_teacher.php">
									<i class="fa fa-angle-right"></i><span>ครู</span>
                                    </a>
                                </li>

                                 <li class="sub-menu">
                                    <a class="red" href="../staff/view.php">
									<i class="fa fa-angle-right"></i><span>เจ้าหน้าที่</span>
                                    </a>
                                </li>
								 <li class="sub-menu">
                                    <a class="red" href="../trainers/show_trainer.php">
									<i class="fa fa-angle-right"></i><span>ครูฝึก</span>
                                    </a>
                                </li>
								 <li class="sub-menu">
                                    <a class="red" href="../business_benefit/show_business_benefit.php">
									<i class="fa fa-angle-right"></i><span>สวัสดิการ</span>
                                    </a>
                                </li>
								<li class="sub-menu">
                                    <a class="red" href="../detail_benefit/select_benefit.php">
									<i class="fa fa-angle-right"></i><span>รายละเอียดสวัสดิการ</span>
                                    </a>
                                </li>
								<li class="sub-menu">
                                    <a class="red" href="../school/show_school.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลสถานศึกษา</span>
                                    </a>
                                </li>


								 <li class="sub-menu">
                                    <a class="red" href="../department/select_department.php">
									<i class="fa fa-angle-right"></i><span>แผนก</span>
                                    </a>
                                </li>

								<li  class="sub-menu ">
                                    <a class="red" href="../evaluation_type/show_eva.php">
									<i class="fa fa-angle-right"></i><span>ประเภทแบบประเมิน</span></a>
                                </li>

                                <li  class="sub-menu ">
                                    <a class="red" href="../topics/show_top.php">
									<i class="fa fa-angle-right"></i><span>หัวข้อแบบประเมิน</span></a>
                                </li>

                                <li  class="sub-menu ">
                                    <a class="red" href="../question/show_que.php">
									<i class="fa fa-angle-right"></i><span>คำถามแบบประเมิน</span></a>
                                </li>
                            </ul>
                        </li>            
 <?php } ?>

<?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?>
                        <li class="sub-menu ">
                            <a href="javascript:;" class="red">
                                <i class="fa fa-file-text-o"></i> 
								<span>รายงานสรุป</span>
                                <span class="menu-arrow arrow_carrot-right"></span>

                            </a>
                            <ul class="sub">

                                <li>
                                    <a class="red" href="../MPDF/report_business.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลสถานประกอบการ</span></a>
                                </li>
                                <li>
                                    <a class="red" href="../Report/from_select_trainer.php">
									<i class="fa fa-angle-right"></i><span>ข้อมูลครูฝึก</span></a>
                                </li>
                              
								 <li>
                                    <a class="red" href="../Report/from_select_bussiess_major_bilateral.php">
									<i class="fa fa-angle-right"></i>นักศึกษาฝึกอาชีพ</a>
                                </li>
								 <li>
                                    <a class="red" href="../Report/report_bilateral.php">
									<i class="fa fa-angle-right"></i>การยื่นคำขอฝึก</a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_status_bilateral.php">
									<i class="fa fa-angle-right"></i>ผลการขอฝึกอาชีพ</a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_total_bilateral.php">
									<i class="fa fa-angle-right"></i>น.ร ออกฝึกระบบทวิ </a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_total_normal.php">
									<i class="fa fa-angle-right"></i>น.ร ออกฝึกระบบปกติ</a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_trainer.php">
									<i class="fa fa-angle-right"></i>จำนวนครูฝึก</a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_trainer_bus.php">
									<i class="fa fa-angle-right"></i>ข้อมูลครูฝึก</a>
                                </li>
								
								<li>
                                    <a class="red" href="../Report/report_business_normal.php">
									<i class="fa fa-angle-right"></i>สถาณประกอบการ/ปกติ</a>
                                </li>
								<li>
                                    <a class="red" href="../Report/report_business_bilateral.php">
									<i class="fa fa-angle-right"></i>สถาณประกอบ/ทวิ</a>
                                </li>
								<li>
                                    <a class="red" href="../piechart.php">
									<i class="fa fa-angle-right"></i>กราฟ จำนวนนักศึกษาออกฝึกงาน</a>
                                </li>
                            </ul>
                        </li>
<?php } ?> 
 <?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?>
                        <li  class="sub-menu red">
                            <a href="javascript:;" class="">
                                <i class="fa fa-pie-chart"></i> 
								<span>แบบประเมิน</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                 
                                <li  class="sub-menu ">
                                    <a class="red" href="../evaluation/eva_2.php">
									<i class="fa fa-angle-right"></i>ประเมินผลทวิภาคี</a>
                                </li>
                                <li  class="sub-menu ">
                                    <a class="red" href="../evaluation/eva_3.php">
									<i class="fa fa-angle-right"></i><span>ฝึกอาชีพ</span></a>
                                </li>
                                <li  class="sub-menu ">
                                    <a class="red" href="../evaluation/eva_4.php">
									<i class="fa fa-angle-right"></i><span>ฝึกงาน</span></a>
                                </li>
                                <li  class="sub-menu ">
                                    <a class="red" href="../evaluation/eva_5.php">
									<i class="fa fa-angle-right"></i><span>แบบฟอร์มการนิเทศ</span></a>
                                </li>
								<li  class="sub-menu ">
                                    <a class="red" href="../score_eva.php">
									<i class="fa fa-angle-right"></i><span>ผลการประเมิน</span></a>
                                </li>
						  </ul>
                        </li>

 <?php } ?> 
 <?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?>
                        <li  class="sub-menu red">
                            <a href="javascript:;" class="">
                                <i class="fa fa-download"></i>  
                                <span>ส่งออกข้อมูล</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                                <li>
                                    <a class="red" href="../add/export_student.php"onclick="return confirm('ส่งออกข้อมูลนักเรียน?');">
									<i class="fa fa-angle-right"></i><span>นักเรียน</span>
                                    </a>
                                </li>
								 <li>
                                    <a class="red" href="../add/export_trainer.php"onclick="return confirm('ส่งออกข้อมูลครู?');">
									<i class="fa fa-angle-right"></i><span>ครูฝึก</span>
                                    </a>
                                </li> 
								  <li>
                                    <a class="red" href="../add/export_business.php"onclick="return confirm('ส่งออกข้อมูลสถานประกอบการ?');">
									<i class="fa fa-angle-right"></i><span>สถานประกอบการ</span>
                                    </a>
                                </li> 
								 <li>
                                    <a class="red" href="../add/export_mou.php"onclick="return confirm('ส่งออกข้อมูลMOU?');">
									<i class="fa fa-angle-right"></i><span>MOU</span>
                                    </a>
                                </li>
								 <li>
                                    <a class="red" href="../add/export_training_dve.php"onclick="return confirm('ส่งออกข้อมูลการฝึกอาชีพ?');">
									<i class="fa fa-angle-right"></i><span>การฝึกอาชีพ</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
<?php } ?>

<?php if ($_SESSION['status'] == "Business") { ?>
                        
						<li  class="sub-menu ">
                            <a href="../login_business/show_eva_business.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>รายชื่อ น.ร/น.ศ</span>
                            </a>
                        </li>
						<li  class="sub-menu ">
                            <a href="../login_business/from_business_desire.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ความต้องการสถานประกอบการ</span>
                            </a>
                        </li>
<?php } ?>

<?php if ($_SESSION['status'] == "Driver") { ?>
                        
						<li  class="sub-menu ">
                            <a href="../plan_nites/table_teacher_nites.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ตารางนิเทศ</span>
                            </a>
                        </li>
	
<?php } ?>

<?php if ($_SESSION['status'] == "Trainer") { ?>
                        
						<li  class="sub-menu ">
                            <a href="../evaluation/eva_4.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ประเมินผลการฝึกงาน</span>
                            </a>
                        </li>
	
	
<?php } ?>
<?php if ($_SESSION['status'] == "Teacher") { ?>
                        
						<li  class="sub-menu ">
                            <a href="../login_teacher/select_nites_normal.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ประเมิน</span>
                            </a>
                        </li>
						<li  class="sub-menu ">
                            <a href="../inter/f_report_inter.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>แผนการฝึก</span>
                            </a>
                        </li>
						<li  class="sub-menu ">
                            <a href="../plan_nites/table_teacher_nites.php" class="red">
                                <i class="fa fa-angle-right"></i>
                                <span>ตารางนิเทศ</span>
                            </a>
                        </li>
<?php } ?>

            </div>
        </aside>

        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- charts scripts -->
        <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
        <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="../js/owl.carousel.js"></script>
        <!-- jQuery full calendar -->
        <script src="../js/fullcalendar.min.js"></script>
        <!-- Full Google Calendar - Calendar -->
        <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
        <!--script for this page only-->
        <script src="../js/calendar-custom.js"></script>
        <script src="../js/jquery.rateit.min.js"></script>
        <!-- custom select -->
        <script src="../js/jquery.customSelect.min.js"></script>
        <script src="../assets/chart-master/Chart.js"></script>

        <!--custome script for all page-->
        <script src="../js/scripts.js"></script>
        <!-- custom script for this page-->
        <script src="../js/sparkline-chart.js"></script>
        <script src="../js/easy-pie-chart.js"></script>
        <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../js/xcharts.min.js"></script>
        <script src="../js/jquery.autosize.min.js"></script>
        <script src="../js/jquery.placeholder.min.js"></script>
        <script src="../js/gdp-data.js"></script>
        <script src="../js/morris.min.js"></script>
        <script src="../js/sparklines.js"></script>
        <script src="../js/charts.js"></script>
        <script src="../js/jquery.slimscroll.min.js"></script>
        <script>
            $(function () {
                $(".knob").knob({
                    'draw': function () {
                        $(this.i).val(this.cv + '%')
                    }
                })
            });

            //carousel
            $(document).ready(function () {
                $("#owl-slider").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });
            });

            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

            /* ---------- Map ---------- */
            $(function () {
                $('#map').vectorMap({
                    map: 'world_mill_en',
                    series: {
                        regions: [{
                                values: gdpData,
                                scale: ['#000', '#000'],
                                normalizeFunction: 'polynomial'
                            }]
                    },
                    backgroundColor: '#eef3f7',
                    onLabelShow: function (e, el, code) {
                        el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                    }
                });
            });
        </script>

    </body>

</html>
