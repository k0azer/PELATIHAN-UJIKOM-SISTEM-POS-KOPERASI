<?php 
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <form method="post" action="tambahform.php">
        <b>Nama:</b><br>
    <input type="text" name="nama" id="">

    <br><b>Email:</b><br>
    <input type="text" name="email" id="">

    <br><b>Subject:</b><br>
    <input type="text" name="subject" id="">

    <br><b>Message:</b><br>
    <input type="text" name="message" id="">

    <br><br><input type="submit" class="btn btn-primary" value="Simpan"
</form>

    
</head>
<body>
    
</body>
</html>