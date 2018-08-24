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
        $eva_id = $_GET["eva_id"];
        $topics_id = $_GET["topics_id"];
        $Que_id = $_GET["Que_id"];

        $resEva = get_eva($conn);
        $resTop = get_top($conn);

        $rowQue = get_que($conn, $Que_id);
        if ($_POST["submit"]) {
            $data_que = $_POST;
            $update_que = update_que($conn, $data_que);
            if ($update_que) {
                header("location: show_que.php");
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
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_box-checked"></i><b>แก้ไข้แบบสอบถาม</b></h3>
                </div>
                <form class="form-horizontal" method="post" >
                    <input type="hidden" name="Que_id" value="<?php echo $rowQue["Que_id"]; ?>">
                    <div class="form-group">
                        <label class="control-label col-sm-2">แบบประเมิน</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="eva_id">
                                <?php while ($rowEva = mysqli_fetch_array($resEva)) { ?>
                                    <option value="<?php echo $rowEva["eva_id"]; ?>"
                                    <?php
                                    if ($eva_id == $rowEva["eva_id"]) {
                                        echo "selected";
                                    }
                                    ?>>
                                                <?php echo $rowEva["eva_name"]; ?>
                                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">คำถาม</label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="Que_name" maxlength="100" value="<?php echo $rowQue["Que_name"]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">หัวข้อ</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="topics_id">
                                <?php while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                    <option value="<?php echo $rowTop["topics_id"]; ?>"
                                    <?php
                                    if ($topics_id == $rowEva["eva_id"]) {
                                        echo "selected";
                                    }
                                    ?>>
                                                <?php echo $rowTop["topics_name"]; ?>
                                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-success" type="submit" value="ตกลง" name="submit">
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

function get_que($conn, $id) {
    $sql = "select * from question where Que_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_que($conn, $data) {

    $Que_id = $data["Que_id"];
    $eva_id = $data["eva_id"];
    $Que_name = $data["Que_name"];
    $topics_id = $data["topics_id"];

    $sql = "update question set eva_id = '$eva_id', Que_name = '$Que_name',  topics_id = '$topics_id' where Que_id = '$Que_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
