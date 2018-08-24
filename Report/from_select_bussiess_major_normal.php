<?php
include("../connect/conn.php");

$connect = $conn;
$res_b = select_major($connect);
$res_bus = select_b($connect);
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
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_zoom-in_alt"></i><b><h2>สรุปรายชื่อนักศึกษาฝึกงาน</h2></b></h3>
                </div>
                <form class="form-horizontal" method="post" action="../MPDF/all_Student_apprentice.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2">สถานประกอบการ</label>
                        <div class="col-sm-3">
                            <select name="bus" class="form-control">
                                <?php while ($row_bus = mysqli_fetch_assoc($res_bus)) { ?>
                                    <option value="<?php echo $row_bus["business_id"] ?>"><?php echo $row_bus["business_name"] ?></option>
                                <?php } ?>

                            </select>				
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">แผนก</label>
                        <div class="col-sm-3" >
                            <select name="major_id" class="form-control">
                                <?php while ($row = mysqli_fetch_assoc($res_b)) { ?>
                                    <option value="<?php echo $row["major_id"] ?>"><?php echo $row["major_name"] ?></option>
                                <?php } ?>
                            </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ภาคเรียน</label>
                        <div class="col-sm-3" >
                            <select name="tream" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">ปีการศึกษา</label>
                        <div class="col-sm-3" >
                            <input class="form-control" type="number" name="year">
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

function select_major($connect) {
    $sql = "select * from major";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_b($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>
