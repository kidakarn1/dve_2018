<?php 
    include("../connect/conn.php");
    include("../include/function_eva.php");
    session_start();
     //echo $_SESSION["username"];
     $id= "5939010001";//$_GET["id"];
     $Internship = $_POST["Internship"];
     $position1 = $_POST["position1"];
     $position2 = $_POST["position2"];
     $position3 = $_POST["position3"];
     $Sick_Leave= $_POST["Sick_Leave"];
     $sex= $_POST["sex"];
     $edu= $_POST["edu"];
     $major= $_POST["major"];
     $Errand_leave= $_POST["Errand_leave"];
     $late= $_POST["late"];
     $position= $_POST["position"];
     $res_std = get_std($conn,$id);
     $row_std = mysqli_fetch_assoc($res_std);
     $res_school = get_school($conn);
     $row_school = mysqli_fetch_assoc($res_school);
     $eva_id = 1;
     $resTop = get_top($conn, $eva_id);
     $res_evaluation_results = select_evaluation_results($conn,$id,$_SESSION["username"]);
     $res_business = select_business($conn,$_SESSION["username"]);
     $row_business = mysqli_fetch_assoc($res_business);
?>
<h3><center><?php echo $row_school["school_name"];?></center></h3>
<p><center>แบบสอบถามความพึงพอใจของสถานประกอบการ หน่วยงาน </center></p>
<p><center>ชุมชนที่มีต่อคุณภาพของผู้เรียน</center></p>

<!-- ตอนที่1 ข้อมูลทั่วไป
1. --><center><p>สถานประกอบการ/หน่วยงานของรัฐหรือเอกชนที่รับผู้เรียนเข้าฝึกงาน/บุคคลในชุมชน <br><b><?php echo $row_business["business_name"]?></b></p></center>
<!-- <br> -->
<!-- ที่อยู่ <?php echo "ตำบล"." ".$row_business["DISTRICT_NAME"]." "."อำเภอ".$row_business["AMPHUR_NAME"]." "."จังหวัด".$row_business["PROVINCE_NAME"]?>
<br>
2.ตำแหน่ง <b><?php   
    if ($_POST["position"]!=""){ echo $position;}
    if ($_POST["position1"]!=""){echo $position1;}
    if ($_POST["position2"]!=""){echo $position2;}
    if ($_POST["position3"]!=""){echo $position3;}
    ?>
<br>
ตอนที่2 ข้อมูลเกี่ยวกับผู้เรียน<br>
1.เพศ <?php echo $sex;?><br>
2.กำลังศึกษาระดับ <?php echo $edu;?><br>
3.แผนกวิชา <?php echo $major;?> -->
<center>
<?php 
$start_date=$row_std["start_date"];
$start_date_day=substr($start_date,8,2);
$start_date_mouth=substr($start_date,6,1);
$start_date_year=substr($start_date,0,4);
$start_date_year=$start_date_year+543;
$start_date_mouth = select_mouth(date("$start_date_mouth"));

$end_date=$row_std["end_date"];
$end_date_day=substr($end_date,8,2);
$end_date_mouth=substr($end_date,6,1);
$end_date_year=substr($end_date,0,4);
$end_date_year=$end_date_year+543;
$end_date_mouth = select_mouth(date("$end_date_mouth"));
?>

<br>
<form id="form-test" class="form-horizontal" method="post" action="insert_eva.php">
                        <input type="hidden" name="eva_id" value="<?php echo $eva_id; ?>">
                        <table border="1" class="table text-center">
                            <tr>
                                <td rowspan="2">หัวข้อการประเมิน</td>
                                <td rowspan="2">รายการประเมิน</td>
                                <td >ระดับความพึงพอใจ</td>
                            </tr>
                            <tr>
                                <td id="nested">
                                    <table border="0" id="table2" width="100%" style="text-align: center;">
                                        <tr>
                                            <td>เต็ม</td>
                                            <td style="border-left: 1px solid black;">ได้</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                <tr>
                                    <td><?php echo $rowTop["topics_name"] ?></td>
                                    <td id="nested">
                                        <table id="table2"  width="100%"style="text-align: left;">

                                            <?php
                                            $i = 0;
                                            $resQue = get_que($conn, $eva_id, $rowTop["topics_id"]);
                                            while ($rowQue = mysqli_fetch_array($resQue)) {
                                                ?>
                                                <tr>
                                                    <td style="border-bottom: 1px margin:rigth 2px solid black;"><?php echo ++$i . "." . $rowQue["Que_name"] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </td>
                                    <td id="nested">
                                        <?php
                                        $resRa = get_que($conn, $eva_id, $rowTop["topics_id"]);
                                        while ($rowRa = mysqli_fetch_array($resRa)) {
                                            ?>
                                            <table border="0" id="table2" width="100%" style="border-bottom: 1px solid black; text-align: center;">
                                                <tr>
                                                    <td>5</td>
                                                    <td  style="border-left: 1px solid black;">5</td>
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
                                <!-- <input type="hidden" name="OK"value="OK">
                                <input class="btn btn-md btn-success" type="submit" value="ตกลง"> -->                    
                            <?php } ?>
                        </div>
                    </form>
                    <br>
                    ลงชื่อ.........................................................(ผู้ประเมิน)
                    <br>
                    <br>
                    ( <?php echo $row_std["name_of_the_signatory"]?> )
                    <br>
                    <br>
                    ตำแหน่ง <?php echo $row_std["position"]?>
                    <br>
                    <br>
                    วันที่ <?php echo $date_kidaran_day;?>  เดือน <?php echo $get_moth;?>  พ.ศ. <?php echo $date_kidaran_year;?>
                    <div class="pd">
                    <br>
                    <br>
                        <center><button id="print">ปริ้น</button></center>
                    </div>
</center>
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
function select_evaluation_results($conn, $id,$session_username) {
    $sql = "select * from evaluation_results where student_id = '$id' and assessor ='$session_username'";
    $res = mysqli_query($conn, $sql);
    return $res;
}
?>
?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#print").click(function(){
            $(".pd").hide();
            window.print();
            $(".pd").show();
        });
    });
</script>