<?php
$sql = "SELECT * FROM THAMSO";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$MinAge = $row["MinAge"];
$MaxAge = $row["MaxAge"];
$DiemToiDa = $row["DiemToiDa"];
$DiemToiThieu = $row["DiemToiThieu"];
$DiemDat = $row["DiemDat"];
$SiSo = $row["SiSo"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Settings</title>
    <style>
        .btnMinAge,
        .btnMaxAge {
            background-color: transparent;
            width: 20%;
            height: 32px;
            float: left;
            border-top-style: solid;
            border-right-style: solid;
            border-bottom-style: solid;
            border-left: none;
            border-radius: 0px 10px 10px 0px;
            font-weight: bold;
        }

        .btnMinAge:hover,
        .btnMaxAge:hover {
            background-color: #1F3BB3;
            color: aliceblue;
            font-weight: bold;
        }

        .MinAge,
        .MaxAge {
            background-color: transparent;
            font-style: bold;
            width: 70%;
            height: 30px;
            float: left;
            padding-left: 20px;
            border: solid 2px black;
            border-radius: 10px 0px 0px 10px;

        }
    </style>
</head>

<body>
    <section>
        <div class=" col-sm-12">
            <div class="home-tab">
                <div class="tab-content tab-content-basic">

                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">CÀI ĐẶT SỐ TUỔI</h4>
                                            <p class="card-subtitle card-subtitle-dash">Cài đặt số tuổi tối thiểu và tối đa để có thể nhập học</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fw-bold pb-2 mt-3">Số tuổi tối thiểu</label>
                                            <div class="col">
                                                <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                    <input type="number" class="form-control MinAge" id="MinAge" name="MinAge" value="<?php echo $MinAge; ?>">
                                                    <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class=" fw-bold pb-2 mt-3">Số tuổi tối đa</label>
                                            <div class="col">
                                                <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                    <input type="number" class="form-control MaxAge" id="MaxAge" name="MaxAge" value="<?php echo $MaxAge; ?>">
                                                    <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">CÀI ĐẶT ĐIỂM SỐ</h4>
                                            <p class="card-subtitle card-subtitle-dash">Cài đặt số điểm có thể để lơn lớp hoặc ở lại lớp & thang điểm</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label class="fw-bold pb-2 mt-3">Số điểm tối thiểu</label>
                                            <div class="col">
                                                <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                    <input type="number" class="form-control MinAge" id="DiemToiThieu" name="DiemToiThieu" value="<?php echo $DiemToiThieu; ?>">
                                                    <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class=" fw-bold pb-2 mt-3">Số điểm tối đa</label>
                                            <div class="col">
                                                <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                    <input type="number" class="form-control MaxAge" id="DiemToiDa" name="DiemToiDa" value="<?php echo $DiemToiDa; ?>">
                                                    <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class=" fw-bold pb-2 mt-3">Điểm đạt</label>
                                        <div class="col">
                                            <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                <input style="width: 75.2%;" type="number" class="form-control MaxAge" id="DiemDat" name="DiemDat" value="<?php echo $DiemDat; ?>">
                                                <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">CÀI ĐẶT SĨ SỐ</h4>
                                            <p class="card-subtitle card-subtitle-dash">Cài đặt sĩ số tối đa cho một lớp</p>
                                        </div>
                                    </div>

                                    <div>
                                        <label class=" fw-bold pb-2 mt-3">Sĩ Số</label>
                                        <div class="col">
                                            <form action="../../../Admin/pages/CaiDat/UpdateCD.php" method="post">
                                                <input style="width: 75.2%;" type="number" class="form-control MaxAge" id="SiSo" name="SiSo" value="<?php echo $SiSo; ?>">
                                                <input name="submit" value="Lưu" class="btnMinAge" type="submit">
                                            </form>
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