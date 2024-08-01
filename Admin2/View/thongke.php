<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <!-- Load the AJAX API -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
    google.load('visualization', '1.0', {
        'packages': ['corechart']
    });
    google.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawLineChart();
        drawColumnChart();
    }

    function drawLineChart() {
        var rows = new Array();
        var ngaydat = new Array();
        var soluongban = new Array();
        var date = '';
        var soluong = 0;
        var tongsoluongban = 0;

        var data = new google.visualization.DataTable();
        <?php
        $hh = new hanghoa();
        $result = $hh->getThongKeNam();
        while ($set = $result->fetch()) {
            $ngaydat = $set['nam'];
            $slb = $set['soluong'];
            echo "ngaydat.push('" . $ngaydat . "');";
            echo "soluongban.push(" . $slb . ");";
        }
        ?>

        data.addColumn('string', 'Ngày đặt');
        data.addColumn('number', 'Số lượng bán');

        for (var i = 0; i < ngaydat.length; i++) {
            date = ngaydat[i];
            soluong = soluongban[i];
            rows.push([date, soluong]);
            tongsoluongban += soluong;
        }

        data.addRows(rows);

        var options = {
            'width': 500,
            'height': 400, // Reduced height for better visibility
            'backgroundColor': '#f9f9f9', // Light gray background
            hAxis: {
                title: 'Năm'
            },
            vAxis: {
                title: 'Số lượng bán'
            },
            is3D: true
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
        chart.draw(data, options);
        document.getElementById('tongsoluongban_line').innerHTML = 'Tổng số lượng bán: ' + tongsoluongban;
    }

    function drawColumnChart() {
        var rows = new Array();
        var tenhh = new Array();
        var soluongban = new Array();
        var dataten = 0;
        var soluong = 0;
        var tongsoluongban = 0;

        var data = new google.visualization.DataTable();
        <?php
        $hh = new hanghoa();
        if (isset($_SESSION['nam'])) {
            $result = $hh->getThongKe($_SESSION['nam']);
        } else {
            $result = $hh->getThongKe();
        }
        while ($set = $result->fetch()) {
            $tenhh = $set['tenhh'];
            $slb = $set['soluong'];
            echo "tenhh.push('" . $tenhh . "');";
            echo "soluongban.push(" . $slb . ");";
        }
        ?>

        for (var i = 0; i < tenhh.length; i++) {
            dataten = tenhh[i];
            soluong = parseInt(soluongban[i]);
            rows.push([dataten, soluong]);
            tongsoluongban += soluong;
        }

        data.addColumn('string', 'Tên hàng hóa');
        data.addColumn('number', 'Số lượng bán');
        data.addRows(rows);

        var options = {
            title: 'Thống kê số lượng bán',
            'width': 500,
            'height': 400, // Reduced height for better visibility
            'backgroundColor': '#f9f9f9', // Light gray background
            is3D: true
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('column_chart_div'));
        chart.draw(data, options);
        document.getElementById('tongsoluongban_column').innerHTML = 'Tổng số lượng bán: ' + tongsoluongban;
    }
    </script>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
        /* Light gray background */
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding-right: 15px;
        padding-left: 15px;
    }

    .chart-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        padding: 20px;
    }

    .form-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: relative;
        top: -60px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        position: relative;
        top: -6px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thống kê</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="chart-container">
                    <h2 class='text-center'>Thống kê số lượng bán theo năm</h2>
                    <div id="line_chart_div"></div>
                    <div id="tongsoluongban_line" class="text-center font-weight-bold mt-3"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="chart-container">
                    <h2 class='text-center'>Thống kê số lượng bán</h2>
                    <div id="column_chart_div"></div>
                    <div id="tongsoluongban_column" class="text-center font-weight-bold mt-3"></div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="form-container mt-5 text-center">
                    <form action="index.php?action=thongke&act=thongke_action" method="post">
                        <h2>Thống kê theo ngày</h2>
                        <select class="form-control w-50 d-inline mt-3" name="nam" id="">
                            <option value="0">--Toàn bộ--</option>
                            <?php
                            $hd = new hoadon();
                            $dates = $hd->getNam();

                            while ($set = $dates->fetch()) {
                                $value = $set['nam'];
                                $display = $set['nam'];
                            ?>
                            <option value="<?php echo $value; ?>" <?php if (isset($_SESSION['nam']) && $value == $_SESSION['nam']) {
                                echo "selected";
                                unset($_SESSION['nam']);
                            } ?>>
                                <?php echo $display; ?>
                            </option>
                            <?php
                            }
                            ?>
                        </select>
                        <button class="btn btn-primary mt-3" type="submit">Thống kê</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>