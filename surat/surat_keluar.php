<fieldset>
<legend>Data Surat Keluar</legend>
  <form role="form" action="" method="post">
    <div>
      <input type="text" name="cari" placeholder="Pencarian" required>
    <button type="submit">Search</button>
  </form>
  <td>
    <?php
  if(@$_SESSION['operator']){?>
  <button style="float:right;"><a href="?page=sk&action=tmb">Tambah Surat</a></button>
<?php } ?>
</td>
  <br>
<br>
  <table width="100%" border="1px" style="border-collapse:collapse;">
    <tr>
      <th width="10%">No. Agenda</br>No Surat</th>
      <th width="10%">Perihal</br>Sifat</th>
      <th width="30%">Isi Ringkas<br/> File</th>
      <th width="18%">Asal Surat</th>
      <th width="18%">Tgl Surat</th>
      <th width="18%">Tindakan </th>
    </tr>
    <tr>
    <?php
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
              <p class="description">Hasil pencarian untuk No Surat : <strong><?= stripslashes($pencarian)?></strong><span class="right"><a href="?page=tsm"></a></span></p>
      <?php
        $sql = "SELECT * FROM surat_keluar inner join seksi on surat_keluar.id_seksi = seksi.id_seksi WHERE surat_keluar.no_surat LIKE '%$pencarian%'";
        $query = $sql;
        $queryJml = $sql;
    } else {
        $query = "SELECT * FROM surat_keluar inner join seksi on surat.id_seksi = seksi.id_seksi LIMIT $posisi, $batas";
        $queryJml = "SELECT * FROM surat_keluar inner join seksi on surat.id_seksi = seksi.id_seksi";
    }
} else {
    $query = "SELECT * FROM surat_keluar inner join seksi on surat_keluar.id_seksi = seksi.id_seksi LIMIT $posisi, $batas";
    $queryJml = "SELECT * FROM surat_keluar inner join seksi on surat_keluar.id_seksi = seksi.id_seksi ";
}
$sql_surat = mysqli_query($con, $query) or die (mysqli_error($con));
if(mysqli_num_rows($sql_surat) > 0) {
    while($data = mysqli_fetch_array($sql_surat)){ ?>
        <tr>
            <td><?=$data['no_agenda']?></br><hr></hr><?=$data['no_surat']?></td>
            <td><?=$data['perihal']?></br></hr><?=$data['sifat']?></td>
            <td><?=substr($data['isi_ringkas'],0,200)?></br><hr></hr><strong>File :</strong>
              <?php
              if(!empty($data['file_surat'])){ ?>
                  <strong><a href="?page=sk&action=cek&no=<?=$data['no_surat'];?>"><?=$data['file_surat']?></a></strong>
                  <?php
              } else { ?>
                  <em>Tidak ada file yang di upload</em>
                  <?php
              }?> </td>
              <td><?=$data['nama_seksi']?></td>
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
              <td>
                  <?php
                if(@$_SESSION['admin']){?>
                  <center><button><a href="#">
                      No Action</a></button></center>
                         <?php
                } else {?>
                        <a href="?page=sk&action=edit&no=<?php echo $data['no_surat'];?>">
                             Edit</a> ||
                        <a href="?page=sk&action=hapus&no=<?php echo $data['no_surat'];?>" onclick="return confirm('Yakin Akan menghapus data?')">
                             DELETE</a>
                             <?php
                } ?>
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
                echo "<a href=\"?page=sk&hal=$i\"><button style=\"background-color:#fff; border:1px solid #666; color:#666;\">$i</a>";
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
