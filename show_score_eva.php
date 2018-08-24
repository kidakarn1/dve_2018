<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <?php 
    $group_id = $_POST["group_id"];
    $system_id = $_POST["system_id"];
    include("connect/conn.php");
    include("MPDF/function_date.php");
    date_default_timezone_set("asia/bangkok");

    $sqlGro = "select * from evaluation_results,student,groups,department where 
    evaluation_results.student_id = student.std_id
    and groups.group_id = student.group_id
    and student.group_id = '$group_id'
    and department.dep_id = groups.dep_id
    and student.system_id = '$system_id'
    group by evaluation_results.student_id
    ";
    $resGro = mysqli_query($conn,$sqlGro);
    $resDep = mysqli_query($conn,$sqlGro);
    $rowDep = mysqli_fetch_array($resDep);
    if($system_id == 1) {
      $eva_list = array(1,4,5);
    } else {
      $eva_list = array(1,2,3,5);
    }
    $num_eva = count($eva_list);


  ?>
</head>
<body>
  <center>รายงานตัวกลับจาการฝึก</center><br>
  <center>
  วันที่ส่งเอกสาร <?php echo dateThai(date("Y-m-d"))?><br>
  เอกสารหมายเลข 
  <table>
  <?php 
    for($k = 0;$k<$num_eva;$k++) {
      $sql_eva = "select * from evaluation_type where eva_id = '{$eva_list[$k]}'";
      $res_eva = mysqli_query($conn,$sql_eva);  
      while($row_eva = mysqli_fetch_array($res_eva)){
  ?>
    <tr>
      <td><?php echo ($k+1).". ".$row_eva["eva_name"]."<br>"; ?></td>
    </tr>
  <?php
      }
    }
  ?>
  </table>
  <br>
  </center>
  <center>
    <table border="1">
      <tr>
        <td colspan="6"><center>แผนกช่าง<?php echo $rowDep["dep_name"]." ".$rowDep["group_name"]." รหัสกลุ่ม ".$rowDep["group_id"]." ระบบ "; if($rowDep["system_id"] == '1') { echo "ปกติ";} else { echo "ทวิภาคี";} ?></center></td>
      </tr>
      <tr>
        <td>ที่</td>
        <td>รหัสประจำตัว</td>
        <td>ชื่อ-สกุล</td>
        <td>เซ็นชื่อรายงาน</td>
        <td>
          <table>
            <tr>
              <td colspan="5">เอกสารหมายเลข</td>
            </tr>
            <tr >
              <?php for($i = 1;$i<=$num_eva;$i++) {?>
                <td style="
                  border-right-style: solid;
                  text-align: center;
                  border-width: thin;"
                >
                <?php echo $i;?></td>
              <?php }?>
            </tr>
          </table>
        </td>
        <td>คะแนนรวม</td>
      </tr>
        <?php $j = 1;while($rowGro = mysqli_fetch_array($resGro)){
        ?>
          <tr>
              <td>
                <?php echo $j;?>
              </td>
              <td>
                <?php echo $rowGro["std_id"];?>
              </td>
              <td>
                <?php echo $rowGro["std_name"]." ".$rowGro["std_lname"];?>
              </td>
              <td>
              </td>
              <td>
                <table width="100%">
                  <tr>
                    <?php $total_score = 0; for($i = 1;$i<=$num_eva;$i++) {?>
                      <td style="
                        border-right-style: solid;
                        text-align: center;
                        border-width: thin;"
                      >
                        <?php $sqlScore = "select sum(evaluation_results.score) as sum_score from evaluation_results,student,groups,question,evaluation_type where 
                        evaluation_results.student_id = student.std_id
                        and student.group_id = groups.group_id
                        and evaluation_results.Que_id = question.Que_id
                        and question.eva_id = evaluation_type.eva_id      
                        and groups.group_id = '{$rowGro[group_id]}'
                        and student.std_id = '{$rowGro[std_id]}'
                        and question.eva_id = '{$eva_list[$i]}'";
                        $resScore = mysqli_query($conn,$sqlScore);
                        $rowScore = mysqli_fetch_array($resScore); 
                        if($rowScore["sum_score"]) {
                          echo $rowScore["sum_score"];
                          $total_score+=$rowScore["sum_score"];                
                        } else {
                          echo 0;
                        }
                        ?>
                      </td>
                    <?php }?>
                  </tr>
                </table>
              </td>
              <td>
                <center><?php echo $total_score;?></center>
              </td>
          </tr>
        <?php $j++;}?>     
    </table>
  </center>
</body>
</html>