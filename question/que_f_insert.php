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
        $resEva = get_eva($conn);
        $resTop = get_top($conn);
        ?>
    </head>
    <body>
        <?php include '../menu2.php';?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_box-checked"></i><b>เพิ่มแบบสอบถาม</b></h3>
                </div>

                <form class="form-horizontal" method="post" action="insert_que.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2">แบบสอบถาม</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="eva_id">
                                <?php while ($rowEva = mysqli_fetch_array($resEva)) { ?>
                                    <option value="<?php echo $rowEva["eva_id"]; ?>">
                                        <?php echo $rowEva["eva_name"]; ?>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">คำถาม</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="Que_name" maxlength="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวข้อ</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="topics_id">
                                <?php while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                    <option value="<?php echo $rowTop["topics_id"]; ?>">
                                        <?php echo $rowTop["topics_name"]; ?>
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

function get_eva($conn) {
    $sql = "select * from evaluation_type";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function get_top($conn) {
    $sql = "select * from topics";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>
