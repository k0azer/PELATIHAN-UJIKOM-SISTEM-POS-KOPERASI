<?php

include 'dbconnect.php';
include 'cek.php';

if (isset($_POST['updatetipe'])) {
    $idx = $_POST['idtipe'];
    $nama = $_POST['nama_tipe'];
    // $kode=$_POST['kode'];
    $status = $_POST['status_tipe'];


    $updatedata = mysqli_query($conn, "update m_tipe set nama_tipe='$nama', status_tipe='$status' where id_tipe='$idx'");

    //cek apakah berhasil
    if ($updatedata) {

        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= tipe.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= tipe.php'/> ";
    }
};

if (isset($_POST['hapustipe'])) {
    $idx = $_POST['idtipe'];

    $delete = mysqli_query($conn, "delete from m_tipe where id_tipe='$idx'");
    //hapus juga semua data barang ini di tabel keluar-masuk
    // $deltabelkeluar = mysqli_query($conn, "delete from sbrg_keluar where id='$idx'");
    // $deltabelmasuk = mysqli_query($conn, "delete from sbrg_masuk where id='$idx'");

    //cek apakah berhasil
    // if ($delete && $deltabelkeluar && $deltabelmasuk)
    if ($delete) {
        mysqli_query($conn, "ALTER TABLE m_tipe AUTO_INCREMENT = 1");
        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= tipe.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= tipe.php'/> ";
    }
};

if (isset($_POST['updatesub'])) {
    $idc = $_POST['idsub'];
    $tipe = $_POST['tipeID'];
    $nama_sub = $_POST['nama_sub'];
    $status_sub = $_POST['status_sub'];


    $updatedata = mysqli_query($conn, "update m_subtipe set tipeID = '$tipe', nama_sub='$nama_sub', status_sub='$status_sub' where id_sub='$idc'");

    //cek apakah berhasil
    if ($updatedata) {

        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= tipe.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= tipe.php'/> ";
    }
};

