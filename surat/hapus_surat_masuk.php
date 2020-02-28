<?php
// menyimpan data id kedalam variabel
$no_surat = $_GET['no'];
$sql = mysqli_query($con, "DELETE FROM surat_masuk WHERE no_surat = '$no_surat'") or die (mysqli_error($con));
//mengalihkan kehalaman tampil.php
header("location:?page=sm");
?>
