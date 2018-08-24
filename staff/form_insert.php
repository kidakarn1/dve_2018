<!DOCTYPE html>
<html>
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

        <?php
        include("../connect/conn.php");
        $connect = $conn;
        $res_DISTRICT = select_DISTRICT($connect); //เป็นส่วนของตำบล ตึ๋งเองจะใครล่ะ
        $res_AMPHUR = select_AMPHUR($connect); //เป็นส่วนของอำเภอ ตึ๋งเองจะใครล่ะ
        $res_PROVINCE = select_PROVINCE($connect); //เป็นส่วนของจังหวัด ตึ๋งเองจะใครล่ะ
        $res_zipcode = select_zipcodes($connect); //เป็นส่วนของรหัสไปรษณีย์ ตึ๋งเองจะใครล่ะ
        ?>
        <?php
        


        date_default_timezone_set('asia/bangkok');
        $house = date("H");
        $minues = date("i");
        $second = date("s");
        
        $year = date("Y");
        $mouth = date("m");
        $date = date("d");
        $sql_nub = "select * from user";
        $res_nub = mysqli_query($conn, $sql_nub);
        $row_nub = mysqli_num_rows($res_nub);

        $sql = "select * from user_type";
        $res = mysqli_query($conn, $sql);

        $sql_sch = "select * from school";
        $res_sch = mysqli_query($conn, $sql_sch);

        $id = $year . $mouth . $date . $row_nub + 1;
        $ymd = $year + 543 . "-" . $mouth . "-" . $date ." ". $house . '-' . $minues . '-' . $second ;
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cursor_alt"></i><b>เพิ่มข้อมูลเจ้าหน้าที่</b></h3>
                </div>


                <form class="form-horizontal" id="form1" name="form1" method="post" action="insert.php">


                    <input type="hidden" name="username" value="<?php echo $id; ?>" />
                    <div class="form-group">
                        <label class="control-label col-sm-2">Username</label>
                        <div class="col-sm-3">
                            <div class="form-control"><?php echo $id; ?></div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2">Password</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="password" name="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อเจ้าหน้าที่</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="fname" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">นามสกุลเจ้าหน้าที่</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="lname" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Email</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="email" name="email" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">เบอร์โทรศัพท์มือถือ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="phone" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">โรงเรียน</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="school_id">
                                <?php while ($row_sch = mysqli_fetch_array($res_sch)) { ?>
                                    <option value="<?php echo $row_sch[school_id]; ?>"><?php echo $row_sch[school_name]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ตำแหน่ง</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="position">
                                <?php while ($row = mysqli_fetch_array($res)) { ?>
                                    <option value="<?php echo $row[user_type_id]; ?>"><?php echo $row[user_type_name]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

<!--                    <div class="form-group">
                        <label class="control-label col-sm-2">วันที่สมัคร</label>
                        <div class="col-sm-3">-->
                            <input class="form-control" type="hidden" name="register_date" value="<?php echo $ymd; ?>"/>
<!--                        </div>
                    </div>-->

                    <div class="text-center">
                        <input class="btn btn-sm btn-success" type="submit" value="OK" />
                    </div>


                </form>
            </section>
        </section>
    </body>
</html>


<?php

function select_DISTRICT($connect) {
    $sql = "select *from district";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_AMPHUR($connect) {
    $sql = "select *from amphur";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_PROVINCE($connect) {
    $sql = "select *from province";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_zipcodes($connect) {
    $sql = "select *from zipcodes";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>
