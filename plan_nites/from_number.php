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
            <?php include '../menu2.php'; ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="col-sm-12">
                     
                            <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-dashboard"></i><b>ตารางการออกนิเทศ</b></h3>
                        </div>
<form method="post" action="from_teacher_nites.php" class="form-horizontal">
            <div class="form-group">
            <label class="col-xs-5 col-sm-2 control-label">จำนวนครู</label>	
            <div class="col-sm-3">
            <input class="form-control" type="number" name="num_teacher">
            </div>
            </div>
            <div class="form-group">
                <label class="col-xs-5 col-sm-2 control-label">วันที่ออกนิเทศ</label>	
                <div class="col-sm-3">
                <input class="form-control" type="number" name="num_date"></div>
                </div>
                <div class="form-group">
                    <label class="col-xs-5 col-sm-2 control-label">สถานประกอบการ</label>	
                    <div class="col-sm-3">
                    <input class="form-control" type="number" name="num_bus"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-2 control-label">พนักงานขับรถ</label>	
                    <div class="col-sm-3">
                    <input class="form-control" type="number" name="num_dri"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-2 control-label">รถ</label>	
                    <div class="col-sm-3">
                    <input class="form-control" type="number" name="car_id"></div>
                    </div>
                    <div class="text-center"> <input class="btn btn-md btn-success" type="submit">
                    </div>
</form>

        </body>
    </html>