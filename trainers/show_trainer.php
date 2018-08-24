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
    </head>

  <?php 
    include("../connect/conn.php");
    $sql = "select * from trainer,business,education where trainer.business_id = business.business_id 
    and trainer.educational_id = education.edu_id";
    $res = mysqli_query($conn,$sql);
  ?>
</head>
<body>
<?php include "../menu2.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!--overview start-->
                <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_star-half_alt"></i><b>select_training_normal</b></h3>
                </div>

 <div class="table-responsive">
<table class="table text-center"> 
<tr>
<th>ลำดบ</th>
      <th>ชื่อครูฝึก</th>
      <th>เบอร์โทรศัพท์</th>
      <th>ที่อยู่</th>
      <th>ชื่อสถานประกอบการ</th>
      <th>วุฒิการศึกษา</th>
      <th>ประสบการณ์ในอาชีพ</th>
      <th>วันที่แต่งตั้งครูฝึก</th>
      <th colspan="2"><center><a href="from_insert_trainer.php"class='btn btn-xs btn-primary'><i class="icon_plus_alt2"></i></a></center></th>
    </tr> 
    <?php $i = 1; while($row = mysqli_fetch_array($res)) {?>
    <tr>
      <td><?php echo $i++ ?></td>
      <td><?php echo $row["trainer_name"]?></td>
      <td><?php echo $row["phone"]?></td>
      <td><?php echo $row["address"]?></td>
      <td><?php echo $row["business_name"]?></td>
      <td><?php echo $row["edu_name"]?></td>
      <td><?php echo $row["trainer_experience"]?></td>
      <td><?php echo $row["assign_date"]?></td>
      <td><a href="form_edit_trainer.php?id=<?php echo $row["trainer_id"]?>"class='btn btn-xs btn-warning'><span class="icon_target"></span></a></td>
      <td><a href="del_trainer.php?id=<?php echo $row["trainer_citizen"]?>" class='btn btn-xs btn-danger'><i class="icon_close_alt2"></i></a></td>
    </tr> 
    <?php }?>
  </table>
</body>
</html>