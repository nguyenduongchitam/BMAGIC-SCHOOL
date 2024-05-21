<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bảng điểm môn học</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <!-- AJAX  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
    <!-- Additional DataTables Buttons Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>
</head>
<style>
    .btnThem {
        border-radius: 25px;
        width: 90px;
        height: 40px;
        background-color: transparent;
        margin-left: 80%;
    }

    .btnThem:hover {
        background-color: #1F3BB3;
        color: white;
        border: 2px white;
    }

    /* Định dạng cho biểu hiện viền đỏ và icon tick */
    .error-message {
        color: red;
        font-size: 0.8em;
    }

    .validation-icon {
        margin-left: 5px;
        vertical-align: middle;
        /* Đặt icon ở giữa */
    }

    /* Định dạng màu của nút submit khi không được kích hoạt */
    .btn-Them:disabled {
        background-color: gray;
        cursor: not-allowed;
    }
</style>
<?php
 $sqlNienKhoa="select * from namhoc";
 $resultNienKhoa= mysqli_query($mysqli, $sqlNienKhoa);
?>

<body>
    <section>
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <br>
                            <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">Danh sách Bảng điểm môn học</div>
                            <div class="card-body">
                            <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="nienkhoa">Niên khóa:</label>
            <select id="nienkhoa" name="nienkhoa" class="form-control">
                <option value="">Chọn niên khóa</option>
                <?php while($row= mysqli_fetch_array($resultNienKhoa)) { ?>
                    <option value="<?php echo $row['MaNamHoc'] ?>"><?php echo $row['Nam1'] ?>-<?php echo $row['Nam2'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="lop">Lớp:</label>
            <select id="lop" class="form-control">
                <!-- Các lớp sẽ được cập nhật sau khi chọn niên khóa -->
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="mon">Môn:</label>
            <select id="mon" class="form-control">
                <!-- Các môn sẽ được cập nhật sau khi chọn lớp -->
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="hocKy">Học kỳ:</label>
            <select id="hocKy" class="form-control">
                <!-- Thêm các học kỳ khác nếu cần -->
            </select>
        </div>
    </div>
</div>

                                
                                
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Họ tên</th>
                                                <th class="text-center">Kiểm tra 15 phút</th>
                                                <th class="text-center">Kiểm tra 1 tiết</th>
                                                <th class="text-center">Kiểm tra học kỳ</th>
                                                <th class="text-center">Chỉnh sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th class="text-center">Họ tên</th>
                                                <th class="text-center">Kiểm tra 15 phút</th>
                                                <th class="text-center">Kiểm tra 1 tiết</th>
                                                <th class="text-center">Kiểm tra học kỳ</th>
                                                <th class="text-center">Chỉnh sửa</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Chi tiết bảng điểm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="forms-sample" method="post">
                            <label for="modalHoTen" class="col-sm-3 col-form-label fw-bold pb-2 ">Họ tên</label>
                            <input type="text" class="form-control mb-2" id="modalHoTen" name="HoTen" placeholder="Nguyễn Văn A">

                            <label for="modalKiemTra15p" class="col-sm-3 col-form-label fw-bold pb-2">Kiểm tra 15 phút</label>
                            <input type="text" class="form-control mb-2" id="modalKiemTra15p" name="Kiemtra15p" placeholder="8">
                            <span id="TenMHError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalKiemtra1tiet" class="col-sm-3 col-form-label fw-bold ">Kiểm tra 1 tiết</label>
                            <input type="number" class="form-control mb-2" id="modalKiemtra1tiet" name="Kiemtra1tiet" placeholder="8">
                            <span id="DiemDatError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalKiemtrahocky" class="col-sm-3 col-form-label fw-bold ">Kiểm tra học kỳ</label>
                            <input type="number" class="form-control mb-2" id="modalKiemtrahocky" name="Kiemtrahocky" placeholder="8">
                            <span id="DiemDatError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <input type="submit" class="mt-4 fw-bold btnThem" name="submit" value="Cập nhật" size="50">
                        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle" style="text-align: center;">Chi tiết bảng điểm môn học </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post">
                            <label for="HoTen" class="col-sm-3 col-form-label fw-bold pb-2 ">Họ tên</label>
                            <input type="text" class="form-control mb-2" id="HoTen" name="HoTen" disabled>

                            <label for="modalKiemtra15p" class="col-sm-3 col-form-label fw-bold pb-2">điểm kiểm tra 15 phút </label>
                            <input type="text" class="form-control mb-2" id="15p" name="15p" placeholder="điểm 15 phút">

                            <label for="modalKiemtra1tiet" class="col-sm-3 col-form-label fw-bold pb-2">điểm kiểm tra 1 tiết </label>
                            <input type="text" class="form-control mb-2" id="1tiet" name="1tiet" placeholder="điểm 1 tiết ">

                            <label for="modalKiemtrahocky" class="col-sm-3 col-form-label fw-bold pb-2">điểm kiểm tra học kỳ </label>
                            <input type="text" class="form-control mb-2" id="hocky" name="hocky" placeholder="điểm kiểm tra học ky">
                      
                            <input type="submit" class="mt-4 fw-bold btnThem" name="submit" id="update" value="Cập nhật" size="50">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Sửa
              

                $(document).on('click', '.btn-Sua', function(event) {
                    $('#myModal').modal('show');
                    var row = $(this).closest('tr');
                    var HoTen = row.find('td:eq(0)').text();
                    var Kiemtra15p = row.find('td:eq(1)').text();
                    var Kiemtra1tiet = row.find('td:eq(2)').text();
                    var Kiemtrahocky = row.find('td:eq(3)').text();

                    // Điền dữ liệu vào modal
                    $('#HoTen').val(HoTen);
                    $('#15p').val(Kiemtra15p);
                    $('#1tiet').val(Kiemtra1tiet);
                    $('#hocky').val(Kiemtrahocky);
            
                    }
                );
             
                

    


                function validateSubjectName(name, errorId, iconId) {
                    var errorSpan = $(errorId);
                    var icon = $(iconId);
                    if (/^[\p{L} ]+$/u.test(name)) {
                        errorSpan.text('');
                        icon.show().removeClass('bx-x-circle').addClass('bx-check-circle').css('color', 'green');
                        return true;
                    } else {
                        errorSpan.text('Chỉ được nhập chữ tiếng Việt và dấu cách.');
                        icon.hide(); // Ẩn icon nếu dữ liệu không hợp lệ
                        return false;
                    }
                }

                function validateAchievementScore(score, errorId, iconId) {
                    var errorSpan = $(errorId);
                    var icon = $(iconId);
                    if (parseFloat(score) >= 0 && parseFloat(score) <= 10) {
                        errorSpan.text('');
                        icon.show().removeClass('bx-x-circle').addClass('bx-check-circle').css('color', 'green');
                        return true;
                    } else {
                        errorSpan.text('Hãy nhập số từ 0 đến 10.');
                        icon.hide(); // Ẩn icon nếu dữ liệu không hợp lệ
                        return false;
                    }
                }



                $('#myModal1 form').submit(function(event) {
                    var tenMonHoc = $('#ThemTenMH').val().trim();
                    var diemDat = $('#ThemDiemDat').val().trim();

                    var isTenMonHocValid = validateSubjectName(tenMonHoc, "#TenMHError", "#TenMHIcon");
                    var isDiemDatValid = validateAchievementScore(diemDat, "#DiemDatError", "#DiemDatIcon");

                    if (!isTenMonHocValid || !isDiemDatValid) {
                        return false; // Prevent form submission
                    }

                    // Continue form submission if all validations pass
                    // Reload the page after successful submission
                    return true;
                });


            });
        </script>




      <script>
