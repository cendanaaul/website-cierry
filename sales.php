<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan</title>
    <link rel="icon" href="img/logox.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles and charts for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="width:250px; 
                   list-style: none; 
                   padding: 0; 
                   height: 90vh; 
                   box-shadow: inset -1px 0px 0px 0px #121212; 
                   margin:0;
                   padding: 30px 30px;
                   display: flex;
                   flex-direction: column;
                   gap: 10px;">

            <!-- Item - Dashboard -->
            <li class="nav-item active">
                <a href="?page=laporan" style="padding: 0; 
                                               text-decoration:none;
                                               color: #121212;
                                               font-size: 20px;">
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" style="width: 100%;">

            <div style="color: #585858;">
                Chart Menu :
            </div>

            <li class="nav-item">
                <a href="?page=laporanprofit" style="padding: 0; 
                                               text-decoration:none;
                                               color: #121212;
                                               font-size: 20px;">
                    <span>Profit Chart</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="?page=laporanproduct" style="padding: 0; 
                                               text-decoration:none;
                                               color: #121212;
                                               font-size: 20px;">
                    <span>Product Chart</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="?page=laporansales" style="padding: 0; 
                                               text-decoration:none;
                                               color: #121212;
                                               font-size: 20px;">
                    <span>Sales Chart</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider" style="width: 100%;">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Sales</h1>
                    </div>


                    <!-- Content 1: Sales Chart -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: rgba(216, 194, 183, 0.3);">
                                    <h6 class="m-0 font-weight-bold" style="font-size: 18px; color: #887A73;">Trend Pendapatan Penjualan Setiap Hari</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- End of Page Content -->




            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure, do you want to Leave this Site?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" button below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- JavaScript for Charts -->
    <!-- JavaScript Line Chart Trend Pendapatan Penjualan Setiap Tahun -->
    <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Area Chart Example content 1
        <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "cierry";
        $conn = mysqli_connect($host, $user, $password, $database);
        $day = "SELECT DISTINCT(date_in) as day FROM tbl_pesanan";
        $amount = "SELECT SUM(total) as amount FROM tbl_pesanan GROUP BY Day(date_in)";
        $i = 1;
        $query_day = mysqli_query($conn, $day);
        $jumlah_day = mysqli_num_rows($query_day);
        $chart_day = "";
        while ($row = mysqli_fetch_array($query_day)) {
            if ($i < $jumlah_day) {
                $chart_day .= '"';
                $chart_day .= $row['day'];
                $chart_day .= '",';
                $i++;
            } else {
                $chart_day .= '"';
                $chart_day .= $row['day'];
                $chart_day .= '"';
            }
        }
        $a = 1;
        $query_amount = mysqli_query($conn, $amount);
        $jumlah_amount = mysqli_num_rows($query_amount);
        $chart_amount = "";
        while ($row1 = mysqli_fetch_array($query_amount)) {
            if ($a < $jumlah_amount) {
                $chart_amount .= $row1['amount'];
                $chart_amount .= ',';
                $a++;
            } else {
                $chart_amount .= $row1['amount'];
            }
        }
        ?>
        var ctx = document.getElementById("myAreaChart2");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php echo $chart_day; ?>],
                datasets: [{
                    label: "Total Pendapatan Penjualan",
                    lineTension: 0.3,
                    backgroundColor: "rgba(216, 194, 183, 0.3)",
                    borderColor: "#D8C2B7",
                    pointRadius: 3,
                    pointBackgroundColor: "#D8C2B7",
                    pointBorderColor: "#D8C2B7",
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: "#CFACAC",
                    pointHoverBorderColor: "#CFACAC",
                    pointHitRadius: 10,
                    pointBorderWidth: 4,
                    data: [<?php echo $chart_amount; ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 10,
                            padding: 10,
                            max: 280000,
                            stepSize: 50000,
                            beginAtZero: true,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return 'RP' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': RP' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>





    <!-- JavaScript for Bar Chart -->
    <script src="js/demo/chart-bar-demo4.js"></script>





    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; kelompok 3</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</body>

</html>