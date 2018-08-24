<?php
include("../connect/conn.php");
$connect = $conn;
$res_b = select_trainer($connect);
$res_bus = select_b($connect);
$res_school = select_school($connect);
$row_school = mysqli_fetch_assoc($res_school);
date_default_timezone_set("asia/bangkok");
$year = date("Y");
$year = $year + 543;
?>
<?php include '../menu2.php'; ?>
<!doctype html>
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
    </head>
    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;">
                        <i style="color: red;" class="icon_zoom-in_alt"></i><b>รายงานจำนวนครูฝึกในสถานประกอบการ</b>
                    </h3>
                </div>
                <form class="form-horizontal" method="post" action="../MPDF/report_sumtrainer.php">

                    <div class="form-group">
                        <label class="control-label col-sm-2"><?php echo $row_school['school_name'] ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ภาคเรียน</label>
                        <div class="col-sm-3" >
                            <select  class="form-control" name="tream">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ปีการศึกษา</label>
                        <div class="col-sm-3" >
                            <select  class="form-control" name="tream">
                                <?php for ($i = 0; $i <= 5; $i++) { ?>

                                    <option value="<?php echo $year + $i; ?>"><?php echo $year + $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="ตกลง">
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>
<?php

function select_trainer($connect) {
    $sql = "select * from trainer";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_b($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_school($connect) {
    $sql = "select * from school";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>