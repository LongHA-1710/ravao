<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập dữ liệu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            margin: 10px 0;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nhập Dữ Liệu</h2>
        <form action="submit.php" method="POST">
            <input type="text" name="name" placeholder="Tên" required>
            <input type="text" name="unit" placeholder="Đơn vị" required>
            <input type="text" name="phone" placeholder="SĐT" required>
            <button type="submit">Gửi Dữ Liệu</button>
        </form>
        <button onclick="window.location.href='display.php'">Hiển Thị Dữ Liệu</button>
        <div id="alert" class="alert">Dữ liệu đã được lưu!</div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            document.getElementById('alert').style.display = 'block';
            setTimeout(() => document.getElementById('alert').style.display = 'none', 2000);
        }
    </script>
</body>
</html>
