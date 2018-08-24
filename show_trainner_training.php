
  <?php 
    include("connect/conn.php");
    $search = $_POST["search"];
    $sql = "select * from training_dve,student,business,department where training_dve.citizen_id = student.citizen_id 
    and training_dve.business_id = business.business_id
    and student.dep_id = department.dep_id
    and student.std_id like'%$search%'
    "; 
    $res = mysqli_query($conn,$sql);

    $i = 1;

  ?>
  <table border="1">
    <tr>
      <th>
        ลำดับ
      </th>
      <th>
        รหัสนักศึกษา
      </th>
      <th>
        ชื่อนักศึกษา
      </th>
      <th>
        ชื่อสถานประกอบการ
      </th>
      <th>
        แผนก
      </th>
      <th>
        วันที่ทำสัญญา
      </th>
      <th>
        ครูฝึก
      </th>
      <th>
        ครูนิเทศ
      </th>
      <th>
        แก้ไข
      </th>
    </tr>
    <?php while($row = mysqli_fetch_array($res)) {?>
    <tr>
      <td>
        <?php echo $i++;?>
      </td>
      <td>
        <?php echo $row["std_id"];?>
      </td>
      <td>
        <?php echo $row["std_name"];?>
      </td>
      <td>
        <?php echo $row["business_name"];?>
      </td>
      <td>
        <?php echo $row["dep_name"];?>
      </td>
      <td>
        <?php echo $row["contract_date"];?>
      </td>
      <td>
        <select name="trainer_id" id="trainer_id">
          <?php 
            $buss_id = $row["business_id"];
            $sqlSe = "select * from trainer where business_id = '$buss_id'";
            $resSe = mysqli_query($conn,$sqlSe);
            while($rowSe = mysqli_fetch_array($resSe)) { 
          ?>
            <option value="<?php echo $rowSe["trainer_id"];?>"
              <?php
                if ($row["trainer_id"] == $rowSe["trainer_id"]) { echo "selected";}
              ?>
            >
              <?php echo $rowSe["trainer_name"];?>
            </option>
          <?php }?>
          
          <?php if(mysqli_num_rows($resSe)==0) {;?>
            <option value="">
              ไม่มีรายชื่อครูฝึก
          <?php }?>
        </select>
      </td>
      <td>
        <select name="teacher_id" id="teacher_id">
          <?php 
            $sqlSeT = "select * from teacher";
            $resSeT = mysqli_query($conn,$sqlSeT);
            while($rowSeT = mysqli_fetch_array($resSeT)) { 
          ?>
            <option value="<?php echo $rowSeT["teacher_id"];?>"
              <?php
                if ($row["teacher_id"] == $rowSeT["teacher_id"]) { echo "selected";}
              ?>
            >
              <?php echo $rowSeT["teacher_name"];?>
            </option>
          <?php }?>          
        </select>
      </td>
      <td>
        <button class="editData" id="<?php echo $row["training_id"];?>">แก้ไข</button>
      </td>
    </tr>
    <?php }?>
  </table>
  <script>
  $(document).ready(function(){
    $(".editData").click(function(){
      // alert($(this).parents("tr").find("#normal_status").val());
      $.post("update_trainer_training.php",
      {
        training_id: $(this).attr("id"),
        trainer_id: $(this).parents("tr").find("#trainer_id").val(),        
        teacher_id: $(this).parents("tr").find("#teacher_id").val(),        
      },function(r) {
        alert(r.trim());
      });
    });
  });
</script>