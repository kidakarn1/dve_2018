<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../../img/favicon.png">

        <title>Creative - Bootstrap Admin Template</title>

        <!-- Bootstrap CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="../../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../../css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="../../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="../../css/owl.carousel.css" type="text/css">
        <link href="../../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../../css/fullcalendar.css">
        <link href="../../css/widgets.css" rel="stylesheet">
        <link href="../../css/style.css" rel="stylesheet">
        <link href="../../css/style-responsive.css" rel="stylesheet" />
        <link href="../../css/xcharts.min.css" rel=" stylesheet">
        <link href="../../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
        <?php
        include('../../connect/conn.php');
        date_default_timezone_set("asia/bangkok");
        $Ryear = date("Y");
        $connect = $conn;
        $std_id = $_GET["std_id"];
        $edu = substr($std_id, 2, 1);
        $res = select_dve03($connect, $std_id);
        $row = mysqli_fetch_array($res);
        $birthday = explode("/", $row['birthday']);
        $birthdayEx = ($birthday[2] - 543) . "-" . $birthday[1] . "-" . $birthday[0];
        $age = $Ryear - ($birthday[2] - 543);
        $resEdu = select_edu($connect); //ระดับชั้น
        $resGroup = select_group($connect); //กลุ่ม
        $resMajor = select_major($connect); //แผนก
        $address = array();
        $address = select_address($connect, $row['tumbol_id']);
        $resProvince = select_province($conn);
        $resDistrict = select_district($conn);
        $resAmphur = select_amphur($conn);
        $resTeacher = select_teacher($conn);
        ?>
    </head>
    <body>
        <?php include '../../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="container">
                    <h4><center>** โปรดกรอกข้อมูลให้ครบถ้วนและถูกต้อง (กรุณาเขียนตัวบรรจง) **</center></h4>
                    <p ALIGN = "RIGHT"><b>DVE.03</b></p>
                    <h4><center>ประวัตินักเรียน นักศึกษาฝึกอาชีพ/ฝึกงาน</center></h4>

                    <form class="form-horizontal" method="post" action="DVE03.php">
                        <div class="form-group">
                            <label class="h4 control-label">๑.ชื่อ</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label class="control-label">รหัสประจำตัว</label>
                                <input type="hidden" name="std_id" value="<?php echo $std_id; ?>"><?php echo $std_id; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-2">
                                <select class="form-control" name="sex">
                                    <option value="นาย" selected>นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>


                            <label class="control-label col-sm-1">ชื่อ</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="std_fname" value="<?php echo $row["stu_fname"]; ?>" id="std_fname">
                            </div>

                            <label class="control-label col-sm-1">สกุล</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="std_lname" value="<?php echo $row["stu_lname"]; ?>" id="std_lname">
                            </div>
                            <div style="color: red;" id="Wstd_name" class="col-sm-2">*กรุณากรอก ชื่อ สกุล*</div>
                        </div>
                        <div class="form-group">

                            <label class="control-label col-sm-1">ชั้น</label>
                            <div class="col-sm-2">
                                <select name="edu" class="form-control">
                                    <?php while ($rowEdu = mysqli_fetch_array($resEdu)) { ?>
                                        <option value="<?php echo $rowEdu['edu_id'] ?>">
                                            <?php echo $rowEdu['edu_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <label class="control-label col-sm-1">ปี</label>
                            <div class="col-sm-2">
                                <select name="eduYear" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>

                            <label class="control-label col-sm-1">กลุ่ม</label>
                            <div class="col-sm-2">
                                <select name="group" class="form-control">
                                    <?php while ($rowGro = mysqli_fetch_array($resGroup)) { ?>
                                        <option value="<?php echo $rowGro['group_name'] ?>">
                                            <?php echo $rowGro['group_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2">วัน/เดือน/ปี เกิด</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="date" name="birthday" value="<?php echo $birthdayEx; ?>" id="birthday">
                            </div>
                            <div style="color: red;" id="Wbirthday" class="col-sm-3">*กรุณากรอก วัน/เดือน/ปี เกิด*</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2">อายุ</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="age" value="<?php echo $age; ?>" id="age">
                            </div>
                            <label class="form-control-static col-sm-1">ปี</label>
                            <div style="color: red;" id="Wage" class="col-sm-2">*กรุณากรอก อายุ*</div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2">สูง</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="tall" value="<?php echo $row["tall"]; ?>" id="tall">
                            </div>
                            <label class="form-control-static col-sm-1">เซนติเมตร </label>
                            <div style="color: red;" id="Wtall" class="col-sm-2">*กรุณากรอก สูง*</div>
                        </div>




                        <div class="form-group">
                            <label class="control-label col-sm-2 col-sm-offset-2">น้ำหนัก</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="weight" value="<?php echo $row["weight"]; ?>" id="weight"> 
                            </div>
                            <label class="form-control-static col-sm-1">กก</label>
                            <div style="color: red;" id="Wweight" class="col-sm-2">*กรุณากรอก น้ำหนัก*</div>
                        </div>




                        <div class="form-group">
                            <label class="control-label col-sm-1 ">โทรศัพท์</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="phone" id="phone">
                            </div>
                            <div style="color: red;" id="Wphone" class="col-sm-2">*กรุณากรอก โทรศัพท์*</div>
                        </div>

                        <!--........................................  ข้อที่ 1 success .......................................... -->

                        <div class="form-group">
                            <label class="h4 control-label">๒.ที่อยู่ปัจจุบัน</label>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-sm-1 ">เลขที่</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="home_id" value="<?php echo $row["home_id"]; ?>" id="home_id">
                            </div>
                            <label class="control-label col-sm-1 ">หมู่</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="moo" value="<?php echo $row["moo"]; ?>"  id="moo">
                            </div>
                            <div class="row">

                                <div style="color: red;" id="Whome_id" class=" col-sm-offset-2 col-sm-3">*กรุณากรอก เลขที่*</div>
                                <div style="color: red;" id="Wmoo" class=" col-sm-offset-1 col-sm-3">*กรุณากรอก หมู่*</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-1 ">ซอย</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="soi" id="soi">
                            </div>

                            <label class="control-label col-sm-1 ">ถนน</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="raod" value="<?php echo $row["raod"]; ?>" id="raod">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-1 ">ตำบล</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="district" list="district" id="Tdistrict" value="<?php echo $address[0] ?>">
                                <datalist  id="district">
                                    <?php while ($rowDistrict = mysqli_fetch_array($resDistrict)) { ?>
                                        <option value="<?php echo $rowDistrict["DISTRICT_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>


                            <label class="control-label col-sm-1 ">อำเภอ</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="amphur" list="amphur" id="Tamphur" value="<?php echo $address[1] ?>">
                                <datalist id="amphur">
                                    <?php while ($rowAmphur = mysqli_fetch_array($resAmphur)) { ?>
                                        <option value="<?php echo $rowAmphur["AMPHUR_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                            <label class="control-label col-sm-1 ">จังหวัด</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="province" list="province" id="Tprovince" value="<?php echo $address[2] ?>">
                                <datalist id="province">
                                    <?php while ($rowProvince = mysqli_fetch_array($resProvince)) { ?>
                                        <option value="<?php echo $rowProvince["PROVINCE_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>

                            <div class="row">
                                <div style="color: red;" id="Wdistrict" class="text-center col-sm-offset-1 col-sm-3">*กรุณากรอก เลขที่*</div>
                                <div style="color: red;" id="Wamphur" class="text-center col-sm-offset-1 col-sm-3">*กรุณากรอก หมู่*</div>
                                <div style="color: red;" id="Wprovince" class="text-center col-sm-offset-1 col-sm-3">*กรุณากรอก หมู่*</div>
                            </div>
                        </div>

                        <!--........................................  ข้อที่ 2 success .......................................... -->

                        <div class="form-group">
                            <label class="h4 control-label">๓.ชื่อบิดา</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1">นาย</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fat_fname" value="<?php echo $row["fat_fname"] ?>" id="fat_fname">
                            </div>

                            <label class="control-label col-sm-1">สกุล</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fat_lname" value="<?php echo $row["fat_lname"] ?>" id="fat_lname">
                            </div>
                            <div style="color: red;" id="Wfat_name" class="text-center  col-sm-2">*กรุณากรอก ชื่อ สกุล*</div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-1">อายุ</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="fage" id="fage"> 
                            </div>


                            <label class="form-control-static col-sm-1">ปี</label>
                            <label class="control-label col-sm-1">อาชีพ </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="femployment" id="femployment">
                            </div>

                            <div class="row">
                                <div style="color: red;" id="Wfage" class=" col-sm-offset-2 col-sm-3">*กรุณากรอก อายุ*</div>
                                <div style="color: red;" id="Wfemployment" class="col-sm-offset-1 col-sm-2">*กรุณากรอก อาชีพ*</div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-1">ที่อยู่</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fhome_id" value="<?php echo $row["home_id"]; ?>" id="fhome_id">
                            </div>

                            <label class="control-label col-sm-1">หมู่</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fmoo" value="<?php echo $row["moo"]; ?>" id="fmoo">
                            </div>
                            <div class="row">
                                <div style="color: red;" id="Wfhome_id" class=" col-sm-offset-2 col-sm-3">*กรุณากรอก อายุ*</div>
                                <div style="color: red;" id="Wfmoo" class="col-sm-offset-1 col-sm-2">*กรุณากรอก อาชีพ*</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1">ซอย</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fsoi" id="fsoi"> 
                            </div>

                            <label class="control-label col-sm-1">ถนน</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fraod" value="<?php echo $row["raod"]; ?>" id="fraod">
                            </div>
                        </div>





                        <div class="form-group">
                            <label class="control-label col-sm-1">ตำบล</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fdistrict" list="district" id="Tfdistrict" value="<?php echo $address[0] ?>">
                                <datalist id="district">
                                    <?php while ($rowDistrict = mysqli_fetch_array($resDistrict)) { ?>
                                        <option value="<?php echo $rowDistrict["DISTRICT_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>

                            <label class="control-label col-sm-1">อำเภอ</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="famphur" list="amphur" id="Tfamphur" value="<?php echo $address[1] ?>">
                                <datalist id="amphur">
                                    <?php while ($rowAmphur = mysqli_fetch_array($resAmphur)) { ?>
                                        <option value="<?php echo $rowAmphur["AMPHUR_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>

                            <label class="control-label col-sm-1">จังหวัด</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="fprovince" list="province" id="Tfprovince" value="<?php echo $address[2] ?>">
                                <datalist id="province">
                                    <?php while ($rowProvince = mysqli_fetch_array($resProvince)) { ?>
                                        <option value="<?php echo $rowProvince["PROVINCE_NAME"] ?>">
                                        <?php } ?>
                                </datalist>
                            </div>
                            <div class="row">
                                <div style="color: red;" id="Wfdistrict" class="text-center col-sm-offset-1  col-sm-3">*กรุณากรอก ตำบล*</div>
                                <div style="color: red;" id="Wfamphur" class="text-center col-sm-5">*กรุณากรอก อำเภอ*</div>
                                <div style="color: red;" id="Wfprovince" class="text-center col-sm-3">*กรุณากรอก จังหวัด*</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-2">
                                <select class="form-control" name="msex">
                                    <option value="นาง" selected>นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>

                            <label class="control-label col-sm-2">ชื่อมารดา</label>
                            <div class=" col-sm-2">
                                <input class="form-control" type="text" name="mot_fname" value="<?php echo $row["mot_fname"] ?>" id="mot_fname">
                            </div>

                            <label class="control-label col-sm-1">สกุล </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="mot_lname" value="<?php echo $row["mot_lname"] ?>" id="mot_lname">
                            </div>
                            <div style="color: red;" id="Wmot_name" class="col-sm-2">*กรุณากรอก ชื่อ สกุล*</div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1">อายุ </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="mage" id="mage">
                            </div>
                            <label class="form-control-static col-sm-1">ปี </label>

                            <label class="control-label col-sm-1">อาชีพ </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="memployment" id="memployment">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div style="color: red;" id="Wmage" class="text-center col-sm-offset-1 col-sm-2">*กรุณากรอก อายุ*</div>
                                <div style="color: red;" id="Wmemployment" class="text-center col-sm-offset-2 col-sm-2">*กรุณากรอก อาชีพ*</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-1">ที่อยู่</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="mhome_id" value="<?php echo $row["home_id"]; ?>" id="mhome_id">
                            </div>


                            <label class="control-label col-sm-1">หมู่</label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" name="mmoo" value="<?php echo $row["moo"]; ?>" id="mmoo">
                            </div>

                            <font color="red" id="Wmhome_id"><center>*กรุณากรอก เลขที่*</center></font>
                            <font color="red" id="Wmmoo"><center>*กรุณากรอก หมู่*</center></font>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-1">ซอย</label>
                            <div class="col-sm-1">
                                <input type="text" name="msoi" id="msoi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-1">ถนน</label>
                            <div class="col-sm-1">
                                <input type="text" name="mraod" value="<?php echo $row["raod"]; ?>" id="mraod">
                            </div>
                        </div>






                        <div class="form-group">
                            <label class="control-label col-sm-1">ตำบล</label>
                            <div class="col-sm-1">
                                <input type="text" name="mdistrict" list="district" id="Tmdistrict" value="<?php echo $address[0] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-1">อำเภอ</label>
                            <div class="col-sm-1">
                                <input type="text" name="mamphur" list="amphur" id="Tmamphur" value="<?php echo $address[1] ?>">
                            </div>  
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-1">จังหวัด</label>
                            <div class="col-sm-1">
                                <input type="text" name="mprovince" list="province" id="Tmprovince" value="<?php echo $address[2] ?>">
                            </div>
                        </div>

                        <font color="red" id="Wmdistrict"><center>*กรุณากรอก ตำบล*</center></font>
                        <font color="red" id="Wmamphur"><center>*กรุณากรอก อำเภอ*</center></font>
                        <font color="red" id="Wmprovince"><center>*กรุณากรอก จังหวัด*</center></font>



                        ๔.คะแนน

                        เฉลี่ยสะสมถึงภาคเรียนสุดท้าย<input type="text" name="gpa" id="gpa" value="<?php echo $row["gpa"] ?>">


                        <font color="red" id="Wgpa"><center>*กรุณากรอก คะแนนเฉลี่ยสะสมถึงภาคเรียนสุดท้าย*</center></font>



                        ๕.ความสามารถพิเศษ

                        ๑<input type="text" name="genius1">
                        ๒<input type="text" name="genius2">
                        ๓<input type="text" name="genius3">


                        ๖.ชื่อผู้ปกครอง(ที่จะต้องมาประชุมการฝึกงาน/ฝึกอาชีพ พร้อมนักเรียน/นักศึกษา)

                        <select name="psex">
                            <option value="นาย" selected>นาย
                            <option value="นาง" selected>นาง
                            <option value="นางสาว">นางสาว
                        </select>	<input type="text" name="par_fname" value="<?php echo $row["par_fname"]; ?>" id="par_fname">

                        สกุล <input type="text" name="par_lname" value="<?php echo $row["par_lname"]; ?>" id="par_lname">
                        เกี่ยวข้องเป็น <input type="text" name="concerned" id="concerned">


                        <font color="red" id="Wpar_name"><center>*กรุณากรอก ชื่อ สกุล*</center></font>
                        <font color="red" id="Wconcerned"><center>*กรุณากรอก เกี่ยวข้องเป็น*</center></font>



                        ที่อยู่ปัจจุบัน <input type="text" name="phome_id" value="<?php echo $row["home_id"]; ?>" id="phome_id"> 
                        หมู่<input type="text" name="pmoo" value="<?php echo $row["moo"]; ?>" id="pmoo">
                        ซอย<input type="text" name="psoi" id="psoi"> 
                        ถนน<input type="text" name="praod" value="<?php echo $row["raod"]; ?>" id="praod">


                        <font color="red" id="Wphome_id"><center>*กรุณากรอก ที่อยู่*</center></font>
                        <font color="red" id="Wpmoo"><center>*กรุณากรอก หมู่*</center></font>



                        ตำบล<input type="text" name="pdistrict" list="district" id="Tpdistrict" value="<?php echo $address[0] ?>">
                        อำเภอ<input type="text" name="pamphur" list="amphur" id="Tpamphur" value="<?php echo $address[1] ?>">
                        จังหวัด<input type="text" name="pprovince" list="province" id="Tpprovince" value="<?php echo $address[2] ?>">


                        <font color="red" id="Wpdistrict"><center>*กรุณากรอก ตำบล*</center></font>
                        <font color="red" id="Wpamphur"><center>*กรุณากรอก อำเภอ*</center></font>
                        <font color="red" id="Wpprovince"><center>*กรุณากรอก จังหวัด*</center></font>




                        โทรศัพท์
                        <input type="text" name="par_tell" value="<?php echo $row["par_tell"] ?>" id="par_tell">


                        <font color="red" id="Wpar_tell"><center>*กรุณากรอก โทรศัพท์*</center></font>



                        ๗.ครูที่ปรึกษา

                        ชื่อ <input type="text" name="teacher_name" list="teacher" id="teacher_name">
                        <datalist id="teacher">
                            <?php while ($rowTeacher = mysqli_fetch_array($resTeacher)) { ?>
                                <option value="<?php echo $rowTeacher["teacher_name"] . " " . $rowTeacher["teacher_lashname"] ?>">
                                <?php } ?>
                        </datalist>



                        <font color="red" id="Wteacher_name"><center>*กรุณากรอก ครูที่ปรึกษา*</center></font>



                        <center><input type="submit" value="ตกลง" id="submit"></center>
                </div>
                </form>
                </div>
            </section>
        </section>
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
<script>
    $(document).ready(function () {
        $("#Wstd_name").hide();
        $("#Wbirthday").hide();
        $("#Wage").hide();
        $("#Wtall").hide();
        $("#Wweight").hide();
        $("#Wphone").hide();
        $("#Whome_id").hide();
        $("#Wmoo").hide();
        $("#Wdistrict").hide();
        $("#Wamphur").hide();
        $("#Wprovince").hide();
        $("#Wfat_name").hide();
        $("#Wfage").hide();
        $("#Wfemployment").hide();
        $("#Wfhome_id").hide();
        $("#Wfmoo").hide();
        $("#Wfdistrict").hide();
        $("#Wfamphur").hide();
        $("#Wfprovince").hide();
        $("#Wmot_name").hide();
        $("#Wmage").hide();
        $("#Wmemployment").hide();
        $("#Wmhome_id").hide();
        $("#Wmmoo").hide();
        $("#Wmdistrict").hide();
        $("#Wmamphur").hide();
        $("#Wmprovince").hide();
        $("#Wgpa").hide();
        $("#Wpar_name").hide();
        $("#Wconcerned").hide();
        $("#Wphome_id").hide();
        $("#Wpmoo").hide();
        $("#Wpdistrict").hide();
        $("#Wpamphur").hide();
        $("#Wpprovince").hide();
        $("#Wpar_tell").hide();
        $("#Wteacher_name").hide();
        //std_fname
        $("#std_fname").focusout(function () {
            if (!$("#std_fname").val() || !$("#std_lname").val()) {
                $("#Wstd_name").show();
            } else {
                $("#Wstd_name").hide();
            }
        });
        $("#std_fname").keyup(function () {
            if (!$("#std_fname").val() || !$("#std_lname").val()) {
                $("#Wstd_name").show();
            } else {
                $("#Wstd_name").hide();
            }
        });
        $("#std_lname").focusout(function () {
            if (!$("#std_fname").val() || !$("#std_lname").val()) {
                $("#Wstd_name").show();
            } else {
                $("#Wstd_name").hide();
            }
        });
        $("#std_lname").keyup(function () {
            if (!$("#std_fname").val() || !$("#std_lname").val()) {
                $("#Wstd_name").show();
            } else {
                $("#Wstd_name").hide();
            }
        });
        //birthday
        $("#birthday").focusout(function () {
            if (!$("#birthday").val()) {
                $("#Wbirthday").show();
            } else {
                $("#Wbirthday").hide();
            }
        });
        $("#birthday").keyup(function () {
            if (!$("#birthday").val()) {
                $("#Wbirthday").show();
            } else {
                $("#Wbirthday").hide();
            }
        });
        //age
        $("#age").focusout(function () {
            if (!$("#age").val()) {
                $("#Wage").show();
            } else {
                $("#Wage").hide();
            }
        });
        $("#age").keyup(function () {
            if (!$("#age").val()) {
                $("#Wage").show();
            } else {
                $("#Wage").hide();
            }
        });

        //tall
        $("#tall").focusout(function () {
            if (!$("#tall").val()) {
                $("#Wtall").show();
            } else {
                $("#Wtall").hide();
            }
        });
        $("#tall").keyup(function () {
            if (!$("#tall").val()) {
                $("#Wtall").show();
            } else {
                $("#Wtall").hide();
            }
        });

        //weight
        $("#weight").focusout(function () {
            if (!$("#weight").val()) {
                $("#Wweight").show();
            } else {
                $("#Wweight").hide();
            }
        });
        $("#weight").keyup(function () {
            if (!$("#weight").val()) {
                $("#Wweight").show();
            } else {
                $("#Wweight").hide();
            }
        });

        //phone
        $("#phone").focusout(function () {
            if (!$("#phone").val()) {
                $("#Wphone").show();
            } else {
                $("#Wphone").hide();
            }
        });
        $("#phone").keyup(function () {
            if (!$("#phone").val()) {
                $("#Wphone").show();
            } else {
                $("#Wphone").hide();
            }
        });

        //home_id
        $("#home_id").focusout(function () {
            if (!$("#home_id").val()) {
                $("#Whome_id").show();
            } else {
                $("#Whome_id").hide();
            }
        });
        $("#home_id").keyup(function () {
            if (!$("#home_id").val()) {
                $("#Whome_id").show();
            } else {
                $("#Whome_id").hide();
            }
        });

        //moo
        $("#moo").focusout(function () {
            if (!$("#moo").val()) {
                $("#Wmoo").show();
            } else {
                $("#Wmoo").hide();
            }
        });
        $("#moo").keyup(function () {
            if (!$("#moo").val()) {
                $("#Wmoo").show();
            } else {
                $("#Wmoo").hide();
            }
        });

        //district
        $("#Tdistrict").focusout(function () {
            if (!$("#Tdistrict").val()) {
                $("#Wdistrict").show();
            } else {
                $("#Wdistrict").hide();
            }
        });
        $("#Tdistrict").keyup(function () {
            if (!$("#Tdistrict").val()) {
                $("#Wdistrict").show();
            } else {
                $("#Wdistrict").hide();
            }
        });

        //amphur
        $("#Tamphur").focusout(function () {
            if (!$("#Tamphur").val()) {
                $("#Wamphur").show();
            } else {
                $("#Wamphur").hide();
            }
        });
        $("#Tamphur").keyup(function () {
            if (!$("#Tamphur").val()) {
                $("#Wamphur").show();
            } else {
                $("#Wamphur").hide();
            }
        });

        //province
        $("#Tprovince").focusout(function () {
            if (!$("#Tprovince").val()) {
                $("#Wprovince").show();
            } else {
                $("#Wprovince").hide();
            }
        });
        $("#Tprovince").keyup(function () {
            if (!$("#Tprovince").val()) {
                $("#Wprovince").show();
            } else {
                $("#Wprovince").hide();
            }
        });

        //fat_name
        $("#fat_fname").focusout(function () {
            if (!$("#fat_fname").val() || !$("#fat_lname").val()) {
                $("#Wfat_name").show();
            } else {
                $("#Wfat_name").hide();
            }
        });
        $("#fat_fname").keyup(function () {
            if (!$("#fat_fname").val() || !$("#fat_lname").val()) {
                $("#Wfat_name").show();
            } else {
                $("#Wfat_name").hide();
            }
        });

        $("#fat_lname").focusout(function () {
            if (!$("#fat_fname").val() || !$("#fat_lname").val()) {
                $("#Wfat_name").show();
            } else {
                $("#Wfat_name").hide();
            }
        });
        $("#fat_lname").keyup(function () {
            if (!$("#fat_fname").val() || !$("#fat_lname").val()) {
                $("#Wfat_name").show();
            } else {
                $("#Wfat_name").hide();
            }
        });

        //fage
        $("#fage").focusout(function () {
            if (!$("#fage").val()) {
                $("#Wfage").show();
            } else {
                $("#Wfage").hide();
            }
        });
        $("#fage").keyup(function () {
            if (!$("#fage").val()) {
                $("#Wfage").show();
            } else {
                $("#Wfage").hide();
            }
        });

        //femployment
        $("#femployment").focusout(function () {
            if (!$("#femployment").val()) {
                $("#Wfemployment").show();
            } else {
                $("#Wfemployment").hide();
            }
        });
        $("#femployment").keyup(function () {
            if (!$("#femployment").val()) {
                $("#Wfemployment").show();
            } else {
                $("#Wfemployment").hide();
            }
        });

        //fhome_id
        $("#fhome_id").focusout(function () {
            if (!$("#fhome_id").val()) {
                $("#Wfhome_id").show();
            } else {
                $("#Wfhome_id").hide();
            }
        });
        $("#fhome_id").keyup(function () {
            if (!$("#fhome_id").val()) {
                $("#Wfhome_id").show();
            } else {
                $("#Wfhome_id").hide();
            }
        });

        //fmoo
        $("#fmoo").focusout(function () {
            if (!$("#fmoo").val()) {
                $("#Wfmoo").show();
            } else {
                $("#Wfmoo").hide();
            }
        });
        $("#fmoo").keyup(function () {
            if (!$("#fmoo").val()) {
                $("#Wfmoo").show();
            } else {
                $("#Wfmoo").hide();
            }
        });

        //fdistrict
        $("#Tfdistrict").focusout(function () {
            if (!$("#Tfdistrict").val()) {
                $("#Wfdistrict").show();
            } else {
                $("#Wfdistrict").hide();
            }
        });
        $("#Tfdistrict").keyup(function () {
            if (!$("#Tfdistrict").val()) {
                $("#Wfdistrict").show();
            } else {
                $("#Wfdistrict").hide();
            }
        });

        //famphur
        $("#Tfamphur").focusout(function () {
            if (!$("#Tfamphur").val()) {
                $("#Wfamphur").show();
            } else {
                $("#Wfamphur").hide();
            }
        });
        $("#Tfamphur").keyup(function () {
            if (!$("#Tfamphur").val()) {
                $("#Wfamphur").show();
            } else {
                $("#Wfamphur").hide();
            }
        });

        //fprovince
        $("#Tfprovince").focusout(function () {
            if (!$("#Tfprovince").val()) {
                $("#Wfprovince").show();
            } else {
                $("#Wfprovince").hide();
            }
        });
        $("#Tfprovince").keyup(function () {
            if (!$("#Tfprovince").val()) {
                $("#Wfprovince").show();
            } else {
                $("#Wfprovince").hide();
            }
        });

        //mot_name
        $("#mot_fname").focusout(function () {
            if (!$("#mot_fname").val() || !$("#mot_lname").val()) {
                $("#Wmot_name").show();
            } else {
                $("#Wmot_name").hide();
            }
        });
        $("#mot_fname").keyup(function () {
            if (!$("#mot_fname").val() || !$("#mot_lname").val()) {
                $("#Wmot_name").show();
            } else {
                $("#Wmot_name").hide();
            }
        });
        $("#mot_lname").focusout(function () {
            if (!$("#mot_fname").val() || !$("#mot_lname").val()) {
                $("#Wmot_name").show();
            } else {
                $("#Wmot_name").hide();
            }
        });
        $("#mot_lname").keyup(function () {
            if (!$("#mot_fname").val() || !$("#mot_lname").val()) {
                $("#Wmot_name").show();
            } else {
                $("#Wmot_name").hide();
            }
        });

        //mage
        $("#mage").focusout(function () {
            if (!$("#mage").val()) {
                $("#Wmage").show();
            } else {
                $("#Wmage").hide();
            }
        });
        $("#mage").keyup(function () {
            if (!$("#mage").val()) {
                $("#Wmage").show();
            } else {
                $("#Wmage").hide();
            }
        });

        //memployment
        $("#memployment").focusout(function () {
            if (!$("#memployment").val()) {
                $("#Wmemployment").show();
            } else {
                $("#Wmemployment").hide();
            }
        });
        $("#memployment").keyup(function () {
            if (!$("#memployment").val()) {
                $("#Wmemployment").show();
            } else {
                $("#Wmemployment").hide();
            }
        });

        //mhome_id
        $("#mhome_id").focusout(function () {
            if (!$("#mhome_id").val()) {
                $("#Wmhome_id").show();
            } else {
                $("#Wmhome_id").hide();
            }
        });
        $("#mhome_id").keyup(function () {
            if (!$("#mhome_id").val()) {
                $("#Wmhome_id").show();
            } else {
                $("#Wmhome_id").hide();
            }
        });

        //mmoo
        $("#mmoo").focusout(function () {
            if (!$("#mmoo").val()) {
                $("#Wmmoo").show();
            } else {
                $("#Wmmoo").hide();
            }
        });
        $("#mmoo").keyup(function () {
            if (!$("#mmoo").val()) {
                $("#Wmmoo").show();
            } else {
                $("#Wmmoo").hide();
            }
        });

        //mdistrict
        $("#Tmdistrict").focusout(function () {
            if (!$("#Tmdistrict").val()) {
                $("#Wmdistrict").show();
            } else {
                $("#Wmdistrict").hide();
            }
        });
        $("#Tmdistrict").keyup(function () {
            if (!$("#Tmdistrict").val()) {
                $("#Wmdistrict").show();
            } else {
                $("#Wmdistrict").hide();
            }
        });

        //mamphur
        $("#Tmamphur").focusout(function () {
            if (!$("#Tmamphur").val()) {
                $("#Wmamphur").show();
            } else {
                $("#Wmamphur").hide();
            }
        });
        $("#Tmamphur").keyup(function () {
            if (!$("#Tmamphur").val()) {
                $("#Wmamphur").show();
            } else {
                $("#Wmamphur").hide();
            }
        });

        //mprovince
        $("#Tmprovince").focusout(function () {
            if (!$("#Tmprovince").val()) {
                $("#Wmprovince").show();
            } else {
                $("#Wmprovince").hide();
            }
        });
        $("#Tmprovince").keyup(function () {
            if (!$("#Tmprovince").val()) {
                $("#Wmprovince").show();
            } else {
                $("#Wmprovince").hide();
            }
        });

        //gpa
        $("#gpa").focusout(function () {
            if (!$("#gpa").val()) {
                $("#Wgpa").show();
            } else {
                $("#Wgpa").hide();
            }
        });
        $("#gpa").keyup(function () {
            if (!$("#gpa").val()) {
                $("#Wgpa").show();
            } else {
                $("#Wgpa").hide();
            }
        });

        //par_name
        $("#par_fname").focusout(function () {
            if (!$("#par_fname").val() || !$("#par_lname").val()) {
                $("#Wpar_name").show();
            } else {
                $("#Wpar_name").hide();
            }
        });
        $("#par_fname").keyup(function () {
            if (!$("#par_fname").val() || !$("#par_lname").val()) {
                $("#Wpar_name").show();
            } else {
                $("#Wpar_name").hide();
            }
        });
        $("#par_lname").focusout(function () {
            if (!$("#par_fname").val() || !$("#par_lname").val()) {
                $("#Wpar_name").show();
            } else {
                $("#Wpar_name").hide();
            }
        });
        $("#par_lname").keyup(function () {
            if (!$("#par_fname").val() || !$("#par_lname").val()) {
                $("#Wpar_name").show();
            } else {
                $("#Wpar_name").hide();
            }
        });

        //concerned
        $("#concerned").focusout(function () {
            if (!$("#concerned").val()) {
                $("#Wconcerned").show();
            } else {
                $("#Wconcerned").hide();
            }
        });
        $("#concerned").keyup(function () {
            if (!$("#concerned").val()) {
                $("#Wconcerned").show();
            } else {
                $("#Wconcerned").hide();
            }
        });

        //phome_id
        $("#phome_id").focusout(function () {
            if (!$("#phome_id").val()) {
                $("#Wphome_id").show();
            } else {
                $("#Wphome_id").hide();
            }
        });
        $("#phome_id").keyup(function () {
            if (!$("#phome_id").val()) {
                $("#Wphome_id").show();
            } else {
                $("#Wphome_id").hide();
            }
        });

        //pmoo
        $("#pmoo").focusout(function () {
            if (!$("#pmoo").val()) {
                $("#Wpmoo").show();
            } else {
                $("#Wpmoo").hide();
            }
        });
        $("#pmoo").keyup(function () {
            if (!$("#pmoo").val()) {
                $("#Wpmoo").show();
            } else {
                $("#Wpmoo").hide();
            }
        });

        //pdistrict
        $("#Tpdistrict").focusout(function () {
            if (!$("#Tpdistrict").val()) {
                $("#Wpdistrict").show();
            } else {
                $("#Wpdistrict").hide();
            }
        });
        $("#Tpdistrict").keyup(function () {
            if (!$("#Tpdistrict").val()) {
                $("#Wpdistrict").show();
            } else {
                $("#Wpdistrict").hide();
            }
        });

        //pamphur
        $("#Tpamphur").focusout(function () {
            if (!$("#Tpamphur").val()) {
                $("#Wpamphur").show();
            } else {
                $("#Wpamphur").hide();
            }
        });
        $("#Tpamphur").keyup(function () {
            if (!$("#Tpamphur").val()) {
                $("#Wpamphur").show();
            } else {
                $("#Wpamphur").hide();
            }
        });

        //pprovince
        $("#Tpprovince").focusout(function () {
            if (!$("#Tpprovince").val()) {
                $("#Wpprovince").show();
            } else {
                $("#Wpprovince").hide();
            }
        });
        $("#Tpprovince").keyup(function () {
            if (!$("#Tpprovince").val()) {
                $("#Wpprovince").show();
            } else {
                $("#Wpprovince").hide();
            }
        });

        //par_tell
        $("#par_tell").focusout(function () {
            if (!$("#par_tell").val()) {
                $("#Wpar_tell").show();
            } else {
                $("#Wpar_tell").hide();
            }
        });
        $("#par_tell").keyup(function () {
            if (!$("#par_tell").val()) {
                $("#Wpar_tell").show();
            } else {
                $("#Wpar_tell").hide();
            }
        });

        //teacher_name
        $("#teacher_name").focusout(function () {
            if (!$("#teacher_name").val()) {
                $("#Wteacher_name").show();
            } else {
                $("#Wteacher_name").hide();
            }
        });
        $("#teacher_name").keyup(function () {
            if (!$("#teacher_name").val()) {
                $("#Wteacher_name").show();
            } else {
                $("#Wteacher_name").hide();
            }
        });
        $("body").mouseover(function () {
            //alert("s");
            if (
                    !$("#teacher_name").val() ||
                    !$("#par_tell").val() ||
                    !$("#Tpprovince").val() ||
                    !$("#Tpamphur").val() ||
                    !$("#Tpdistrict").val() ||
                    !$("#pmoo").val() ||
                    !$("#phome_id").val() ||
                    !$("#concerned").val() ||
                    !$("#par_fname").val() ||
                    !$("#par_lname").val() ||
                    !$("#gpa").val() ||
                    !$("#mage").val() ||
                    !$("#Tmamphur").val() ||
                    !$("#Tmprovince").val() ||
                    !$("#Tmdistrict").val() ||
                    !$("#mmoo").val() ||
                    !$("#mhome_id").val() ||
                    !$("#memployment").val() ||
                    !$("#mot_lname").val() ||
                    !$("#mot_fname").val() ||
                    !$("#Tfprovince").val() ||
                    !$("#Tfamphur").val() ||
                    !$("#Tfdistrict").val() ||
                    !$("#fmoo").val() ||
                    !$("#fhome_id").val() ||
                    !$("#femployment").val() ||
                    !$("#fage").val() ||
                    !$("#fat_fname").val() ||
                    !$("#fat_lname").val() ||
                    !$("#Tprovince").val() ||
                    !$("#Tamphur").val() ||
                    !$("#Tdistrict").val() ||
                    !$("#moo").val() ||
                    !$("#home_id").val() ||
                    !$("#phone").val() ||
                    !$("#weight").val() ||
                    !$("#tall").val() ||
                    !$("#age").val() ||
                    !$("#birthday").val() ||
                    !$("#std_fname").val() ||
                    !$("#std_lname").val()
                    )
            {
                $("#submit").attr('disabled', 'disabled');
            } else {
                $("#submit").removeAttr('disabled');
            }
        });
    });
</script>
<?php

function select_dve03($conn, $std_id) {
    $sql = "select stu_fname,stu_lname,student_id,gpa,par_fname,par_lname,birthday,tall,weight,home_id,moo,street,tumbol_id,gpa,people_id,fat_fname,fat_lname,mot_fname,mot_lname,par_tell
		from std where student_id = '$std_id'";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_group($conn) {
    $sql = "select * from groups";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_major($conn) {
    $sql = "select * from major";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_edu($conn) {
    $sql = "select * from education";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function select_address($conn, $id) {

    $sql = "select * from district where 	DISTRICT_CODE = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $amCode = $row["AMPHUR_CODE"];
    $ad = array();
    $ad[0] = $row["DISTRICT_NAME"];

    $sqlAm = "select * from amphur where 	AMPHUR_CODE = '$amCode' ";
    $resAm = mysqli_query($conn, $sqlAm);
    $rowAm = mysqli_fetch_array($resAm);
    $proCode = $rowAm["PROVINCE_CODE"];
    $ad[1] = $rowAm["AMPHUR_NAME"];

    $sqlPro = "select * from province where PROVINCE_CODE = '$proCode' ";
    $resPro = mysqli_query($conn, $sqlPro);
    $rowPro = mysqli_fetch_array($resPro);
    $ad[2] = $rowPro["PROVINCE_NAME"];

    return $ad;
}

function select_amphur($connect) {
    $sql = "select * from amphur";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_province($connect) {
    $sql = "select * from province";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_district($connect) {
    $sql = "select * from district";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_teacher($connect) {
    $sql = "select * from teacher";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>