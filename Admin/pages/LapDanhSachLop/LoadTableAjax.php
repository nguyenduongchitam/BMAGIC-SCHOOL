<?php
// echo "xcv asdf xcv";
$mysqli = new mysqli("localhost","root","","hocsinhphothong");

$namhoc = $_POST['namhoc'];
$lop = $_POST['lop'];

// $sql = "select chitietdanhsachlop.MaCTDSL,TenHocSinh, GioiTinh, NgaySinh, DiaChi, Email from hocsinh, chitietdanhsachlop, danhsachlop WHERE danhsachlop.MaDSL = chitietdanhsachlop.MaDSL and chitietdanhsachlop.MaHocSinh = hocsinh.MaHocSinh and MaNamHoc = '" . $namhoc . "' and Malop = '" . $lop . "'";
// $rs = $mysqli->query($sql);
// $ind = 0;
// if ($rs->num_rows > 0) {
//     while ($row = $rs->fetch_row()) {
//         $ind++;
//         $phpdate = strtotime($row[3]);
//         $mysqldate = date('Y', $phpdate);
//         echo "<tr val='$row[0]'>
//                     <td class='STT' style='text-align: center;'>$ind</td>
//                     <td class='Ho_va_Ten' style='text-align: center;'>$row[1]</td>
//                     <td class='Gioi_tinh' style='text-align: center;'>$row[2]</td>
//                     <td class='Nam_sinh' style='text-align: center;'>$mysqldate</td>
//                     <td class='Dia_chi' style='text-align: center;'>$row[4]</td>
//                     <td style='text-align: center;'>
//                         <button style='background-color:transparent; border-width: 0;' class='btn_ChiTiet' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>
//                             <i class='bx bxs-edit'></i>
//                         </button>
//                     </td>
//                 </tr>";
//     }
// } else {
//     echo "-1";
// }


$sql1 = "select chitietdanhsachlop.MaCTDSL, TenHocSinh, GioiTinh, NgaySinh, DiaChi, Email, hocsinh.MaHocSinh, Status from hocsinh, chitietdanhsachlop, danhsachlop WHERE danhsachlop.MaDSL = chitietdanhsachlop.MaDSL and chitietdanhsachlop.MaHocSinh = hocsinh.MaHocSinh and MaNamHoc = '" . $namhoc . "' and Malop = '" . $lop . "'";
$data = mysqli_query($mysqli, $sql1);

$result = array();



while ($row1 = mysqli_fetch_assoc($data)) {
    // $sql = "Select MaDSL from danhsachlop where MaNamHoc = '" . $namhoc . "' and MaLop = '" . $lop . "' LIMIT 1";
    // $rs = $mysqli->query($sql);
    // $row = $rs->fetch_assoc();
    // $MaDSL = $row['MaDSL'];

    $result[] = ($row1);
    
    // if($row1['Status'] == $MaDSL){
    //     $row1['Status'] = "";
    //     $result[] = ($row1);
    // }elseif($row1['Status'] == "" || $row1['Status'] == "Nghỉ học"){
    //     $result[] = ($row1);
    // }else{
    //     continue;
    // }

}


echo json_encode($result);



// for ($i = 0; $i < 3; $i++){
//     echo "<tr>
//             <td id='STT'>1</td>
//             <td id='Ho_va_Ten'>Nguyễn Thị Thúy Hằng</td>
//             <td id='Gioi_tinh'>Nam</td>
//             <td id='Nam_sinh'>2003</td>
//             <td id='Dia_chi'>10 ádf xcvas á</td>
//             <td>
//                 <button style='background-color:transparent; border-width: 0;' id='btn_ChiTiet' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#myModal'>
//                     <i class='bx bxs-edit'></i>
//                 </button>
//             </td>
//         </tr>";
// }
