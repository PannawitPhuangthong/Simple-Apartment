<!DOCTYPE html>
<html>
<head>
    <title>ใบเสร็จรับเงิน</title>
</head>
<body>
    <h1>ใบเสร็จรับเงิน</h1>

<?php
include 'db_connect.php';

// กำหนดเลขใบเสร็จ
$invoiceNumber = 1; // เลขใบเสร็จเริ่มต้นเป็น 1

// ค้นหาเลขใบเสร็จสูงสุดในฐานข้อมูลเพื่อกำหนดค่าเริ่มต้นสำหรับใบเสร็จใหม่
$invoiceQuery = "SELECT MAX(invoice_number) AS max_invoice FROM invoices";
$invoiceResult = $conn->query($invoiceQuery);

if ($invoiceResult !== false && $invoiceResult->num_rows > 0) {
    $row = $invoiceResult->fetch_assoc();
    $invoiceNumber = intval($row['max_invoice']) + 1; // เพิ่มเลขใบเสร็จทีละ 1
}

// กำหนดวันที่
date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d"); // วันที่ปัจจุบัน

// ดึงข้อมูลราคาจากฐานข้อมูล
$priceQuery = "SELECT rm_monthprice, rm_dayprice, rm_deposit, additional_price FROM rooms LIMIT 1";
$priceResult = $conn->query($priceQuery);

// เริ่มต้นค่าเริ่มต้นของราคารวม
$totalPrice = 0;

if ($priceResult !== false && $priceResult->num_rows > 0) {
    $row = $priceResult->fetch_assoc();

    // เพิ่มราคาห้องแบบรายเดือนและรายวัน
    $totalPrice += floatval($row['rm_monthprice']);
    $totalPrice += floatval($row['rm_dayprice']);

    // เพิ่มค่ามัดจำจากฐานข้อมูล
    $rm_deposit = floatval($row['rm_deposit']);
    $totalPrice += $rm_deposit;
}

$randomPrice = rand(0, 1) == 0 ? 4500 : 1000;
$totalPrice += $randomPrice;

// แสดงใบเสร็จรับเงิน
echo "หมายเลขใบเสร็จ: " . $invoiceNumber . "<br>";
echo "วันที่: " . $date . "<br>";
echo "ราคารวมที่ต้องจ่าย: ฿" . number_format($totalPrice, 2) . "<br>";

// เพิ่มข้อมูลใบเสร็จลงในฐานข้อมูล
$insertInvoiceQuery = "INSERT INTO invoices (invoice_number, date, total_price) VALUES ('$invoiceNumber', '$date', '$totalPrice')";
$conn->query($insertInvoiceQuery);

// ปิดการเชื่อมต่อกับฐานข้อมูล
$conn->close();

echo "<br><a href='index.php'>กลับไปที่หน้าหลัก</a>";
?>

</body>
</html>
