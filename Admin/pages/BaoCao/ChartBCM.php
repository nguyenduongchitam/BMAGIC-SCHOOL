<?php
// Bắt đầu kết nối cơ sở dữ liệu và lấy dữ liệu
include "../../../Database/Config/config.php";

$MonHoc = $_POST['MonHoc'];
$HocKy = $_POST['HocKy'];
$NamHoc = $_POST['NamHoc'];

// Fetch DiemDat for the specific subject
$sqlDD = "SELECT * FROM MONHOC WHERE MAMONHOC = '$MonHoc'";
$resultDD = $mysqli->query($sqlDD);
$rowDD = $resultDD->fetch_assoc();
$DiemDat = $rowDD["DiemDat"];

$sql = "
SELECT 
    danhsachlop.malop,
    danhsachlop.siso,
    lop.tenlop,
    COUNT(CASE WHEN bangdiemmh.dtbmh >= $DiemDat THEN 1 END) AS soluongdat,
    COUNT(*) AS tonghocsinh,
    COUNT(CASE WHEN bangdiemmh.dtbmh >= $DiemDat THEN 1 END) / COUNT(*) * 100 AS tile
FROM 
    bangdiemmh
JOIN 
    bangdiem ON bangdiemmh.mabd = bangdiem.mabangdiem
JOIN 
    chitietdanhsachlop ON bangdiem.mactdsl = chitietdanhsachlop.mactdsl
JOIN 
    danhsachlop ON chitietdanhsachlop.madsl = danhsachlop.madsl
JOIN 
    lop ON lop.malop = danhsachlop.malop
WHERE 
    bangdiemmh.mamonhoc = '$MonHoc' AND
    bangdiem.mahocky = '$HocKy' AND
    danhsachlop.manamhoc = '$NamHoc'
GROUP BY 
    danhsachlop.malop
";

$result = $mysqli->query($sql);

$stt = 0;
$data = [];
if ($result !== false) {
    while ($row = $result->fetch_assoc()) {
        $stt++;
        // Calculate percentage with proper rounding
        $tile = round(($row['soluongdat'] / $row['tonghocsinh']) * 100, 2);
        $data[] = [
            'STT' => $stt,
            'TenLop' => $row['tenlop'],
            'SiSo' => $row['siso'],
            'SoLuongDat' => $row['soluongdat'],
            'TiLe' => $tile
        ];
    }
}

echo json_encode($data);
?>
