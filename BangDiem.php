<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học sinh</title>
    <link rel="stylesheet" href="../../css/Giao_vien_bo_mon.css">
    <script src="../../../Teacher/js/Giao_vien_bo_mon.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <!-- AJAX  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
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

<!-- Kết nối cơ sở dữ liệu -->
<?php
$mysqli = new mysqli("localhost", "root", "", "qlhs");
///Lúc đăng nhập sẽ sửa lại bây giờ chỉ lấy đại 1 giáo viên để test chạy backend
$MAGV = '11';
?>

<body>
    <section>
        <!-- Chọn khối lớp liên khóa học kỳ -->
        <div class="row">
            <div class="col">
                <select class="form-select" id="NamHoc">
                    <option selected disabled>Niên khóa</option>
                    ?php
                    $sqlNamHoc = "SELECT DISTINCT N.MaNamHoc, N.TenNamHoc
                    FROM LOPNAMHOC AS L
                    INNER JOIN PHANCONGGV AS PC ON L.MaLopNamHoc = PC.MaLopNamHoc
                    INNER JOIN NAMHOC AS N ON N.MaNamHoc = L.MaNamHoc
                    WHERE PC.MAGV = '$MAGV'";
                    $resultNamHoc = $mysqli->query($sqlNamHoc);
                    while ($rowNamHoc = $resultNamHoc->fetch_assoc()) {
                    echo '<option value= '". $rowNamHoc[MaNamHoc] . '">' . $rowNamHoc[TenNamHoc] . '</option>' ; } 
                    echo "<option value='" . $row['tinhthanh'] . "' selected>" . $row['tinhthanh'] . "</option>";
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="HocKy">
                    <option selected disabled>Học kỳ</option>

                </select>
            </div>
            <div class="col">
                <select class="form-select" id="KhoiLop">
                    <option selected disabled>Khối</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="HocKy">
                    <option selected disabled>Học kỳ</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <select class="form-select" id="NamHoc">
                    <option selected disabled>Năm học</option>
                    <?php
                    $sqlNamHoc = "SELECT DISTINCT N.MaNamHoc, N.TenNamHoc
                                    FROM LOPNAMHOC AS L
                                    INNER JOIN PHANCONGGV AS PC ON L.MaLopNamHoc = PC.MaLopNamHoc
                                    INNER JOIN NAMHOC AS N ON N.MaNamHoc = L.MaNamHoc
                                    WHERE PC.MAGV = '$MAGV'";
                    $resultNamHoc = $mysqli->query($sqlNamHoc);
                    while ($rowNamHoc = $resultNamHoc->fetch_assoc()) {
                        echo '<option value="' . $rowNamHoc["MaNamHoc"] . '">' . $rowNamHoc["TenNamHoc"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="HocKy">
                    <option selected disabled>Học kỳ</option>
                    <?php
                    $sqlHocKy = "SELECT * FROM HOCKY";
                    $resultHocKy = $mysqli->query($sqlHocKy);
                    while ($rowHocKy = $resultHocKy->fetch_assoc()) {
                        echo '<option value="' . $rowHocKy["MaHK"] . '">' . $rowHocKy["TenHK"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="KhoiLop">
                    <option selected disabled>Khối lớp</option>
                    <?php
                    $sqlKhoiLop = "SELECT DISTINCT K.MaKhoiLop, K.TenKhoiLop
                                    FROM LOPNAMHOC AS L
                                    INNER JOIN PHANCONGGV AS PC ON L.MaLopNamHoc = PC.MaLopNamHoc
                                    INNER JOIN LOP ON LOP.MaLop = L.MaLop
                                    INNER JOIN KHOILOP AS K ON K.MaKhoiLop = LOP.MaKhoiLop
                                    WHERE PC.MAGV = '$MAGV'";
                    $resultKhoiLop = $mysqli->query($sqlKhoiLop);
                    while ($rowKhoiLop = $resultKhoiLop->fetch_assoc()) {
                        echo '<option value="' . $rowKhoiLop["MaKhoiLop"] . '">' . $rowKhoiLop["TenKhoiLop"] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="col">
                <select class="form-select" id="LopHoc">
                    <option selected disabled>Lớp học</option>
                    <?php
                    $sqlLopHoc = "SELECT * 
                                  FROM LOPNAMHOC AS L, PHANCONGGV AS PC
                                  WHERE L.MaLopNamHoc = PC.MaLopNamHoc AND PC.MAGV = '$MAGV'";
                    $resultLopHoc = $mysqli->query($sqlLopHoc);
                    while ($rowLopHoc = $resultLopHoc->fetch_assoc()) {
                        echo '<option value="' . $rowLopHoc["MaLop"] . '">' . $rowLopHoc["TenLop"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <!--End Chọn khối lớp liên khóa học kỳ -->

        <!-- MAIN -->
        <div class="col-sm-12">
            <div class="home-tab">
                <!-- Lựa chọn tab -->
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Bảng điểm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">Thống kê</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-outline-dark align-items-center"><i class="fa fa-share"></i> Chia sẻ</a>
                            <a href="#" class="btn btn-outline-dark"><i class="fa fa-print"></i> In</a>
                            <a href="#" class="btn btn-primary text-white me-0"><i class="fa fa-download"></i> Xuất</a>
                        </div>
                    </div>
                </div>
                <!-- Kết thúc lựa chọn tab -->

                <!-- Nội dung chọn tab -->
                <div class="tab-content tab-content-basic">
                    <!-- Danh sách học sinh -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <br>
                                            <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">bảng điểm môn học</div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="display corder-column" id="BangDiemBoMon" width=100%>
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Điểm 15 phút</th>
                                                                <th>Điểm 1 tiết</th>
                                                                <th>Điểm học kỳ</th>
                                                                <th>Điểm trung bình</th>
                                                                <th>Chỉnh sửa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td id="STT">1</td>
                                                                <td id="Ho_va_Ten">Nguyễn Thị Thúy Hằng</td>
                                                                <td id="Diem_15">10 10 10</td>
                                                                <td id="Diem_1_Tiet">10 10</td>
                                                                <td id="Diem_Cuoi_Ky">10</td>
                                                                <td id="Diem_Trung_Binh">10</td>
                                                                <td>
                                                                    <!-- Button trigger modal -->
                                                                    <button style="background-color:transparent; border-width: 0;" id="btn_ChiTiet" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                        <i class='bx bxs-edit'></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td id="STT">2</td>
                                                                <td id="Ho_va_Ten">baba cuta naka</td>
                                                                <td id="Diem_15">9 8 6</td>
                                                                <td id="Diem_1_Tiet">7</td>
                                                                <td id="Diem_Cuoi_Ky">6</td>
                                                                <td id="Diem_Trung_Binh">9</td>
                                                                <td>
                                                                    <!-- Button trigger modal -->
                                                                    <button style="background-color:transparent; border-width: 0;" id="btn_ChiTiet" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                                        <i class='bx bxs-edit'></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Điểm 15 phút</th>
                                                                <th>Điểm 1 tiết</th>
                                                                <th>Điểm học kỳ</th>
                                                                <th>Điểm trung bình</th>
                                                                <th>Chỉnh sửa</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>

                                                <!-- The Modal -->
                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" style="text-align: center;">Bảng điểm môn học</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <h4 style="text-align: center;">Họ và tên: <span class="fw-bold">Nguyễn Thị Thúy Hằng</span></h4><br>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        Điểm 15 phút:
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <input type="text" value="10 10 ">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        Điểm 1 tiết:
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <input type="text" value="10 10 ">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        Điểm học kỳ:
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <input type="text" value="10 10 ">
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-5">
                                                                        Điểm trung bình:
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <input type="text" value="10 10 " disabled>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--End The Modal -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Kết thúc Danh sách học sinh -->

                    <!-- Báo cáo tổng kết môn học -->
                    <div class="tab-pane fade show active" id="more-tab" role="tabpanel" aria-labelledby="more">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <h4 class="card-title card-title-dash">Báo cáo bảng điểm môn học</h4>
                                            </div>
                                            <div>
                                                <select class="form-select" id="LoaiDiem">
                                                    <option value="tb">Điểm trung bình</option>
                                                    <option value="15p">Điểm 15 phút</option>
                                                    <option value="1t">Điểm 1 tiết</option>
                                                    <option value="hk">Điểm học kỳ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="myChart"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Kết thúc Báo cáo tổng kết môn học -->
                </div>
                <!--Kết thúc Nội dung chọn tab -->
            </div>
        </div>
        <!--END MAIN-->

        <!-- datatable -->
        <script>
            var table = new DataTable('#BangDiemBoMon', {
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

            $('#submit').on('click', function(e) {
                e.preventDefault();

                var data = table.$('input, select').serialize();
            });

            table.on('mouseenter', 'td', function() {
                let colIdx = table.cell(this).index().column;

                table
                    .cells()
                    .nodes()
                    .each((el) => el.classList.remove('highlight'));

                table
                    .column(colIdx)
                    .nodes()
                    .each((el) => el.classList.add('highlight'));
            });
        </script>
        <style>
            td.highlight {
                background-color: rgba(var(--dt-row-hover), 0.052) !important;
            }
        </style>
        <!-- AJAX -->
        <script>
            $(document).ready(function() {
                $("#LoaiDiem").on('change', function(e) {

                    var LoaiDiem = $(this).val(); // Lấy giá trị của loại điểm được chọn

                    $.post("../../../Teacher/pages/GVBM/Chartajax.php", {
                            LoaiDiem: LoaiDiem
                        },
                        function(data, status) {
                            if (status == "success") {
                                $("#myChart").text(data);
                            } else {
                                alert("Lỗi! Vui lòng thử lại sau");
                            }
                        }
                    );
                });
            });
        </script>


        <script>
            const xArray = ["Italy", "France", "Spain", "USA", "Argentina"];
            const yArray = [55, 49, 44, 24, 15];

            const data = [{
                x: xArray,
                y: yArray,
                type: "bar",
                orientation: "v",
                marker: {
                    color: "rgba(0,0,255,0.6)"
                }
            }];

            const layout = {
                title: "World Wide Wine Production"
            };

            Plotly.newPlot("myChart", data, layout);
        </script>

    </section>
</body>

</html>