<?php
include "../../../Database/Config/config.php";

if (isset($_GET['MaHocSinh'])) {
    $MaHocSinh = $_GET['MaHocSinh'];

    $sql = $mysqli->prepare("DELETE FROM HocSinh WHERE MaHocSinh = ?");
    $sql->bind_param("s", $MaHocSinh);

    try {
        $sql->execute();
        header("Location: /Admin/index.php?action=TiepNhanHocSinh");
        exit();
    } catch (mysqli_sql_exception $e) {
        echo "<script>
                alert('Không xóa được học sinh. Học sinh đang được phân lớp.');
                window.location.href='/Admin/index.php?action=TiepNhanHocSinh';
              </script>";
    }

    $stmt->close();
}
