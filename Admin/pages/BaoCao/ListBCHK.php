<?php
include "../../../Database/Config/config.php";

$HocKy = $_POST['HocKy'];

$sql = "
    SELECT distinct lop.TenLop, bc_tkhk.SoLuongDat, bc_tkhk.TiLe, danhsachlop.SiSo
    FROM bc_tkhk, danhsachlop, lop
    WHERE bc_tkhk.MAHOCKY = '$HocKy' AND
          danhsachlop.MADSL = bc_tkhk.MADSL and
          danhsachlop.MALOP = lop.MaLop
";

// Thực thi truy vấn SQL
$result = $mysqli->query($sql);

// Kiểm tra xem truy vấn có thành công không
if ($result === false) {
    // Xử lý trường hợp truy vấn không thành công
    echo "Lỗi: " . $mysqli->error;
} else {
    // Truy vấn thành công, tiếp tục xử lý kết quả
    $stt = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $stt++;
            echo '<tr>
                    <td class="text-center">' . $stt . '</td>
                    <td id="TenLop" class="text-center">' . $row['TenLop'] . '</td>
                    <td id="SiSo" class="text-center">' . $row['SiSo'] . '</td>
                    <td id="SoLuongDat" class="text-center">' . $row['SoLuongDat'] . '</td>
                    <td id="TiLe" >' . $row['TiLe'] . '</td>
                  </tr>';
        }
    } else {
        // Nếu không có dữ liệu, in ra thông báo không có dữ liệu
        echo '<tr><td colspan="5">Không có dữ liệu.</td></tr>';
    }
}
?>
