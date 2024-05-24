<?php
include "../../../Database/Config/config.php";

if (isset($_GET['MaLop'])) {
    $MaLop = $_GET['MaLop'];

    $sql = $mysqli->prepare("DELETE FROM LOP WHERE MaLop = ?");
    $sql->bind_param("s", $MaLop);

    try {
        $sql->execute();
        header("Location: http://localhost:3000/Admin/index.php?action=QuanLyLop");
        exit();
    } catch (mysqli_sql_exception $e) {
        echo "<script>
                alert('Không xóa được lớp học. Lớp học đang có học sinh.');
                window.location.href='http://localhost:3000/Admin/index.php?action=QuanLyLop';
              </script>";
    }

    $stmt->close();
}
