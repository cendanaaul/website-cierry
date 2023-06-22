<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Statistics Dashboard</title>
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


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-900">Dashboard</h1>

                    </div>

                    <!-- Content Row 1 Summary -->
                    <div class="row">

                        <!-- Total Income Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 6px solid #D8C2B7;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col auto">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #6B5E57; font-size: 16px;">Total Revenue</div>
                                            <div class="h5 mb-0 font-weight-bold" style="color: #854d0e">
                                                <?php
                                                $mysqli = mysqli_connect("localhost", "root", "", "cierry");
                                                $sql = "SELECT SUM(total) as total from tbl_pesanan";
                                                $query = mysqli_query($mysqli, $sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo "RP" . number_format($row2['total']);
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x" style="color: rgba(124,45,18, 0.3);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Customers Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 6px solid #DAA78E;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #6B5E57; font-size: 16px;">Total Customers</div>
                                            <div class="h5 mb-0 font-weight-bold" style="color: #854d0e">
                                                <?php
                                                $sql = "SELECT COUNT(title) as jumlah_cus from tbl_users where title='user'";
                                                $query = mysqli_query($mysqli, $sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo number_format($row2['jumlah_cus'], 0, ".", ",");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x" style="color: rgba(124,45,18, 0.3);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Profit Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 6px solid #927465;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color: #6B5E57; font-size: 16px;">Total Profit</div>
                                            <div class="h5 mb-0 font-weight-bold" style="color: #854d0e">
                                                <?php
                                                $sql = "SELECT SUM(p.qty * (b.harga - b.hargabeli)) AS jumlah_profit FROM tbl_pesanan p JOIN tbl_barang b ON p.id_barang = b.id_barang";
                                                $query = mysqli_query($mysqli, $sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo "RP" . number_format($row2['jumlah_profit'], 0, ".", ",");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-store fa-2x" style="color: rgba(124,45,18, 0.3);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Products Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 6px solid #AC6947;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #6B5E57; font-size: 16px;">Total Product Saled</div>
                                            <div class="h5 mb-0 font-weight-bold" style="color: #854d0e">
                                                <?php
                                                $sql = "SELECT SUM(qty) as jumlah_produk from tbl_pesanan";
                                                $query = mysqli_query($mysqli, $sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo number_format($row2['jumlah_produk'], 0, ".", ",");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-boxes fa-2x" style="color: rgba(124,45,18, 0.3);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Transactions Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2" style="border-left: 6px solid #6B5E57;">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #6B5E57; font-size: 16px;">Total Transactions</div>
                                            <div class="h5 mb-0 font-weight-bold" style="color: #854d0e">
                                                <?php
                                                $sql = "SELECT COUNT(id_pesanan) as jumlah_transaksi from tbl_pesanan";
                                                $query = mysqli_query($mysqli, $sql);
                                                while ($row2 = mysqli_fetch_array($query)) {
                                                    echo number_format($row2['jumlah_transaksi'], 0, ".", ",");
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cash-register fa-2x" style="color: rgba(124,45,18, 0.3);"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                    <!-- <div class="row"> -->
                    <!-- <iframe name="mondrian" src="http://localhost:8080/mondrian/index.html" style="height:300px; width:100%; border:none; align-content:center"> </iframe> -->
                    <!-- <iframe name="mondrian" src="http://localhost:8080/mondrian/testpage.jsp?query=dwoadw1" style="height:1000px; width:100%; border:none; align-content:center"> </iframe>
                    </div>         -->
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
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to Leave this Site?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "LogOut" button below if you are ready to end your current session.</div>
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


</body>

</html>