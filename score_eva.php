<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>select_department</title>
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
        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
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
  <?php 
    include("connect/conn.php");
    $sql = "select * from department";
    $res = mysqli_query($conn,$sql);
  ?>
  </head>
<body>
<?php include 'menu.php'; ?>
 <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i><b>ผลคะแนน</b></h3>
                    </div>
  <form action="show_score_eva.php" method="post"class="horizontal">
  <table class="table">
  <tr><td>แผนก:
  
  <select id="dep_id">
      <?php while($row = mysqli_fetch_array($res)) {?>
      <option value="<?php echo $row["dep_id"]?>"><?php echo $row["dep_name"]?></option>
      <?php }?>
    </select>
	</td>
	</tr>
    <tr><td>
	<div id="display"></div>
	</td></tr>
    <tr>
	<td>ระบบ: ปกติ
	<input type="radio" name="system_id" value="1"></td></tr>
	<tr>
	<td>ทวิภาคี:
	<input type="radio" name="system_id" value="2"></td></tr>
    <tr><div class="col-offset-3"></div>
	<td ><input type="submit" value="ตกลง"class=" btn btn-md btn-success"></td></tr>
  </form>
  </table>
</body>
</html>

<script>
  $(document).ready(function(){
    $.post("select_group.php",
      {
        dep_id: $("#dep_id").val(),
      },function(r) {
        $("#display").html(r);
      });


    $("#dep_id").change(function(){
      // alert($(this).val());
      $.post("select_group.php",
      {
        dep_id: $(this).val(),
      },function(r) {
        $("#display").html(r);
      });
    });    
  });
</script>