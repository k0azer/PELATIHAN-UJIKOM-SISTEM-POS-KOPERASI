<?php
// Include / load file koneksi.php
include "dbconnect.php";
// Ambil data yang dikirim dari form
$kodetransaksi = $_POST['kodetransaksi'];
$tanggal = $_POST['tanggal'];
$idsupplier = $_POST['idsupplier'];
$nama = $_POST['nama']; // Ambil data nama dan masukkan ke variabel nama
// $subtipe = $_POST['subtipe']; // Ambil data nama dan masukkan ke variabel nama
$kodebarang = $_POST['kodebarang']; // Ambil data nama dan masukkan ke variabel nama
$hargau = $_POST['hargau']; // Ambil data nama dan masukkan ke variabel nama
$subtot = $_POST['subtotal']; // Ambil data nama dan masukkan ke variabel nama
$qty = $_POST['qty'];
$sisa = $_POST['qty'];

// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO m_transaksi VALUES('', :kode_transaksi ,:tgl_transaksi,:idSup,:idBarang, :qty_transaksi, :subtotal, :sisa)");
$index = 0; // Set index array awal dengan 0
foreach ($kodetransaksi as $datatransaksi) { // Kita buat perulangan berdasarkan nis sampai data terakhir
  $sql->bindParam(':kode_transaksi', $datatransaksi); // Set data nis
  $sql->bindParam(':tgl_transaksi', $tanggal[$index]); // Ambil dan set data nama sesuai index array dari $index
  $sql->bindParam(':idSup', $idsupplier[$index]); // Ambil dan set data telepon sesuai index array dari $index
  $sql->bindParam(':idBarang', $kodebarang[$index]); // Ambil dan set data alamat sesuai index array dari $index
  $sql->bindParam(':qty_transaksi', $qty[$index]);
  $sql->bindParam(':subtotal', $subtot[$index]);
  $sql->bindParam(':sisa', $sisa[$index]);
  $sql->execute(); // Eksekusi query insert

  // setelah insert, update stok di m_barang
  $update = $pdo->prepare("UPDATE m_barang SET stok = stok - :qty WHERE kode_brg = :idBarang");
  $update->bindParam(':qty', $qty[$index]);
  $update->bindParam(':idBarang', $kodebarang[$index]);
  $update->execute();

  $index++; // Tambah 1 setiap kali looping
}
// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
// echo "<script>alert('Data berhasil disimpan');window.location = 'transaksi.php';</script>";
if ($sql) {

  echo " <div class='alert alert-success'>
          <strong>Success!</strong> Redirecting you back in 1 seconds.
        </div>
      <meta http-equiv='refresh' content='1; url= transaksi.php'/>  ";
} else {
  echo "<div class='alert alert-warning'>
          <strong>Failed!</strong> Redirecting you back in 1 seconds.
        </div>
       <meta http-equiv='refresh' content='1; url= transaksi.php'/> ";
}

?>
<html>

<head>
  <title>transaksi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>