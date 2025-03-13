<!DOCTYPE html>
<html>
<head>
    <title>Admin Apartment</title>
</head>
<body>
    <h1>หน้าหลัก Admin</h1>
    <ul>
        <li><a href="edit_customer.php">แก้ไขข้อมูลลูกค้า</a></li>
        <li><a href="edit_room.php">แก้ไขข้อมูลห้อง</a></li>
        <li><a href="admin_receipt.php">ใบเสร็จ</a></li>
    </ul>
</body>
</html>
<?php

include 'db_connect.php'; // เชื่อมต่อฐานข้อมูล
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
    <title>Home Page</title>
</head>
<body>
    <h2>Welcome, <?php echo $cm_name; ?></h2>
    <p>This is the home page.</p>
    <a href="logout.php">ออกจากระบบ</a>
</body>
</html>
