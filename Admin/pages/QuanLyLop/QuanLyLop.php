<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lớp học</title>
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
</style>

<body>
    <section>
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <br>
                            <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">Danh sách lớp học</div>
                            <div class="card-body">
                                <button class="btn btn-primary btn-lg text-white mb-0 me-0 btn-Them" type="button"><i class='bx bx-plus btn-Them'></i>Thêm lớp học mới</button><br><br>
                                <div class="table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center" style="display:none">Mã Lớp</th>
                                                <th class="text-center">Tên lớp học</th>
                                                <th class="text-center">Khối lớp</th>
                                                <th class="text-center">Chỉnh sửa</th>
                                                <th class="text-center">Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqlLop = "SELECT MaLop, TenLop, Lop.MaKhoi, TenKhoi FROM LOP, KHOILOP WHERE LOP.MAKHOI = KHOILOP.MAKHOI";
                                            $resultLop = $mysqli->query($sqlLop);
                                            $stt = 0;
                                            while ($rowLop = $resultLop->fetch_assoc()) {
                                                $stt += 1;
                                                echo '
                                                        <tr>
                                                            <td class="text-center">' . $stt . '</td>
                                                            <td class="text-center" style="display:none">' . $rowLop['MaLop'] . '</td>
                                                            <td class="text-center">' . $rowLop['TenLop'] . '</td>
                                                            <td class="text-center">' . $rowLop['TenKhoi'] . '</td>
                                                            <td class="text-center">
                                                                <button style="background-color:transparent; border-width: 0;" type="button" class="btn btn-primary btn-Sua">
                                                                    <i class="bx bxs-edit"></i>
                                                                </button>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="../../../Admin/pages/QuanLyLop/DeleteLop.php?MaLop=' . $rowLop['MaLop'] . '" type="button" class="btn-Xoa text-primary" style="color:black">
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
                                                <th class="text-center">STT</th>
                                                <th class="text-center" style="display:none">Mã Lớp</th>
                                                <th class="text-center">Tên lớp học</th>
                                                <th class="text-center">Khối lớp</th>
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
                        <h4 class="modal-title" id="modalTitle" style="text-align: center;">Chi tiết lớp học</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="../../../Admin/pages/QuanLyLop/Update.php" method="post">
                            <label for="modalMaLop" class="col-sm-3 col-form-label fw-bold pb-2 ">Mã lớp học</label>
                            <input type="text" class="form-control mb-2 bg-secondary" id="modalMaLop" name="maLop" readonly>

                            <label for="modalTenLop" class="col-sm-3 col-form-label fw-bold pb-2">Tên lớp học</label>
                            <input type="text" class="form-control mb-2" id="modalTenLop" name="tenLop" placeholder="10A1">
                            <span id="TenLHError" class="error-message"></span> <!-- Thông báo lỗi -->

                            <label for="modalTenKhoi" class="col-sm-3 col-form-label fw-bold ">Khối lớp</label>
                            <input type="text" class="form-control mb-2" id="modalTenKhoi" name="tenKhoi" placeholder="Khối 10/11/12">
                            <span id="TenKhoiError" class="error-message"></span> <!-- Thông báo lỗi -->

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
                        <h4 class="modal-title fw-bold" id="modalTitle" style="text-align: center;">Thêm lớp học</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../../../Admin/pages/QuanLyLop/AddLop.php">
                            <!-- Trong form thêm modal -->
                            <label for="modalTenLop" class="col-sm-3 col-form-label fw-bold pb-2">Tên lớp học</label>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" class="form-control" id="modalTenLop" name="tenLop" placeholder="10A1">
                                    <span id="TenLopError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="modalTenKhoi" class="col-sm-3 col-form-label fw-bold pb-2 mt-3">Tên khối</label>
                                    <input type="text" class="form-control" id="modalTenKhoi" name="tenKhoi" placeholder="Khối 10/11/12">
                                    <span id="TenKhoiError" class="error-message"></span> <!-- Thông báo lỗi -->
                                </div>
                            </div>
                            <input type="submit" class="mt-4 fw-bold btnThem" name="submit" value="Thêm" size="50">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Sửa
                $(".btn-Sua").click(function() {
                    $('#myModal').modal('show');

                    var row = $(this).closest('tr');
                    // var maLop = row.find('td:eq(0)').text();
                    var maLop = row.find('td:eq(1)').text();
                    var tenLop = row.find('td:eq(2)').text();
                    var tenKhoi = row.find('td:eq(3)').text();

                    // Điền dữ liệu vào modal
                    $('#modalMaLop').val(maLop);
                    $('#modalTenLop').val(tenLop);
                    $('#modalTenKhoi').val(tenKhoi);

                });
                // Xóa
                $(".btn-Xoa").click(function() {
                    $(this).closest('tr').remove();
                });
                // Thêm
                $(".btn-Them").click(function() {
                    $('#myModal1').modal('show');
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