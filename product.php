<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Adventure Works</title>
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
                        <h1 class="h3 mb-0 text-gray-900">Product</h1>
                    </div>


                    <!-- Pie Chart -->
                    <div class="col-xl-8 col-lg-7" style="padding:0;">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background: rgba(216, 194, 183, 0.3);">
                                <h6 class="m-0 font-weight-bold" style="font-size: 18px; color: #887A73;">Product Terlaris</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body-store">
                                <div class="chart-area-store">
                                    <div id="canvas-holder" style="width:100%">
                                        <canvas id="chart-area"></canvas>
                                    </div>
                                    <!-- <canvas id="myAreaChart"></canvas> -->
                                    <?php
                                    $host       = "localhost";
                                    $user       = "root";
                                    $password   = "";
                                    $database   = "cierry";
                                    $mysqli     = mysqli_connect($host, $user, $password, $database);

                                    $produk = mysqli_query($mysqli, "SELECT DISTINCT(tbl_barang.deskripsi) as produk FROM tbl_pesanan
                                        JOIN tbl_barang ON tbl_pesanan.id_barang = tbl_barang.id_barang");
                                    while ($row = mysqli_fetch_array($produk)) {
                                        $jenis_produk[] = $row['produk'];

                                        $query = mysqli_query($mysqli, "SELECT COUNT(*) AS amount FROM tbl_pesanan tp JOIN tbl_barang tb ON tp.id_barang = tb.id_barang WHERE tb.deskripsi='" . $row['produk'] . "'");
                                        $row = $query->fetch_array();
                                        $amounts[] = $row['amount'];
                                    };
                                    ?>
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                        <p class="highcharts-description"></p>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Page Content -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; kelompok 3</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
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
    <!-- JavaScript Doughnut Chart Pendapatan per produk -->
    <script>
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: <?php echo json_encode($amounts); ?>,
                    backgroundColor: [
                        '#D8C2B7',
                        '#DAA78E',
                        '#927465',
                        '#AC6947',
                        '#6B5E57',
                        '#928782',
                        '#C15D2B'
                    ],
                    label: 'Presentase Produk Terlaris'
                }],
                labels: <?php echo json_encode($jenis_produk); ?>
            },
            options: {
                responsive: true
            }
        };

        window.onload = function() {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = dataset.data.map(function() {
                    return randomScalingFactor();
                });
            });

            window.myPie.update();
        });

        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function() {
            var newDataset = {
                backgroundColor: [],
                data: [],
                label: 'New dataset ' + config.data.datasets.length,
            };

            for (var index = 0; index < config.data.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());

                var colorName = colorNames[index % colorNames.length];
                var newColor = window.chartColors[colorName];
                newDataset.backgroundColor.push(newColor);
            }

            config.data.datasets.push(newDataset);
            window.myPie.update();
        });

        document.getElementById('removeDataset').addEventListener('click', function() {
            config.data.datasets.splice(0, 1);
            window.myPie.update();
        });
    </script>



    <!-- JavaScript for Bar Chart -->
    <script src="js/demo/chart-bar-demo4.js"></script>
</body>

</html>