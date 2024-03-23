<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách học sinh</title>
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
</head>


<body>
    <section>
        <div class="text-uppercase">danh sách học sinh</div>
        <br>
        <div class="row">
            <div class="col">
                <select class="form-select" id="NienKhoa" onchange="selectNienKhoa()">
                    <option selected disabled>Niên khóa</option>
                    <option value="2023-2024">2023 - 2024</option>
                    <option value="2022-2023">2022-2023</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="HocKy" disabled onchange="selectHocKy()">
                    <option selected disabled>Học kỳ</option>
                    <option value="1">Học kỳ 1</option>
                    <option value="2">Học kỳ 2</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="Khoi" disabled onchange="selectKhoi()">
                    <option selected disabled>Khối</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="col">
                <select class="form-select" id="Lop" disabled>
                    <option selected disabled>Lớp</option>
                    <option value="10c5">10c5</option>
                    <option value="11c4">11c4</option>
                    <option value="12a4">12a4</option>
                </select>
            </div>
        </div>
        <br>
        <div class="col-sm-12">
            <div class="home-tab">

                <!-- Lựa chọn tab -->
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Danh sách</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Báo cáo</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Chia sẻ</a>
                            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> In</a>
                            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Xuất</a>
                        </div>
                    </div>
                </div>

                <!-- Nội dung chọn tab -->
                <div class="tab-content tab-content-basic">
                    <!-- Danh sách học sinh -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <h4 class="card-title">Bảng điểm</h4>
                                                <p class="card-description"></p>
                                                <div class="table-responsive">
                                                    <table class="display corder-column" id="BangDiemBoMon" width=100%>
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Điểm 15 phút</th>
                                                                <th>Điểm 1 tiết</th>
                                                                <th>Điểm cuối kỳ</th>
                                                                <th>Điểm trung bình</th>
                                                                <th>Chỉnh sửa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Nguyễn Thị Thúy Hằng</td>
                                                                <td><input type="text" value="10 10" style="width: 50%;"></td>
                                                                <td><input type="text" value="10 10" style="width: 50%;"></td>
                                                                <td><input type="text" value="10" style="width: 50%;"></td>
                                                                <td>10</td>
                                                                <td><button style="background-color:transparent; border-width: 0;"><i class='bx bxs-edit'></i></button></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Phạm Bảo C</td>
                                                                <td><input type="text" value="10 10" style="width: 50%;"></td>
                                                                <td><input type="text" value="10 10" style="width: 50%;"></td>
                                                                <td><input type="text" value="10" style="width: 50%;"></td>
                                                                <td>10</td>
                                                                <td><button style="background-color:transparent; border-width: 0;"><i class='bx bxs-edit'></i></button></td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Điểm 15 phút</th>
                                                                <th>Điểm 1 tiết</th>
                                                                <th>Điểm cuối kỳ</th>
                                                                <th>Điểm trung bình</th>
                                                                <th>Chỉnh sửa</th>
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
                    </div>
                    <!-- Báo cáo thống kê -->
                    <div class="tab-pane fade show active" id="audiences" role="tabpanel" aria-labelledby="audiences">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Market Overview</h4>
                                                        <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur
                                                            adipisicing elit</p>
                                                    </div>
                                                    <div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                                <h6 class="dropdown-header">Settings</h6>
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                                    <div class="d-sm-flex align-items-center mt-4 justify-content-between">
                                                        <h2 class="me-2 fw-bold">$36,2531.00</h2>
                                                        <h4 class="me-2">USD</h4>
                                                        <h4 class="text-success">(+1.37%)</h4>
                                                    </div>
                                                    <div class="me-3">
                                                        <div id="marketingOverview-legend"></div>
                                                    </div>
                                                </div>
                                                <div class="chartjs-bar-wrapper mt-3">
                                                    <canvas id="marketingOverview"></canvas>
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
        </div>

        <script>
            var table = new DataTable('#BangDiemBoMon', {
                language: {
                    url: '//cdn.datatables.net/plug-ins/2.0.3/i18n/vi.json',
                },
                layout: {
                    topStart: {
                        buttons: [{
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [0, 1, 2, 5]
                                }
                            },
                            'colvis'
                        ]
                    },

                    topEnd: 'search',

                    bottomStart: 'pageLength',
                    bottomEnd: 'info',
                    bottom2center: 'paging',

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
    </section>
</body>

</html>