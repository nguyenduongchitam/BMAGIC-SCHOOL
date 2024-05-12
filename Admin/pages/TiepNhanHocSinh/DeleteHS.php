<?php
include "../../../Database/Config/config.php";

$MaHocSinh = $_GET['MaHocSinh'];
$sql = "DELETE FROM HocSinh WHERE MaHocSinh = '$MaHocSinh'";

$result = $mysqli->query($sql);
header("Location: /Admin/index.php?action=TiepNhanHocSinh");
