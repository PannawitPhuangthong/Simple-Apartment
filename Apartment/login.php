<?php
session_start();
include 'db_connect.php';

// ตรวจสอบว่ามีการส่งข้อมูลผ่าน POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cm_id = $_POST['cm_id'];
    $password = $_POST['password'];

    // สร้างคำสั่ง SQL เพื่อตรวจสอบข้อมูลการ login
    $sql = "SELECT * FROM customer WHERE cm_id='$cm_id' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // ถ้าเจอข้อมูลให้สร้าง session และ redirect ไปยังหน้า admin.php หรือ index.php ตามเงื่อนไข
        $_SESSION['cm_id'] = $cm_id;
        if ($cm_id == 1) {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "Login failed. Invalid Customer ID or Password.";
        echo "<script>setTimeout(function(){window.location.href='login_form.php';},2000);</script>";
    }
}

$conn->close();
?>
