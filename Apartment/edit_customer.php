<!DOCTYPE html>
<html>
<head>
    <title>แก้ไขข้อมูลลูกค้า</title>
</head>
<body>
    <h1>ข้อมูลลูกค้า</h1>
    <?php
    include 'db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        // รับค่าจากฟอร์มแก้ไข
        $cm_id = $_POST['cm_id'];
        $cm_name = $_POST['cm_name'];
        $cm_tel = $_POST['cm_tel'];
        $address = $_POST['address'];
        $password = $_POST['password'];

        // อัปเดตข้อมูล
        $sql = "UPDATE customer SET cm_name='$cm_name', cm_tel='$cm_tel', address='$address', password='$password' WHERE cm_id='$cm_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        // รับค่าจากฟอร์มลบ
        $cm_id = $_POST['cm_id'];

        // ลบข้อมูล
        $sql = "DELETE FROM customer WHERE cm_id='$cm_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }

    $sql = "SELECT cm_id, cm_name, cm_tel, address, password FROM customer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <form method='post'>
            <input type='hidden' name='cm_id' value='" . $row["cm_id"] . "'>
            <td>" . $row["cm_id"]. "</td>
            <td><input type='text' name='cm_name' value='" . $row["cm_name"] . "'></td>
            <td><input type='text' name='cm_tel' value='" . $row["cm_tel"] . "'></td>
            <td><input type='text' name='address' value='" . $row["address"] . "'></td>
            <td><input type='text' name='password' value='" . $row["password"] . "'></td>
            <td>
                <input type='submit' name='update' value='Update'>
                <input type='submit' name='delete' value='Delete'>
            </td>
            </form>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "no user";
    }

    $conn->close();
    ?>
    <br>
    <a href="admin.php">ย้อนกลับไปที่หน้าหลัก</a>
</body>
</html>
