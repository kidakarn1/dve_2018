<?php include("../connect/conn.php");
session_start();
$connect=$conn;
$id=$_GET["id"];
$eva_id = 5;
$resTop = get_top($conn, $eva_id);
$res_student=select_student($conn,$id);
$row_student=mysqli_fetch_assoc($res_student);
$citizen_id=$row_student["citizen_id"];
$res_b=select_b($conn,$citizen_id);
$row_b=mysqli_fetch_assoc($res_b);
$res_school=select_school($conn);
$row_school=mysqli_fetch_assoc($res_school);
$res_evaluation_results = select_evaluation_results($conn,$id,$_SESSION["username"]);
$res_show = select_evaluation_results($conn,$id,$_SESSION["username"]);
$row_show=mysqli_fetch_assoc($res_show);
$res_teacher=select_teacher($conn,$row_show["assessor"]);
$row_teacher=mysqli_fetch_assoc($res_teacher);
$res_date=select_date($conn,$row_show["assessor"]);
$row_date=mysqli_fetch_assoc($res_date);
$date_plan_nites=$row_date["plan_date"];
?>
<?php
    $res_teacher_nites=select_teacher_nites($connect,$row_show["assessor"]);
    while($row_teacher_nites=mysqli_fetch_assoc($res_teacher_nites)){
        $teacher_id=$row_teacher_nites["teacher_id"];
        $td_array=$row_teacher_nites["teacher_id"];
        $drive_id=$row_teacher_nites["drive_id"];
        $business_id=$row_teacher_nites["business_id"];
        $teacher_nites_date=$row_teacher_nites["plan_date"];
        $car_id=$row_teacher_nites["car_id"];
        $td=explode(",",$teacher_id);
        // print_r($td); 
        $dd=explode(",",$drive_id);
        $bd=explode(",",$business_id);
        $tnd=explode(",",$teacher_nites_date);
        $cd=explode(",",$car_id);
        $count_td=count($td);
        $count_dd=count($dd);
        $count_bd=count($bd);
        $count_tnd=count($tnd);
        $count_cd=count($cd);
        ?>
        <?php
             for ($p=0; $p<=$count_bd; $p++) {
                $res_teacher_count=select_teacher_count($connect,$td[$p],$_SESSION["username"]);
                 if ($res_teacher_count!="false"){
                     ?>
                     <?php
                    while($row_teacher_count=mysqli_fetch_assoc($res_teacher_count)){
                        //echo "<div class='color_teacher'>"."ครูนิเทศ"."</div>".$row_teacher_count["teacher_name"];
                    }
                    ?>

                    <?php
                }
            }
        }
                ?>
<center>
<h3>แบบฟอร์มการนิเทศ นักเรียน/นักศึกษา</h3>
<table border="1">
    <tr>
        <th>ชื่อ-สกุล</th>
        <th>รหัสประจำตัว</th>
        <th>ระดับชั้น/กลุ่ม</th>
        <th>แผนกวิชาช่าง</th>
    </tr>
    <tr>
        <td><?php echo $row_student["head_name_std"]." ".$row_student["std_name"]?></td>
        <td><?php echo $row_student["std_id"]?></td>
        <td><?php echo $row_student["group_name"]?></td>
        <td><?php echo $row_student["dep_name"]?></td>
    </tr>
    <tr>
        <td colspan="2">สถานที่ฝึกงาน <?php echo $row_b["business_name"]?></td>
        <td colspan="2">วัน/เดือน/ปี ที่นิเทศ <?php echo $row_date["plan_date"];?></td>
    </tr>
    
