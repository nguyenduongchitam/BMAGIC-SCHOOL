<?php
// Bắt đầu kết nối cơ sở dữ liệu và lấy dữ liệu
include "../../../Database/Config/config.php";

$MonHoc = $_POST['MonHoc'];
$HocKy = $_POST['HocKy'];

// Viết truy vấn SQL để lấy dữ liệu từ cơ sở dữ liệu
$sql = "SELECT Lop, SoLuongDat
        FROM TenBang
        WHERE MonHoc = '$MonHoc' AND HocKy = '$HocKy'";
$result = $mysqli->query($sql);

// Tạo mảng để lưu dữ liệu lớp và số lượng đạt
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[$row['Lop']] = $row['SoLuongDat'];
}

// Đóng kết nối cơ sở dữ liệu
$mysqli->close();
?>
