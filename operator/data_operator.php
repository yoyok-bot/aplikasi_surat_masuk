<fieldset>
<legend>Data Operator</legend>
  <form role="form" action="" method="post">
    <div>
      <input type="text" name="cari" placeholder="Pencarian" required>
    <button type="submit">Search</button>
  </form>
  <td>
  <button style="float:right;"><a href="?page=operator&action=tmb">Tambah Operator</a></button>
</td>
  <br>
<br>
  <table border="1px" style="border-collapse:collapse;">
    <tr>
      <th width="1%">No</th>
      <th width="10%">Username</th>
      <th width="10%">Password</th>
      <th width="30%">Nama</th>
      <th width="5%">Tindakan </th>
    </tr>
    <tr>
    <?php
    $no = 1;
    $batas = 5;
    $hal = @$_GET['hal'];
    if(empty($hal)){
      $posisi = 0;
      $hal = 1;
    } else {
      $posisi = ($hal - 1) * $batas;
    }
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $pencarian = trim(mysqli_real_escape_string($con, $_POST['cari']));
    if($pencarian != '') { ?>
              <p class="description">Hasil pencarian untuk Username : <strong><?= stripslashes($pencarian)?></strong><span class="right"><a href="?page=tsm"></a></span></p>
      <?php
        $sql = "SELECT * FROM login WHERE nama LIKE '%$pencarian%'";
        $query = $sql;
        $queryJml = $sql;
    } else {
        $query = "SELECT * FROM login WHERE level = 'operator' LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM login WHERE level = 'operator'";
    }
} else {
    $query = "SELECT * FROM login WHERE level = 'operator' LIMIT $posisi, $batas";
    $queryJml = "SELECT * FROM login WHERE level = 'operator'";
}
$sql_surat = mysqli_query($con, $query) or die (mysqli_error($con));
if(mysqli_num_rows($sql_surat) > 0) {
    while($data = mysqli_fetch_array($sql_surat)){ ?>
        <tr>
            <td align="center"><?=$no++?></td>
            <td><?=$data['username']?></td>
            <td><?=$data['password']?></td>
            <td><?=$data['nama']?></td>
              <td>
                        <a href="?page=operator&action=edit&id=<?php echo $data['id_login'];?>">
                             Edit</a> ||
                        <a href="?page=operator&action=hapus&id=<?php echo $data['id_login'];?>" onclick="return confirm('Yakin Akan menghapus data?')">
                             DELETE</a>
                    </td>
        </tr>
    <?php
    }
} else {
    echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak ditemukan</td></tr>";
}
?>
    </tr>
  </table>
  <br>
  <?php
  if(isset($_POST['pencarian'])) {
       echo "<div style=\"float:left;\">";
      $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
      echo "Data Hasil Pencarian : <b>$jml</b>";
      echo "</div>";
  } else { ?>
      <div style="float:left;">
          <?php
          $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
          echo "Jumlah Data : <b>$jml</b>";
          ?>
      </div>
      <div style="margin-top:10px; float:right;">
        <?php
        $jml_hal = ceil($jml / $batas);
        for ($i=1; $i<=$jml_hal; $i++) {
            if($i != $hal) {
                echo "<a href=\"?page=sm&hal=$i\"><button style=\"background-color:#fff; border:1px solid #666; color:#666;\">$i</a>";
            } else {
                echo "<button style=\"background-color:aqua; border:1px solid #000;\"><b>$i</b></button>";
            }
        }
        ?>
      </div>
      <?php
      }
      ?>
</fieldset>
