
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
        $minor_id = $_GET["minor_id"];
        $major_id = $_GET['major_id'];
        $resMajor = get_major($conn);

        $rowMinor = get_minor($conn, $minor_id);
        if ($_POST["submit"]) {
            $data_minor = $_POST;
            $update_minor = update_minor($conn, $data_minor);
            if ($update_minor) {
                header("location: show_minor.php");
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
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cogs"></i><b>แก้ไข้ข้อมูลสาขางาน</b></h3>
                </div>
                <form class="form-horizontal" method="post" >

                    <input type="hidden" name="minor_id" value="<?php echo $rowMinor["minor_id"]; ?>">
                    <!--รหัสสาขาวิชา<input type="text" name="major_id" maxlength="10" value="<?php echo $rowMajor["major_id"] ?>">-->
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อสาขางาน</label>	
                        <div class="col-sm-3">
                            <input class="form-control " type="text" name="minor_name" maxlength="100" value="<?php echo $rowMinor["minor_name"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">สาขาวิชา</label>
                        <div class="col-sm-3">		   
                            <select class="form-control" name="major_id">
                                <?php while ($rowMajor = mysqli_fetch_array($resMajor)) { ?>
                                    <option value="<?php echo $rowMajor["major_id"]; ?>"
                                    <?php
                                    if ($major_id == $rowMajor["major_id"]) {
                                        echo "selected";
                                    }
                                    ?>
                                            >
                                                <?php echo $rowMajor["major_name"]; ?>
                                            <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">ชื่อภาษาอังกฤษ	</label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="minor_eng" maxlength="100" value="<?php echo $rowMinor["minor_eng"] ?>">
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

function get_major($conn) {
    $sql = "select * from major";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function get_minor($conn, $id) {
    $sql = "select * from minor where minor_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_minor($conn, $data) {

    $minor_id = $data['minor_id'];
    $minor_name = $data['minor_name'];
    $major_id = $data['major_id'];
    $minor_eng = $data['minor_eng'];

    $sql = "update minor set minor_name = '$minor_name',major_id = '$major_id',  minor_eng = '$minor_eng' where minor_id = '$minor_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
