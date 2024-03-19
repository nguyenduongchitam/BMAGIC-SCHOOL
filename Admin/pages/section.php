<section>
<?php
//Lấy thông tin trang cần tìm
if(isset($_GET['action'])){
    $action=$_GET['action'];
}
else 
{
    $action='';
}

//chọn trang web cần xử lý
if( $action=='BaoCao')
    {
        include("pages/BaoCao/BaoCao.php");
    }
else if ( $action=='ChiTietLop')
    {
        include("pages/ChiTietLop/ChiTietLop.php");
    }
    else if ( $action=='LapDanhSachLop')
    {
        include("pages/LapDanhSachLop/LapDanhSachLop.php");
    }
    else if ( $action=='ChiTietLop')
    {
        include("pages/QuanLyMonHoc/QuanLyMonHoc.php");
    }
    else if ( $action=='TiepNhanHocSinh')
    {
        include("pages/TiepNhanHocSinh/TiepNhanHocSinh.php");
    }
 else  include("pages/DashBoard.php")
?>
</section>