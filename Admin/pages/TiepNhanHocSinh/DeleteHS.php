<?php
include "../../../Database/Config/config.php";

if (isset($_GET['MaHocSinh'])) {
    $MaHocSinh = $_GET['MaHocSinh'];

    $sql = "DELETE FROM HocSinh WHERE MaHocSinh = '$MaHocSinh'";

    if ($mysqli->query($sql) === TRUE) {
        echo "Xóa thành công";
    } else {
        echo "Xóa thất bại";
    }
}
