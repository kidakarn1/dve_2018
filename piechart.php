<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
	<!-- ------------------------------------------------------------------------------- -->
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>
			
		</title>
		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="jquery.gvChart-0.1.min.js"></script>
		<script type="text/javascript">
		gvChartInit();
		jQuery(document).ready(function(){

			
			jQuery('#myTable5').gvChart({
				chartType: 'PieChart',
				gvSettings: {
					vAxis: {title: 'No of players'},
					hAxis: {title: 'Month'},
					width: 820,
					height: 400,
					}
			});
		});
		</script>
		<style>
			body{
				text-align: center;
				font-family: Arial, sans-serif;
				font-size: 12px;
			}
			
			a{
				text-decoration: none;
				font-weight: bold;
				color: #555;
			}
			
			a:hover{
				color: #000;
			}
			
			div.main{
				margin: auto;
				text-align: left;
				width: 820px;
			}
		
			div.clean{
				border: 1px solid #850000;
			}
			
			.clean td, .clean th{
				border: 2px solid #bbb;
				background: #ddd;
				padding: 5px 10px;
				text-align: center;
				border-radius: 2px;
			}
			
			.clean table{
				margin: auto;
				margin-top: 15px;
				margin-bottom: 15px;
			}
			
			.clean caption{
				font-weight: bold;
				
			}
			
			.gvChart,.clean{
				border: 2px solid #850000;
				border-radius: 5px;
				-moz-border-radius: 10px;
				width: 820px;
				
				margin: auto;
				margin-top: 20px;
			}
			
			pre{
				background: #eee;
				padding: 10px;
				border-radius: 10px;
				-moz-border-radius: 10px;
			}
		</style>
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

		<div class="main">
			<!-- <h2 id="pie">จำนวนนักศึกษาที่ออกฝึกงาน</h2>
			
			<p><strong>Note</strong> that PieChart uses only first table row as a data set. Next data rows are ignored.</p> -->
      <?php
        include("connect/conn.php");
        date_default_timezone_set('asia/bangkok');
        $year = date("Ymd");
        $sqlY = "select * from training_plan where start_date <= '$year'";
        $resY = mysqli_query($conn,$sqlY);
        $rowY = mysqli_fetch_array($resY);
      ?>
			<table id='myTable5'>
				<caption>จำนวนนักศึกษาที่ออกฝึกงาน ภาคเรียนที่ <?php echo $rowY["term"]?> ปีการศึกษา  <?php echo $rowY["inter_year"];?></caption>
				<thead>
					<tr>
            <th></th>
            <?php             
              $sqlDep = "select * from department";
              $resDep = mysqli_query($conn,$sqlDep);
              while($rowDep = mysqli_fetch_array($resDep)) {
            ?>
              <th><?php echo $rowDep["dep_name"]?></th>
            <?php
              }
            ?>
					</tr>
				</thead>
					<tbody>
					<tr>
            <th></th>
            <?php
              $resDeps = mysqli_query($conn,$sqlDep);
              while($rowDeps = mysqli_fetch_array($resDeps)) {
                $sqlSum = "select count(training_normal.citizen_id) as sum_std from training_normal,department,student where
                student.citizen_id = training_normal.citizen_id
                and department.dep_id = student.dep_id
                and department.dep_id = '{$rowDeps["dep_id"]}'
                and training_normal.normal_status = 'กำลังฝึก'
                ";
                $resSum = mysqli_query($conn,$sqlSum);
                $rowSum = mysqli_fetch_array($resSum);
            ?>
            <td><?php echo $rowSum["sum_std"];?></td>
            <?php 
              }
            ?>
					</tr>
				</tbody>
				
			</table>
		</div>
		<a href="index.php"class="btn"><input type="submit"value="กลับ" class="btn btn-success"></a>
	</body>
</html>

