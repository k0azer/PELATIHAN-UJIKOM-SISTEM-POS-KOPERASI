<?php
 // panghil koneksi
include 'dbconnect.php';

 // loop data field
 foreach ($_POST['id'] as $key=>$val) {
  $id = (int) $_POST['id'][$key];
  $total = (int) $_POST['total'][$key];
  $sisa = (int) $_POST['sisa'][$key];
  $diterima = (int) $_POST['diterima'][$key];

  // udpate data
  // $sql = 'UPDATE m_barang SET';
  // $sql .= ' stok='.$total.'';
  // $sql .= ' WHERE kode_brg='.$id;
  $sql = "UPDATE m_permintaan mpt INNER JOIN m_barang mb ON mpt.idBarang = mb.kode_brg SET mpt.sisa = $total , mb.stok = mb.stok+$diterima WHERE mpt.idBarang = $id AND kode_brg = $id";
  $updatedata = mysqli_query($conn, "".$sql."") OR die($sql);


 }
$idBrg = $_POST['idbarang'];
$idPermintaan = $_POST['idPermintaan'];
$kodepermintaan = $_POST['kodepermintaan'];
$jumlahDiterima = $_POST['total'];
$idsupplier = $_POST['idSuppliers'];
$nopro = $_POST['nopro'];
$noso = $_POST['noso'];
$nodo = $_POST['nodo'];
$jumlahditerima = $_POST['diterima'];
$tanggalditerima = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];
$alur = $_POST['alur'];
//  $tanggal = $_POST['tanggal'];
//  $idsupplier = $_POST['idsupplier'];
//  $nama = $_POST['nama']; // Ambil data nama dan masukkan ke variabel nama
//  $subtipe = $_POST['subtipe']; // Ambil data nama dan masukkan ke variabel nama
//  $kodebarang = $_POST['kodebarang']; // Ambil data nama dan masukkan ke variabel nama
//  $hargau = $_POST['hargau']; // Ambil data nama dan masukkan ke variabel nama
//  $subtot = $_POST['subtotal']; // Ambil data nama dan masukkan ke variabel nama
//  $qty = $_POST['qty'];
//  $sisa = $_POST['qty'];
 
 // Proses simpan ke Database
 $sql = $pdo->prepare("INSERT INTO m_penerimaan VALUES('', :idBrg, :idPermintaan, :idSupplier, :noPermintaan, :noPro, :noSo, :noDo, :jumlahDiterima, :tanggalDiterima, :keterangan)");
 $index = 0; // Set index array awal dengan 0
 foreach($idBrg as $databarang){ // Kita buat perulangan berdasarkan nis sampai data terakhir
  $sql->bindParam(':idBrg', $databarang); // Set data nis
   $sql->bindParam(':idPermintaan', $idPermintaan[$index]); // Set data nis
   $sql->bindParam(':idSupplier', $idsupplier[$index]); // Ambil dan set data nama sesuai index array dari $index
   $sql->bindParam(':noPermintaan', $kodepermintaan[$index]); // Ambil dan set data telepon sesuai index array dari $index
   $sql->bindParam(':noPro', $nopro[0]); // Ambil dan set data alamat sesuai index array dari $index
   $sql->bindParam(':noSo', $noso[0]);
   $sql->bindParam(':noDo', $nodo[0]);
   $sql->bindParam(':jumlahDiterima', $jumlahditerima[$index]);
   $sql->bindParam(':tanggalDiterima', $tanggalditerima[$index]);
   $sql->bindParam(':keterangan', $keterangan[0]);
   $sql->execute(); // Eksekusi query insert
   
   $index++; // Tambah 1 setiap kali looping
 }

  
 if ($updatedata) {

  echo " <div class='alert alert-success'>
          <strong>Success!</strong> Redirecting you back in 1 seconds.
        </div>
      <meta http-equiv='refresh' content='1; url= stok.php'/>  ";
} else {
  echo "<div class='alert alert-warning'>
          <strong>Failed!</strong> Redirecting you back in 1 seconds.
        </div>
       <meta http-equiv='refresh' content='1; url= stok.php'/> ";
}

?>
<html>
<head>
<title>Penerimaan</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>