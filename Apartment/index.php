<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment</title>
</head>
<body>
    <h1>หน้าหลัก</h1>
    <ul>
    <h4>Room Index</h4>
    <li><a href="view_room.php">ดูข้อมูลห้อง</a></li>
    <h4>Contract Index</h4>
    <li><a href="contract.php">ใบสัญญา</a></li>
    <h4>receipt index</h4>
    <li><a href="receipt.php">ใบเสร็จ</a></li>
    </ul>
</body>
</html>
<?php

include 'db_connect.php'; // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ามีการ login เข้าสู่ระบบมาหรือยัง
session_start();

if (!isset($_SESSION['cm_id'])) {
    // ถ้ายังไม่ได้ login ให้ redirect ไปที่หน้า login_form.php
    header("Location: login_form.php");
    exit();
}

$cm_id = $_SESSION['cm_id'];
// สร้างคำสั่ง SQL เพื่อดึงข้อมูลชื่อของลูกค้า
$sql = "SELECT cm_name FROM customer WHERE cm_id = '$cm_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cm_name = $row['cm_name'];
} else {
    $cm_name = "Unknown";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>หน้าหลัก</title>
</head>
<body>
    <h2>ยินดีต้อนรับ, <?php echo $cm_name; ?></h2>
    <p>นี่คือหน้าหลัก</p>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>

