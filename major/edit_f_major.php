<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Generator" content="EditPlus®">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
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
        $major_id = $_GET["major_id"];
        $type_code = $_GET['type_code'];
        $resType = get_type_code($conn);
        $rowMajor = get_major($conn, $major_id);
        if ($_POST["submit"]) {
            $data_major = $_POST;
            $update_major = update_major($conn, $data_major);
            if ($update_major) {
                header("location: show_major.php");
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
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>แก้ไขข้อมูลสาขาวิชา</b></h3>
                </div>
                <form method="post" class="form-horizontal">

                    <!--<div class="form-group">-->
                    <!--<div class="col-sm-3">-->
                    <input type="hidden" name="major_id" value="<?php echo $rowMajor["major_id"]; ?>">
                    <!--</div>-->
                    <!--</div>-->
                    <!--รหัสสาขาวิชา<input type="text" name="major_id" maxlength="10" value="<?php echo $rowMajor["major_id"] ?>">-->

                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">ชื่อสาขาวิชา</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="major_name" maxlength="100" value="<?php echo $rowMajor["major_name"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">รหัสประเภทวิชา</label>	
                        <div class="col-sm-3">
                            <select class="form-control" name="type_code">
                                <?php while ($rowType = mysqli_fetch_array($resType)) { ?>
                                    <option value="<?php echo $rowType["type_code"]; ?>"
                                    <?php
                                    if ($type_code == $rowType["type_code"]) {
                                        echo "selected";
                                    }
                                    ?>
                                            >
                                                <?php echo $rowType["type_name"]; ?>
                                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">ชื่อภาษาอังกฤษ</label>	
                        <div class="col-sm-3 ">
                            <input class="form-control" type="text" name="major_eng" maxlength="100" value="<?php echo $rowMajor["major_eng"] ?>">
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

function get_type_code($conn) {
    $sql = "select * from edu_type";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function get_major($conn, $id) {
    $sql = "select * from major where major_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_major($conn, $data) {

    $major_id = $data['major_id'];
    $major_name = $data['major_name'];
    $type_code = $data['type_code'];
    $major_eng = $data['major_eng'];

    $sql = "update major set major_name = '$major_name',type_code = '$type_code',  major_eng = '$major_eng' where major_id = '$major_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
