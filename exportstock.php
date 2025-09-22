<!doctype html>
<html class="no-js" lang="en">

<?php
include 'cek.php';
include 'dbconnect.php';
function kode($id)
{
    $kodebarang = 'BRG' . sprintf("%05s", $id);
    return $kodebarang;
}
?>

<html>

<head>
    <title>Kartu Stok</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144808195-1');
    </script>

</head>

<body>
    <div class="container">
        <h4>Kartu Stok</h4>
        <div class="data-tables datatable-dark">
            <table id="dataTable3" class="display" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Tipe</th>
                        <th>Sub Tipe</th>
                        <th>Stok</th>
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
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable3').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                select: {
                    style: 'multi'
                }

            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>r



</body>

</html>