<?php
     include "../../../Database/Config/config.php";

     
     $MaMonHoc = $_GET['MaMonHoc'] ;
     $MaLopHoc = $_GET['MaLopHoc'] ;
     $MaHocKy =  $_GET['MaHocKy'] ;
     $NienKhoa = $_GET['NienKhoa'];
 
     $sql1 = 'select chitietdanhsachlop.MaCTDSL,chitietdanhsachlop.MaHocSinh from danhsachlop
     join chitietdanhsachlop on chitietdanhsachlop.MaDSL=danhsachlop.MaDSL 
     join namhoc on namhoc.MaNamHoc=danhsachlop.MaNamHoc
     join hocsinh on hocsinh.MaHocSinh=chitietdanhsachlop.MaHocSinh
     join lop on lop.MaLop= danhsachlop.MaLop
     where namhoc.MaNamHoc='.$NienKhoa.' and lop.MaLop='.$MaLopHoc.' ';
 
     $result1 = mysqli_query($mysqli, $sql1);
 //vòng lặp lấy mã ctdsl 
     $i=0;
     while ($row1 = mysqli_fetch_assoc($result1)) {
                 
         $sql2 = 'select bangdiemmh.MaBDMH from bangdiem 
    join hocky on bangdiem.MaHocKy=hocky.MaHocKy
    join bangdiemmh on bangdiemmh.MaBD=bangdiem.MaBangDiem
    join monhoc on monhoc.MaMonHoc=bangdiemmh.MaMonHoc
    where bangdiem.MaCTDSL='.$row1["MaCTDSL"].' and hocky.MaHocKy= '.$MaHocKy.'   ';
      $result2 = mysqli_query($mysqli, $sql2);
      
      // Vòng lặp lấy mã bảng điểm thành phần 
         while ($row2 = mysqli_fetch_assoc($result2)) {
             $sqlHoTen = 'select TenHocSinh from hocsinh where MaHocSinh='.$row1["MaHocSinh"]. '';
             $resultHoTen= mysqli_query($mysqli, $sqlHoTen);
             $rowHoTen = mysqli_fetch_assoc($resultHoTen);
          // xử lý cột điểm 15p 
             $sql15p = 'select bangdiemthanhphan.ketqua from bangdiemthanhphan
             ,loaikiemtra where bangdiemthanhphan.MaLKT=loaikiemtra.MaLKT
             and bangdiemthanhphan.MaBDMH = '.$row2['MaBDMH'].' and loaikiemtra.TenLoaiKiemTra="Kiểm tra 15 phút" ';
 
             $result15p = mysqli_query($mysqli, $sql15p);
             while ( $row15p = mysqli_fetch_assoc($result15p)) {
             $Kiemtra15p[] =$row15p['ketqua'];
             }
          // Xử lý cột điểm 1 tiết 
             $sql1tiet = 'select bangdiemthanhphan.ketqua from bangdiemthanhphan
             ,loaikiemtra where bangdiemthanhphan.MaLKT=loaikiemtra.MaLKT
             and bangdiemthanhphan.MaBDMH = '.$row2['MaBDMH'].' and loaikiemtra.TenLoaiKiemTra="Kiểm tra 1 tiết" ';
 
             $result1tiet= mysqli_query($mysqli, $sql1tiet);
             while ( $row1tiet = mysqli_fetch_assoc($result1tiet)) {
             $Kiemtra1tiet[] =$row1tiet['ketqua'];
             }
 
         // Xử lý cột điểm học kỳ 
 
         $sqlhocky = 'select bangdiemthanhphan.ketqua from bangdiemthanhphan
         ,loaikiemtra where bangdiemthanhphan.MaLKT=loaikiemtra.MaLKT
         and bangdiemthanhphan.MaBDMH = '.$row2['MaBDMH'].' and loaikiemtra.TenLoaiKiemTra="Kiểm tra học kỳ" ';
     $resulthocky= mysqli_query($mysqli, $sqlhocky);
     
     // Kiểm tra xem truy vấn có kết quả hay không
     if ($resulthocky) {
         $rowhocky = mysqli_fetch_assoc($resulthocky);
         $Kiemtrahocky = $rowhocky ? $rowhocky['ketqua'] : null;
     } else {
         $Kiemtrahocky = null; // hoặc giá trị mặc định khác phù hợp
     }
     
         $data[$i] = [
             'TenHocSinh' => $rowHoTen['TenHocSinh'],
             'KiemTra15p' => $Kiemtra15p,
             'KiemTra1tiet' => $Kiemtra1tiet,
             'KiemTraHocKy' =>  $Kiemtrahocky
         ];
     
         unset($Kiemtra15p);
         unset($Kiemtra1tiet);
         unset($Kiemtrahocky);
     }
     $i++;   
     }
     echo json_encode($data);
?>