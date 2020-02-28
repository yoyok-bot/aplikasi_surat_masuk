<?php
// menyimpan data id kedalam variabel
$no_operator = $_GET['no'];
$sql = mysqli_query($con, "DELETE FROM login WHERE id_login = '$no_operator'") or die (mysqli_error($con));
//mengalihkan kehalaman tampil.php
header("location:?page=operator");
?>
