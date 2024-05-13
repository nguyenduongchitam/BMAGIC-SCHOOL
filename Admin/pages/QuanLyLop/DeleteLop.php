<?php
include "../../../Database/Config/config.php";

$maLop = $_GET['maLop'];
$sql = "DELETE FROM LOP WHERE MaLop = '$maLop'";

$result = $mysqli->query($sql);
header("Location: /Admin/index.php?action=QuanLyLop");
