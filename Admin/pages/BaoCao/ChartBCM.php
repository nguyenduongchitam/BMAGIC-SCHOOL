<?php
// Bắt đầu kết nối cơ sở dữ liệu và lấy dữ liệu
include "../../../Database/Config/config.php";

$MonHoc = $_POST['MonHoc'];
$HocKy = $_POST['HocKy'];
$NamHoc = $_POST['NamHoc'];


$sql = "
    SELECT distinct lop.TenLop, ctbc_tkm.SoLuongDat, ctbc_tkm.TiLe, danhsachlop.SiSo
    FROM ctbc_tkm, bc_tkm, danhsachlop, lop
    WHERE bc_tkm.MAMONHOC = '$MonHoc' AND
          bc_tkm.MAHOCKY = '$HocKy' AND
          bc_tkm.MANAMHOC = '$NamHoc' AND
          danhsachlop.MADSL = ctbc_tkm.MADSL and
          danhsachlop.MALOP = lop.MaLop
";
$result = $mysqli->query($sql);

// Thực thi truy vấn SQL
$result = $mysqli->query($sql);

$data = [];
if ($result !== false) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'TenLop' => $row['TenLop'],
            'SiSo' => $row['SiSo'],
            'TiLe' => $row['TiLe']
        ];
    }
}

echo json_encode($data);
?>