if (isset($_POST['hapussub'])) {
    $idc = $_POST['idsub'];

    $delete = mysqli_query($conn, "delete from m_subtipe where id_sub='$idc'");
    //hapus juga semua data barang ini di tabel keluar-masuk
    // $deltabelkeluar = mysqli_query($conn, "delete from sbrg_keluar where id='$idx'");
    // $deltabelmasuk = mysqli_query($conn, "delete from sbrg_masuk where id='$idx'");

    //cek apakah berhasil
    // if ($delete && $deltabelkeluar && $deltabelmasuk)
    if ($delete) {
        mysqli_query($conn, "ALTER TABLE m_subtipe AUTO_INCREMENT = 1");
        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= tipe.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= tipe.php'/> ";
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

    <title>POS KOPERASI</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Boostrap Select -->
    <link rel="stylesheet" href="vendor/boostrap-select/dist/css/bootstrap-select.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-desktop"></i>
                </div>
                <div class="sidebar-brand-text mx-3">POS KOPERASI <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Data Barang -->
            <li class="nav-item">
                <a class="nav-link" href="barang.php">
                    <i class="fas fa-warehouse"></i>
                    <span>Data Barang</span></a>
            </li>
            <!-- Nav Item - Supplier -->
            <li class="nav-item">
                <a class="nav-link" href="customer.php">
                    <i class="fas fa-users"></i>
                    <span>Customer</span></a>
            </li>
            <!-- Nav Item - Tipe-->
            <li class="nav-item active ">
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
                Sales
            </div>
            <!-- Nav Item - transaksi-->
            <li class="nav-item ">
                <a class="nav-link" href="transaksi.php">
                    <i class="fas fa-money-bill-wave"></i></i>
                    <span>Transaksi</span></a>
            </li>
            <!-- Nav Item - Penerimaan-->
            <li class="nav-item ">
                <a class="nav-link" href="invoice.php">
                    <i class="fas fa-file-invoice-dollar"></i></i>
                    <span>Invoice</span></a>
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <h3 class="m-0 font-weight-bold">Tipe</h3>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addTipe">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Tipe</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tipe</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $brgs = mysqli_query($conn, "SELECT * from m_tipe");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($brgs)) {
                                            $idb = $p['id_tipe'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p['nama_tipe'] ?></td>
                                                <td><?php
                                                    if ($p['status_tipe'] === 'AKTIF') {
                                                        echo "<span class=\"badge badge-success\">" . $p['status_tipe'] . "</span>";
                                                    } else {
                                                        echo "<span class=\"badge badge-danger\">" . $p['status_tipe'] . "</span>";
                                                    }
                                                    ?></td>
                                                <td><button data-toggle="modal" data-target="#edittipe<?= $idb; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></button> <button data-toggle="modal" data-target="#deltipe<?= $idb; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                            </tr>
                                            <!-- Edit Supplier Modal -->
                                            <div id="edittipe<?= $idb; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Tipe</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input name="nama_tipe" type="text" class="form-control" value="<?= $p['nama_tipe'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status_tipe" class="custom-select form-control" required>
                                                                        <option value="<?= $p['status_tipe'] ?>" selected><?= $p['status_tipe'] ?></option>
                                                                        <option value="<?= $p['status_tipe'] ?>" disabled>---</option>
                                                                        <!-- <option value="">Pilih status</option> -->
                                                                        <option value="AKTIF">AKTIF</option>
                                                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-info" name="updatetipe">Save</button>
                                                        </div>
                                                        <input type="hidden" name="idtipe" value="<?= $idb; ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deltipe<?= $idb; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Supplier <?php echo $p['nama_tipe'] ?>?</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus tipe ini ?
                                                                <input type="hidden" name="idtipe" value="<?= $idb; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger" name="hapustipe">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
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

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <h3 class="m-0 font-weight-bold">Subtipe</h3>
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addSubtipe">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Subtipe</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered display" id="" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Subtipe</th>
                                            <th>Tipe</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $brgs = mysqli_query($conn, "SELECT * from m_tipe mt, m_subtipe ms where mt.id_tipe=ms.tipeID ORDER BY nama_tipe ASC");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($brgs)) {
                                            $idc = $p['id_sub'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p['nama_sub'] ?></td>
                                                <td><?php echo $p['nama_tipe'] ?></td>
                                                <td><?php
                                                    if ($p['status_sub'] === 'AKTIF') {
                                                        echo "<span class=\"badge badge-success\">" . $p['status_sub'] . "</span>";
                                                    } else {
                                                        echo "<span class=\"badge badge-danger\">" . $p['status_sub'] . "</span>";
                                                    }
                                                    ?></td>
                                                <td><button data-toggle="modal" data-target="#editsub<?= $idc; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></button> <button data-toggle="modal" data-target="#delsub<?= $idc; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                            </tr>

                                            <!-- Edit subtipe Modal -->
                                            <div id="editsub<?= $idc; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Subtipe</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post">
                                                                <div class="form-group">
                                                                    <label>Tipe</label>
                                                                    <select name="tipeID" class="custom-select form-control" data-live-search="true" required>
                                                                        <option value="<?php echo $p['id_tipe'] ?>" selected><?php echo $p['nama_tipe'] ?></option>
                                                                        <option value="<?php echo $p['id_tipe'] ?>" disabled>---</option>
                                                                        <?php
                                                                        $det = mysqli_query($conn, "select * from m_tipe order by id_tipe ASC");
                                                                        while ($d = mysqli_fetch_array($det)) {
                                                                        ?>
                                                                            <option value="<?php echo $d['id_tipe'] ?>"><?php echo $d['nama_tipe'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input name="nama_sub" type="text" class="form-control" value="<?= $p['nama_sub'] ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Status</label>
                                                                    <select name="status_sub" class="custom-select form-control" required>
                                                                        <option value="<?= $p['status_sub'] ?>" selected><?= $p['status_sub'] ?></option>
                                                                        <option value="<?= $p['status_sub'] ?>" disabled>---</option>
                                                                        <option value="AKTIF">AKTIF</option>
                                                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-info" name="updatesub">Save</button>
                                                        </div>
                                                        <input type="hidden" name="idsub" value="<?= $idc; ?>">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="delsub<?= $idc; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="post">
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Subtipe <?php echo $p['nama_sub'] ?>?</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus subtipe ini ?
                                                                <input type="hidden" name="idsub" value="<?= $idc; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger" name="hapussub">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
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
                        <span>Copyright &copy; POS Koperasi by Sugeng Gunantio 2025</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda akan keluar dan diarahkan ke halaman login</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">batal</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah Supplier Modal -->
    <div id="addTipe" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tipe Baru</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah" action="tmb_tipe_act.php" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama_tipe" type="text" class="form-control" placeholder="Nama tipe" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_tipe" class="custom-select form-control selectpicker" title="Pilih Status..." required>
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

    <!-- Tambah Subtipe Modal -->
    <div id="addSubtipe" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Subtipe Baru</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah" action="tmb_sub_act.php" method="post">
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipeID" class="custom-select form-control selectpicker" data-live-search="true" title="Pilih Tipe..." required>
                                <!-- <option value="">Pilih status</option> -->
                                <?php
                                $det = mysqli_query($conn, "select * from m_tipe order by id_tipe ASC");
                                while ($d = mysqli_fetch_array($det)) {
                                ?>
                                    <option value="<?php echo $d['id_tipe'] ?>"><?php echo $d['nama_tipe'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama_sub" type="text" class="form-control" placeholder="Nama Subtipe" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_sub" class="custom-select form-control selectpicker" title="Pilih Status..." required>
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


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Boostrap Select -->
    <script src="vendor/boostrap-select/js/bootstrap-select.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>

</html>