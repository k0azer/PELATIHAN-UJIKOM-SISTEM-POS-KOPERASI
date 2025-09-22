<?php
include 'dbconnect.php';

include 'cek.php';
date_default_timezone_set('Asia/Jakarta');

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function kode($id)
{
    $kodebarang = 'BRG' . sprintf("%05s", $id);
    return $kodebarang;
}
function seper($input)
{
    $num = (int)preg_replace('/[^\d]/', '', $input);
    return $num;
}
$date = date('Y-m-d H:i:s');

if (isset($_POST['update'])) {
    $idx = $_POST['idbrg'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $tipe = $_POST['tipe'];
    $sub = $_POST['sub'];
    $hargau = seper($_POST['hargau']);
    $hargap = seper($_POST['hargap']);
    $hargab = seper($_POST['hargab']);
    // $type = $_POST['type'];
    // $subtype = $_POST['subtype'];
    // $merk = $_POST['merk'];
    // $keterangan = $_POST['keterangan'];
    // $tanggal = date('Y-m-d H:i:s');

    $updatedata = mysqli_query($conn, "update m_barang set nama='$nama', status='$status', tipeID='$tipe', subtipeID='$sub', harga_umum='$hargau', harga_promo='$hargap', harga_beli = '$hargab' where kode_brg='$idx'");

    //cek apakah berhasil
    if ($updatedata) {

        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= barang.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= barang.php'/> ";
    }
};

if (isset($_POST['hapus'])) {
    $idx = $_POST['idbrg'];

    $delete = mysqli_query($conn, "delete from m_barang where kode_brg='$idx'");
    //hapus juga semua data barang ini di tabel keluar-masuk
    $deltabelkeluar = mysqli_query($conn, "delete from sbrg_keluar where id='$idx'");
    $deltabelmasuk = mysqli_query($conn, "delete from sbrg_masuk where id='$idx'");

    //cek apakah berhasil
    if ($delete && $deltabelkeluar && $deltabelmasuk) {
        mysqli_query($conn, "ALTER TABLE m_barang AUTO_INCREMENT = 1");
        echo " <div class='alert alert-success'>
                <strong>Success!</strong> Redirecting you back in 1 seconds.
              </div>
            <meta http-equiv='refresh' content='1; url= barang.php'/>  ";
    } else {
        echo "<div class='alert alert-warning'>
                <strong>Failed!</strong> Redirecting you back in 1 seconds.
              </div>
             <meta http-equiv='refresh' content='1; url= barang.php'/> ";
    }
};

mysqli_query($conn, "ALTER TABLE m_barang AUTO_INCREMENT = 1");
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
                <div class="sidebar-brand-text mx-3">POS KOPERASI<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Data Barang -->
            <li class="nav-item active">
                <a class="nav-link" href="barang.php">
                    <i class="fas fa-warehouse"></i>
                    <span>Data Barang</span></a>
            </li>
            <!-- Nav Item - Supplier -->
            <li class="nav-item ">
                <a class="nav-link" href="customer.php">
                    <i class="fas fa-users"></i>
                    <span>Customer</span></a>
            </li>
            <!-- Nav Item - Tipe-->
            <li class="nav-item ">
                <a class="nav-link" href="tipe.php">
                    <i class="fas fa-tags"></i>
                    <span>Tipe & Sub Tipe</span></a>
            </li>
            <!-- Nav Item - Kartu Stok-->
            <li class="nav-item ">
                <a class="nav-link" href="invoice.php">
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
                <a class="nav-link" href="penerimaan.php">
                    <i class="fas fa-file-invoice-dollar"></i></i>
                    <span>Invoice</span></a>
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

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> -->

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
                    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <h4 class="m-0 font-weight-bold">Data Barang</h4>
                                </div>
                                <div class="d-flex gap-2">
                                    <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addModal">+ Tambah Supplier</button> -->
                                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Barang</span>
                                    </a>
                                </div>
                            </div>
                            <!-- <h4 class="m-0 font-weight-bold">Data Barang</h4> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Tipe</th>
                                            <th>Sub Tipe</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $brgs = mysqli_query($conn, "SELECT * from m_barang sb, m_tipe st, m_subtipe sc where sb.tipeID=st.id_tipe AND sb.subtipeID=sc.id_sub ORDER BY kode_brg ASC");
                                        $no = 1;
                                        while ($p = mysqli_fetch_array($brgs)) {
                                            $idb = $p['kode_brg'];
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo kode($p['kode_brg']) ?></td>
                                                <td><?php echo $p['nama'] ?></td>
                                                <td><?php
                                                    if ($p['status'] === 'AKTIF') {
                                                        echo "<span class=\"badge badge-success\">" . $p['status'] . "</span>";
                                                    } else {
                                                        echo "<span class=\"badge badge-danger\">" . $p['status'] . "</span>";
                                                    }
                                                    ?></td>
                                                <td><?php echo $p['nama_tipe'] ?></td>
                                                <td><?php echo $p['nama_sub'] ?></td>
                                                <td><?php echo $p['stok'] ?></td>
                                                <td><?php echo $p['satuan'] ?></td>
                                                <td><?php echo rupiah($p['harga_beli']) ?></td>
                                                <td><?php echo rupiah($p['harga_umum']) ?></td>
                                                <td><a href="editBarang.php?id=<?php echo $idb; ?>"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                                            </tr>
                                            <!-- Edit Modal -->
                                            <div class="editModal">
                                                <div class="modal fade" id="edit<?= $idb; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Barang <?php echo kode($p['kode_brg']) ?> - <?php echo $p['nama'] ?> - <?php echo $p['nama_tipe'] ?></h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <label>Kode Barang</label>
                                                                        <input name="kode" type="text" class="form-control" value="<?php echo kode($p['kode_brg']) ?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input name="nama" type="text" class="form-control" value="<?php echo $p['nama'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="status" class=" custom-select form-control" required>
                                                                            <option value="<?php echo $p['status'] ?>" selected><?php echo $p['status'] ?></option>
                                                                            <option value="<?php echo $p['status'] ?>" disabled>---</option>
                                                                            <option value="AKTIF">AKTIF</option>
                                                                            <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Tipe</label>
                                                                        <select id="tipe-<?= $idb; ?>" name="tipe" class="custom-select form-control" data-live-search="true" required>
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
                                                                        <label>Sub Tipe</label>
                                                                        <select id="sub-<?= $idb; ?>" name="sub" class=" custom-select form-control" data-live-search="true" required>
                                                                            <option value="<?php echo $p['id_sub'] ?>" selected><?php echo $p['nama_sub'] ?></option>
                                                                            <option value="" disabled>---</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Harga Umum</label>
                                                                        <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Umum</label>
                                                                        <div class="input-group mb-2 mr-sm-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Rp.</div>
                                                                            </div>
                                                                            <input type="text" name="hargau" id="hargau" class="form-control" value="<?php echo $p['harga_umum'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Harga Beli</label>
                                                                        <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Beli</label>
                                                                        <div class="input-group mb-2 mr-sm-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Rp.</div>
                                                                            </div>
                                                                            <input type="text" name="hargab" id="hargab" class="form-control" value="<?php echo $p['harga_beli'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Harga Promo</label>
                                                                        <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Promo</label>
                                                                        <div class="input-group mb-2 mr-sm-2">
                                                                            <div class="input-group-prepend">
                                                                                <div class="input-group-text">Rp.</div>
                                                                            </div>
                                                                            <input type="text" name="hargap" id="hargap" class="form-control" value="<?php echo $p['harga_promo'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="idbrg" value="<?= $idb; ?>">
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-info" name="update">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                            </div>



                            <!-- Hapus Modal -->
                            <div class="modal fade" id="del<?= $idb; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="post">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang <?php echo kode($p['kode_brg']) ?> - <?php echo $p['nama'] ?> - <?php echo $p['nama_tipe'] ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus barang ini dari data barang?
                                                <input type="hidden" name="idbrg" value="<?= $idb; ?>">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
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
    <?php
    $last =  mysqli_query($conn, "SELECT MAX(kode_brg) as last FROM m_barang");
    // echo $last;
    while ($row = mysqli_fetch_array($last)) {
        if ($row['last'] == false) {
            mysqli_query($conn, "ALTER TABLE m_barang AUTO_INCREMENT = 1");
        }
        $lastkode = kode($row['last'] + 1);
    }
    ?>
    <!-- Tambah Barang Modal -->
    <div id="addModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang Baru</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah" action="tmb_brg_act.php" method="post">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input name="kode" type="text" class="form-control" placeholder="<?php echo $lastkode ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="selectpicker custom-select form-control" title="Pilih Status..." required>
                                <option value="AKTIF">AKTIF</option>
                                <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select id="tipe" name="tipe" class="selectpicker custom-select form-control" data-live-search="true" title="Pilih Tipe..." required>
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

                            <label>Sub Tipe</label>
                            <select id="sub" name="sub" class="selectpicker custom-select form-control" data-live-search="true" title="Pilih Subtipe..." required>
                                <option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>
                            </select>
                            <!-- <div id="subnama" class="m-2" style="display: none;">
                                <p>Jadikan subtipe sebagai nama produk? <a href="#" id="yabut"><span class="badge badge-success">ya</span></a> / <a href="#"><span class="badge badge-danger">tidak</span></a></p>
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input name="satuan" id="satuan" type="text" class="form-control" placeholder="Satuan" required>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input name="stok" id="stok" type="number" min="0" class="form-control" placeholder="Stok" required>
                        </div>
                        <div class="form-group">
                            <label>Harga Beli</label>
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Beli</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" name="hargab" id="hargab" class="form-control" placeholder="Harga Beli">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Harga Umum</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" name="hargau" id="hargau" class="form-control" placeholder="Harga Umum">
                            </div>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tipe').on('change', function() {
                var tipeID = $(this).val();
                if (tipeID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax.php',
                        data: 'tipe_id=' + tipeID,
                        success: function(html) {
                            $('#sub').html(html);
                            $('.selectpicker').selectpicker('refresh');
                        }
                    });
                } else {
                    $('#sub').html('<option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>');
                }
            });
        });

        $(document).ready(function() {
            $('#sub').on('change', function() {
                var subID = $(this).val();
                var subName = $("#sub option:selected").text();
                if (subID) {
                    // $("#nama").val(subName);
                    $('#subnama').css('display', 'block')
                    $('#yabut').on('click', function() {
                        $("#nama").val(subName);
                        $('#subnama').css('display', 'none')
                    });
                } else {
                    $('#sub').html('<option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>');
                }
            });
        });



        $('div[id^="edit"]').on('shown.bs.modal', function() {
            $('#tipe2').show(function() {
                var tipeID = $(this).val();
                if (tipeID) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax.php',
                        data: 'tipe_id=' + tipeID,
                        success: function(html) {
                            $('#sub2').html(html);
                        }
                    });
                } else {
                    $('#sub2').html('<option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>');
                }
            });
        });







        (function($, undefined) {

            "use strict";

            // When ready.
            $(function() {

                var $form = $("#tambah, div[id^='edit']");
                const harga = ["hargau", "hargab"];
                for (let i = 0; i < harga.length; i++) {
                    var $input = $form.find('input[name=' + harga[i] + ']');

                    $input.on("keyup", function(event) {


                        // When user select text in the document, also abort.
                        var selection = window.getSelection().toString();
                        if (selection !== '') {
                            return;
                        }

                        // When the arrow keys are pressed, abort.
                        if ($.inArray(event.keyCode, [38, 40, 37, 39]) !== -1) {
                            return;
                        }


                        var $this = $(this);

                        // Get the value.
                        var input = $this.val();

                        var input = input.replace(/[\D\s\._\-]+/g, "");
                        input = input ? parseInt(input, 10) : 0;

                        $this.val(function() {
                            return (input === 0) ? "" : input.toLocaleString("id-ID");
                        });
                    });

                }
            });
        })(jQuery);
    </script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Boostrap Select -->
    <script src="vendor/boostrap-select/js/bootstrap-select.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>