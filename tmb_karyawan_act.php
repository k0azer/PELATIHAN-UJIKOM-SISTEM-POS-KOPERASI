<?php 
include 'dbconnect.php';

date_default_timezone_set('Asia/Jakarta');

function seper($input){
    $num = (int)preg_replace('/[^\d]/', '', $input);
    return $num;
}
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$office=$_POST['office'];
$divisi=$_POST['divisi'];
$jabatan=$_POST['jabatan'];
$status=$_POST['status'];
	  
$query = mysqli_query($conn,"insert into m_karyawan values('','$nik','$nama','$office','$divisi','$jabatan','$status')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= karyawan.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= karyawan.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Karyawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>