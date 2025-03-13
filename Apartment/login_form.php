<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 20px;
        }
        form {
            display: inline-block;
            text-align: left;
            border: 1px solid #ccc;
            padding: 20px;
            margin-top: 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            padding: 5px;
            margin: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        เลขบัตรประชาชน: <input type="text" name="cm_id"><br>
        รหัสผ่าน: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
    <form action="add_customer_form.php">
        <input type="submit" value="สร้างรหัสผ่านใหม่">
    </form>
</body>
</html>