$(document).ready(function() {
$('#nienkhoa').on('change', function() {
  var MaNamHoc = $(this).val();
  if (MaNamHoc) {
    $.ajax({
      url: 'pages/BangDiemMonHoc/ajax_get_Lop.php',
      method: 'GET',
      dataType: "json",
      data: {
        MaNamHoc: MaNamHoc
      },
      success: function(data) {
        //làm sạch dropbox lớp
        $('#lop').empty();

         // thêm data vào dropbox lớp
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
              // Thêm mỗi mục vào dropdown "lop"
              $('#lop').append($('<option>', {
                  value: data[key].MaLop,
                  text: data[key].TenLop
              }));
          }
      }
        
         $('#mon').empty();
        $('#hocKy').empty(); 
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log('Error: ' + errorThrown);
      }
    });
    $('#hocKy').empty();
  } else {
  
    $('#lop').empty();
    $('#mon').empty();
    $('#hocKy').empty(); 
  }

  
});

 $('#lop').on('change', function() {
    
    $.ajax({
      url: 'pages/BangDiemMonHoc/ajax_get_MonHoc.php',
      method: 'GET',
      dataType: "json",
      data:"",
      success: function(data) {
       $('#mon').empty();
        $('#hocKy').empty();
      
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
              $('#mon').append($('<option>', {
                  value: data[key].MaMonHoc,
                  text: data[key].TenMonHoc
              }));
          }
      }

      }, 
      error: function(xhr, textStatus, errorThrown) {
        console.log('Error: ' + errorThrown);
      }
    });
   
    
}); 

