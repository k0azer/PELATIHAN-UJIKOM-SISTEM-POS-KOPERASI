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
<style>
    .dataTables_empty {
        display: none;
    }

    .test input {
        border: 0;
    }
</style>

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
                Sales
            </div>
            <!-- Nav Item - transaksi-->
            <li class="nav-item active">
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
                    <!-- <h1 class="h3 mb-2 text-gray-800">PT BERKAT SAHABAT SEJATI</h1> -->
                    <!-- DataTales Example -->
                    <form action="tmb_transaksi_act.php" method="post">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <h4 class="m-0 font-weight-bold">Tambah Transaksi</h4>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="#" class="btn btn-primary btn-icon-split btn-md" data-toggle="modal" data-target="#addSup">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-list"></i>
                                            </span>
                                            <span class="text">Pilih Customer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kode Invoice</label>
                                            <?php
                                            $h = date('ym');
                                            $kode = $h . '001';
                                            $query = "SELECT * FROM m_transaksi WHERE kode_transaksi = $kode";
                                            $result = $db->query($query);

                                            // Generate HTML of state options list 
                                            if ($result->num_rows > 0) {
                                                $query2 = "SELECT kode_transaksi AS last FROM m_transaksi ORDER BY kode_transaksi DESC LIMIT 1";
                                                $result2 = $db->query($query2);
                                                while ($row = $result2->fetch_assoc()) {
                                                    $kode = $row['last'] + 1;
                                                }
                                                // echo $kode;
                                            } else {
                                                // echo $kode;
                                            }
                                            ?>
                                            <input name="nama" type="text" class="form-control" value="INV<?= $kode ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <?php
                                            $tanggal = date('d/m/Y');
                                            ?>
                                            <input type="text" class="form-control" placeholder="<?php echo $tanggal ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <input name="nama" id="nama" minlength="3" type="text" class="form-control" placeholder="" required readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input name="kode" id="kode" type="text" class="form-control" placeholder="" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input name="alamat" id="alamat" type="text" class="form-control" readonly required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telp</label>
                                            <input name="telp" id="telp" type="text" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">

                                </div>


                            </div>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <h4 class="m-0 font-weight-bold"><i class="fas fa-shopping-cart"></i> Keranjang</h4>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="#" id="pilihbarang" class="btn btn-primary btn-icon-split btn-md disabled" data-toggle="modal" data-target="#addModal">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-list"></i>
                                            </span>
                                            <span class="text">Pilih Barang</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Aksi</th>
                                                <!-- <th>No</th> -->
                                                <th>Nama Barang</th>
                                                <th>Sub Tipe</th>
                                                <th>Kode Barang</th>
                                                <th>QTY</th>
                                                <th>Harga</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bodycoy">

                                        </tbody>
                                    </table>
                                </div>


                                <div class="d-flex justify-content-center">
                                    <!-- <input class="btn btn-danger m-1" style="display: none;" id="del" type="button" value="DELETE"> -->
                                    <input class="btn btn-primary m-1" style="display: none;" id="submitCoy" type="submit" value="Simpan">
                                </div>

                                <div class="d-flex justify-content-end">
                                    <!-- <button class="btn btn-primary btn-md" id="coy">Click Me</button> -->

                                    <span class="test"><input type="text" style="width:100%" name="grandtotal" id="grandtotal" required readonly></span>
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
                    <button class="btn btn-primary btn-md" id="coy">Simpan</button>
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
                            <label>Nama Customer</label>
                            <select id="sup" name="sup" class="selectpicker custom-select form-control form-control-lg dropup" data-actions-box="true" title="Pilih Supplier..." data-dropup-auto="false" data-live-search="true">
                                <?php
                                $det = mysqli_query($conn, "select * from m_customer order by id_customer ASC");
                                while ($d = mysqli_fetch_array($det)) {
                                ?>
                                    <option value="<?php echo $d['id_customer'] ?>"><?php echo $d['kode_cust'] ?> - <?php echo $d['nama_cust'] ?></option>
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

        // format angka ke Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        // fungsi buat hitung ulang total keseluruhan
        function hitungTotal() {
            let total = 0;
            $('input[name="subtotal[]"]').each(function() {
                total += parseInt($(this).val()) || 0;
            });
            $("#grandtotal").val('Grand Total: ' + formatRupiah(total)); // asumsi ada input total belanja di bawah tabel
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
                                hitungTotal();
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

            $('#pilihsup').on('click', function() {
                var supName = $('#sup option:selected').text()
                var supKode = $('#sup option:selected').val()

                $.ajax({
                    type: 'POST',
                    url: 'ajax.php',
                    dataType: "json",
                    data: {
                        "id_sup": supKode
                    },
                    success: function(data) {
                        // console.log('Do whatever you want with ' + data.nama + '.');\
                        var nama_cust = data.nama;
                        var kode_cust = data.kode;
                        var alamat = data.alamat;
                        var telp = data.telp;
                        $('#nama').val(nama_cust);
                        $('#kode').val(kode_cust);
                        $('#alamat').val(alamat);
                        $('#telp').val(telp);
                        $('#pilihbarang').removeClass('disabled');
                        $(".supplier").each(function() {
                            $(this).val(supKode);
                        });
                    }
                });
                $('#addSup').modal('hide');
            })
        });


        $('body').on('focus', 'tr', function(e) {
            // alert($(this).val());
            var ya = $(this).find('[id^=qty]');
            var yo = $(this).find('[id^=subtotal]');
            var yi = $(this).find('[id^=hargau]');

            ya.on('keyup', function(event) {
                var hi = parseInt(yi.val());
                var subtot = ya.val() * hi;
                console.log(yi.val());
                yo.val(subtot);

                var sum = 0;
                $('[id^=subtotal]').each(function() {
                    sum += parseInt($(this).val());
                });
                $('#asem').val('Grand Total: ' + rupiah(sum))
            })

            // var jumlah = $(this).val();
            // var idOfSelect = this.closest('span').id
            // console.log("Select ID: " + idOfSelect);
            // $('[id^=subtotal]').text($(this).val());

        });

        // event delegation biar jalan walau row muncul dari AJAX
        $(document).on("input", 'input[name="qty[]"]', function() {
            let row = $(this).closest("tr");
            let qty = parseInt($(this).val()) || 0;
            let harga = parseInt(row.find('input[name="hargau[]"]').val()) || 0;
            let subtotal = qty * harga;

            row.find('input[name="subtotal[]"]').val(subtotal);

            hitungTotal(); // update grand total tiap kali qty berubah
        });



        // $("#del").on('click', function() {
        //     $('.case:checkbox:checked').parents("tr").remove();
        //     // $('.check_all').prop("checked", false);
        //     // check();
        //     var sum = 0;
        //     $('[id^=subtotal]').each(function() {
        //         sum += parseInt($(this).val());
        //     });
        //     hitungTotal();

        // });

        $(document).on('click', '.btn-delete', function() {
            $(this).closest('tr').remove();

            // update total setelah row dihapus
            var sum = 0;
            $('input[name="subtotal[]"]').each(function() {
                sum += parseInt($(this).val().replace(/[^0-9]/g, '')) || 0;
            });
            hitungTotal();
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