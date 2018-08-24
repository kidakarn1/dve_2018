<!DOCTYPE html>
<html>
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
    date_default_timezone_set("asia/bangkok");
    $year = date("Y");
    $year = $year + 543;
    ?>
	<?php include "../connect/conn.php";
$sql="select * from business";
$res=mysqli_query($conn,$sql);
$sql="select * from education";
$res_edu=mysqli_query($conn,$sql);
?>
    <body>
        <?php include '../menu2.php';?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>หนังสือชุดที่ 3  ระบบปกติ</b></h3>
                </div>
                <form method="post" action="set3_normal.php">
                   <div class="form-horizontal">
                    <div class="form-group">
                   
                        <label class="control-label col-sm-3">เลือกสถานประกอบการ</label>
							<div class="col-sm-3">
                           <select name="business_id"class="form-group" >
<?php
    while ($row=mysqli_fetch_assoc($res)){
        ?>
<option value="<?php echo $row["business_id"]?>"><?php echo $row["business_name"]?></option>
<?php
    }
?>
</select>
							</div>
					</div>
					 <div class="form-horizontal">
                    <div class="form-group">
                   
                        <label class="control-label col-sm-3">ระดับการศึกษา</label>
							<div class="col-sm-3">
                          <select name="edu_id">
<?php
    while ($row_edu=mysqli_fetch_assoc($res_edu)){
        ?>
<option value="<?php echo $row_edu["edu_id"]?>"><?php echo $row_edu["edu_name"]?></option>
<?php
    }
?>

							</div>
					</div>

					
                      <div class="form-group">
						 <div class="text-center ">
                            <td colspan="2"><input type="submit" value="ตกลง" class="btn btn-success">
							</div>
							</div>
                      
                    </table>
					</div>
					</div>
                </form>

            </section>
        </section>
    </body>
</html>