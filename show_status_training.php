
  <?php 
    include("connect/conn.php");
    $search = $_POST["search"];
    $sql = "select * from training_normal,student,business,department where training_normal.citizen_id = student.citizen_id 
    and training_normal.business_id = business.business_id
    and student.dep_id = department.dep_id
    and student.std_id like'%$search%'
    "; 
    $res = mysqli_query($conn,$sql);
    $sqlSe = "SHOW COLUMNS FROM training_normal WHERE Field = 'normal_status'";
    $resSe = mysqli_query($conn,$sqlSe);
    $rowSe = mysqli_fetch_array($resSe);
    preg_match("/^enum\(\'(.*)\'\)$/",$rowSe[1], $matches);
    $enum = explode("','", $matches[1]);
    // print_r($enum);

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
        สถานะการฝึก
      </th>
      <th>
        แก้ไข
      </th>
    </tr>
    <?php while($row = mysqli_fetch_array($res)) { $j = 0;?>
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
        <select name="normal_status" id="normal_status">
          <?php foreach($enum as $enumA) { ?>
            <option value="<?php echo $enum[$j];?>"
              <?php if($row["normal_status"] == $enum[$j]) {
                echo "selected";
              }?>
            >
            <?php echo $enum[$j];?>
            </option>
          <?php $j++;}?>
        </select>
      </td>
      <td>
        <button class="editData" id="<?php echo $row["normal_id"];?>">แก้ไข</button>
      </td>
    </tr>
    <?php }?>
  </table>
  <script>
  $(document).ready(function(){
    $(".editData").click(function(){
      // alert($(this).parents("tr").find("#normal_status").val());
      $.post("update_status_training.php",
      {
        normal_id: $(this).attr("id"),
        normal_status: $(this).parents("tr").find("#normal_status").val(),        
      },function(r) {
        alert(r.trim());
      });
    });
  });
</script>