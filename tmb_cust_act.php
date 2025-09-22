<?php 
include 'dbconnect.php';

date_default_timezone_set('Asia/Jakarta');

function seper($input){
    $num = (int)preg_replace('/[^\d]/', '', $input);
    return $num;
}
$nama=$_POST['nama'];
$kode=$_POST['kode'];
$alamat=$_POST['alamat'];
// $kota=$_POST['kota'];
$status=$_POST['status'];
$notelp=$_POST['notelp'];

// $diskon=$_POST['diskon'];
// $stock=$_POST['stock'];
// $type=$_POST['type'];
// $subtype=$_POST['subtype'];
// $merk=$_POST['merk'];
// $keterangan=$_POST['keterangan'];
// $tanggal = date('Y-m-d H:i:s');

	  
$query = mysqli_query($conn,"insert into m_customer values('','$kode','$nama','$alamat','$status','$notelp')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= customer.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= customer.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Supplier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>