<?php
include "../../../Database/Config/config.php";

if (isset($_POST['submit'])) {
    $tenLop = $_POST['tenLop'];
    $tenKhoi = $_POST['tenKhoi'];

    $sql = "Select MAKHOI FROM KHOILOP WHERE TENKHOI = '$tenKhoi' ";
    $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $maKhoi = $row['MAKHOI'];
    }

    $sql1 = "INSERT INTO LOP (TenLop, MaKhoi) VALUES ('$tenLop', '$maKhoi')";
    $mysqli->query($sql1);

    header("Location: /Admin/index.php?action=QuanLyLop");
    exit; // It's a good practice to include an exit after redirection
}
