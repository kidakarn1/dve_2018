<?php include("../connect/conn.php");
$connect=$conn;
session_start();
$id=$_GET["id"];
$eva_id = 3;
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
$res_student=get_student($connect,$id);
$row_student=mysqli_fetch_assoc($res_student);
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
                        echo "<div class='color_teacher'>"."ครูนิเทศ"."</div>".$row_teacher_count["teacher_name"];
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
        <td><b>ชื่อ</b> <?php echo $row_student["head_name_std"]." ".$row_student["std_name"]?></td>
        <td><b>ระดับชั้น/กลุ่ม</b><?php echo $row_student["group_name"]?></td>
        <td><b>แผนกวิชาช่าง</b> <?php echo $row_student["dep_name"]?></td>
    </tr>
    <tr>
        <td><b>ชื่อสถานประกอบการ</b> <?php echo $row_b["business_name"]?></td>
        <td colspan="2">วัน/เดือน/ปี ที่นิเทศ <?php echo $row_date["plan_date"];?></td>
    </tr>
    <tr>
        <td>ลายเซ็น นร/นศ.......................................................</td>
        <td colspan="2">ลายเซ็น ลายเซ็นผู้ควบคุมการฝึก...................................................</td>
    </tr>
    
</table>
<br>
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
                                            <td>เต็ม</td>
                                            <td style="border-left: 1px solid black;">ได้</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php $l=1;while ($rowTop = mysqli_fetch_array($resTop)) { ?>
                                <tr>
                                    <td><?php echo $rowTop["topics_name"];?></td>
                                    <td id="nested">
                                        <table id="table2"  width="100%" style="text-align: left;">

                                            <?php
                                            $i = 0;
                                            $count = 1;
                                            $t=1;
                                            $resQue = get_que($conn, $eva_id, $rowTop["topics_id"],$id);
                                            while ($rowQue = mysqli_fetch_array($resQue)) {
                                                ?>
                                                <tr>
                                                    <td  colspan="3"style="border-bottom: 1px solid black;"><?php echo ++$i . "." . $rowQue["Que_name"] ?></td>
                                                    <td>3</td>
                                                    <td style="border-left: 1px solid black;"><?php echo $scroe=$rowQue["score"]?></td>
                                                    <?php   $scroe_full=4*$i;
                                                               $score=$rowQue["score"];
                                                               $total+=$score+$rowQue["score"];?>
                                                </tr>
                                                <?php 
                                                                            
                                                                           
                                                ?>
                                            <?php $t++;} ?>
                                        </table>
                                    </td>
                                </tr>
                            <?php 
                            $count++;} ?>
                            <tr>
                                <th></th>
                                <th colspan="2">คะแนนรวม   <?php  $total=$total/2; echo $total;?><div id="scroe"></div>คะแนน</th>
                            </tr>
                        </table>
                        <div class="text-center">
                            <?php if ($_SESSION['status'] == 'Teacher' or $_SESSION['status'] == 'Trainer') { ?>
                                <input class="btn btn-md btn-success" type="submit" value="ตกลง">                    
                            <?php } ?>
                        </div>
                    </form>
<table border="1">
    <tr>
        <th>หลักเกณฑ์ระดับคะแนน (3)        (2)พอใช้                    (1)ควรปรับปรุงแก้ไข</th>
    </tr>
</table>
<br>

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
                                         ( <?php echo $row_student["teacher_name"]?> )<br>
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
    $sql="select * from training_dve,business where training_dve.citizen_id = '{$citizen_id}' and 
        training_dve.business_id = business.business_id";
    $res=mysqli_query($conn,$sql);
    return $res;
}
function get_que($conn, $id, $top_id,$std_id) {
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
function select_evaluation_results($conn, $id,$session_username) {
    $sql = "select * from evaluation_results where student_id = '$id' and assessor='$session_username'";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function select_teacher($conn,$teacher_id){
   $sql = "select * from teacher where teacher_id = '$teacher_id'";
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
function get_student($connect,$std_id){
    $sql="select * from student,training_dve,teacher where student.std_id = '{$std_id}' and 
          student.citizen_id = training_dve.citizen_id and
          training_dve.teacher_id = teacher.teacher_id";
    $res=mysqli_query($connect,$sql);
    return $res;
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
