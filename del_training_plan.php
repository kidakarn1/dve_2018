<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <?php
    include("connect/conn.php");
    $sql = "select * from training_plan,groups where training_plan.group_id = groups.group_id";
    $res = mysqli_query($conn,$sql);
  ?>
</head>
<body>
  <table border="1">
    <tr>
      <th>ปีการศึกษา</th>
      <th>ภาคเรียนที่</th>
      <th>วันเริ่มการฝึกงาน/อาชีพ</th>
      <th>วันที่สิ้นสุดฝึกงาน/อาชีพ</th>
      <th>กลุ่ม</th>
      <th>ระบบที่ออกฝึก(ฝึกงาน/ฝึกอาชีพ)</th>
      <th colspan="2"></th>
    </tr>
    <?php while($row = mysqli_fetch_array($res)) {?>
    <tr style="text-align: center;">
      <td><?php echo $row["inter_year"];?></td>
      <td><?php echo $row["term"];?></td>
      <td><?php echo $row["start_date"];?></td>
      <td><?php echo $row["end_date"];?></td>
      <td><?php echo $row["group_name"];?></td>
      <td><?php if($row["system_id"] == 1){ echo "ปกติ";} else { echo "ทวิภาคี";}?></td>
      <td><a href="del_training_plan_sql.php?id=<?php echo $row["inter_id"];?>">ลบ</a></td>
    </tr>
    <?php }?>
  </table>

</body>
</html>