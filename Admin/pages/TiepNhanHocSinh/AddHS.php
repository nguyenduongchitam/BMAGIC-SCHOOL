<?php
include "../../../Database/Config/config.php";

if (isset($_POST['submit'])) {

    $tenHocSinh = $_POST['tenHocSinh'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $diaChi = $_POST['diaChi'];
    $email = $_POST['email'];

    $sql = "UPDATE HOCSINH 
            SET TenHocSinh='$tenHocSinh', NgaySinh='$ngaySinh', GioiTinh='$gioiTinh', DiaChi='$diaChi', Email='$email' 
            WHERE MaHocSinh='$maHocSinhS'";
    $mysqli->query($sql);


    $sql = "INSERT INTO HOCSINH VALUES ('$tenHocSinh', '$ngaySinh', '$gioiTinh', '$diaChi', '$email','Mới')";
    $mysqli->query($sql);

    header("Location: http://localhost:3000/BMAGIC-SCHOOL/Admin/index.php?action=TiepNhanHocSinh");
    exit; // It's a good practice to include an exit after redirection
}
