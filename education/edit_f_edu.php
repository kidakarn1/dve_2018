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
        $edu_id = $_GET["edu_id"];
        $rowEdu = get_edu($conn, $edu_id);
        if ($_POST["submit"]) {
            $data_edu = $_POST;
            $update_edu = update_edu($conn, $data_edu);
            if ($update_edu) {
                header("location: show_edu.php");
            } else {
                echo "อัพเดทไม่สำเร็จ";
            }
        }
        ?>
    </head>
    <body>


        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_easel"></i><b>แก้ไขข้อมูลประเภทการศึกษา</b></h3>
                </div>
                <form class="form-horizontal" method="post" >
                    <input type="hidden" name="edu_id" value="<?php echo $rowEdu["edu_id"]; ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อระดับชั้น</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="edu_name" maxlength="20" value="<?php echo $rowEdu["edu_name"] ?>">
                        </div>
                    </div>
                    <div class="text-center">
                    <input class="btn btn-md btn-success" type="submit" value="ตกลง" name="submit">
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>
<?php

function get_edu($conn, $id) {
    $sql = "select * from education where edu_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_edu($conn, $data) {

    $edu_id = $data['edu_id'];
    $edu_name = $data['edu_name'];

    $sql = "update education set edu_name = '$edu_name' where edu_id = '$edu_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
