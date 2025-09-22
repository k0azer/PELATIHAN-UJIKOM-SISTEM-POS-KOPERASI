<?php
include 'dbconnect.php';
function kode($id)
{
    $kodebarang = 'BRG' . sprintf("%05s", $id);
    return $kodebarang;
}
date_default_timezone_set('Asia/Jakarta');
if (!empty($_POST["username"])) {
  session_start();
  $username     = $_POST['username'];
  $password      = MD5($_POST['password']);

  //query
  $query  = "SELECT * FROM m_login WHERE username='$username' AND password='$password'";
  $result     = mysqli_query($conn, $query);
  $num_row     = mysqli_num_rows($result);
  // $row         = mysqli_fetch_array($result);


  if ($num_row >= 1) {

    $row         = mysqli_fetch_array($result);
    echo "success";

    $_SESSION['user'] = $row['nickname'];
    $_SESSION['user_login'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['role'] = "stock";
  } else {

    echo "error";
  }
}

if(!empty($_POST["tipe_id"])){ 
  // Fetch state data based on the specific country 
  $query = "SELECT * FROM m_subtipe WHERE tipeID = ".$_POST['tipe_id']." ORDER BY id_sub ASC"; 
  $result = $db->query($query); 
   
  // Generate HTML of state options list 
  if($result->num_rows > 0){ 
    //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
      while($row = $result->fetch_assoc()){  
          echo '<option value="'.$row['id_sub'].'">'.$row['nama_sub'].'</option>' . "\r"; 
      } 
  }elseif (!empty($_POST["sub_id"])) {
    $now = $_POST["sub_id"];
    if($result->num_rows > 0){ 
      //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['id_sub'].'">'.$row['nama_sub'].'</option>' . "\r"; 
        } 
  }
}
  else{ 
      echo '<option value="" disabled selected>--Tidak Ada Sub Tipe--</option>'; 
  } 
} 

if (!empty($_POST['id_brg'])) {
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
  $id = $_POST['id_brg'];
  $id_sup = $_POST['id_sup'];
  // $no = $_POST['num'];
  $tanggal = date('Y-m-d H:i:s');
  $query = "SELECT * from m_barang sb, m_tipe st, m_subtipe sc where sb.tipeID=st.id_tipe AND sb.subtipeID=sc.id_sub AND sb.kode_brg = $id";
  $result = $db->query($query); 
  if($result->num_rows > 0){ 
    //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
      while($row = $result->fetch_assoc()){
      // echo '<tr><td><input type="checkbox" class="case"/></td>'. "\r";
          echo '<tr><td><button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button></td>' . "\r";
          echo '<td>'.$row['nama'].'</td>'. "\r";
          echo '<input style="width:100%" type="hidden" name="nama[]" value="'.$row['nama'].'" readonly>'. "\r";
          echo '<td>'.$row['nama_sub'].'</td>'. "\r";
          echo '<input style="width:100%" type="hidden" name="subtipe[]" value="'.$row['nama_sub'].'" readonly>'. "\r";
          echo '<td>'.kode($row['kode_brg']).'</td>'. "\r";
          echo '<input style="width:100%" type="hidden" name="kodebarang[]" value="'.$row['kode_brg'].'" readonly>'. "\r";
          echo '<td><input type="number" value=1 min=1 name="qty[]" id="qty'.$id.'" required></td>'. "\r";
          echo '<td><span class="test"><input style="width:100%" type="text" id="hargau'.$id.'" name="hargau[]" value="'.$row['harga_umum'].'" readonly></span></></td>'. "\r";
          echo '<td><span class="test"><input style="width:100%" type="text" id="subtotal'.$id.'" name="subtotal[]" value="'.$row['harga_umum'].'" readonly></span></></td>'. "\r";
          echo '<input type="hidden" name="kodetransaksi[]" value="'.$kode.'">';
          echo '<input type="hidden" name="tanggal[]" value="'.$tanggal.'">';
          echo '<input type="hidden" class="supplier" name="idsupplier[]" value="'.$id_sup.'"></tr>';
      } 
    }
}

