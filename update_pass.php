<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>select_training_normal</title>

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

    </head>
<body>
 <?php include "menu2.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_star-half_alt"></i><b>เปลี่ยนรหัสผ่าน</b></h3>
                </div>

 <div class="table-responsive">
<table class="table">
  <form action="update_pass_sql.php" method="post">
   <div class="form-horizontal">
    <div class="form-group">
    <label class="control-label col-sm-3">รหัสผ่านเดิม:</label><div class="col-sm-3">
   <input type="password" name="old_password" id="old_password"class="form-control">
   </div></div>
  <div class="form-group">
    <label class="control-label col-sm-3">รหัสผ่านใหม่:</label>
	<div class="col-sm-3">
	<input type="password" name="new_password" id="new_password" minlength="8"class="form-control">
	</div></div>
   <div class="form-group">
    <label class="control-label col-sm-3">ยืนยันรหัสผ่าน:</label>
	<div class="col-sm-3">
	<input type="password" name="re_password" id="re_password" minlength="8"class="form-control">
	</div></div>
	<div class="form-group">
	<div class="col-sm-9 text-center">
   <input type="submit" value="ตกลง" id="submit"class="btn btn-success">
   </div></div>
  </form>
  </table>
</body>
</html>
<script src="js/jquery.js"></script>
<script>
  $(document).ready(function() {
    $("#submit").prop('disabled', true);
    $("#re_password").keyup(function(){
      if($(this).val() != $("#new_password").val()) {
        $("#submit").prop('disabled', true);
        $(this).css('background-color', '#ffb3b3');
      } else {
        $("#submit").prop('disabled', false);
        $(this).css('background-color', 'transparent');
      }
    });
  });
</script>