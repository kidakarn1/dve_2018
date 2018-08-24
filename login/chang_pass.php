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
    
<script src="../js/jquery.js"></script>
  <?php
    $id = $_GET["id"];
  ?>
</head>
<body>


  <form action="chang_pass_sql.php" method="post">
  <center><table border="1"width="400">
 
  <input type="hidden" value="<?php echo $id;?>" name="user_id">
<tr><td colspan="2"><center>กรุณาเปลี่ยนรหัสผ่าน</center></td></tr>
    <tr><td>
	รหัสผ่านใหม่:
	</td>
	<td><input type="password" name="new_password" id="new_password" minlength="8"class="form-control"></td></tr>
   <tr><td>ยืนยันรหัสผ่าน:</td><td><input type="password" name="re_password" id="re_password" minlength="8"class="form-control"></td></tr>
    <tr><td colspan="2"><center><input type="submit" value="ตกลง" id="submit"></center></td></tr>
  </form>
  </table></center>
</body>
</html>
<script>
  $(document).ready(function() {
    $("#submit").prop('disabled', true);
    $("#re_password").keyup(function(){
      if($(this).val() != $("#new_password").val()) {
        $("#submit").prop('disabled', true);
      } else {
        $("#submit").prop('disabled', false);
      }
    });
  });
</script>