<fieldset>
  <legend>Pilihan Surat</legend>

  <form action="" method="POST">
    <table>
      <tr>
        <td>Pilihan Surat</td>
        <td>:</td>
        <td>
        <select name="pilih">
            <option name="pilih" value="">--</option>
            <option name="pilih" value="biasa">Biasa</option>
            <option name="pilih" value="rahasia">Rahasia</option>
        </select>
      </td>
        <td width="100">
          <td><input type="submit" name="op_surat_keluar" value="Tambah"/></td>
      </td>
      </tr>
    </table>
  </form>
  </fieldset>
  <br>
<?php
  if(isset($_REQUEST['op_surat_keluar'])) {
    if($_REQUEST['pilih'] == "biasa"){ ?>
      <?php
      $post			= date("Y-m-d");
      $carikode = mysqli_query($con, "SELECT max(no_agenda) as no FROM surat_keluar") or die (mysqli_error($con));
      $datakode = mysqli_fetch_array($carikode);
      if($datakode) {
        $no = $datakode['no'];
        $agenda = $no + 1;
      } else {
        $hasilkode = "1";
      }
      ?>
      <fieldset>
      <legend>Tambah Surat Keluar Biasa</legend>
      <form action="surat/proses.php" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td>No Agenda</td>
            <td>:</td>
            <td><input type="text" name="no_agenda" value="<?=$agenda;?>" readonly/></td>
            <td width="100">
            <td>Perihal</td>
            <td>:</td>
            <td><input type="text" name="perihal"/></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>No Surat</td>
            <td>:</td>
            <td><input type="text" name="no_surat"/></td>
            <td width="100">
            <td>Lampiran</td>
            <td>:</td>
            <td><textarea type="text" name="lampiran"/></textarea></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Tanggal Surat</td>
            <td>:</td>
            <td><input type="date" name="tgl_surat"/></td>
            <td width="100">
            <td>Isi Ringkas</td>
            <td>:</td>
            <td><textarea type="text" name="isi_ringkas"/></textarea></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td><input type="text" name="tujuan"/></td>
            <td width="100">
            <td>Scan Surat</td>
            <td>:</td>
            <td><input type="file" name="gambar"/></td>
            </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Asal Surat</td>
            <td>:</td>
            <td>
              <select name="asal" class="form-control">
                  <?php
                      $query1=mysqli_query($con, "SELECT * FROM seksi");
                      while($sql2=mysqli_fetch_array($query1)){
                   ?>
                  <option name="asal" value="<?=$sql2['id_seksi']; ?>"><?=$sql2['nama_seksi']; ?></option>
                 <?php } ?>
              </select>
          </td>
            <td width="100">
              <td><input type="submit" name="tambah_skb" value="Tambah"/></td>
              <td><input type="reset" value="Reset"/></td>
          </td>
          </tr>
        </table>
      </form>
    </fieldset>
      <?php
    } elseif($_REQUEST['pilih'] == "rahasia"){?>
      <?php
      $post			= date("Y-m-d");
      $carikode = mysqli_query($con, "SELECT max(no_agenda) as no FROM surat_keluar") or die (mysqli_error($con));
      $datakode = mysqli_fetch_array($carikode);
      if($datakode) {
        $no = $datakode['no'];
        $agenda = $no + 1;
      } else {
        $hasilkode = "1";
      }
      ?>
      <fieldset>
      <legend>Tambah Surat Keluar Rahasia</legend>
      <form action="surat/proses.php" method="POST" enctype="multipart/form-data">
        <table>
          <tr>
            <td>No Agenda</td>
            <td>:</td>
            <td><input type="text" name="no_agenda" value="<?=$agenda;?>" readonly/></td>
            <td width="100">
            <td>Perihal</td>
            <td>:</td>
            <td><input type="text" name="perihal"/></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>No Surat</td>
            <td>:</td>
            <td><input type="text" name="no_surat"/></td>
            <td width="100">
            <td>Lampiran</td>
            <td>:</td>
            <td><textarea type="text" name="lampiran"/></textarea></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Tanggal Surat</td>
            <td>:</td>
            <td><input type="date" name="tgl_surat"/></td>
            <td width="100">
            <td>Isi Ringkas</td>
            <td>:</td>
            <td><textarea type="text" name="isi_ringkas"/></textarea></td>
          </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td><input type="text" name="tujuan"/></td>
            <td width="100">
            <td>Scan Surat</td>
            <td>:</td>
            <td><input type="file" name="gambar"/></td>
            </td>
          </tr>
          <tr height="18">
          <tr>
            <td>Asal Surat</td>
            <td>:</td>
            <td>
              <select name="asal" class="form-control">
                  <?php
                      $query1=mysqli_query($con, "SELECT * FROM seksi");
                      while($sql2=mysqli_fetch_array($query1)){
                   ?>
                  <option name="asal" value="<?=$sql2['id_seksi']; ?>"><?=$sql2['nama_seksi']; ?></option>
                 <?php } ?>
              </select>
          </td>
            <td width="100">
              <td><input type="submit" name="tambah_skr" value="Tambah"/></td>
              <td><input type="reset" value="Reset"/></td>
          </td>
          </tr>
        </table>
      </form>
    </fieldset>
    <?php
  } else {?>
    <script type="text/javascript">
    alert("Belum dipilih");
    window.location.href="";
    </script>
    <?php
  }
  }
?>
