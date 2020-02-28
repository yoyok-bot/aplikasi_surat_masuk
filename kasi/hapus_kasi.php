<?php
// menyimpan data id kedalam variabel
$id_seksi = $_GET['no'];
$sql = mysqli_query($con, "DELETE FROM seksi WHERE id_seksi = '$id_seksi'") or die (mysqli_error($con));
//mengalihkan kehalaman tampil.php
header("location:?page=kasi");
?>
