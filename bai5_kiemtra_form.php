<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra form đặt tour</title>
</head>
<body>

<h2>Form đặt tour du lịch</h2>

<form method="POST">

    <label>Họ tên:</label><br>
    <input type="text" name="hoten"><br><br>

    <label>Số điện thoại:</label><br>
    <input type="text" name="sodienthoai"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Điểm đến:</label><br>
    <select name="diemden">
        <option value="">-- Chọn điểm đến --</option>
        <option value="Đà Nẵng">Đà Nẵng</option>
        <option value="Phú Quốc">Phú Quốc</option>
        <option value="Nha Trang">Nha Trang</option>
    </select><br><br>

    <label>Số người:</label><br>
    <input type="number" name="songuoi"><br><br>

    <button type="submit" name="submit">Đặt tour</button>

</form>

<hr>

<?php

if (isset($_POST['submit'])) {

    $hoten = trim($_POST['hoten']);
    $sodienthoai = trim($_POST['sodienthoai']);
    $email = trim($_POST['email']);
    $diemden = $_POST['diemden'];
    $songuoi = $_POST['songuoi'];

    $loi = "";

    // Kiểm tra họ tên
    if ($hoten == "") {
        $loi .= "Họ tên không được rỗng<br>";
    }

    // Kiểm tra số điện thoại
    if ($sodienthoai == "") {
        $loi .= "Số điện thoại không được rỗng<br>";
    }

    // Kiểm tra email
    if ($email == "") {
        $loi .= "Email không được rỗng<br>";
    }

    // Kiểm tra điểm đến
    if ($diemden == "") {
        $loi .= "Phải chọn điểm đến<br>";
    }

    // Kiểm tra số người
    if (!is_numeric($songuoi) || $songuoi <= 0) {
        $loi .= "Số người phải lớn hơn 0<br>";
    }

    // Hiển thị kết quả
    if ($loi != "") {
        echo "<h3>Thông báo lỗi:</h3>";
        echo $loi;
    } else {
        echo "<h3>Đặt tour thành công</h3>";
    }
}

?>

</body>
</html>