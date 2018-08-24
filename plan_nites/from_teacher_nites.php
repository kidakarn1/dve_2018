<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="Generator" content="EditPlus®">
        <meta name="Author" content="">
        <meta name="Keywords" content="">
        <meta name="Description" content="">
        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script>
        <!DOCTYPE html>
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
            <?php include '../menu2.php'; ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="col-sm-12">
                            <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-dashboard"></i><b>ตารางการออกนิเทศ</b></h3>
                        </div>
<?php include("../connect/conn.php");
$connect=$conn;
if ($_POST["num_teacher"]==""){
    $num_teacher=1;
    $num_date=1;
    $num_bus=1;
    $num_dri=1;
    $car_id=1;
}
else{
    $num_teacher = $_POST["num_teacher"];
    $num_date = $_POST["num_date"];
    $num_bus = $_POST["num_bus"];
    $num_dri = $_POST["num_dri"];
    $car_id = $_POST["car_id"];    
}
//echo $num_teacher." ".$num_date." ".$num_bus." ".$num_dri;
//exit;
?>
 <style>
  ul {
    font-size: 18px;
    margin: 0;
  }
  span {
    color: blue;
    text-decoration: underline;
    cursor: pointer;
  }
  .example {
    font-style: italic;
  }
  </style>
<form method="post" action="insert_teacher_nites.php" class="form-horizontal">
<div class="col-sm-3">
<input class="form-control" type="hidden" name="num_teacher" value="<?php echo $num_teacher;?>">
</div>
<?php
for ($i=1; $i <= $num_teacher; $i++) { 
    $res=select_teacher($connect);
?>
<div class="form-group">
    <label class="col-xs-5 col-sm-2 control-label">ชื่อครู คนที่ <?php echo $i;?></label>	
    <div class="col-sm-3">
        <select class="form-control" name="tacher_id<?php echo $i;?>">
            <?php while($row_school=mysqli_fetch_assoc($res)){?>
	            <option value="<?php echo $row_school["citizen_id"]?>" ><?php echo $row_school["teacher_name"]?></option>
            <?php } ?>
        </select>
    </div>
</div>  
<?php 
} ?>

<input type="hidden" name="num_date" value="<?php echo $num_date;?>">
<?php for ($k=1; $k <= $num_date; $k++) { 

?>
</div>
</div>
   <div class="form-group">
   <label class="col-xs-5 col-sm-2 control-label">วันที่ออกนิเทศครั้งที่ <?php echo $k;?></label>	
   <div class="col-sm-3">
   <input  class="form-control" type="date" name="date<?php echo $k;?>">
<?php }?>
<input type="hidden" name="num_bus" value="<?php echo $num_bus;?>">
<?php for ($a=1; $a <= $num_bus; $a++) { 
$res_bus=select_bus($connect);
?>
</div>
</div>
<div class="form-group">
<label class="col-xs-5 col-sm-2 control-label">สถานประกอบการ <?php echo $a;?></label>	
<div class="col-sm-4">
<select class="form-control" name="business_id<?php echo $a;?>">
    <?php while($row_school=mysqli_fetch_assoc($res_bus)){?>
	<option value="<?php echo $row_school["business_id"]?>" ><?php echo $row_school["business_name"]?></option>
    <?php }?>
</select>
    <?php } ?>
    <input type="hidden" name="num_dri" value="<?php echo $num_dri;?>">
    <?php for ($b=1; $b <= $num_dri; $b++) { 
$res_user=select_user($connect);
?>   
</div>
</div>
<div class="form-group">
<label class="col-xs-5 col-sm-2 control-label">พนักงานขับรถคนที่<?php echo $b;?></label>	
<div class="col-sm-3">
<select class="form-control" name="user_id<?php echo $b;?>">
    <?php while($row_user=mysqli_fetch_assoc($res_user)){?>
	<option value="<?php echo $row_user["user_id"]?>" ><?php echo $row_user["fname"]." ".$row_user["lname"]?></option>
    <?php }?>
</select> 
    <?php }?>

 <input type="hidden" name="car_id" value="<?php echo $car_id;?>">
    <?php for ($e=1; $e <= $car_id; $e++) { 
$res_car=select_car($connect);
?>   
</div>
</div>
<div class="form-group">
<label class="col-xs-5 col-sm-2 control-label">ทะเบียนรถคันที่ <?php echo $e;?></label>	
<div class="col-sm-3">
<select class="form-control" name="car_id<?php echo $e;?>">
    <?php while($row_car=mysqli_fetch_assoc($res_car)){?>
	<option value="<?php echo $row_car["car_id"]?>" ><?php echo $row_car["car_id"]?></option>
    <?php }?>
</select>
    <?php }?>
    </div>
    </div>
    <div class="text-center">
