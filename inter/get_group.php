<?php 
  include("../connect/conn.php");
  $dep_id = $_POST["dep_id"];
  $edu_sys = $_POST["edu_id"];

  $edu_sys_ex = explode("_",$edu_sys);
  $edu_id = $edu_sys_ex[0];
  $system_id = $edu_sys_ex[1];

  $sql = "select group_id,dep_id,system_id,edu_id from student where dep_id = '$dep_id' and edu_id = '$edu_id'  group by group_id order by group_id";
  $res = mysqli_query($conn,$sql);
?>
<select id="group_id">
  <?php while ($row = mysqli_fetch_array($res)) {?>
    <option value="<?php echo $row["group_id"];?>"><?php echo $row["group_id"];?></option>
  <?php }?>
</select>