<?php 
include "../../../Database/Config/config.php";
require '../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Polyfill\Php72\Php72;

if (isset($_POST['Send']))
{

$file = $_FILES['file']['tmp_name'];


    $obj = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    $data= $obj->getActiveSheet()->toArray();
    $first_row = true;
    foreach($data as $row)
    {      
      if ($first_row) {
      $first_row = false;
      continue; // Bỏ qua dòng đầu tiên (tiêu đề)
      }

        $TenHocSinh = $row['0'];
        $NgaySinh= $row['1'];
        $GioiTinh= $row['2'];
        $DiaChi= $row['3'];
        $Email= $row['4'];
        $status = $row['5'];
        $sql_add = "INSERT INTO `hocsinh`(`TenHocSinh`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `status`) VALUES ('$TenHocSinh','$NgaySinh','$GioiTinh','$DiaChi','$Email','Mới')";
       $insert =  mysqli_query($mysqli,$sql_add);
    }
 }
 header('Location:http://localhost:3000/BMAGIC-SCHOOL/Admin/index.php?action=TiepNhanHocSinh');
?>