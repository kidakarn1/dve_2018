<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">
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

      
        <script src="../js/jquery.js"></script>
  <title>นำเข้าข้อมูลสาขาวิชา</title>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;">
					<i style="color: red;" class="fa fa-calendar"></i><b>นำเข้าข้อมูลสาขาวิชา</b></h3>
                </div>
                <form action="add_major.php" method="post" enctype="multipart/form-data">
				<div class=" col-sm-5">
                    <table border="1"class="table">
                        <tr><td>กรุณาเลือกไฟล์ .CSV เพื่อนำเข้า  <b>"ข้อมูลสาขาวิชา"</b></font></td></tr>
                        <tr><td width="400"height="50">
                                <input name="fileCSV" type="file" id="fileCSV">
                            </td></tr>
                        <tr>
                            <td>
                        <center><input name="btnSubmit" type="submit" id="btnSubmit" value="Submit"></center>
                        </td>
                        </tr>
                    </table></div>
                </form>
            </section>
        </section>
    </body>
</html>

<script>
    $(document).ready(function () {

        $("#btnSubmit").click(function () {
            $("body").load("pageLoad.php");
        });

    });
</script>
