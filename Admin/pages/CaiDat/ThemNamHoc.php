<?php 
include "../../../Database/Config/config.php";

if(isset($_POST['submit'])) {
    $nam1 = $_POST['nam1'];
    $nam2 = $nam1 + 1;

    $sql = "INSERT INTO NAMHOC (nam1, nam2) VALUES ('$nam1', '$nam2')";

    $result =$mysqli->query($sql);
    header("Location: http://localhost:3000/Admin/index.php?action=CaiDat");
    exit();
}
?>
