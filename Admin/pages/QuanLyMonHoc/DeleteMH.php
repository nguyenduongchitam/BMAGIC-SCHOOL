<?php
    include "../../../Database/Config/config.php";

    $MaMonHoc = $_GET['MaMonHoc'];
    $sql = "DELETE FROM MONHOC WHERE MaMonHoc = '$MaMonHoc'";
    $result = $mysqli->query($sql);
    header("Location: /Admin/index.php?action=QuanLyMonHoc");
?>