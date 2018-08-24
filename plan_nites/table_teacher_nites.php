
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">
        <title>select_department</title>
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <?php include("../menu2.php"); ?>
        <section id="main-content">
            <section class="wrapper">

                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i>ตารางนิเทศ</h3>

                </div>
                <?php
                include("../connect/conn.php");

                @SESSION_START();
                date_default_timezone_set('asia/bangkok');
                $date = date("l");
//echo $date;
                $connect = $conn;
                $res_teacher_nites = select_teacher_nites($connect);
                while ($row_teacher_nites = mysqli_fetch_assoc($res_teacher_nites)) {
                    //  echo "<hr>";
                    ?>

                    <style>

                        .color_teacher{
                            color:blue;
                        }
                        .color_dir{
                            color:red;
                        }
                    </style>



                    <?php
                    $teacher_id = $row_teacher_nites["teacher_id"];
                    $drive_id = $row_teacher_nites["drive_id"];
                    $business_id = $row_teacher_nites["business_id"];
                    $teacher_nites_date = $row_teacher_nites["plan_date"];
                    $car_id = $row_teacher_nites["car_id"];
                    $td = explode(",", $teacher_id);
                    $dd = explode(",", $drive_id);
                    $bd = explode(",", $business_id);
                    $tnd = explode(",", $teacher_nites_date);
                    $cd = explode(",", $car_id);
                    $count_td = count($td);
                    $count_dd = count($dd);
                    $count_bd = count($bd);
                    $count_tnd = count($tnd);
                    $count_cd = count($cd);
                    ?>	 




                    <table class='table text-center'border="1">
                        <tr>
                            <th>วัน/เดือน/ปี</th>
                            <th>สถานประกอบการ/ที่ตั้ง</th>
                            <th colspan="2">รายชื่อครูนิเทศ</th>
                        </tr>
                        <?php
                        $day = array("Sun" => "อาทิตย์",
                            "Mon" => "จันทร์",
                            "Tue" => "อังคาร",
                            "Wed" => "พุธ",
                            "Thu" => "พฤหัสบดี",
                            "Fri" => "ศุกร์",
                            "Sat" => "เสาร์"
                        );
                        for ($p = 0; $p <= $count_bd; $p++) {
                            $res_business_count = select_business_count($connect, $bd[$p]);
                            while ($row_business_count = mysqli_fetch_assoc($res_business_count)) {
                                $date_pagubun = date_create("$tnd[$p]");
                                $dew = substr($tnd[$p], 8, 2);
                                $mouth = substr($tnd[$p], 6, 1);
                                $thMonth = thaiMonth(date("$mouth"));
                                $year_naja = substr($tnd[$p], 0, 4);
                                if ($tnd[$p]) {
                                    $date_p = date_format($date_pagubun, "D");
                                    $dayy = "วัน" . $day[$date_p];
                                    $year_naja = $year_naja + 543;
                                    $tee = "ที่";
                                }
                                if (!$tnd[$p]) {
                                    $date_p = "";
                                    $dayy = "";
                                    $year_naja = "";
                                    $tee = "";
                                }
                                // echo $mouth;
                                ?>
                                <tr>
                                    <td><?php echo $dayy . "<br>" . $tee . " " . $dew . " " . $thMonth . " " . $year_naja; ?></td>
                                    <td><?php echo $row_business_count["business_name"] . " " . "ตำบล" . " " . $row_business_count["DISTRICT_NAME"] . " " . "อำเภอ" . " " . $row_business_count["AMPHUR_NAME"] . " " . "จังหวัด" . " " . $row_business_count["PROVINCE_NAME"]; ?>
                                    </td>

                                    <?php
                                    $res_teacher_count = select_teacher_count($connect, $td[$p]);
                                    while ($row_teacher_count = mysqli_fetch_assoc($res_teacher_count)) {
                                        ?> 

                                        <td>
                                            <?php echo "<div class='color_teacher'>" . "ครูนิเทศ" . "</div>" . $row_teacher_count["teacher_name"]; ?>
                                        </td>

                                        <?php
                                    }
                                }    //echo $td[$i]."<br>";
                            }
                            //for ($i=0; $i<=$count_td; $i++) { 
                            ?> 
                        </tr>

                        <?php
                        //}    //echo $td[$i]."<br>";
                        //}
                        //
        ?>
                        <?php
                        for ($k = 0; $k <= $count_dd; $k++) {
                            $res_user_count = select_user_count($connect, $dd[$k]);
                            while ($row_teacher_count_user = mysqli_fetch_assoc($res_user_count)) {
                                ?>   
                                <tr>
                                    <td colspan="3"><?php echo "<font color='red'>" . "พนักงานขับรถ :" . "</font>" . $row_teacher_count_user["fname"] . " " . $row_teacher_count_user["lname"]; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>  

                            <?php
                        }
                        ?>
                        <?php
                        for ($e = 0; $e <= $count_cd; $e++) {
                            $res_car_id_count = select_car_count($connect, $cd[$e]);
                            while ($row_car_id_count = mysqli_fetch_assoc($res_car_id_count)) {
                                ?>   
                                <tr>
                                    <td colspan="3"><?php echo "<font color='#ff0eff'>" . "ทะเบียนรถ :" . "</font>" . $row_car_id_count["car_id"]; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>  

                            <?php
                        }
                        ?>
                    </table>
					 <?php if ($_SESSION['status'] == "Staff" || $_SESSION['status'] == "Admin") { ?>
                    <a href="delete_teacher_nites.php?id=<?php echo $row_teacher_nites["plan_id"]; ?>"onclick="return confirm('ต้องการลบตารางการนิเทศใช่หรือไม่?');">ลบตารางการนิเทศ</a>
                    <?php
                }
//echo $teacher_id."<br>";
//print_r($td);
//$_SESSION["num_teacher"]
                ?>
				 <?php
                }

                ?>
                </div>
            </section>


            <?php

            function select_business_count($connect, $bd) {
                $sql = "select * from business,district,amphur,province where business.business_id = '$bd' and 
    business.district_id = district.DISTRICT_CODE and
    district.AMPHUR_CODE = amphur.AMPHUR_CODE and 
    amphur.PROVINCE_CODE = province.PROVINCE_CODE";
                $res = mysqli_query($connect, $sql);
                return $res;
            }

            function select_user_count($connect, $dd) {
                $sql = "select * from user where user_id = '$dd' and user_type_id = '6'";
                $res = mysqli_query($connect, $sql);
                return $res;
            }

            function select_car_count($connect, $cd) {
                $sql = "select * from car where car_id = '$cd'";
                $res = mysqli_query($connect, $sql);
                return $res;
            }

            function select_teacher_nites($connect) {
                $sql = "select * from plan_nites";
                $res = mysqli_query($connect, $sql);
                return $res;
            }

            function select_teacher_count($connect, $td) {
                $sql = "select * from teacher,user where teacher.citizen_id = '$td' and user.user_type_id = '6'";
                $res = mysqli_query($connect, $sql);
                return $res;
            }

            function thaiMonth($index) {
                $thai_month_arr = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                );
                return $thai_month_arr[$index];
            }
            ?>