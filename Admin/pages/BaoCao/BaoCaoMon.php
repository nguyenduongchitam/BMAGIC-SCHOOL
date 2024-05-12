<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo</title>
    <link rel="stylesheet" href="../../css/Giao_vien_bo_mon.css">
    <script src="../../../Teacher/js/Giao_vien_bo_mon.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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
    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <section>
        <!-- CHỌN COMBOBOX MÔN, HỌC KỲ -->
        <div class="row">
            <div class="col">
                <select class="form-select" id="MonHoc">
                    <option selected disabled>Môn học</option>
                    <?php
                    $sql = "SELECT *
                                FROM MONHOC MH";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["MaMonHoc"] . '">' . $row["TenMonHoc"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="HocKy" disabled>
                    <option selected disabled>Học kỳ</option>
                    <?php
                    $sql1 = "SELECT *
                                FROM HOCKY";
                    $result1 = $mysqli->query($sql1);
                    while ($row1 = $result1->fetch_assoc()) {
                        echo '<option value="' . $row1["MaHocKy"] . '">' . $row1["TenHocKy"] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>

        <!-- MAIN -->
        <div class=" col-sm-12">
            <div class="home-tab">
                <!-- Lựa chọn tab -->
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Danh sách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">Biểu đồ</a>
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

                <!-- Nội dung chọn tab -->
                <div class="tab-content tab-content-basic">
                    <!-- Báo cáo -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="card card-rounded">
                            <div class="card-body">
                                <br>
                                <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">BÁO CÁO TỔNG KẾT MÔN</div>
                                <p class="card-description"></p>
                                <div class="table-responsive">
                                    <table class="display corder-column" id="BaoCaoBoMon" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Lớp</th>
                                                <th class="text-center">Sĩ số</th>
                                                <th class="text-center">Số lượng đạt</th>
                                                <th class="text-center">Tỉ lệ</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tb">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Lớp</th>
                                                <th class="text-center">Sĩ số</th>
                                                <th class="text-center">Số lượng đạt</th>
                                                <th class="text-center">Tỉ lệ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Báo cáo tổng kết môn học -->
                    <div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                    <div class="card-body">
                                        <div class="d-sm-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="text-uppercase" style="text-align: center; font-weight: bolder; font-size: large;">TỔNG KẾT MÔN</div>
                                                <canvas id="chart" width="400" height="400"></canvas>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>




<script>
    $(document).ready(function() {
        $('#MonHoc').change(function() {
            var MonHoc = $(this).val();
            $('#HocKy').prop('disabled', false).val(""); // Reset dropdown when subject changes
            $('#tb').empty(); // Clear table content when subject changes

            $('#HocKy').change(function() {
                var HocKy = $(this).val();
                $('#tb').empty();

                $.post("../../../Admin/pages/BaoCao/ListBCM.php", {
                    MonHoc: MonHoc,
                    HocKy: HocKy
                }, function(data, status) {
                    if (status == "success") {
                        $("#tb").html(data);

                        // Update progress bar when data is loaded
                        updateProgressBar();
                    }
                })

                $.post("../../../Admin/pages/BaoCao/ChartBCM.php", {
                    MonHoc: MonHoc,
                    HocKy: HocKy
                }, function(data, status) {
                    if (status == "success") {
                        $("#chart").html(data);
                    }
                })
            });
        });

        // Function to update progress bar
        function updateProgressBar() {
            $('#BaoCaoBoMon tbody tr').each(function() {
                var tile = parseFloat($(this).find('td:nth-child(5)').text());
                tile = tile * 100;

                var progressBarColor = '';
                if (tile >= 75) {
                    progressBarColor = 'badge-success';
                } else if (tile >= 50) {
                    progressBarColor = 'badge-primary';
                } else if (tile >= 25) {
                    progressBarColor = 'badge-warning';
                } else {
                    progressBarColor = 'badge-danger';
                }


                var progressBarHTML = `<label class="badge ${progressBarColor}" style="width: 100%;">${tile}%</label>`;

                $(this).find('td:nth-child(5)').html(progressBarHTML);
            });
        }

        // Call updateProgressBar function initially when the document is ready
        updateProgressBar();
    });
</script>

<!-- DATATABLE -->
<script>
    var table = new DataTable('#BaoCaoBoMon', {
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
        table.cells().nodes().each((el) => el.classList.remove('highlight'));
        table.column(colIdx).nodes().each((el) => el.classList.add('highlight'));
    });
</script>

<style>
    td.highlight {
        background-color: rgba(var(--dt-row-hover), 0.052) !important;

    }
</style>