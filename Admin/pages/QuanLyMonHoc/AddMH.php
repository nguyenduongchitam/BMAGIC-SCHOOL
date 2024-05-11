<?php 
include "../../../Database/Config/config.php";

if(isset($_POST['submit'])) {
    $tenMonHoc = $_POST['tenMonHoc'];
    $diemDat = $_POST['diemDat'];

    $sql = "INSERT INTO MONHOC (TenMonHoc, DiemDat) VALUES ('$tenMonHoc', '$diemDat')";
    $mysqli->query($sql);

    header("Location: /Admin/index.php?action=QuanLyMonHoc");
    exit; // It's a good practice to include an exit after redirection
}
?>
