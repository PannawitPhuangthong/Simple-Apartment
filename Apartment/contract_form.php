<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ข้อมูลสัญญา</title>
</head>
<body>
    <h2>ข้อมูลสัญญา</h2>
    <form method="post" action="connect.php">
        วันที่ทำสัญญา: <input type="date" name="ct_date" value="<?php echo date('Y-m-d'); ?>"><br>
        วันที่เข้าพัก: <input type="date" name="date_in"><br>
        วันที่ออก: <input type="date" name="date_out"><br>
        เลขห้อง: <input type="text" name="rm_id"><br>
        รหัสลูกค้า: <input type="text" name="cm_id"><br>
        <input type="submit" value="ทำสัญญา">
    </form>
</body>
</html>