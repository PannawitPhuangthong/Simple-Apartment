<?php
session_start(); // เริ่ม session
session_destroy(); // ทำลาย session ทั้งหมด

header("Location: login_form.php"); // ส่งกลับไปยังหน้า login_form.php
exit(); // หยุดการทำงานของ script
?>
