<?php 
    include("../connect/conn.php");
    ini_set('max_execution_time', 3000); 
    session_start();
    echo $_SESSION["username"];
    $connect=$conn;
    $res_select_dve=select_dve($connect,$_SESSION["username"]);
    ?> 
    <table border="1">
        <tr>
            <th>ลำดับ</th>
            <th>รหัสนักเรียน</th>
            <th>ชื่อ สกุล</th>
            <th>ประเมิน</th>
        </tr>
    <?php $i=1;
            while($row_select_dve=mysqli_fetch_assoc($res_select_dve)){
                    $_SESSION["std_id"] = $row_select_dve["std_id"];
                    $res_check_student=select_evaluation_results($conn,$_SESSION["std_id"],$_SESSION["username"]);
                    $row_check_student=mysqli_fetch_assoc($res_check_student);
                
                ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row_select_dve["std_id"];?></td>
                <td><?php echo $row_select_dve["head_name_std"]." ".$row_select_dve["std_name"]?></td>
                <td> <?php if ($row_select_dve["std_id"]!=$row_check_student["student_id"] and  $_SESSION["username"] != $row_check_student["assessor"]){?>
                            <a href="../evaluation/eva_3.php?id=<?php echo $row_select_dve["std_id"];?>">ประเมิน</a>
                        <?php 
                        }
                        else{
                            echo "<font color='green'>ประเมินเสร็จสิ้น</font>";
                            ?>
                            <!-- <a href="../evaluation/from_update_eva_3.php?id=<?php echo $row_select_dve["std_id"];?>">แก้ไขข้อมูลการประเมิน</a> | -->
                            <a href="print_scroe_student_dve.php?id=<?php echo $row_select_dve["std_id"];?>">รายงานคะแนน</a>
                        <?php
                        }
                        ?>
</td>
    <?php $i++;}?>
    <?php 
    function select_dve($connect,$session_id){
        $sql="select * from training_dve,student,business,trainer where training_dve.trainer_id = '{$session_id}'
            and training_dve.trainer_id = trainer.trainer_id
            and training_dve.citizen_id = student.citizen_id
            and training_dve.business_id = business.business_id";
        $res=mysqli_query($connect,$sql);
        return $res;
    }
    function select_evaluation_results($conn,$std_id,$session_username){
        $sql="select * from evaluation_results where student_id = '{$std_id}' and assessor='$session_username' ";
        $res=mysqli_query($conn,$sql);
        return $res;
        }
    ?>