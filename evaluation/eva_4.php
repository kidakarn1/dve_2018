<!doctype html>
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
    <?php include '../menu2.php'; ?>
    <?php
    include('../connect/conn.php');
    session_start();
    $eva_id = 4;
    $_SESSION["std_id"] = $_GET["id"];
    $resTop = get_top($conn, $eva_id);
    ?>
    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i><b>ตารางการประเมิน</b></h3>
                    </div>
                    <form  id="form-test" class="form-horizontal" method="post" action="insert_eva.php">
                        <input type="hidden" name="eva_id" value="<?php echo $eva_id; ?>">
                        <table border="1" class="table text-center">
                            <tr>
                                <td rowspan="2">รายการประเมิน</td>
                                <td >ระดับความพึงพอใจ</td>
                            </tr>
                            <tr>
                                <td id="nested">
                                    <table id="table2" width="100%" style="text-align: center;">
                                        <tr>
                                            <td style="border-left: 1px solid black; width: 50px;">ดีมาก</td>
                                            <td style="border-left: 1px solid black; width: 50px;">ดี</td>
                                            <td style="border-left: 1px solid black; width: 50px;">พอใช้</td>
                                            <td style="border-left: 1px solid black; width: 50px;">ต้องปรับปรุง</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                <tr>
                                    <td id="nested">
                                        <table id="table2"  width="100%"  border="1" height="100%"style="text-align: left;" >

                                            <?php
                                            $i = 0;
                                            $resQue = get_que($conn, $eva_id, $rowTop["topics_id"]);
                                            while ($rowQue = mysqli_fetch_array($resQue)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo ++$i . "." . $rowQue["Que_name"] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                    <td id="nested">
                                        <?php
                                        $resRa = get_que($conn, $eva_id, $rowTop["topics_id"]);
                                        while ($rowRa = mysqli_fetch_array($resRa)) {
                                            ?>
                                            <table id="table2" width="100%" style="border-bottom: 0.5px solid black; text-align: center;">
                                                <tr>
                                                    <td><input type="radio" class="scroe<?php  echo $rowRa["Que_id"]; ?>" name="<?php echo $rowRa["Que_id"]; ?>" value="4"></td>
                                                    <td><input type="radio" class="scroe<?php  echo $rowRa["Que_id"];?>"  name="<?php echo $rowRa["Que_id"]; ?>" value="3"></td>
                                                    <td><input type="radio" class="scroe<?php  echo $rowRa["Que_id"];?>" name="<?php echo $rowRa["Que_id"]; ?>" value="2"></td>
                                                    <td><input type="radio" class="scroe<?php  echo $rowRa["Que_id"];?>"  name="<?php echo $rowRa["Que_id"]; ?>" value="1"></td>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th></th>
                                <th colspan="2">คะแนนรวม   <div id="scroe"></div>คะแนน</th>
                            </tr>
                        </table>
                        <div class="text-center">
                             <?php if ($_SESSION['status'] == 'Business' or $_SESSION['status'] == 'Business') { ?> 
                                <input class="btn btn-md btn-success" type="submit" value="ตกลง">                    
                            <?php } ?>
                        </div>
                    </form>
            </section>
        </section>

    </body>
</html>
<?php

function get_que($conn, $id, $top_id) {
    $sql = "select * from question where eva_id = '$id' and topics_id = '$top_id' ";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function get_top($conn, $id) {
    $sql = "select * from topics,question where question.eva_id = '$id' and topics.topics_id = question.topics_id group by question.topics_id";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>
<script>
    var score = {};
$("#form-test").find("input[type=radio][value=1]").each(function(){
  var getClass = $(this).attr("class");     
  // alert(getClass);
  $("."+getClass).click(function(){
    var total = 0;
    score[getClass] = parseInt($(this).attr("value"));
    console.log(score);
    $("#form-test").find("input[type=radio][value=1]").each(function(){
      if(score[$(this).attr("class")]) {
        total+=score[$(this).attr("class")];
      }
    }); 
    //alert(total); 
    $("#scroe").html(total);               
  });                  
});
</script>