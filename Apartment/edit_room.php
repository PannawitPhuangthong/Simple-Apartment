<!DOCTYPE html>
<html>
<head>
    <title>แก้ไขข้อมูลห้อง</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
        function updateRoomStatus(rmId, rmStatus) {
            $.ajax({
                url: 'update_room_status.php',
                type: 'POST',
                data: {rm_id: rmId, rm_status: rmStatus},
                success: function(response) {
                    // อัปเดตค่าสถานะห้องบนหน้าเว็บ
                    // ตัวอย่างเช่น อัปเดตสถานะของแถวที่มีเลขห้อง rmId
                    $('#rm_status_' + rmId).text(rmStatus);
                    // รีเฟรชหน้าเว็บ
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error updating room status');
                }        
            });
        }
    </script>
</head>
<body>
    <h1>ข้อมูลห้อง</h1>
    <?php
    include 'db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $rm_id = $_POST['rm_id'];
        $rm_status = $_POST['rm_status'];
        $date_in = $_POST['date_in'];
        $date_out = $_POST['date_out'];

        $sql = "UPDATE rooms SET rm_status='$rm_status', date_in='$date_in', date_out='$date_out' WHERE rm_id='$rm_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql = "SELECT rm_id, tr_id, rm_status, rm_details, rm_floors, rm_monthprice, rm_dayprice, date_in, date_out, rm_deposit FROM rooms";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
            <th>เลขห้อง</th>
            <th>ประเภทห้อง</th>
            <th>สถานะห้อง</th>
            <th>รายละเอียดห้อง</th>
            <th>ชั้น</th>
            <th>ราคาต่อเดือน</th>
            <th>ราคาต่อวัน</th>
            <th>วันที่เข้า</th>
            <th>วันที่ออก</th>
            <th>ค่ามัดจำ</th>
            <th>Actions</th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <form method='post'>
            <input type='hidden' name='rm_id' value='" . $row["rm_id"] . "'>
            <td>" . $row["rm_id"] . "</td>
            <td>" . $row["tr_id"] . "</td>
            <td>
                <select name='rm_status'>
                    <option value='ว่าง' " . ($row["rm_status"] == 'ว่าง' ? 'selected' : '') . ">ว่าง</option>
                    <option value='ไม่ว่าง' " . ($row["rm_status"] == 'ไม่ว่าง' ? 'selected' : '') . ">ไม่ว่าง</option>
                </select>
            </td>
            <td>" . $row["rm_details"] . "</td>
            <td>" . $row["rm_floors"] . "</td>
            <td>" . $row["rm_monthprice"] . "</td>
            <td>" . $row["rm_dayprice"] . "</td>
            <td><input type='text' id='date_in_".$row["rm_id"]."' name='date_in' class='datepicker' value='" . $row["date_in"] . "'></td>
            <td><input type='text' id='date_out_".$row["rm_id"]."' name='date_out' class='datepicker' value='" . $row["date_out"] . "'></td>
            <td>" . $row["rm_deposit"] . "</td>
            <td><input type='submit' name='update' value='Update'></td>
            </form>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "no room";
    }

    $conn->close();
    ?>
    <br>
    <a href="admin.php">ย้อนกลับไปที่หน้าหลัก</a>
    
</body>
</html>
