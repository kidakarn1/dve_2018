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
    </head>
    <?php
    date_default_timezone_set("asia/bangkok");
    $year = date("Y");
    $year = $year + 543;
    ?>
    <body>
        <?php include '../menu2.php';?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>ข้อมูลสถานศึกษา</b></h3>
                </div>
                <form method="post" action="select_normal.php">
                    <table border="1">
                        <tr>
                            <th>เทอมที่เริ่มฝึก</th>
                            <th><select name="tream_start">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>ปีการศึกษาที่เริ่มฝึก</th>
                            <th><select name="year_start">
                                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                                        <option value="<?php echo $year + $i; ?>"><?php echo $year + $i; ?></option>
                                    <?php } ?>
                                </select></th>

                        </tr>
                        <tr>
                            <th>เทอมที่ฝึกจบ</th>
                            <th><select name="tream_end">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </th>
                        </tr>
                        <tr>
                            <th>ปีการศึกษาที่ฝึกจบ</th>
                            <th><select name="year_end">
                                    <?php for ($i = 0; $i <= 5; $i++) { ?>
                                        <option value="<?php echo $year + $i; ?>"><?php echo $year + $i; ?></option>
                                    <?php } ?>
                                </select></th>

                        </tr>
                        <tr>
                            <th colspan="2"><input type="submit" value="ตกลง"></th>
                        </tr>
                    </table>
                </form>
            </section>
        </section>
    </body>
</html>