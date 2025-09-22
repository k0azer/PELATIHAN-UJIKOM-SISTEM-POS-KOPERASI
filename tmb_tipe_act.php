<?php 
include 'dbconnect.php';

date_default_timezone_set('Asia/Jakarta');

function seper($input){
    $num = (int)preg_replace('/[^\d]/', '', $input);
    return $num;
}
$nama=$_POST['nama_tipe'];
$status=$_POST['status_tipe'];


	  
$query = mysqli_query($conn,"insert into m_tipe values('','$nama','$status')");
if ($query){

echo " <div class='alert alert-success'>
    <strong>Success!</strong> Redirecting you back in 1 seconds.
  </div>
<meta http-equiv='refresh' content='1; url= tipe.php'/>  ";
} else { echo "<div class='alert alert-warning'>
    <strong>Failed!</strong> Redirecting you back in 1 seconds.
  </div>
 <meta http-equiv='refresh' content='1; url= tipe.php'/> ";
}
 
?>
 
  <html>
<head>
  <title>Tambah Subtipe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>