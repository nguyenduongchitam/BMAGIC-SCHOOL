<?php
include "../../../Database/Config/config.php";

$namHoc = $_POST['namHoc'];

$sql = "
    SELECT Distinct HS.TenHocSinh, L.TenLop, D.MACTDSL
    FROM HOCSINH HS, LOP L, BANGDIEM D, CHITIETDANHSACHLOP CTDSL, DANHSACHLOP DS
    WHERE DS.MANAMHOC = '$namHoc' AND
          DS.MALOP = L.MALOP AND
          CTDSL.MADSL = DS.MADSL AND
          CTDSL.MAHOCSINH = HS.MAHOCSINH AND
          D.MACTDSL = CTDSL.MACTDSL
        ";
$result = $mysqli->query($sql);
$stt = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stt++;

        // Query for DTBHK1
        $sqlDiemhk1 = "SELECT DTBHK FROM BANGDIEM WHERE MACTDSL = " . $row['MACTDSL'] . " AND MAHOCKY = 1";
        $resultDiemhk1 = $mysqli->query($sqlDiemhk1);
        if ($resultDiemhk1) {
            $rowDiemhk1 = $resultDiemhk1->fetch_assoc();
            $DTBHK1 = $rowDiemhk1['DTBHK'];
        } else {
            $DTBHK1 = "N/A";
        }

        // Query for DTBHK2
        $sqlDiemhk2 = "SELECT DTBHK FROM BANGDIEM WHERE MACTDSL = " . $row['MACTDSL'] . " AND MAHOCKY = 2";
        $resultDiemhk2 = $mysqli->query($sqlDiemhk2);
        if ($resultDiemhk2) {
            $rowDiemhk2 = $resultDiemhk2->fetch_assoc();
            $DTBHK2 = $rowDiemhk2['DTBHK'];
        } else {
            $DTBHK2 = "N/A";
        }

        echo '<tr>
                <td class="text-center">' . $stt . '</td>
                <td>' . $row['TenHocSinh'] . '</td>
                <td class="text-center">' . $row['TenLop'] . '</td>
                <td class="text-center">' . $DTBHK1 . '</td>
                <td class="text-center">' . $DTBHK2 . '</td>
              </tr>';
    }
} else {
    echo '<tr><td colspan="5">Không có dữ liệu.</td></tr>';
}