if (!empty($_POST['id_sup'])) {
  $supid = $_POST['id_sup'];
  $query = "SELECT * FROM m_customer WHERE id_customer = $supid";
  $result = $db->query($query);

  // Generate HTML of state options list 
  if ($result->num_rows > 0) {
    //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
    while ($row = $result->fetch_assoc()) {
      $response = array(
        'id_sup' => $row['id_customer'],
        'kode' => $row['kode_cust'],
        'nama' => $row['nama_cust'],
        'alamat' => $row['alamat'],
        'telp' => $row['no_telp']
      );
      echo json_encode($response);
      // echo $b;
    }
  }
}

if (!empty($_POST['idsup'])) {
  $supid = $_POST['idsup'];
  $query = "select * from (select distinct kode_transaksi, idSup, `id_customer`, `nama_cust` from `m_transaksi` mp, m_customer ms WHERE mp.idSup=ms.`id_customer` AND idSup=)a;";
  $result = $db->query($query);

  // Generate HTML of state options list 
  if ($result->num_rows > 0) {
    //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
    while($row = $result->fetch_assoc()){  
      echo '<option value="'.$row['kode_transaksi'].'">TP'.$row['kode_transaksi'].' - '.$row['nama_sup'].'</option>' . "\r"; 
  } 
  }  else{ 
    echo '<option value="" disabled selected>--Tidak Ada Nomer transaksi--</option>'; 
} 
}

if (!empty($_POST['no_transaksi'])) {
  $no_per = $_POST['no_transaksi'];
  $query = "SELECT * FROM m_transaksi mp, m_barang mb, m_supplier ms WHERE mp.idBarang=mb.kode_brg AND mp.idSup = ms.id_supplier AND kode_transaksi = $no_per AND sisa>0 ";
  $result = $db->query($query);

  // Generate HTML of state options list 
  if ($result->num_rows > 0) {
    //   echo '<option value="">-Pilih Sub Tipe-</option>'; 
    $no = 1;
    while($row = $result->fetch_assoc()){  
      // $total = $row['stok'] + $row['qty_transaksi'];
      echo '<tr>';
      echo '<input type="hidden" name="id[]" value="'.$row['kode_brg'].'">';
      echo '<input type="hidden" name="idtransaksi[]" value="'.$row['id_transaksi'].'">';
      echo '<input type="hidden" name="idSuppliers[]" value="'.$row['id_supplier'].'">';
      echo '<input type="hidden" name="tanggal[]" value="'.$tanggal = date('Y-m-d H:i:s').'">';
      echo '<input type="hidden" name="idbarang[]" value="'.$row['kode_brg'].'">';
      echo '<td>'.$no++.'</td>';
      echo '<td>TP'.$row['kode_transaksi'].'</td>';
      echo '<input type="hidden" name="kodetransaksi[]" value="'.$row['kode_transaksi'].'">';
      echo '<td>'.kode($row['kode_brg']).'</td>'. "\r";
      echo '<td>'.$row['nama'].'</td>';
      // echo '<td>'.date("d/m/Y", strtotime($row['tgl_transaksi'])).'</td>';
      echo '<td>'.$row['qty_transaksi'].'</td>';
      echo '<input type="hidden" name="jumlah[]" id="jumlah'.$row['kode_brg'].'" value="'.$row['qty_transaksi'].'" readonly>';
      // echo '<td>'.$row['stok'].'</td>';
      echo '<td><span class="test"><input type="number" style="width:100%" name="sisa[]" id="sisa'.$row['kode_brg'].'" value="'.$row['sisa'].'" readonly></span></td>';
      echo '<td><input type="number" max="'.$row['sisa'].'" min="0" class="form form-control form-control-sm" name="diterima[]" id="diterima'.$row['kode_brg'].'" required><div class="invalid-feedback">Pastikan jumlah terisi dan tidak melebihi sisa!</div></td>';
      // echo '<td>'.$row['qty_transaksi'].'</td>';
      echo '<td><span class="test"><input type="number" style="width:100%" name="total[]" id="total'.$row['kode_brg'].'" value="" readonly></span></td>';
      echo '</tr>';
  } 
  }  else{
    http_response_code(500);
    echo "<div id='errorNotice' class='alert alert-danger'>
    <strong>Tidak ada sisa pengiriman!</strong>
  </div>"; 
} 
}
