<fieldset>
  <legend>Edit Surat Keluar</legend>
  <?php
  $no = @$_GET['no'];
  $sql = mysqli_query($con, "SELECT*FROM surat_keluar inner join seksi on surat_keluar.id_seksi = seksi.id_seksi WHERE no_surat = '$no'") or die (mysqli_error($con));
  $data = mysqli_fetch_array($sql);
  ?>
  <form action="surat/proses.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>No Agenda</td>
        <td>:</td>
        <td><input type="text" name="no_agenda" value="<?=$data['no_agenda'];?>" readonly/></td>
        <td width="100">
        <td>Perihal</td>
        <td>:</td>
        <td><input type="text" name="perihal" value="<?=$data['perihal'];?>"/></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>No Surat</td>
        <td>:</td>
        <td><input type="text" name="no_surat" value="<?=$data['no_surat'];?>" readonly/></td>
        <td width="100">
        <td>Lampiran</td>
        <td>:</td>
        <td><textarea type="text" name="lampiran"/><?=$data['lampiran'];?></textarea></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Tanggal Surat</td>
        <td>:</td>
        <td><input type="date" name="tgl_surat" value="<?=$data['tanggal_surat'];?>"/></td>
        <td width="100">
        <td>Isi Ringkas</td>
        <td>:</td>
        <td><textarea type="text" name="isi_ringkas"/><?=$data['isi_ringkas'];?></textarea></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Tujuan</td>
        <td>:</td>
        <td><input type="text" name="tujuan" value="<?=$data['tujuan'];?>"/></td>
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
            <option name="daya" value="<?=$data['id_seksi']; ?>"><?=$data['nama_seksi']; ?></option>
              <?php
                  $query1=mysqli_query($con, "SELECT * FROM seksi WHERE id_seksi != '$data[id_seksi]'");
                  while($sql2=mysqli_fetch_array($query1)){
               ?>
              <option name="asal" value="<?=$sql2['id_seksi']; ?>"><?=$sql2['nama_seksi']; ?></option>
             <?php } ?>
          </select>
        </td>
          <td width="100">
            <td>Sifat</td>
            <td>:</td>
              <td><input type="text" name="sifat" value="<?=$data['sifat']; ?>" readonly/></td>
        <td>
          <td><input type="submit" name="edit_sk" value="Edit Surat Keluar"/></td>
      </td>
      </tr>
    </table>
  </form>
</fieldset>
