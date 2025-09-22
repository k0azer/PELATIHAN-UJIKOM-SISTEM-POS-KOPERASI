<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'dbconnect.php';
date_default_timezone_set('Asia/Jakarta');

function seper($input){
    $num = (int)preg_replace('/[^\d]/', '', $input);
    return $num;
}
$nama=$_POST['nama'];
$status=$_POST['status'];
$tipe=$_POST['tipe'];
$sub=$_POST['sub'];
$satuan = $_POST['satuan'];
$stok = $_POST['stok'];
$hargau= seper($_POST['hargau']);
$hargab= seper($_POST['hargab']);
// $diskon=$_POST['diskon'];
// $stock=$_POST['stock'];
// $type=$_POST['type'];
// $subtype=$_POST['subtype'];
// $merk=$_POST['merk'];
// $keterangan=$_POST['keterangan'];
// $tanggal = date('Y-m-d H:i:s');

	  
$query = mysqli_query($conn,"insert into m_barang values('','$nama','$status','$tipe','$sub','$satuan','$hargau','$hargab', '$stok')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= barang.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= barang.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>