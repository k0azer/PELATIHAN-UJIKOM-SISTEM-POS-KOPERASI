<?php 

include 'db.php';


    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = mysqli_query($conn,"insert into contact values('','$nama','$email','$subject','$message')");
    if ($query){
    
    echo " <div class='alert alert-success'>
        <strong>Success!</strong> Redirecting you back in 1 seconds.
      </div>
    <meta http-equiv='refresh' content='1; url= form.php'/>  ";
    } else { echo "<div class='alert alert-warning'>
        <strong>Failed!</strong> Redirecting you back in 1 seconds.
      </div>
     <meta http-equiv='refresh' content='1; url= form.php'/> ";
    }


?>