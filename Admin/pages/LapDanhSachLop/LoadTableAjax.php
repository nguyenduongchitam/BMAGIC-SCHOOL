<?php
// echo "xcv asdf xcv";
$mysqli = new mysqli("localhost", "root", "", "qlhs");

$namhoc = $_POST['namhoc'];
$lop = $_POST['lop'];

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
