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
        $benefit_id = $_GET["benefit_id"];
        $name = $_GET['name'];
        
        $rowbusiness_benefit = get_business_benefit($conn, $benefit_id);
        if ($_POST["submit"]) {
            $data_business_benefit = $_POST;
            $update_business_benefit = update_business_benefit($conn, $data_business_benefit);
            if ($update_business_benefit) {
                header("location: show_business_benefit.php");
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
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>แก้ไขข้อมูลสวัสดิการ</b></h3>
                </div>
                <form method="post" class="form-horizontal">

                    <!--<div class="form-group">-->
                    <!--<div class="col-sm-3">-->
                    <input type="hidden" name="benefit_id" value="<?php echo $rowbusiness_benefit["benefit_id"]; ?>">
                    <!--</div>-->
                    <!--</div>-->
                    <!--รหัสสาขาวิชา<input type="text" name="major_id" maxlength="10" value="<?php echo $rowMajor["major_id"] ?>">-->

                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">ชื่อสวัสดิการ</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="name" maxlength="100" value="<?php echo $rowbusiness_benefit["name"] ?>">
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



function get_business_benefit($conn, $id) {
    $sql = "select * from business_benefit where benefit_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_business_benefit($conn, $data) {

    $benefit_id = $data['benefit_id'];
    $name = $data['name'];
    

    $sql = "update business_benefit set name = '$name'where benefit_id = '$benefit_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>