<input  class="btn btn-md btn-success" type="submit"value="ยืนยัน">
</div>
</form>
</div>
<?php 
    function select_teacher($connect){
        $sql="select * from teacher";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    function select_bus($connect){
        $sql="select * from business";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    function select_user($connect){
        $sql="select * from user where user_type_id='6'";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    function select_car($connect){
        $sql="select * from car ";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
?>

<script>
// demoP = document.getElementById("demo");
// var numbers = [4, 9, 16, 25];

// function myFunction(item, index) {
//     demoP.innerHTML = demoP.innerHTML + "index[" + index + "]: " + item + "<br>"; 
// }
</script>
<script src="../js/jquery.js"></script>
            <script src="../js/jquery-ui-1.10.4.min.js"></script>
            <script src="../js/jquery-1.8.3.min.js"></script>
            <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
            <!-- bootstrap -->
            <script src="../js/bootstrap.min.js"></script>
            <!-- nice scroll -->
            <script src="../js/jquery.scrollTo.min.js"></script>
            <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
            <!-- charts scripts -->
            <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
            <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
            <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
            <script src="../js/owl.carousel.js"></script>
            <!-- jQuery full calendar -->
            <script src="../js/fullcalendar.min.js"></script>
            <!-- Full Google Calendar - Calendar -->
            <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
            <!--script for this page only-->
            <script src="../js/calendar-custom.js"></script>
            <script src="../js/jquery.rateit.min.js"></script>
            <!-- custom select -->
            <script src="../js/jquery.customSelect.min.js"></script>
            <script src="../assets/chart-master/Chart.js"></script>

            <!--custome script for all page-->
            <script src="../js/scripts.js"></script>
            <!-- custom script for this page-->
            <script src="../js/sparkline-chart.js"></script>
            <script src="../js/easy-pie-chart.js"></script>
            <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
            <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
            <script src="../js/xcharts.min.js"></script>
            <script src="../js/jquery.autosize.min.js"></script>
            <script src="../js/jquery.placeholder.min.js"></script>
            <script src="../js/gdp-data.js"></script>
            <script src="../js/morris.min.js"></script>
            <script src="../js/sparklines.js"></script>
            <script src="../js/charts.js"></script>
            <script src="../js/jquery.slimscroll.min.js"></script>
            <script>
                //knob
                $(function () {
                    $(".knob").knob({
                        'draw': function () {
                            $(this.i).val(this.cv + '%')
                        }
                    })
                });

                //carousel
                $(document).ready(function () {
                    $("#owl-slider").owlCarousel({
                        navigation: true,
                        slideSpeed: 300,
                        paginationSpeed: 400,
                        singleItem: true

                    });
                });

                //custom select box

                $(function () {
                    $('select.styled').customSelect();
                });

                /* ---------- Map ---------- */
                $(function () {
                    $('#map').vectorMap({
                        map: 'world_mill_en',
                        series: {
                            regions: [{
                                    values: gdpData,
                                    scale: ['#000', '#000'],
                                    normalizeFunction: 'polynomial'
                                }]
                        },
                        backgroundColor: '#eef3f7',
                        onLabelShow: function (e, el, code) {
                            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
                        }
                    });
                });
            </script>
        </body>
    </html>