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
        $result = $hh->getThongKeDoanhThu();
        while ($set = $result->fetch()) {
            $ngaydat = $set['thang'];
            $slb = $set['soluong'];
            echo "ngaydat.push('" . $ngaydat . "');";
            echo "soluongban.push(" . $slb . ");";
        }
        ?>

        data.addColumn('string', 'Ngày đặt');
        data.addColumn('number', 'Số tiền thu được');

        for (var i = 0; i < ngaydat.length; i++) {
            date = ngaydat[i];
            soluong = soluongban[i];
            rows.push([date, soluong]);
            tongsoluongban += soluong;
        }

        data.addRows(rows);

        var options = {
            'width': 1070,
            'height': 600, // Reduced height for better visibility
            'backgroundColor': '#f9f9f9', // Light gray background
            hAxis: {
                title: 'Tháng'
            },
            vAxis: {
                title: 'Số tiền (VND)'
            },
            is3D: true
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
        chart.draw(data, options);
        document.getElementById('tongsoluongban_line').innerHTML = 'Tổng số tiền thu được: ' + formatNumber(tongsoluongban);

        function formatNumber(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

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
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h2 class='text-center'>Thống kê doanh thu theo tháng</h2>
                    <div id="line_chart_div"></div>
                    <div id="tongsoluongban_line" class="text-center font-weight-bold mt-3"></div>
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>