<?php
include "config/config.php";
if(!isset($_SESSION['admin'])){
  if(!isset($_SESSION['operator'])){
  header("location:login/login.php");
  }
} else {

} ?>
<!DOCTYPE html>
<html>
<head>
  <title> Aplikasi Surat</title>
    <style type="text/css">
    body{
      font-family: arial;
      font-size: 14px;
    }
    #canvas{
      width: 960px;
      margin: 0 auto;
      border: 1px solid silver;
    }
    #header{
      font-size: 20px;
      padding: 20px;
    }
    <?php
    if(@$_SESSION['operator']){?>
    #menu{
      background-color: aqua;
    }
  <?php } else { ?>
    #menu{
      background-color: red;
    }
  <?php } ?>
    #menu ul{
      list-style: none;
      margin: 0;
      padding: 0;
    }
    #menu ul li.utama{
      display: inline-table;
    }
    #menu ul li:hover{
      background-color: white;
    }
    #menu ul li a{
      display: block;
      text-decoration: none;
      line-height: 40px;
      padding: 0 10px;
      color: black;
    }
    .utama ul{
      display: none;
      position: absolute;
      z-index: 2;
    }
    .utama:hover ul{
      display: block;
    }
    .utama ul li{
      display: block;
      background-color: aqua;
      width: 140px;
    }
    #isi{
      min-height: 400px;
      padding: 20px;
    }
    <?php
    if(@$_SESSION['operator']){?>
    #footer{
      text-align: center;
      padding: 15px;
      background-color: aqua;
    }
    <?php } else {?>
      #footer{
        text-align: center;
        padding: 15px;
        background-color: red;
      }
    <?php } ?>
    </style>
</head>
<body>
<div id="canvas">
  <div id="header">
    Ini Bagian Header
  </div>
  <div id="menu">
    <ul>
      <li class="utama"><a href="index.php">Beranda</a></li>
      <?php
      if(@$_SESSION['operator']){?>
      <li class="utama"><a href="#">Surat</a>
          <ul>
            <li><a href="?page=sm">Surat Masuk</a></li>
            <li><a href="?page=sk">Surat Keluar</a></li>
          </ul>
      </li>
      <li class="utama"><a href="#">Agenda</a>
        <ul>
          <li><a href="?page=agenda_masuk">Surat Masuk</a></li>
          <li><a href="?page=agenda_keluar">Surat Keluar</a></li>
        </ul>
      </li>
      <?php
    } else {?>
      <li class="utama"><a href="?page=operator">Operator</a></li>
      <li class="utama"><a href="?page=kasi">Kasi</a></li>
    <?php } ?>
      <li class="utama" style="float:right;"><a href="login/logout.php">Logout</a></li>
    </ul>
  </div>
  <div id="isi">
    <?php
    $page = @$_GET['page'];
    $action = @$_GET['action'];
    if($page == "sm"){
      if($action == ""){
        include "surat/surat_masuk.php";
      } else if ($action == "edit") {
        include "surat/edit_surat_masuk.php";
      } else if ($action == "hapus") {
        include "surat/hapus_surat_masuk.php";
      } else if ($action == "print") {
        include "laporan/print_disp.php";
      } else if ($action == "disp") {
        include "surat/disp_surat_masuk.php";
      } else if ($action == "tmb") {
        include "surat/tambah_surat_masuk.php";
      }  else if ($action == "cek") {
        include "surat/cek_surat_masuk.php";
      }
    } else if($page == "sk"){
      if($action == ""){
        include "surat/surat_keluar.php";
      } else if ($action == "edit") {
        include "surat/edit_surat_keluar.php";
      } else if ($action == "hapus") {
        include "surat/hapus_surat_keluar.php";
      } else if ($action == "print") {
        include "surat/surat_masuk.php";
      } else if ($action == "tmb") {
        include "surat/op_surat_keluar.php";
      }  else if ($action == "cek") {
        include "surat/cek_surat_keluar.php";
      }
    } else if($page == "agenda_masuk"){
        include "agenda/agenda_surat_masuk.php";
    } else if($page == "agenda_keluar"){
        include "agenda/agenda_surat_keluar.php";
    } else if($page == "operator"){
      if($action == ""){
        include "operator/data_operator.php";
      } else if ($action == "edit") {
        include "operator/edit_operator.php";
      } else if ($action == "hapus") {
        include "operator/hapus_operator.php";
      } else if ($action == "tmb") {
        include "operator/tambah_operator.php";
      }
    } else if($page == "kasi"){
      if($action == ""){
        include "kasi/data_kasi.php";
      } else if ($action == "edit") {
        include "kasi/edit_kasi.php";
      } else if ($action == "hapus") {
        include "kasi/hapus_kasi.php";
      } else if ($action == "tmb") {
        include "kasi/tambah_kasi.php";
      }
    } else {
        include "dashboard/index.php";
    }
    ?>
  </div>
  <div id="footer">
    Ini Bagian Footer
  </div>
</div>
</body>
</html>
