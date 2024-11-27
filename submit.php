<?php
$servername = "localhost"; // Thay bằng thông tin của bạn
$username = "root";
$password = "";
$dbname = "attendance_log";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$name = $_POST['name'];
$unit = $_POST['unit'];
$phone = $_POST['phone'];

// Thêm dữ liệu vào bảng
$sql = "INSERT INTO attendance (Tên, Đơn_vị, SĐT) VALUES ('$name', '$unit', '$phone')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?success=true");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
