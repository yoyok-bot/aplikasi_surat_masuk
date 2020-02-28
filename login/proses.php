<?php
require_once "../config/config.php";

if(isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];
    $sql_login = mysqli_query($con, "SELECT * FROM login WHERE username = '$user' AND password = '$pass' ") or die (mysqli_error($con));
    $cek2 = mysqli_num_rows($sql_login);
    if ($cek2 !== 0) {
        $sql = mysqli_fetch_array($sql_login);
        if ($sql['level'] == "admin") {
            $_SESSION['username'] = $sql['username'];
            $_SESSION['admin'] = $sql['level'];
            $_SESSION['nama'] = $sql['nama'];
            header("location:../index.php");
        } else if ($sql['level'] == "operator") {
            $_SESSION['username'] = $sql['username'];
            $_SESSION['operator'] = $sql['level'];
            header("location:../index.php");
        }
      }  else {
          header("location:login.php?pesan=gagal");
      }
    }
       ?>
