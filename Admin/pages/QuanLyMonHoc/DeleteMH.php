<?php
    include "../../../Database/Config/config.php";

    if (isset($_GET['MaMonHoc'])) {
        $MaMonHoc = $_GET['MaMonHoc'];
        $sql = "DELETE FROM MONHOC WHERE MaMonHoc = '$MaMonHoc'";

        if ($mysqli->query($sql) === TRUE) {
            header("Location: /Admin/index.php?action=QuanLyMonHoc");
        } else {
            echo "<script>
                    alert('Không xóa được môn học. Môn học đang được sử dụng.');
                    window.location.href='/Admin/index.php?action=QuanLyMonHoc';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Mã môn học không hợp lệ.');
                window.location.href='/Admin/index.php?action=QuanLyMonHoc';
              </script>";
    }
?>
