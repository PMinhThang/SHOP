<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load the Google Charts API -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawPieChart();
        }

        function drawPieChart() {
            var rows = new Array();
            var tenhh = new Array();
            var soluongban = new Array();
            var dataten = 0;
            var soluong = 0;
            var tongsoluongban = 0;
            var data = new google.visualization.DataTable();
            <?php
            $hh = new hanghoa();
            $result = $hh->getThongKeDH();
            while ($set = $result->fetch()) {
                $tenhh = $set['tinhtrang'];
                if ($set['tinhtrang'] == -1) {
                    $tenhh = 'Đơn đã hủy';
                }
                if ($set['tinhtrang'] == 3) {
                    $tenhh = 'Đơn hoàn thành';
                } 
                
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

            data.addColumn('string', 'Tình trạng');
            data.addColumn('number', 'Số lượng');
            data.addRows(rows);

            var options = {
                'width': 1065,
                'height': 400,
                'backgroundColor': '#f9f9f9',
                is3D: true
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
            chart.draw(data, options);
            document.getElementById('tongsoluongban_pie').innerHTML = 'Tổng số lượng: ' + tongsoluongban+ ' đơn hàng';
        }
    </script>
    <style>
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            margin-top: 20px;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="chart-container">
                    <h2 class='text-center'>Thống kê đơn hàng</h2>
                    <div id="pie_chart_div"></div>
                    <div id="tongsoluongban_pie" class="text-center font-weight-bold mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
