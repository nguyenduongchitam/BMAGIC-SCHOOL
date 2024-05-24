<?php
$mysqli = new mysqli("localhost", "root", "", "qlhs");

$Search = $_POST['Search'];

if ($Search != "") {
    $sql = "select hocsinh.MaHocSinh,TenHocSinh, GioiTinh, NgaySinh, DiaChi, Email, Status from hocsinh where TenHocSinh like '%" . $Search . "%' and Status = 'Mới'";
    $rs = $mysqli->query($sql);
    $ind = 0;
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_row()) {
            $ind++;
            $phpdate = strtotime($row[3]);
            $mysqldate = date('Y', $phpdate);
            echo "<tr val='$row[0]' class='row_hs'>
                    <td> <input type='checkbox' id='select_checkbox' val='$row[0]'></td>
                    <td class='STT' style='text-align: center;'>$ind</td>
                    <td class='Ho_va_Ten' style='text-align: center;'>$row[1]</td>
                    <td class='Gioi_tinh' style='text-align: center;'>$row[2]</td>
                    <td class='Nam_sinh' style='text-align: center;'>$mysqldate</td>
                    <td class='Dia_chi' style='text-align: center;'>$row[4]</td>
                    <td class='Email' style='text-align: center;'>$row[5]</td>
                    <td class='Status' style='text-align: center;'>$row[6]</td>
                </tr>";
        }
    } else {
        echo "-1";
    }
}else{
    $sql = "select hocsinh.MaHocSinh,TenHocSinh, GioiTinh, NgaySinh, DiaChi, Email, Status from hocsinh where Status = 'Mới'";
    $rs = $mysqli->query($sql);
    $ind = 0;
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_row()) {
            $ind++;
            $phpdate = strtotime($row[3]);
            $mysqldate = date('Y', $phpdate);
            echo "<tr val='$row[0]' class='row_hs'>
                    <td> <input type='checkbox' id='select_checkbox' val='$row[0]'></td>
                    <td class='STT' style='text-align: center;'>$ind</td>
                    <td class='Ho_va_Ten' style='text-align: center;'>$row[1]</td>
                    <td class='Gioi_tinh' style='text-align: center;'>$row[2]</td>
                    <td class='Nam_sinh' style='text-align: center;'>$mysqldate</td>
                    <td class='Dia_chi' style='text-align: center;'>$row[4]</td>
                    <td class='Email' style='text-align: center;'>$row[5]</td>
                    <td class='Status' style='text-align: center;'>$row[6]</td>
                </tr>";
        }
    } else {
        echo "-1";
    }
}
