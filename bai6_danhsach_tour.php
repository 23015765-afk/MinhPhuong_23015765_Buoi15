<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách tour và đặt tour</title>

    <style>
        table{
            border-collapse: collapse;
            width: 80%;
            margin-bottom: 20px;
        }

        th, td{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th{
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>PHẦN 1. DANH SÁCH TOUR</h2>

<?php

// Mảng hai chiều chứa danh sách tour
$tours = [
    [
        "matour" => "T01",
        "tentour" => "Tour Đà Nẵng",
        "diemden" => "Đà Nẵng",
        "giatour" => 3500000,
        "songay" => 3
    ],

    [
        "matour" => "T02",
        "tentour" => "Tour Phú Quốc",
        "diemden" => "Phú Quốc",
        "giatour" => 4500000,
        "songay" => 4
    ],

    [
        "matour" => "T03",
        "tentour" => "Tour Nha Trang",
        "diemden" => "Nha Trang",
        "giatour" => 3000000,
        "songay" => 3
    ],

    [
        "matour" => "T04",
        "tentour" => "Tour Đà Lạt",
        "diemden" => "Đà Lạt",
        "giatour" => 2800000,
        "songay" => 2
    ]
];

?>

<table>
    <tr>
        <th>Mã tour</th>
        <th>Tên tour</th>
        <th>Điểm đến</th>
        <th>Giá tour</th>
        <th>Số ngày</th>
    </tr>

    <?php
    foreach($tours as $tour){
        echo "<tr>";
        echo "<td>".$tour['matour']."</td>";
        echo "<td>".$tour['tentour']."</td>";
        echo "<td>".$tour['diemden']."</td>";
        echo "<td>".number_format($tour['giatour'])." VNĐ</td>";
        echo "<td>".$tour['songay']." ngày</td>";
        echo "</tr>";
    }
    ?>
</table>

<hr>

<h2>PHẦN 2. FORM ĐẶT TOUR</h2>

<form method="POST">

    <label>Họ tên:</label><br>
    <input type="text" name="hoten"><br><br>

    <label>Chọn mã tour:</label><br>
    <select name="matour">
        <option value="">-- Chọn tour --</option>

        <?php
        foreach($tours as $tour){
            echo "<option value='".$tour['matour']."'>".$tour['matour']." - ".$tour['tentour']."</option>";
        }
        ?>

    </select><br><br>

    <label>Số người:</label><br>
    <input type="number" name="songuoi"><br><br>

    <button type="submit" name="submit">Đặt tour</button>

</form>

<hr>

<?php

if(isset($_POST['submit'])){

    $hoten = trim($_POST['hoten']);
    $matour = $_POST['matour'];
    $songuoi = $_POST['songuoi'];

    $loi = "";

    // Kiểm tra họ tên
    if($hoten == ""){
        $loi .= "Họ tên không được rỗng<br>";
    }

    // Kiểm tra số người
    if(!is_numeric($songuoi) || $songuoi <= 0){
        $loi .= "Số người phải lớn hơn 0<br>";
    }

    // Tìm tour theo mã
    $tourchon = null;

    foreach($tours as $tour){
        if($tour['matour'] == $matour){
            $tourchon = $tour;
            break;
        }
    }

    // Kiểm tra mã tour hợp lệ
    if($tourchon == null){
        $loi .= "Mã tour không hợp lệ<br>";
    }

    // Hiển thị lỗi hoặc kết quả
    if($loi != ""){
        echo "<h3>Thông báo lỗi:</h3>";
        echo $loi;
    }
    else{

        $tongtien = $tourchon['giatour'] * $songuoi;

        echo "<h3>THÔNG TIN ĐẶT TOUR</h3>";

        echo "Họ tên khách hàng: ".$hoten."<br>";
        echo "Tên tour: ".$tourchon['tentour']."<br>";
        echo "Điểm đến: ".$tourchon['diemden']."<br>";
        echo "Số người: ".$songuoi."<br>";
        echo "Tổng tiền: ".number_format($tongtien)." VNĐ";
    }
}

?>

</body>
</html>