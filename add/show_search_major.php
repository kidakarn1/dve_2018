<!DOCTYPE html>
<html lang="en">
<?php
  include("../connect/conn.php");
  ini_set('memory_limit', '1024M');
  $search = $_POST["search"];
  $limitPa = 250;
  $page = 0;

  if($_GET["numPage"]) {
    $page = $_GET["numPage"];
  }

  $sql = "select * from major limit $page,$limitPa";

  $search = "";
  if($_GET["search"]) {
    $search = $_GET["search"];
    $sql = "select * from major where major_name like '%$search%'";  
  }
  
  $res = mysqli_query($conn,$sql);
  $sqlNp = "select * from major";
  $resNp = mysqli_query($conn,$sqlNp);
  $rowNp = mysqli_num_rows($resNp);
?>
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

        <title>show_MOU</title>

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

        <script src="../jquery/jquery.min.js"></script>
        <script src="../jquery-easing/jquery.easing.min.js"></script> 
    </head>
<?php include '../menu2.php'; ?>
     <section id="main-content">
     <section class="wrapper">
        <div class="col-sm-12">
           <div class="col-sm-6">
               <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>ข้อมูลสาขาวิชา</b></h3>
           </div>

  <form action="show_search_major.php" method="get"class="form-horizontal">
 <div class="form-group">
     <div class="col-sm-offset-2 col-sm-3 col-xs-9">
    ชื่อสาขาวิชา 
	<input type="text" name="search">
	</div>
	<input type="submit" value="ตกลง"class="btn-md btn-success">
</div>
  </form>

 <div class="table-responsive">
   <table class="table text-center">
  <tr>
    <th>
      รหัสสาขาวิชา
    </th>
    <th>
      ชื่อสาขาวิชา
    </th>
    <th>
      ชื่อภาษาอังกฤษ
    </th>
  </tr>
  <?php while($row = mysqli_fetch_array($res)) {?>
    <tr>
      <td><?php echo $row["major_id"]?></td>
      <td><?php echo $row["major_name"]?></td>
      <td><?php echo $row["major_eng"]?></td>
    </tr>
  <?php }?>
</table>
<?php 
  $max = $rowNp/$limitPa;
  if($rowNp > $limitPa && $rowNp%$limitPa >=1) {
    $max = $max+1;
  }
  for($i = 0;$i<=$max;$i++) {
?>
  <a href="show_search_major.php?numPage=<?php if($i!=0){echo $i*$limitPa;}?>"><?php echo $i+1;?></a>
<?php }s?>
</table>