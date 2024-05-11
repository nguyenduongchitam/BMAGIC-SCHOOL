<?php
        if (isset($_POST['submit']) && ($_POST['submit'] == 'Cập nhật')) {

            $maMonHoc = $_POST['maMonHoc'];
            $tenMonHoc = $_POST['tenMonHoc'];
            $diemDat = $_POST['diemDat'];

            $sql = "UPDATE MONHOC SET MaMonHoc='', TenMonHoc='$tenMonHoc', DiemDat='$diemDat' WHERE MaMonHoc='$maMonHoc'";
            $mysqli->query($sql);
        }
        ?>