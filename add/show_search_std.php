
<!DOCTYPE html>
<html lang="en">
<?php
  include("../connect/conn.php");
  // ini_set('memory_limit', '1024M');
  $search = $_GET["search"];
    $sql = "select student.std_id,student.std_name,student.group_id.groups.group_id,groups.group_name,groups.dep_id,department.dep_id,department.dep_name,
    student.district,district.DISTRICT_CODE,district.AMPHUR_CODE,amphur.AMPHUR_CODE,amphur.PROVINCE_CODE,province.PROVINCE_CODE
    from student,groups,department,district,province,amphur where student.std_id like '%$search%'
    and groups.group_id = student.group_id
    and groups.dep_id = department.dep_id
    and student.district = district.DISTRICT_CODE
    and district.AMPHUR_CODE = amphur.AMPHUR_CODE
    and amphur.PROVINCE_CODE = province.PROVINCE_CODE 
    ";  
  
  $res = mysqli_query($conn,$sql);
  $sqlNp = "select * from student,groups where student.group_id = groups.group_id";
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
               <h3 class="page-header" style="color: red;"><i style="color: red;" class="icon_genius"></i><b>ข้อมูลนักเรียน</b></h3>
           </div>

  <form action="" method="get"class="form-horizontal">

     <div class="form-group">
     <div class="col-sm-offset-2 col-sm-3 col-xs-9">
	 รหัสนักเรียน<input type="text" name="search">
	 </div>
	<input type="submit" value="ตกลง"class="btn-md btn-success">
	 </div>
  </form>

 <div class="table-responsive">
   <table class="table text-center">
  <tr>
    <th>
      รหัสนักศึกษา
    </th>
    <th>
      ชื่อนักศึกษา
    </th>
    <th>
      รหัสกลุ่ม
    </th>
    <th>
      ระดับชั้น
    </th>
    <th>
      แผนก
    </th>
    <th>
      เกรดเฉลี่ย
    </th>
    <th><center>
      ที่อยู่</center>
    </th>
  </tr>
  <?php while($row = mysqli_fetch_array($res)) {?>
    <tr>
      <td><?php echo $row["std_id"]?></td>
      <td><?php echo $row["std_name"]?></td>
      <td><?php echo $row["group_id"]?></td>
      <td><?php echo $row["group_name"]?></td>
      <td><?php echo $row["dep_name"]?></td>
      <td><?php echo $row["GPA"]?></td>
      <td><?php echo " บ้านเลขที่ ".$row["address_number"]." หมู่ ".$row["moo"]." ถนน ".$row["road"]." ตำบล ".$row["DISTRICT_NAME"]." อำเภอ ".$row["AMPHUR_NAME"]." จังหวัด ".$row["PROVINCE_NAME"]?></td>
    </tr>
  <?php }?>
</table>

</table>
