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
    </head>
    <?php
    include('../connect/conn.php');
    $topics_id = $_GET["topics_id"];

    $rowTop = get_top($conn, $topics_id);
    if ($_POST["submit"]) {
        $data_top = $_POST;
        $update_top = update_top($conn, $data_top);
        if ($update_top) {
            header("location: show_top.php");
        } else {
            echo "อัพเดทไม่สำเร็จ";
        }
    }
    ?>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_zoom-in_alt"></i><b>แก้ไขการประเมิน</b></h3>
                </div>

                <form class="form-horizontal" method="post" action="update.php">
                    <input  class="form-horizontal" type="hidden" name="id" value="<?php echo $rowTop["topics_id"]; ?>">
                    <div class='form-group'>
                        <label class="col-sm-2 control-label">คำถาม</label>
                        <div class='col-sm-5'>
                            <input class="form-control"  type="text" name="topics_name" maxlength="100" value="<?php echo $rowTop["topics_name"]; ?>">
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-md btn-success" type="submit" value="ตกลง">
                    </div>
                </form>

            </section>
        </section>
    </body>
</html>
<?php

function get_top($conn, $id) {
    $sql = "select * from topics where topics_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_top($conn, $data) {

    $topics_id = $data["topics_id"];
    $topics_name = $data["topics_name"];

    $sql = "update topics set topics_name = '$topics_name' where topics_id = '$topics_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
