<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form đặt tour</title>
</head>
<body>

<h2>Đặt tour du lịch</h2>

<form method="POST">
    <label>Họ tên:</label><br>
    <input type="text" name="hoten" required><br><br>

    <label>Điểm đến:</label><br>
    <input type="text" name="diemden" required><br><br>

    <label>Số người:</label><br>
    <input type="number" name="songuoi" min="1" required><br><br>

    <button type="submit" name="submit">Đặt tour</button>
</form>

<hr>

<?php
if (isset($_POST['submit'])) {
    $hoten = $_POST['hoten'];
    $diemden = $_POST['diemden'];
    $songuoi = $_POST['songuoi'];

    echo "<h3>Thông tin đặt tour:</h3>";
    echo "Họ tên khách hàng: " . htmlspecialchars($hoten) . "<br>";
    echo "Điểm đến: " . htmlspecialchars($diemden) . "<br>";
    echo "Số người: " . htmlspecialchars($songuoi) . "<br>";
}
?>

</body>
</html>