<fieldset>
<legend>Data Surat Masuk</legend>
  <form role="form" action="" method="post">
    <div>
      <input type="text" name="cari" placeholder="Pencarian" required>
    <button type="submit">Search</button>
  </form>
  <td>
  <button style="float:right;"><a href="?page=sm&action=tmb">Tambah Surat</a></button>
</td>
  <br>
<br>
  <table width="100%" border="1px" style="border-collapse:collapse;">
    <tr>
      <th width="10%">No Surat</th>
      <th width="10%">Perihal</th>
      <th width="18%">Asal Surat</th>
      <th width="18%">Tgl Surat</th>
      <th width="18%">Diteruskan Ke</th>
    </tr>
    <tr>
    <?php
$no = @$_GET['no'];
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $pencarian = trim(mysqli_real_escape_string($con, $_POST['cari']));
    if($pencarian != '') { ?>
              <p class="description">Hasil pencarian untuk No Surat : <strong><?= stripslashes($pencarian)?></strong><span class="right"><a href="?page=tsm"></a></span></p>
      <?php
        $sql = "SELECT * FROM disposisi WHERE no_surat LIKE '%$pencarian%'";
        $query = $sql;
        $queryJml = $sql;
    } else {
        $query = "SELECT * FROM disposisi WHERE no_surat = '$no'";
        $queryJml = "SELECT * FROM disposisi WHERE no_surat = '$no'";
    }
} else {
    $query = "SELECT * FROM disposisi WHERE no_surat = '$no'";
    $queryJml = "SELECT * FROM disposisi WHERE no_surat = '$no'";
}
$sql_surat = mysqli_query($con, $query) or die (mysqli_error($con));
if(mysqli_num_rows($sql_surat) > 0) {
    while($data = mysqli_fetch_array($sql_surat)){ ?>
        <tr>
            <td><?=$data['no_surat']?></td>
            <td><?=$data['perihal']?></td>
              <td><?=$data['asal_surat']?></td>
              <?php
              $y = substr($data['tanggal_surat'],0,4);
              $m = substr($data['tanggal_surat'],5,2);
              $d = substr($data['tanggal_surat'],8,2);

              if($m == "01"){
                  $nm = "Januari";
              } elseif($m == "02"){
                  $nm = "Februari";
              } elseif($m == "03"){
                  $nm = "Maret";
              } elseif($m == "04"){
                  $nm = "April";
              } elseif($m == "05"){
                  $nm = "Mei";
              } elseif($m == "06"){
                  $nm = "Juni";
              } elseif($m == "07"){
                  $nm = "Juli";
              } elseif($m == "08"){
                  $nm = "Agustus";
              } elseif($m == "09"){
                  $nm = "September";
              } elseif($m == "10"){
                  $nm = "Oktober";
              } elseif($m == "11"){
                  $nm = "November";
              } elseif($m == "12"){
                  $nm = "Desember";
              }?>
              <td><?=$d;?> - <?=$nm;?> - <?=$y;?></td>
              <td><?=$data['diteruskan_ke']?></td>
        </tr>
    <?php
    }
} else {
    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak ditemukan</td></tr>";
}
?>
    </tr>
  </table>
</fieldset>
