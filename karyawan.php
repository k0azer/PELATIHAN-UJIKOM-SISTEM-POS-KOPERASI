<?php
include 'dbconnect.php';
include 'cek.php';
if (isset($_POST['update'])) {
    $idx = $_POST['idkar'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $office = $_POST['office'];
    $divisi = $_POST['divisi'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    // $kode=$_POST['kode'];


    $updatedata = mysqli_query($conn, "update m_karyawan set nik='$nik', nama_karyawan='$nama', office='$office', divisi='$divisi', jabatan='$jabatan', status='$status' where id_karyawan='$idx'");

    //cek apakah berhasil
    if ($updatedata) {

        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= karyawan.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= karyawan.php'/> ";
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BSS Inventory</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BSS INVENTORY <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Data Barang -->
            <li class="nav-item ">
                <a class="nav-link" href="barang.php">
                    <i class="fas fa-warehouse"></i>
                    <span>Data Barang</span></a>
            </li>
            <!-- Nav Item - Supplier -->
            <li class="nav-item">
                <a class="nav-link" href="supplier.php">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span>Supplier</span></a>
            </li>
            <!-- Nav Item - Tipe-->
            <li class="nav-item">
                <a class="nav-link" href="tipe.php">
                    <i class="fas fa-tags"></i>
                    <span>Tipe & Sub Tipe</span></a>
            </li>
            <!-- Nav Item - Kartu Stok-->
            <li class="nav-item ">
                <a class="nav-link" href="stok.php">
                    <i class="fas fa-boxes"></i>
                    <span>Kartu Stok</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>
            <!-- Nav Item - Permintaan-->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Permintaan</span>
                </a>
                <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MENU PERMINTAAN:</h6>
                        <a class="collapse-item" href="Tambahpermintaan.php">Tambah Permintaan</a>
                        <a class="collapse-item " href="permintaan.php">Data Permintaan</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Penerimaan-->
            <li class="nav-item ">
                <a class="nav-link" href="penerimaan.php">
                    <i class="fas fa-truck-loading"></i>
                    <span>Penerimaan</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lain-lain
            </div>
            <li class="nav-item active">
                <a class="nav-link " href="karyawan.php">
                    <i class="fas fa-users"></i>
                    <span>Karyawan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="profil.php">
                    <i class="fas fa-address-card"></i>
                    <span>Tentang Perusahaan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link-dark d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-dark" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <!-- Nav Item - Messages -->

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user']; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">PT BERKAT SAHABAT SEJATI</h1> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <h4 class="m-0 font-weight-bold">Karyawan</h4>
                                </div>
                                <div class="d-flex gap-2">
                                    <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModal">+ Tambah Supplier</button> -->
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Karyawan</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Office</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $brgs = mysqli_query($conn, "SELECT * from m_karyawan");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($brgs)) {
                                            $idb = $p['id_karyawan'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p['nik'] ?></td>
                                                <td><?php echo $p['nama_karyawan'] ?></td>
                                                <td><?php echo $p['office'] ?></td>
                                                <td><?php echo $p['divisi'] ?></td>
                                                <td><?php echo $p['jabatan'] ?></td>
                                                <td><?php
                                                    if ($p['status'] === 'AKTIF') {
                                                        echo "<span class=\"badge badge-success\">" . $p['status'] . "</span>";
                                                    } else {
                                                        echo "<span class=\"badge badge-danger\">" . $p['status'] . "</span>";
                                                    }
                                                    ?></td>
                                                <td><button data-toggle="modal" data-target="#editKar<?= $idb; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></button></td>
                                            </tr>
                                            <!-- Edit  Modal -->
                                            <div id="editKar<?= $idb; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <form method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Karyawan </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>NIK</label>
                                                                    <input name="nik" type="number" class="form-control" value="<?php echo $p['nik'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input name="nama" type="text" class="form-control" value="<?php echo $p['nama_karyawan'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Office</label>
                                                                    <input name="office" type="text" class="form-control" value="BSS TEKNO" readonly required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Divisi</label>
                                                                    <input name="divisi" type="text" class="form-control" value="IRC" readonly required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Jabatan</label>
                                                                    <input name="jabatan" type="text" class="form-control" value="<?php echo $p['jabatan'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status" class="custom-select form-control selectpicker" title="Pilih Status..." required>
                                                                        <!-- <option value="">Pilih status</option> -->
                                                                        <option value="AKTIF" selected>AKTIF</option>
                                                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-info" name="update">Save</button>
                                                            </div>
                                                            <input type="hidden" name="idkar" value="<?= $idb; ?>">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; BSS Inventory 2022</span>
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

    <!-- Tambah Supplier Modal -->
    <div id="addModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Karyawan Baru</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah" action="tmb_karyawan_act.php" method="post">
                        <div class="form-group">
                            <label>NIK</label>
                            <input name="nik" type="number" class="form-control" placeholder="NIK">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" type="text" class="form-control" placeholder="Nama Karyawan" required>
                        </div>
                        <div class="form-group">
                            <label>Office</label>
                            <input name="office" type="text" class="form-control" value="BSS TEKNO" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Divisi</label>
                            <input name="divisi" type="text" class="form-control" value="IRC" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input name="jabatan" type="text" class="form-control" placeholder="Jabatan" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="custom-select form-control selectpicker" title="Pilih Status..." required>
                                <!-- <option value="">Pilih status</option> -->
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>