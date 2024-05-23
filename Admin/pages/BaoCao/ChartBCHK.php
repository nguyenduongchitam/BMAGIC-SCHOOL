<?php
include "../../../Database/Config/config.php";

$HocKy = $_POST['HocKy'];
$NamHoc = $_POST['NamHoc'];

$sql = "
    SELECT distinct lop.TenLop, bc_tkhk.SoLuongDat, bc_tkhk.TiLe, danhsachlop.SiSo
    FROM bc_tkhk, danhsachlop, lop
    WHERE bc_tkhk.MAHOCKY = '$HocKy' AND
          danhsachlop.MANAMHOC = '$NamHoc' AND
          danhsachlop.MADSL = bc_tkhk.MADSL and
          danhsachlop.MALOP = lop.MaLop
";

// Thực thi truy vấn SQL
$result = $mysqli->query($sql);

$data = [];
$stt = 0;
if ($result !== false) {
    while ($row = $result->fetch_assoc()) {
        $stt++;
        $data[] = [
            'STT' => $stt,
            'TenLop' => $row['TenLop'],
            'SiSo' => $row['SiSo'],
            'SoLuongDat' => $row['SoLuongDat'],
            'TiLe' => $row['TiLe']
        ];
    }
}

echo json_encode($data);
?>
