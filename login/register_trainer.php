<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <?php 
    include("../connect/conn.php");
    $res_DISTRICT = select_DISTRICT($conn);
    $res_AMPHUR = select_AMPHUR($conn);
    $res_PROVINCE = select_PROVINCE($conn);
    $res_zipcode = select_zipcodes($conn); 
  ?>
</head>
<body>
  <form action="insert_trainer.php" method="post">
    เลขบัตรประชาชน: <input type="text" name="trainer_citizen" id="trainer_citizen" maxlength="13" required>
    รหัสผ่าน: <input type="password" name="password" id="password" minlength="8" required>
    ยืนยันรหัสผ่าน: <input type="password" name="re_password" id="re_password" minlength="8" required>
    ชื่อ-สกุล: <input type="text" name="trainer_name" required>
    เบอร์โทรศัพท์: <input type="text" name="phone" maxlength="10" required>
    <div class="form-group">
      <label class="control-label col-sm-2">บ้านเลขที่</label>
      <div class="col-sm-3">
          <input class="form-control" type="text" name="home_id">
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">ซอย</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="soi">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">ถนน</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" name="road">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">จังหวัด </label>
        <div class="col-sm-3">
            <select class="form-control" id="PROVINCE_CODE" name="PROVINCE_ID" class="form-control">
                <?php while ($row_PROVINCE = mysqli_fetch_assoc($res_PROVINCE)) { ?>
                    <option value="<?php echo $row_PROVINCE['PROVINCE_NAME']; ?>">
                        <?php echo $row_PROVINCE['PROVINCE_NAME']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2">อำเภอ </label>
        <div class="col-sm-3">
            <select class="form-control" id="AMPHUR_CODE" name="AMPHUR_CODE" class="form-control">
                <?php while ($row_AMPHUR = mysqli_fetch_assoc($res_AMPHUR)) { ?>
                    <option value="<?php echo $row_AMPHUR['AMPHUR_NAME']; ?>">
                        <?php echo $row_AMPHUR['AMPHUR_NAME']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2">ตำบล</label>
        <div class="col-sm-3">
            <select class="form-control" id="DISTRICT_CODE" name="DISTRICT_CODE" class="form-control">
                <?php while ($row_DISTRICT = mysqli_fetch_assoc($res_DISTRICT)) { ?>
                    <option value="<?php echo $row_DISTRICT['DISTRICT_NAME']; ?>">
                        <?php echo $row_DISTRICT['DISTRICT_NAME']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2">รหัสไปรษณีย์ </label>
        <div class="col-sm-3">
            <select class="form-control" id="zipcode" name="zipcode" class="form-control">
                <?php while ($row_zipcode = mysqli_fetch_assoc($res_zipcode)) { ?>
                    <option value="<?php echo $row_zipcode['zipcode']; ?>">
                        <?php echo $row_zipcode['zipcode']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    email: <input type="email" name="email" required>
    <div class="form-group">
      <label class="control-label col-sm-2">ชื่อสถานประกอบการ</label>
      <div class="col-sm-3">
        <?php include("../dataList_business.php"); ?>
      </div>
    </div>
    วุฒิการศึกษาสูงสุด: 
    <select name="educational_id">
      <?php 
        $sqlb = "select * from education";
        $resb = mysqli_query($conn,$sqlb);
        while($rowb = mysqli_fetch_array($resb)) {
      ?>
          <option value="<?php echo $rowb["edu_id"];?>"><?php echo $rowb["edu_name"];?></option>

      <?php }?>
    </select>
    ประสบการณ์ในอาชีพที่สำเร็จการศึกษา จำนวน-ปี:
    <input type="text" name="trainer_experience">
    วันที่ได้รับการแต่งตั้งครูฝึก:<input type="date" name="assign_date">
    <input type="submit" id="submit" value="ตกลง">
  </form>
</body>
</html>
<script src="../js/jquery.js"></script>
<script>
  $(document).ready(function() {
    $("#submit").prop('disabled', true);
    $("#re_password").keyup(function(){
      if($(this).val() != $("#password").val()) {
        $("#submit").prop('disabled', true);
      } else {
        $("#submit").prop('disabled', false);
      }
    });

    $("#trainer_citizen").keyup(function(){
      if(!checkID($("#trainer_citizen").val())) {
        $("#submit").prop('disabled', true);
      } else {
        $("#submit").prop('disabled', false);
      }
    });

    $("#PROVINCE_CODE").change(function() {
      var amphur_name = [];
      $.post("../select_p_a_d.php",
      {
        PROVINCE_CODE: $(this).val(),
      },function(r) {
        amphur_name = JSON.parse(r);
        // alert(amphur_name);
        $('#AMPHUR_CODE').find('option').remove();
        // alert(amphur_name.length);
        for(var i = 0;i< amphur_name.length;i++) {
          $('#AMPHUR_CODE').append($('<option>',
          {
              value: amphur_name[i],
              text : amphur_name[i] 
          }));                     
        }
      });
    });

    $("#AMPHUR_CODE").change(function() {
      var district_name = [];
      $.post("../select_p_a_d.php",
      {
        AMPHUR_CODE: $(this).val(),
      },function(r) {
        district_name = JSON.parse(r);
        // alert(district_name);
        $('#DISTRICT_CODE').find('option').remove();
        // alert(district_name.length);
        for(var i = 0;i< district_name.length;i++) {
          $('#DISTRICT_CODE').append($('<option>',
          {
              value: district_name[i],
              text : district_name[i] 
          }));                     
        }
      });
    });

    $("#DISTRICT_CODE").change(function() {
      var zipcode_name = [];
      $.post("../select_p_a_d.php",
      {
        DISTRICT_CODE: $(this).val(),
      },function(r) {
        zipcode_name = JSON.parse(r);
        // alert(zipcode_name);
        $('#zipcode').find('option').remove();
        // alert(zipcode_name.length);
        for(var i = 0;i< zipcode_name.length;i++) {
          $('#zipcode').append($('<option>',
          {
              value: zipcode_name[i],
              text : zipcode_name[i] 
          }));                     
        }
      });
    });


    function checkID(id){
      if(id.length != 13) return false;
      for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i); 
      if((11-sum%11)%10!=parseFloat(id.charAt(12)))
        return false; 
      return true;
    }
  });
</script>
<?php

function select_DISTRICT($connect) {
    $sql = "select *from district";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_AMPHUR($connect) {
    $sql = "select *from amphur";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_PROVINCE($connect) {
    $sql = "select *from province";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_zipcodes($connect) {
    $sql = "select *from zipcodes";
    $res = mysqli_query($connect, $sql);
    return $res;
}

function select_business($connect) {
    $sql = "select * from business";
    $res = mysqli_query($connect, $sql);
    return $res;
}
?>