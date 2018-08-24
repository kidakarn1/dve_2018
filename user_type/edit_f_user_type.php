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
        $user_type_id = $_GET["user_type_id"];
        $user_type_name = $_GET['user_type_name'];
		$user_type_desc	 = $_GET['user_type_desc'];
        
        $rowuser_type = get_user_type($conn, $user_type_id);
        if ($_POST["submit"]) {
            $data_user_type = $_POST;
            $update_user_type = update_user_type($conn, $data_user_type);
            if ($update_user_type) {
                header("location: show_user_type.php");
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
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>แก้ไขข้อมูลประเภทผู้ใช้</b></h3>
                </div>
                <form method="post" class="form-horizontal">

                    <!--<div class="form-group">-->
                    <!--<div class="col-sm-3">-->
                    <input type="hidden" name="user_type_id" value="<?php echo $rowuser_type["user_type_id"]; ?>">
                    <!--</div>-->
                    <!--</div>-->
                    <!--รหัสสาขาวิชา<input type="text" name="major_id" maxlength="10" value="<?php echo $rowMajor["major_id"] ?>">-->

                    <div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">ชื่อประเภทผู้ใช้</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="user_type_name" maxlength="100" value="<?php echo $rowuser_type["user_type_name"] ?>">
                        </div>
                    </div>
                    
					<div class="form-group">
                        <label class="col-xs-2 col-sm-2 control-label">รายละเอียดประเภทผู้ใช้</label>	
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="user_type_desc" maxlength="100" value="<?php echo $rowuser_type["user_type_desc"] ?>">
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



function get_user_type($conn, $id) {
    $sql = "select * from user_type where user_type_id = '$id' ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    return $row;
}

function update_user_type($conn, $data) {

    $user_type_id = $data['user_type_id'];
    $user_type_name = $data['user_type_name'];
	$user_type_desc = $data['user_type_desc'];
    

    $sql = "update user_type set user_type_name = '$user_type_name', user_type_desc = '$user_type_desc' where user_type_id = '$user_type_id' ";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        $r = true;
    } else {
        $r = false;
    }
    return $r;
}
?>
