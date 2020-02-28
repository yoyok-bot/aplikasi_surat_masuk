<fieldset>
  <legend>Edit Surat Masuk</legend>
  <?php
  $no = @$_GET['no'];
  $sql = mysqli_query($con, "SELECT*FROM surat_masuk WHERE no_surat = '$no'") or die (mysqli_error($con));
  $data = mysqli_fetch_array($sql);
  ?>
  <form action="surat/proses_surat_masuk.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>No Agenda</td>
        <td>:</td>
        <td><input type="text" name="no_agenda" value="<?= $data['no_agenda']?>" readonly/></td>
        <td width="100">
        <td>Isi Ringkas</td>
        <td>:</td>
        <td><textarea type="text" name="isi"/><?= $data['isi_ringkas']?></textarea></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>No Surat</td>
        <td>:</td>
        <td><input type="text" name="no_surat" value="<?= $data['no_surat']?>" readonly/></td>
        <td width="100">
        <td>Lampiran</td>
        <td>:</td>
        <td><input type="text" name="lampiran" value="<?= $data['lampiran']?>"/></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Tanggal Surat</td>
        <td>:</td>
        <td><input type="date" name="tgl_surat" value="<?= $data['tanggal_surat']?>"/></td>
        <td width="100">
        <td>Sifat</td>
        <td>:</td>
        <td>
          <select name="pilih">
            <option name="pilih" value="<?= $data['sifat']?>"><?= $data['sifat']?></option>
            <?php
            if($data['sifat'] == "Rahasia") { ?>
            <option name="pilih" value="Biasa">Biasa</option>
            <?php
          } else { ?>
            <option name="pilih" value="Rahasia">Rahasia </option>
          <?php } ?>
          </select>
      </td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Asal Surat</td>
        <td>:</td>
        <td><input type="text" name="asal" value="<?= $data['asal_surat']?>"/></td>
        <td width="18">
        <td>File Surat</td>
        <td>:</td>
        <td><input type="file" name="gambar"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td>Perihal</td>
        <td>:</td>
        <td><input type="text" name="perihal" value="<?= $data['perihal']?>"/></td>
        <td width="100">
          <td>Tanggal Penerimaan</td>
          <td>:</td>
          <td><input type="text" name="tanggal_penerimaan" value="<?= $data['tanggal_penerimaan']?>" readonly/></td>
          <td>
          <td><input type="submit" name="edit_sm" value="Edit Surat Masuk"/></td>
      </td>
      </tr>
    </table>
  </form>

</fieldset>
