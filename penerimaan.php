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
?>
<style>
    .dataTables_empty {
        display: none;
    }

    .test input {
        border: 0;
    }
</style>
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
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div class="sidebar-brand-text mx-3">BSS INVENTORY <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Data Barang -->
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
            <li class="nav-item ">
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
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-shipping-fast"></i>
                    <span>Permintaan</span>
                </a>
                <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MENU PERMINTAAN:</h6>
                        <a class="collapse-item" href="Tambahpermintaan.php">Tambah Permintaan</a>
                        <a class="collapse-item" href="permintaan.php">Data Permintaan</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Penerimaan-->
            <li class="nav-item active">
                <a class="nav-link" href="penerimaan.php">
                    <i class="fas fa-truck-loading"></i>
                    <span>Penerimaan</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Lain-lain
            </div>
            <li class="nav-item ">
                <a class="nav-link" href="karyawan.php">
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
                    <form action="prosesPenerimaan.php" method="post" class="needs-validation" novalidate>
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <h4 class="m-0 font-weight-bold">Penerimaan</h4>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <!-- <a href="#" class="btn btn-primary btn-icon-split btn-md" data-toggle="modal" data-target="#addSup">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-list"></i>
                                            </span>
                                            <span class="text">Pilih Supplier</span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Pilih Supplier</label>
                                            <select id="sup" name="sup" class="selectpicker custom-select form-control dropup" data-actions-box="true" title="Pilih supplier..." data-dropup-auto="false" data-live-search="true">
                                                <?php
                                                $det = mysqli_query($conn, "select * from m_supplier order by id_supplier ASC");
                                                while ($d = mysqli_fetch_array($det)) {
                                                ?>
                                                    <option value="<?php echo $d['id_supplier'] ?>"><?php echo $d['nama_sup'] ?></option>
                                                <?php
                                                }
                                                ?>



                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No. PO</label>
                                            <?php
                                            // $nopro = 'RPT/2020202';
                                            ?>
                                            <input type="text" name="nopro[]" class="form-control" placeholder="No. PO">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input name="kode" id="kode" type="text" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <?php
                                            $tanggal = date('d/m/Y');
                                            ?>
                                            <input type="text" class="form-control" value="<?php echo $tanggal ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input name="keterangan[]" id="kode" type="text" class="form-control" placeholder="Keterangan">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No. Sales Order</label>
                                            <input type="text" name="noso[]" class="form-control" placeholder="No. SO" required>
                                            <div class="invalid-feedback">
                                                No. SO Wajib Di Isi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input id="alamat" type="text" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>No. Delivery Order</label>
                                            <input type="text" name="nodo[]" class="form-control" placeholder="No. DO">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="alur[]" class="form-control" value="MASUK">
                                <div class="d-flex justify-content-center">

                                </div>


                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <h4 class="m-0 font-weight-bold">List Permintaan</h4>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <!-- <a href="#" id="pilihbarang" class="btn btn-primary btn-icon-split btn-md disabled" data-toggle="modal" data-target="#addModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-list"></i>
                                            </span>
                                            <span class="text">Pilih Barang</span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select id="nopermintaan" name="nopermintaan" class="selectpicker custom-select form-control form-control-lg dropup col-6 nopermintaan" data-actions-box="true" title="Pilih No. Permintaan..." data-dropup-auto="false" data-live-search="true" required>
                                        <option value="" disabled>-- Pilih Supplier Terlebih Dahulu --</option>
                                    </select>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>No Permintaan</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Produk</th>
                                                <!-- <th>Tanggal</th> -->
                                                <th>Jumlah</th>
                                                <th>Sisa</th>
                                                <th>Diterima</th>
                                                <th>Total Tersisa</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodyTable">

                                        </tbody>
                                    </table>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <input class="btn btn-danger" style="display: none;" id="del" type="button" value="DELETE">
                                    <input class="btn btn-primary m-2" style="display: none;" id="submitCoy" type="submit" value="Simpan">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <!-- <button class="btn btn-primary btn-md" id="coy">Click Me</button> -->

                                    <span class="test"><input type="text" style="width:100%" name="asem" id="asem" required readonly></span>
                                </div>
                            </div>
                        </div>
                    </form>




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
    <!-- Tambah Barang Modal -->
    <div id="addModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Barang</h4>
                </div>
                <div class="modal-body">
                    <form id="tambah" method="post">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select id="tipe" name="tipe" class="selectpicker custom-select form-control form-control-lg dropup" data-actions-box="true" title="Pilih barang..." data-dropup-auto="false" data-live-search="true" multiple>
                                <?php
                                $det = mysqli_query($conn, "select * from m_barang a, m_tipe b WHERE a.tipeID=b.id_tipe order by kode_brg ASC");
                                while ($d = mysqli_fetch_array($det)) {
                                ?>
                                    <option value="<?php echo $d['kode_brg'] ?>"><?php echo kode($d['kode_brg']) . " - " . $d['nama'] . " - " . $d['nama_tipe'] ?></option>
                                <?php
                                }
                                ?>



                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-md" id="coy">Click Me</button>
                </div>
            </div>
        </div>
    </div>

    <div id="addSup" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Supplier</h4>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label>Nama Supplier</label>
                            <select id="sup" name="sup" class="selectpicker custom-select form-control form-control-lg dropup" data-actions-box="true" title="Pilih barang..." data-dropup-auto="false" data-live-search="true">
                                <?php
                                $det = mysqli_query($conn, "select * from m_supplier order by id_supplier ASC");
                                while ($d = mysqli_fetch_array($det)) {
                                ?>
                                    <option value="<?php echo $d['id_supplier'] ?>"><?php echo $d['kode_sup'] ?> - <?php echo $d['nama_sup'] ?></option>
                                <?php
                                }
                                ?>



                            </select>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary btn-md" id="pilihsup">Pilih</button>
                </div>
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
        $(':input[readonly]').css({
            'background-color': '#fff'
        });
        /* Fungsi formatRupiah */
        function rupiah(number) {
            return number.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });
        }



        $(document).ready(function() {
            $('#coy').on('click', function() {
                var kena = $('#tipe').val();
                var supKode = $('#sup option:selected').val()
                // alert(kena);

                console.log(kena.length);

                var a = 2;
                for (let i = 0; i < kena.length; i++) {
                    count = $('table tr').length;
                    if (kena) {
                        $.ajax({
                            type: 'POST',
                            url: 'ajax.php',
                            data: {
                                "id_brg": kena[i],
                                "id_sup": supKode
                            },
                            success: function(html) {
                                $('#bodycoy').append(html);
                                a++;
                                $("#tipe").val('default');
                                $("#tipe").selectpicker("refresh");
                                var sum = 0;
                                $('[id^=subtotal]').each(function() {
                                    sum += parseInt($(this).val());
                                });
                                $('#asem').val('Grand Total: ' + rupiah(sum));
                            }
                        });
                        $('#addModal').modal('hide');
                        $('#submitCoy').css('display', 'inline');
                        $('#del').css('display', 'inline');

                    } else {
                        $('#sub').html('<option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>');
                    }

                }
            })

            $('#sup').on('change', function() {
                var supName = $('#sup option:selected').text()
                var supKode = $('#sup option:selected').val()
                $('#bodyTable').html('')

                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    dataType: "json",
                    data: {
                        "id_sup": supKode
                    },
                    success: function(data) {
                        // console.log('Do whatever you want with ' + data.nama + '.');\
                        var nama_sup = data.nama;
                        var kode_sup = data.kode;
                        var alamat = data.alamat;
                        var pic = data.pic;
                        $('#nama').val(nama_sup);
                        $('#kode').val(kode_sup);
                        $('#alamat').val(alamat);
                        $('#pic').val(pic);
                        $('#pilihbarang').removeClass('disabled');
                        $(".supplier").each(function() {
                            $(this).val(supKode);
                        });
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: {
                        "idsup": supKode
                    },
                    success: function(html) {
                        $('#nopermintaan').html(html);
                        $('.nopermintaan').selectpicker('refresh');
                    }
                });
            })


            $('#nopermintaan').on('change', function() {
                var noper = $('#nopermintaan option:selected').val()

                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    data: {
                        "no_permintaan": noper
                    },
                    success: function(html) {
                        $('#bodyTable').html(html);
                        var sum = 0;
                        $('[id^=total]').each(function() {
                            sum += parseInt($(this).val());
                        });
                        $('#asem').val('Total keseluruhan: ' + sum)
                        $('#submitCoy').css('display', 'inline');
                        $('#errorNotice').remove();
                    },
                    error: function(request, status, error) {
                        $('#submitCoy').css('display', 'none');
                        $('#bodyTable').html('')
                        $('#content').append(request.responseText)
                    }
                });
            })
        });




        $('body').on('focus', 'tr', function(e) {
            // alert($(this).val());
            var diterima = $(this).find('[id^=diterima]');
            var total = $(this).find('[id^=total]');
            var sisa = $(this).find('[id^=sisa]');
            var jumlahPermintaan = $(this).find('[id^=jumlah]');

            diterima.on('keyup', function(event) {
                // var hi = parseInt(yi.val());
                // var hasil = parseInt(sisa.val()) + parseInt(diterima.val())
                var hasilSisa = parseInt(sisa.val()) - parseInt(diterima.val())
                // console.log(yi.val());
                total.val(hasilSisa);
                // sisa.val(hasilSisa);

                var sum = 0;
                var sumSisa = 0
                $('[id^=total]').each(function() {
                    sum += parseInt($(this).val());
                });

                $('#asem').val('Total keselurahan : ' + sum)
            })

            diterima.on('change', function(event) {
                // var hi = parseInt(yi.val());
                // var hasil = parseInt(sisa.val()) + parseInt(diterima.val())
                var hasilSisa = parseInt(sisa.val()) - parseInt(diterima.val())
                // console.log(yi.val());
                total.val(hasilSisa);
                // sisa.val(hasilSisa);

                var sum = 0;
                var sumSisa = 0
                $('[id^=total]').each(function() {
                    sum += parseInt($(this).val());
                });

                $('#asem').val('Total keselurahan : ' + sum)
            })

            // var jumlah = $(this).val();
            // var idOfSelect = this.closest('span').id
            // console.log("Select ID: " + idOfSelect);
            // $('[id^=subtotal]').text($(this).val());

        });


        $("#del").on('click', function() {
            $('.case:checkbox:checked').parents("tr").remove();
            // $('.check_all').prop("checked", false);
            // check();
            var sum = 0;
            $('[id^=subtotal]').each(function() {
                sum += parseInt($(this).val());
            });
            $('#asem').val('Grand Total: ' + rupiah(sum))

        });

        // var i = 2;
        // $(".addmore").on('click', function() {
        //     count = $('table tr').length;
        //     var data = "<tr><td><input type='checkbox' class='case'/></td><td><span id='snum" + i + "'>" + count + ".</span></td>";
        //     data += "<td><input type='text' id='first_name" + i + "' name='first_name[]'/></td> <td><input type='text' id='last_name" + i + "' name='last_name[]'/></td><td><input type='text' id='tamil" + i + "' name='tamil[]'/></td><td><input type='text' id='english" + i + "' name='english[]'/></td><td><input type='text' id='computer" + i + "' name='computer[]'/></td><td><input type='text' id='total" + i + "' name='total[]'/></td></tr>";
        //     $('table').append(data);
        //     i++;
        // });

        // function select_all() {
        //     $('input[class=case]:checkbox').each(function() {
        //         if ($('input[class=check_all]:checkbox:checked').length == 0) {
        //             $(this).prop("checked", false);
        //         } else {
        //             $(this).prop("checked", true);
        //         }
        //     });
        // }

        function check() {
            obj = $('table tr').find('span');
            $.each(obj, function(key, value) {
                id = value.id;
                $('#' + id).html(key + 1);
            });
        }

        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Boostrap Select -->
    <script src="vendor/boostrap-select/js/bootstrap-select.js"></script>

    <!-- Boostrap validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#dataTable').DataTable({
            "info": false,
            "searching": false,
            "ordering": false,
            "lengthChange": false,
            "paging": false

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