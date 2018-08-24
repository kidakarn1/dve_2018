
<?php 
  include("connect/conn.php");
  $sql = "select * from business";
  $res_business = mysqli_query($conn, $sql);
?>
<input id="business_id" list="browsers" class="form-control" name="business_id">

<datalist id="browsers">
  <?php while ($row_business = mysqli_fetch_assoc($res_business)) { ?>
      <option class="browsers" data-value="<?php echo $row_business['business_id']; ?>"
      value="<?php echo $row_business['business_name']; ?>"
      ></option>
  <?php } ?>
</datalist>
<script src="../js/jquery.js"></script>
<script src="js/jquery.js"></script>
<script>
  $(document).ready(function () {
    var dataBus = {}
    $("#browsers").find("option").each(function() {
      // alert($(this).attr("data-value"))
      dataBus[$(this).attr("value")] = $(this).attr("data-value")
    });
    $("#submit").click(function(){
      // alert(dataBus[$("#business_id").val()])
      $("#business_id").val(dataBus[$("#business_id").val()])
    });
  });
</script>