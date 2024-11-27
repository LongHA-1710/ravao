<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance_log";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nếu có yêu cầu xóa
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM attendance WHERE ID = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Xóa dữ liệu thành công!');</script>";
    } else {
        echo "<script>alert('Xóa dữ liệu thất bại: " . $conn->error . "');</script>";
    }
}

// Lấy dữ liệu từ bảng
$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Dữ Liệu</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4f4f4;
        }
        button {
            padding: 5px 10px;
            background-color: #FF4C4C;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #cc0000;
        }
        .logo {
    position: fixed;
    top: 10px;
    left: 10px;
    width: 70px; /* Kích thước nhỏ gọn hơn */
    height: 70px;
    cursor: pointer;
    z-index: 1000; /* Đảm bảo logo luôn hiển thị trên các phần tử khác */
}
.logo img {
    width: 100%;
    height: auto;
    border-radius: 50%; /* Bo tròn logo nếu cần */
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3); /* Thêm hiệu ứng bóng nhẹ */
}
    </style>
</head>
<body>
    <!-- Logo quay về index -->
    <div class="logo">
        <a href="index.php">
            <img src="logo.png" alt="Logo">
        </a>
    </div>
    <h2 style="text-align: center;">Dữ Liệu Đã Nhập</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Đơn vị</th>
            <th>SĐT</th>
            <th>Ngày giờ vào</th>
            <th>Ngày giờ ra</th>
            <th>Hành động</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['Tên']}</td>
                        <td>{$row['Đơn_vị']}</td>
                        <td>{$row['SĐT']}</td>
                        <td>{$row['Ngày_giờ_vào']}</td>
                        <td>{$row['Ngày_giờ_ra']}</td>
                        <td>
                            <form method='GET' style='display:inline;'>
                                <button type='submit' name='delete_id' value='{$row['ID']}' onclick=\"return confirm('Bạn có chắc chắn muốn xóa không?');\">Xóa</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php $conn->close(); ?>
