<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="../img/favicon.png">

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
  <title>Document</title>
     <?php include '../menu2.php';?>
  <?php
    include("../connect/conn.php");
    include("../include/function_kidakarn.php");
    session_start();
    $business_id = $_SESSION["username"];
    $sqlNormal = "select * from student,training_normal where
    student.citizen_id = training_normal.citizen_id 
    and training_normal.business_id = '$business_id'
    ";
    $sqlDve = "select * from student,training_dve where
    student.citizen_id = training_dve.citizen_id 
    and training_dve.business_id = '$business_id'
    ";
    $resNormal = mysqli_query($conn,$sqlNormal);
    $resDve = mysqli_query($conn,$sqlDve);
    $res_school = get_school($conn);
    $row_school = mysqli_fetch_assoc($res_school);
    $check_evaluation_results = check_evaluation_results($conn,$row_school["school_id"],$_SESSION["username"]);
    $row_check_evaluation_results = mysqli_fetch_assoc($check_evaluation_results);
  ?>
</head>
<body>
<section id="main-content">
<section class="wrapper">
 <div class="col-lg-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_key_alt"></i><b>รายชื่อนักเรียน/นักศึกษาในสถานประกอบการ</b></h3>
                </div>
  <table class="table">
  <tr>
<td><?php if (!$row_check_evaluation_results){?>
            <a href="../evaluation/eva_1.php"><i class="fa fa-bar-chart"></i><input type="submit"value="แบบประเมินความพึงพอใจ"></a><?php }
          else{ ?>
            <a href="../login_business/print_satisfied.php"><i class="fa fa-bar-chart"></i>&nbsp;<input type="submit" value="ปริ้นแบบประเมินความพึงพอใจ" ></a>
          <?php } ?>
      </td>
  </tr>
    <tr>
      <td><b>ชื่อนักศึกษา</b></td>
      <td><b>ประวัตินักศึกษา</b></td>
      <td colspan="2"><b>ประเมิน</b></td>
    </tr>
    <?php 
     while($rowNormal = mysqli_fetch_array($resNormal)) {
      $_SESSION["std_id"] = $rowNormal["std_id"];
      $res_check_student=select_evaluation_results($conn,$_SESSION["std_id"],$_SESSION["username"]);
      $row_check_student=mysqli_fetch_assoc($res_check_student);
    ?>
    <tr>
      <td><?php echo $rowNormal["std_name"];?></td>
      <td><a href="print_dve3.php?id=<?php echo $rowNormal["std_id"];?>"><?php echo $rowNormal["std_id"];?></a></td>
      <?php if ($rowNormal ["std_id"]!=$row_check_student["student_id"] and  $_SESSION["username"] != $row_check_student["assessor"]){?>
                           <td><a href="../evaluation/eva_4.php?id=<?php echo $rowNormal["std_id"];?>">ประเมิน</a></td>
                        <?php 
                        }
                        else{
                          echo "<td>";
                            echo "<font color='green'>ประเมินเสร็จสิ้น</font>";
                            ?>
                            <!-- <a href="../evaluation/from_update_eva_3.php?id=">แก้ไขข้อมูลการประเมิน</a> | -->
                            <a href="from_print_select_business_student.php?id=<?php echo $rowNormal["std_id"];?>">รายงานคะแนน</a></td>
                        <?php
                        }
                        ?>
    </tr>
    <?php }?>
    <?php 
     while($rowDve = mysqli_fetch_array($resDve)) {
      $_SESSION["std_id"] = $rowDve["std_id"];
      $res_check_student=select_evaluation_results($conn,$_SESSION["std_id"],$_SESSION["username"]);
      $row_check_student=mysqli_fetch_assoc($res_check_student);
    ?>
    <tr>
      <td><?php echo $rowDve["std_name"];?></td>
      <td><a href="print_dve3.php?id=<?php echo $rowDve["std_id"];?>"><?php echo $rowDve["std_id"];?></a></td>
      <?php if ($rowDve["std_id"]!=$row_check_student["student_id"] and  $_SESSION["username"] != $row_check_student["assessor"]){?>
                            <td><a href="../evaluation/eva_4.php?id=<?php echo $rowDve["std_id"];?>">ประเมิน</a></td>
                        <?php 
                        }
                        else{
                          echo"<td>"; 
                            echo "<font color='green'>ประเมินเสร็จสิ้น</font>";
                            ?>
                            <!-- <a href="../evaluation/from_update_eva_3.php?id=<?php echo $row_select_dve["std_id"];?>">แก้ไขข้อมูลการประเมิน</a> | -->
                            <a href="from_print_select_business_student.php?id=<?php echo $rowDve["std_id"];?>">รายงานคะแนน</a></td>
                        <?php
                        }
                        ?>
    </tr>
    <?php }?>
  </table>
</body>
</html>