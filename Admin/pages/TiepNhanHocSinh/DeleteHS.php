<?php
include "../../../Database/Config/config.php";

if (isset($_GET['MaHocSinh'])) {
    $MaHocSinh = $_GET['MaHocSinh'];

    $sql = "SELECT HocSinh.status as trangthai FROM HocSinh WHERE MaHocSinh = '$MaHocSinh'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    if ($row['trangthai'] == 'Mới') {
        $sql1 = "DELETE FROM HocSinh WHERE MaHocSinh = '$MaHocSinh'";
        $mysqli->query($sql1);
        echo "<script>
        alert('Xóa thành công');
        window.location.href='http://localhost:3000/BMAGIC-SCHOOL/Admin/index.php?action=TiepNhanHocSinh';
        </script>";
    } else {
        echo "<script>
            alert('Không xóa được học sinh. Học sinh đã được phân lớp.');
            window.location.href='http://localhost:3000/BMAGIC-SCHOOL/Admin/index.php?action=TiepNhanHocSinh';
          </script>";
    }
}