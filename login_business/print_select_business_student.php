<?php 
    include("../connect/conn.php");
    include("../include/function_kidakarn.php");
    session_start();
    echo $_SESSION["username"];
     echo $id= $_SESSION["std_id"];
     $Internship = $_POST["Internship"];
     $Sick_Leave= $_POST["Sick_Leave"];
     $Errand_leave= $_POST["Errand_leave"];
     $late= $_POST["late"];
     $res_std = get_std($conn,$id);
     $row_std = mysqli_fetch_assoc($res_std);
     $res_school = get_school($conn);
     $row_school = mysqli_fetch_assoc($res_school);
     $eva_id = 4;
     $resTop = get_top($conn, $eva_id);
     $res_evaluation_results = select_evaluation_results($conn,$id,$_SESSION["username"]);

?>
<h3><center><?php echo $row_school["school_name"];?></center></h3>
<h3><center>แบบประเมินผลการฝึกงาน</center></h3>
<center>
<?php echo $row_std["head_name_std"]." ".$row_std["std_name"]." ";?>รหัสประจำตัวนักศึกษา <?php echo $row_std["std_id"];?>
ระดับชั้น <?php echo $row_std["group_name"]." "?>แผนกวิชาช่าง<?php echo $row_std["dep_name"]." "?>
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
<br>ระยะเวลาฝึกงาน <?php echo $start_date_day." ".$start_date_mouth." ".$start_date_year?> ถึง <?php echo $end_date_day." ".$end_date_mouth." ".$end_date_year?>
<br>สถานที่ฝึกงาน<?php echo $row_std["business_name"]." "?>
<br>รวมระยะเวลาฝึกงาน <?php echo  $Internship;?> วัน
 ลาป่วย <?php echo  $Sick_Leave;?> วัน
 ลากิจ <?php echo  $Errand_leave;?> วัน
 มาสาย <?php echo  $late;?> ครั้ง
<br>
<br>
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
                                            <td>เต็ม</td>
                                            <td style="border-left: 1px solid black; width: 50px;">ได้</td>
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
                                        $i=1;
                                        $scroe_full =0;
                                        $total = 0;
                                         while ($row_eva = mysqli_fetch_array($res_evaluation_results)) {
                                            ?>
                                            <table id="table2" width="100%" style="border-bottom: 0.5px solid black; text-align: center;">
                                                <tr>
                                                    <td>4</td>
                                                    <td style="border-left: 1px solid black; width: 50px;"><?php echo $row_eva["score"]?></td>
                                                    <?php   $scroe_full=4*$i;
                                                            $score=$row_eva["score"];
                                                            $total+=$score+$row_eva["score"];?>
                                                </tr>
                                            </table>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th>คะแนนรวมทั้งหมด</th>
                                <th colspan="2"><?php  $total=$total/2; echo $total;?>  คะแนน</th>
                            </tr>
                        </table>
                        <div class="text-center">
                            <!-- <?php if ($_SESSION['status'] == 'Business' or $_SESSION['status'] == 'Business') { ?> -->              
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