</table>
<br>
<br>
<table border="1"class="table text-center">
                            <tr>
                                <td rowspan="2">รายการที่ต้องสำรวจ</td>
                                <td >การประเมินผลของครูนิเทศ</td>
                            </tr>
                            <tr>
                                <td id="nested">
                                    <table id="table2" width="100%" style="text-align: center;">
                                        <tr>
                                            <td>เต็ม</td>
                                            <td style="border-left: 1px solid black; width: 141px; ">ได้</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php $k=1;while ($rowTop = mysqli_fetch_array($resTop)) { ?>
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
                                            <?php $k++;} ?>
                                        </table>
                                    </td>
                                    <td id="nested">
                                        <?php
                                       $i=1;
                                       $scroe_full =0;
                                       $total = 0;
                                        while ($row_eva = mysqli_fetch_array($res_evaluation_results)) {
                                            ?>
                                            <table id="table2" width="100%" style="border-bottom: 0.5px solid black; text-align: center;">
                                                <tr>
                                                    <td >4</td>
                                                    <td style="border-left: 1px solid black; width: 1px; "></td>
                                                    <td ><?php echo $row_eva["score"]?></td>
                                                        <?php 
                                                        $scroe_full=4*$i;
                                                        $score=$row_eva["score"];
                                                        $total+=$score+$row_eva["score"];
                                                        ?>
                                                </tr>
                                            </table>
                                        <?php $i++; } ?>
                                    </td>
                                </tr>
                                <?php 
                                ?>
                            <?php } ?>
                            <tr>
                                <th>คะแนนรวม</th>
                                <th colspan="2" ><center><?php echo $scroe_full;?> | <?php  $total=$total/2; echo $total;?></center></th>
                            </tr>
                            <tr>
                                <th>ช่วงเวลาทีี่นิเทศ <?php echo $date_plan_nites?></th>
                                <th>ลายเซนนักศึกษา.........................................<br><br>
                                    ลายเซ็นผู้ควบคุมการฝึก.............................</th>
                            </tr>
                            <tr>
                                <th colspan="2">น้ำหนักคะแนน 4=ดีมาก , 3=ดี , 2=พอใช้ , 1=ต้องปรับปรุงแก้ไข</th>
                            </tr>
                        </table>
                        <br>
                        สรุปผลการนิเทศ.............................................................................................................................................<br>
                        ........................................................................................................................................................................<br>
                        ........................................................................................................................................................................
                        <table border="0">
                            <tr>
                                <td>เรียนเสนอ ผู้อำนวยการโปรดทราบ</td>
                                <br>
                                <br>
                                <br>
                               <td></td>
                            </tr>
                            <tr>
                            <td>
                            <br>
                            <br>
                            .......................................................<br><br>
                                        ( <?php echo $row_school["deputy_plan"]?> )<br>
                            หัวหน้างานอาชีวศึกษาระบบทวิภาคี<br><br>
                            </td>
                            <td>............................................ครูนิเทศ<br><br>
                                         ( <?php echo $row_teacher["teacher_name"]?> )<br>
                                </td>
                            </tr>
                            <tr>
                                <td>เรียนเสนอ ผู้อำนวยการโปรดทราบ<br><br><br><br></td>
                                <td>ทราบ<br><br><br><br></td>
                            </tr>
                            <tr>
                            <td>
                            .......................................................<br>
                            ( <?php echo $row_school["deputy_academic"]?> )<br>
                            รองผู้อำนวยการฝ่ายวิชาการ
                            </td>
                            <td>
                            .......................................................<br>
                            ( <?php echo $row_school["name_dir"]?> )<br>
                            ผู้อำนวยการ<?php echo $row_school["school_name"]?>
                            </td>
                            </tr>
                        </table>
                        <div class="pd">
                        <button id="print">ปริ้น</button>
                        </div>
</center>
<?php
function select_student($conn,$id){
    $sql="select * from student,groups,department where student.std_id = '{$id}' and
        student.group_id = groups.group_id and
        groups.dep_id = department.dep_id";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function select_b($conn,$citizen_id){
    $sql="select * from training_normal,business where training_normal.citizen_id = '{$citizen_id}' and 
        training_normal.business_id = business.business_id";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function get_que($conn, $id, $top_id) {
    $sql = "select * from question where eva_id = '$id' and topics_id = '$top_id' ";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function get_top($conn, $id) {
    $sql = "select * from question where question.eva_id = '$id' group by question.topics_id";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_evaluation_results($conn, $id,$session_username) {
    $sql = "select * from evaluation_results where student_id = '$id' and assessor = '$session_username'";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_teacher($conn,$teacher_id){
    $sql = "select * from teacher where citizen_id = '$teacher_id'";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_school($conn){
    $sql = "select * from school";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_date($conn,$teacher_id){
    $sql="select * from plan_nites where teacher_id like '%$teacher_id%'";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_teacher_nites($connect,$row_teacher){
    $sql="select * from  plan_nites where teacher_id like '%$row_teacher%'";
    $res=mysqli_query($connect,$sql);
    return $res;
}
function select_teacher_count($connect,$td,$session_username){
    if ($td==$session_username){
        $sql="select * from teacher where teacher_id = '$td'";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    else if ($td!=$session_username){
        $false="false";
        return $false;
    }
}
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
