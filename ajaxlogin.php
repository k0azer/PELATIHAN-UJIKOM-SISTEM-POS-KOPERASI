<?php


include('dbconnect.php');

if(!empty($_POST["username"])){ 
    session_start();
  $username     = $_POST['username'];
  $password      = MD5($_POST['password']);
  
  //query
  $query  = "SELECT * FROM m_login WHERE username='$username' AND password='$password'";
  $result     = mysqli_query($conn, $query);
  $num_row     = mysqli_num_rows($result);
  // $row         = mysqli_fetch_array($result);
  
  
  if($num_row >=1) {
      
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

?>