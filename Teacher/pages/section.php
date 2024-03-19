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

//chưa chia role

//chọn trang web cần xử lý
if( $action=='DanhSachHocSinh')
    {
        include("pages/GVCM/DanhSachHocSinhPage.php");
    }
else if ( $action=='SuaDiem')
    {
        include("pages/GVBM/SuaDiemPage.php");
    }
 else  include("pages/DashBoard.php")
?>
</section>