<!DOCTYPE html>
<html lang="en">
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>สถานะระบบ ปกติ</title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="css/elegant-icons-style.css" rel="stylesheet" />
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <!-- full calendar css-->
        <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- owl carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
        <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="css/fullcalendar.css">
        <link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet"> 
        <link href="css/style-responsive.css" rel="stylesheet" />
        <link href="css/xcharts.min.css" rel=" stylesheet">
        <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
  </head>
<body>

 <?php include'menu.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_cursor_alt"></i><b>สถานะระบบ ปกติ</b></h3>
                </div>
<div class="form-group">
     <div class="col-sm-offset-7 col-sm-6 ">
รหัสนักเรียน <input type="text" id="search"> 
<input type="submit" value="ค้นหา" id="bSearch"class="btn-md btn-success">
</div><div class="row"></div></div>
  <div id="display"class="table text-center ">
  </div>


</body>
</html>

<script>
  $(document).ready(function(){
    $("#display").load("show_status_training.php");

    $("#search").keyup(function(){
      // alert($(this).val());
      $.post("show_status_training.php",
      {
        search: $(this).val(),
      },function(r) {
        $("#display").html(r);
      });
    });

    $("#bSearch").keyup(function(){
      // alert($(this).val());
      $.post("show_status_training.php",
      {
        search: $(this).val(),
      },function(r) {
        $("#display").html(r);
      });
    });    
  });
</script>