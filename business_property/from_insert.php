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
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-calendar"></i><b>เพิ่มข้อมูลคุณสมบัติ</b></h3>
                </div>

                <?php
                include("../connect/conn.php");
                $id = $_GET['id'];
                $add = $_POST['add'];
                $property_id = $_POST['property_id'];
                $name = $_POST['name'];
                $descript = $_POST['descript'];
                if (isset($add) == "true" && $name != "") {
                    $add = "insert into business_property values('','$name','$descript')";
                    $res_add = mysqli_query($conn, $add);
                    echo "<script> alert ('เพิ่มข้อมูลสำเร็จ');
                     window.location='select_business_property.php';
                 </script>";
                } else if (isset($add) == "true" && $name == "") {
                    echo "<script> alert ('ไม่สามารถเพิ่มข้อมูลได้');
                 </script>";
                }
                ?>
                <form method= "post" action="" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-2 control-label">ชื่อคุณสมบัติ</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-5 col-sm-2 control-label">รายละเอียด</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="descript"></div>
                    </div>
                    <div class="text-center"> 
                        <input class="btn btn-md btn-success" type="submit" name="add" value="บันทึก">
                    </div>
                </form>
            </section>
        </section>
    </body>
</html>