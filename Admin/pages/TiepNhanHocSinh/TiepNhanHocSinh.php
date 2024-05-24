<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiếp Nhận Học Sinh</title>
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

    <!-- Add Validate data form -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation.js"></script>


</head>
<style>
    .btnThem,
    .btn-Update {
        border-radius: 25px;
        width: 90px;
        height: 40px;
        background-color: transparent;
        margin-left: 80%;
    }

    .btnThem:hover,
    .btn-Update:hover {
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

    form .error {
        color: #ff0000;
    }
</style>

<body>
    <section>
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <br>
                            <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">Danh sách Học Sinh</div>
                            <div class="card-body">
                                <button class="btn btn-primary btn-lg text-white mb-0 me-0 btn-Them" type="button"><i class='bx bx-plus btn-Them'></i>Thêm học sinh mới</button><br><br>
                                <form method="POST" enctype="multipart/form-data" action="pages/TiepNhanHocSinh/ImportExcel.php"> 
                                    <input type="file" name="file">
                                    <button type="submit" id= "ImportExcel"name="Send"> Nhập dữ liệu </button>
                              </form> 
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mã học sinh</th>
                                                <th class="text-center">Tên học sinh</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center">Chỉnh sửa</th>
                                                <th class="text-center">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlHOCSINH = "SELECT * FROM HOCSINH";
                                            $resultHOCSINH = $mysqli->query($sqlHOCSINH);
                                            while ($rowHOCSINH = $resultHOCSINH->fetch_assoc()) {
                                                echo '
                                                        <tr>
                                                            <td class="text-center">' . $rowHOCSINH['MaHocSinh'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['TenHocSinh'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['NgaySinh'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['GioiTinh'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['DiaChi'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['Email'] . '</td>
                                                            <td class="text-center">' . $rowHOCSINH['status'] . '</td>
                                                            <td class="text-center">
                                                                <button style="background-color:transparent; border-width: 0;" type="button" class="btn btn-primary btn-Sua">
                                                                    <i class="bx bxs-edit"></i>
                                                                </button>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="../../../Admin/pages/TiepNhanHocSinh/DeleteHS.php?MaHocSinh=' . $rowHOCSINH['MaHocSinh'] . '" type="button" class="btn-Xoa text-primary" style="color:black">
                                                                    <i class="bx bx-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    ';
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">Mã học sinh</th>
                                                <th class="text-center">Tên học sinh</th>
                                                <th class="text-center">Ngày sinh</th>
                                                <th class="text-center">Giới tính</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Trạng thái</th>
                                                <th class="text-center">Chỉnh sửa</th>
                                                <th class="text-center">Xóa</th>
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

        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle" style="text-align: center;">Thông tin học sinh</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="pages/TiepNhanHocSinh/Update.php" method="post">
                            <label for="modalMaHocSinh" class="col-sm-3 col-form-label fw-bold pb-2 ">Mã học sinh</label>
                            <input type="text" class="form-control mb-2 bg-secondary" id="modalMaHocSinh" name="maHocSinh" readonly>

                            <label for="modalTenHocSinh" class="col-sm-3 col-form-label fw-bold pb-2">Tên học sinh</label>
                            <input type="text" class="form-control mb-2" id="modalTenHocSinh" name="tenHocSinh" placeholder="Trần Văn A">
                            <span id="TenHSError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalNgaySinh" class="col-sm-3 col-form-label fw-bold ">Ngày sinh</label>
                            <input type="date" class="form-control mb-2" id="modalNgaySinh" name="ngaySinh" placeholder="8">
                            <span id="NgaySinhError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalGioiTinh" class="col-sm-3 col-form-label fw-bold pb-2">Giới tính</label>
                            <input type="text" class="form-control mb-2" id="modalGioiTinh" name="gioiTinh" placeholder="Nữ/Nam">
                            <span id="GTrror" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalDiaChi" class="col-sm-3 col-form-label fw-bold pb-2">Địa chỉ</label>
                            <input type="text" class="form-control mb-2" id="modalDiaChi" name="diaChi" placeholder="">
                            <span id="DiaChiError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalEmail" class="col-sm-3 col-form-label fw-bold pb-2">Email</label>
                            <input type="text" class="form-control mb-2" id="modalEmail" name="email" placeholder="abc@gmail.com">
                            <span id="EmailError" class="error-message"></span> <!-- Thông báo lỗi -->
                            <label for="modalMaHocSinh" class="col-sm-3 col-form-label fw-bold pb-2 ">Trạng thái</label>
                            <input type="text" class="form-control mb-2 bg-secondary" id="modaltrangthai" name="trangthai" readonly>

                            <input type="submit" class="mt-4 fw-bold btn-Update" name="submit" value="Cập nhật" size="50">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thêm Modal -->
        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title fw-bold" id="modalTitle" style="text-align: center;">Thêm học sinh</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form name="registration" id="ValidateForm" method="post" action="pages/TiepNhanHocSinh/AddHS.php">
                            <!-- Trong form thêm modal -->
                            <label for="modalTenHocSinh" class="col-sm-3 col-form-label fw-bold pb-2">Tên học sinh</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="modalTenHocSinh" name="tenHocSinh" placeholder="Trần Văn A" required>
                                    <span id="TenHSError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="modalNgaySinh" class="col-sm-3 col-form-label fw-bold pb-2 mt-3">Ngày sinh</label>
                                    <input type="date" class="form-control" id="modalNgaySinh" name="ngaySinh" placeholder="" required>
                                    <span id="NgaySinhError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <label for="modalGioiTinh" class="col-sm-3 col-form-label fw-bold pb-2">Giới tính</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="modalGioiTinh" name="gioiTinh" placeholder="Nam/Nữ" required>
                                    <span id="GioiTinhError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="modalDiaChi" class="col-sm-3 col-form-label fw-bold pb-2 mt-3">Địa chỉ</label>
                                    <input type="text" class="form-control" id="modalDiaChi" name="diaChi" placeholder="Thành phố Hồ Chí Minh" required>
                                    <span id="DiaChiError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <label for="modalEmail" class="col-sm-3 col-form-label fw-bold pb-2">Email</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="modalEmail" name="email" placeholder="TranVanA@gmail.com" required>
                                    <span id="EmailError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>

                            <input type="submit" class="mt-4 fw-bold btnThem" name="submit" value="Thêm" size="50">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- --------------------------------------------------------- -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
        <script>
            // Sửa
            $(document).on('click', '.btn-Sua', function(event) {
                $('#myModal').modal('show');
                var row = $(this).closest('tr');
                var maHocSinh = row.find('td:eq(0)').text();
                var tenHocSinh = row.find('td:eq(1)').text();
                var ngaySinh = row.find('td:eq(2)').text();
                var gioiTinh = row.find('td:eq(3)').text();
                var diaChi = row.find('td:eq(4)').text();
                var email = row.find('td:eq(5)').text();
                var trangthai = row.find('td:eq(6)').text();
                // alert(email);
                // Điền dữ liệu vào modal
                $('#modalMaHocSinh').val(maHocSinh);
                $('#modalTenHocSinh').val(tenHocSinh);
                $('#modalNgaySinh').val(ngaySinh);
                $('#modalGioiTinh').val(gioiTinh);
                $('#modalDiaChi').val(diaChi);
                $('#modalEmail').val(email);
                $('#modaltrangthai').val(trangthai);

            });
            // Xóa
            $(".btn-Xoa").click(function() {
                $(this).closest('tr').remove();
            });
            // Thêm
            $(".btn-Them").click(function() {
                $('#myModal1').modal('show');
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