$('#mon').on('change', function() { 
    $.ajax({
      url: 'pages/BangDiemMonHoc/ajax_get_HocKy.php',
      method: 'GET',
      dataType: "json",
      data:"",
      success: function(data) {
        $('#hocKy').empty();
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
              
              $('#hocKy').append($('<option>', {
                  value: data[key].MaHocKy,
                  text: data[key].TenHocKy
              }));
          }
      }

      }, 
      error: function(xhr, textStatus, errorThrown) {
        console.log('Error: ' + errorThrown);
      }
    });

}); 
$('#hocKy').on('change', function() { 
    var NienKhoa= $('#nienkhoa').val();
var MaLop = $('#lop').val();
var MaMonHoc = $('#mon').val();
var MaHocKy = $('#hocKy').val();
$.ajax({
  url: 'pages/BangDiemMonHoc/ajax_get_Table.php', // Đường dẫn tới file PHP xử lý yêu cầu AJAX
  method: 'GET',
  dataType: 'json',
 data: {
    MaMonHoc: MaMonHoc,
    MaLopHoc: MaMonHoc,
    MaHocKy: MaHocKy,
      NienKhoa: NienKhoa
  },
  success: function(data) {
      // Xóa bảng hiện tại (nếu có)
      $('#example tbody').empty();
      // Thêm dữ liệu vào bảng
      $.each(data, function(index, item) {
          $('#example tbody').append(
              `<tr>
                  <td class="text-center">${item.TenHocSinh}</td>
                  <td class="text-center">${item.KiemTra15p} </td>
                  <td class="text-center" >${item.KiemTra1tiet}</td>
                  <td class="text-center" >${item.KiemTraHocKy}</td>
                  <td class="text-center" >
                  <button style="background-color:transparent; border-width: 0;" type="button" class="btn btn-primary btn-Sua">
                 <i class="bx bxs-edit"></i>
                  </button></td>   
              </tr>`
          );
      });
  },
  error: function(xhr, textStatus, errorThrown) {
      console.log('Error: ' + errorThrown);
  }
});
}); 

        
            

});
          </script>

        <!-- datatable -->
        <script>
            var table = new DataTable('#example', {
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/vi.json',
                },

                layout: {
                    topStart: {
                        buttons: [
                            'pdf',
                            'csv',
                            'excel',
                            'copy',
                            'colvis'
                        ]
                    },
                    topEnd: 'search',
                    bottomStart: 'pageLength',
                    bottomEnd: 'info',
                    bottom2center: 'paging'
                }
            });
        </script>

    </section>

</body>

</html>