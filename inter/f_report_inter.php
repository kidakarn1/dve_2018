<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title>แผนการฝึก</title>

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

        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
        <?php
        date_default_timezone_set("asia/bangkok");
        $inter_year = date("Y") + 543;
        ?>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>แผนการฝึก</b></h3>
                </div>

                <form action="report_inter.php" method="post"class="form-horizontal">
                     <div class="form-group">
                        <label class="control-label col-sm-2">ปีการศึกษา:</label>
						<div class="col-sm-1">
                    <select name="inter_year" id="inter_year">
                        <option value="<?php echo $inter_year - 1 ?>"><?php echo $inter_year - 1 ?></option>
                        <option value="<?php echo $inter_year ?>"><?php echo $inter_year ?></option>
                        <option value="<?php echo $inter_year + 1 ?>"><?php echo $inter_year + 1 ?></option>
                        <option value="<?php echo $inter_year + 2 ?>"><?php echo $inter_year + 2 ?></option>
                        <option value="<?php echo $inter_year + 3 ?>"><?php echo $inter_year + 3 ?></option>
                    </select>
					</div> 
                    <input type="submit"class="btn btn-sm btn-success" value="ตกลง">
					</div>
                </form>

            </section>
        </section>
    </body>
</html>