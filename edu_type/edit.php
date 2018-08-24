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
        <?php
        include('../connect/conn.php');
        $connect = $conn;
        //$business_id = $_GET['business_id'];
        $sql = "select * from edu_type where 	type_code = '" . $_GET["type_code"] . "'";
        $res = mysqli_query($connect, $sql);
        $rowDist = mysqli_fetch_array($res);
        ?>
    </head>
    <body>
        <?php include '../menu2.php';?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cog"></i><b>แก้ไขข้อมูลประเภทวิชา</b></h3>
                </div>
                <form class="form-horizontal" id="form1" name="form1"  method="post"  action="editsql.php">
                    <input type="hidden"  name="type_code" value="<?php echo $rowDist['type_code'] ?>">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="type_name">ชื่อประเภทวิชา</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="type_name" name="type_name" value="<?php echo $rowDist['type_name'] ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="type_eng">ชื่ออังกฤษ</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="type_eng" name="type_eng" value="<?php echo $rowDist['type_eng'] ?>"/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">บันทึกข้อมูล</button>
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>

