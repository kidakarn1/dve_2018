<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>นำเข้าข้อมูลสาขางาน</title>
        <script src="../js/jquery.js"></script>
    </head>
    <body>
        <?php include '../menu2.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="col-sm-12">
                    <h3 class="page-header" style="color: red;"><i style="color: red;" class="fa fa-calendar"></i><b>นำเข้าข้อมูลสาขางาน</b></h3>
                </div>
                <form action="add_minor.php" method="post" enctype="multipart/form-data">
				  <div class=" col-sm-5">
                    <table border="1" align="center"class="table">
                        <tr><td>กรุณาเลือกไฟล์ .CSV เพื่อนำเข้า  <b>"ข้อมูลสาขางาน"</b></font></td></tr>
                        <tr><td width="400"height="50">
                                <input name="fileCSV" type="file" id="fileCSV">
                            </td></tr>
                        <tr><td>
                        <center><input name="btnSubmit" type="submit" id="btnSubmit" value="Submit"></center>
                        </td></tr>
                    </table></div>
                </form>
            </section>
        </section>
    </body>
</html>

<script>
    $(document).ready(function () {

        $("#btnSubmit").click(function () {
            $("body").load("pageLoad.php");
        });

    });
</script>