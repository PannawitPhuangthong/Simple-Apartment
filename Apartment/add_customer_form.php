<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มข้อมูลลูกค้า</title>
    <style>
        /* กำหนดสไตล์ให้กับลิงก์ */
        .button-like {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        /* สร้างเอฟเฟกต์เมื่อโฮเวอร์ */
        .button-like:hover {
            background-color: #0056b3;
        }

        /* สร้างเอฟเฟกต์เมื่อกด */
        .button-like:active {
            background-color: #0056b3;
            transform: translateY(1px);
        }

        /* กำหนดสไตล์ให้กับปุ่ม Submit */
        input[type="submit"] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        /* สร้างเอฟเฟกต์เมื่อโฮเวอร์ */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* สร้างเอฟเฟกต์เมื่อกด */
        input[type="submit"]:active {
            background-color: #0056b3;
            transform: translateY(1px);
        }
    </style>
</head>
<body>
    <h2>เพิ่มข้อมูลลูกค้า</h2>
    <form method="post" action="add_customer.php">
        เลขบัตรประชาชน: <input type="text" name="cm_id"><br>
        ชื่อนามสกุล: <input type="text" name="cm_name"><br>
        เบอร์โทร: <input type="text" name="cm_tel"><br>
        ที่อยู่: <input type="text" name="address"><br>
        รหัสผ่าน: <input type="password" name="password"><br>
        <input type="submit" value="ตกลง">
    </form>
    <br>
    <a href="login_form.php" class="button-like">กลับไปยังหน้า Login</a>
</body>
</html>
