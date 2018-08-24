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
    $eva_id = 3;
    $std_id = $_GET["id"];
    $resTop = get_top($conn, $eva_id);
    ?>
    <body>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-laptop"></i><b>ตารางการประเมิน</b></h3>
                    </div>
                    <form id="form-test"class="form-horizontal" method="post" action="insert_eva.php">
                        <input type="hidden" name="eva_id" value="<?php echo $eva_id; ?>">
                        <table border="1" class="table text-center">
                            <tr>
                                <td rowspan="2">หัวข้อการประเมิน</td>
                                <td rowspan="2">รายละเอียด</td>
                                <td >คะแนนที่ได้</td>
                            </tr>
                            <tr>
                                <td id="nested">
                                    <table id="table2" width="100%" style="text-align: center;">
                                        <tr>
                                            <td>3</td>
                                            <td style="border-left: 1px solid black;">2</td>
                                            <td style="border-left: 1px solid black;">1</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php $l=1;
                                  $score = 0;
                            while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                <tr>
                                    <td><?php echo $rowTop["topics_name"]; $l++;?></td>
                                    <td id="nested">
                                        <table id="table2"  width="100%" style="text-align: left;">

                                            <?php
                                            $i = 0;
                                            $resQue = get_que($conn,$eva_id,$rowTop["topics_id"]);
                                            while ($rowQue = mysqli_fetch_array($resQue)) {
                                                ?>
                                                <tr>
                                                    <td style="border-bottom: 1px solid black;"><?php echo ++$i . "." . $rowQue["Que_name"] ?></td>
                                                    <?php 
                                                    $score=$rowQue["score"];
                                                     $total+=$score+$rowQue["score"];?>
                                                </tr>
                                                <tr>
                                                <td>
                                            <?php  echo $score;?>
                                            </td>
                                            </tr>
                                            <?php }?>

                                        </table>
                                    </td>
                                    <td id="nested">
                                        <?php
                                        $resRa = get_que($conn, $eva_id, $rowTop["topics_id"]);
                                        $k=1;
                                        while ($rowRa = mysqli_fetch_array($resRa)) {
                                            ?>
                                            <table id="table2" width="100%" style="border-bottom: 1px solid black;">
                                                <tr>
                                                    <td><input type="radio" class="scroe<?php echo $k.$l?>" id="3" name="<?php echo $rowRa["Que_id"]; ?>" value="3"<?php if ($rowQue["score"]==3){echo "checked";}$rowQue["score"]?>></td>
                                                    <td><input type="radio" class="scroe<?php echo $k.$l?>" id="2" name="<?php echo $rowRa["Que_id"]; ?>" value="2"<?php if ($rowQue["score"]==2){echo "checked";}$rowQue["score"]?>></td>
                                                    <td><input type="radio" class="scroe<?php echo $k.$l?>" id="1" name="<?php echo $rowRa["Que_id"]; ?>" value="1"<?php if ($rowQue["score"]==1){echo "checked";}$rowQue["score"]?>></td>
                                                </tr>
                                            </table>
                                        <?php $k++;} ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th></th>
                                <th colspan="2">คะแนนรวม   <div id="scroe"><?php  $total=$total/2; echo $total;?></div>คะแนน</th>
                            </tr>
                        </table>
                        <div class="text-center">
                            <?php if ($_SESSION['status'] == 'Teacher' or $_SESSION['status'] == 'Trainer') { ?>
                                <input class="btn btn-md btn-success" type="submit" value="ตกลง">                    
                            <?php } ?>
                        </div>
                    </form>
            </section>
        </section>
    </body>
</html>
<?php

function get_que($conn,$id,$top_id) {
    $sql = "select * from question,evaluation_results where question.eva_id = '$id' and question.topics_id = '$top_id'
    and question.Que_id = evaluation_results.Que_id";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function get_top($conn, $id) {
    $sql = "select * from topics,question where question.eva_id = '$id' and topics.topics_id = question.topics_id group by question.topics_id";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
    var score12=0;
    var score22=0;
    var score13=0;
    var score23=0;
    var score14=0;
    var score24=0;
    var score34=0;
    var score44=0;
    var score54=0;
    var score15=0;
    var totalScore = 0;

    // $(".scroe12").click(function(){
    //     score12=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe22").click(function(){
    //     score22=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe13").click(function(){
    //     score13=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe23").click(function(){
    //     score23=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe14").click(function(){
    //     score14=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe24").click(function(){
    //     score24=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe34").click(function(){
    //     score34=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe44").click(function(){
    //     score44=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe54").click(function(){
    //     score54=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
    // $(".scroe15").click(function(){
    //     score15=parseInt($(this).attr("id"));
    //     totalScore=score12+score22+score13+score23+score14+score24+score34+score44+score54+score15;
    //      $("#scroe").html(totalScore);
    // });
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
})

});
</script>