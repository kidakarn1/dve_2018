<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title>เพิ่มข้อมูลการฝึก</title>

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
        include("../connect/conn.php");

        date_default_timezone_set("asia/bangkok");
        $inter_year = date("Y") + 543;

        $sqlDep = "select * from department";
        $resDep = mysqli_query($conn, $sqlDep);

        $sqlEdu = "select * from education";
        $resEdu = mysqli_query($conn, $sqlEdu);
        $resEdus = mysqli_query($conn, $sqlEdu);
        ?>
    </head>
    <body>
        </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cursor_alt"></i><b>เพิ่มแผนการฝึก</b></h3>
                </div>

                <form action="#"class="form-horizontal">
                   <div class="form-group">
                        <label class="control-label col-sm-2"> ปีการศึกษา:</label>
						<div class="col-sm-3">
                    <select name="inter_year" id="inter_year"class="form-control">
                        <option value="<?php echo $inter_year - 1 ?>"><?php echo $inter_year - 1 ?></option>
                        <option value="<?php echo $inter_year ?>"><?php echo $inter_year ?></option>
                        <option value="<?php echo $inter_year + 1 ?>"><?php echo $inter_year + 1 ?></option>
                        <option value="<?php echo $inter_year + 2 ?>"><?php echo $inter_year + 2 ?></option>
                        <option value="<?php echo $inter_year + 3 ?>"><?php echo $inter_year + 3 ?></option>
                    </select>
					</div>
					</div>
                    
					<div class="form-group">
                        <label class="control-label col-sm-2">ภาคเรียน:</label>
					<div class="col-sm-3">
                    <select name="term" id="term"class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">ฤดูร้อน</option>
                    </select>
					</div>
					</div>

                    <div class="form-group">
                    <label class="control-label col-sm-2">วันที่เริ่มการฝึก:</label>
					<div class="col-sm-3">
					<input type="date" id="start_date"class="form-control">
					</div>
					</div>

                    <div class="form-group">
                    <label class="control-label col-sm-2">วันที่สิ้นสุดการฝึก:</label>
					<div class="col-sm-3">
					<input type="date" id="end_date"class="form-control">
					</div>
					</div>

                    <div class="form-group">
                    <label class="control-label col-sm-2">แผนก:</label>
					<div class="col-sm-3">
                    <select id="dep_id"class="form-control">
                        <?php while ($rowDep = mysqli_fetch_array($resDep)) { ?>
                            <option value="<?php echo $rowDep["dep_id"] ?>"><?php echo $rowDep["dep_name"] ?></option>
                        <?php } ?>
                    </select>
					</div>
					</div>

                    <div class="form-group">
                    <label class="control-label col-sm-2">ระดับชั้น:</label>
                    <div class="col-sm-3">
                    <select id="edu_id"class="form-control">
                        <?php while ($rowEdu = mysqli_fetch_array($resEdu)) { ?>
                            <option value="<?php echo $rowEdu['edu_id'] . '_' . '1' ?>"><?php echo $rowEdu["edu_name"] ?>(ปกติ)</option>
                        <?php } ?>
                        <?php while ($rowEdus = mysqli_fetch_array($resEdus)) { ?>
                            <option value="<?php echo $rowEdus['edu_id'] . '_' . '2' ?>"><?php echo $rowEdus["edu_name"] ?>(ทวิภาคี)</option>
                        <?php } ?>
                    </select>
					</div>
					</div>

                    
                      <div class="form-group">
                    <label class="control-label col-sm-2">ชั้นปีที่:</label>
					<div class="col-sm-3">
                    <select id="edu_year"class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
					</div>
					</div>

                    <div class="form-group">
                    <label class="control-label col-sm-2">กลุ่ม:</label>
				   
                    <div id="display-group">
                    <select id="group_id"class="form-control"></select>
                    </div>
					</div>
			

					
					<div class="text-center col-sm-6">
                    <input type="submit" class="btn btn-sm btn-success"value="ตกลง" id="bt-summit">
					</div>
					</div>
                </form>
            </section>
        </section>
    </body>
</html>
<script>
    $(document).ready(function () {

        $.post("get_group.php", {
            dep_id: $("#dep_id").val(),
            edu_id: $("#edu_id").val(),
        }, function (r) {
            $("#display-group").html();
            $("#display-group").html(r);
        });

        $("#dep_id").change(function () {
            $.post("get_group.php", {
                dep_id: $("#dep_id").val(),
                edu_id: $("#edu_id").val(),
            }, function (r) {
                $("#display-group").html();
                $("#display-group").html(r);
            });
        });

        $("#edu_id").change(function () {
            $.post("get_group.php", {
                dep_id: $("#dep_id").val(),
                edu_id: $("#edu_id").val(),
            }, function (r) {
                $("#display-group").html();
                $("#display-group").html(r);
            });
        });

        $("#bt-summit").click(function () {
            $.post("inter_plan.php", {
                inter_year: $("#inter_year").val(),
                term: $("#term").val(),
                dep_id: $("#dep_id").val(),
                edu_year: $("#edu_year").val(),
                group_id: $("#group_id").val(),
                edu_id: $("#edu_id").val(),
                start_date: $("#start_date").val(),
                end_date: $("#end_date").val(),
            }, function (r) {
                alert(r.trim());
            });
        });

    });
</script>