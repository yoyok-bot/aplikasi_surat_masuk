<?php
// menyimpan data id kedalam variabel
mysqli_query($con, "DELETE FROM surat_keluar WHERE no_surat = '$_GET[no]'") or die (mysqli_error($con));
//mengalihkan kehalaman tampil.php
header("location:?page=sk");
?>
