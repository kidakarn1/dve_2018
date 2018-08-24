<?php 
  include("connect/conn.php");
  $sql = "select * from groups where dep_id = '{$_POST["dep_id"]}'";
  $res = mysqli_query($conn,$sql);
?>
รหัสกลุ่ม: <select name="group_id" id="group_id">
  <?php
    while($row = mysqli_fetch_array($res)) {
  ?>
  <option value="<?php echo $row["group_id"]?>"><?php echo $row["group_id"]?></option>
  <?php
    }
  ?>
</select>