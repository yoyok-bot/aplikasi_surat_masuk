<?php
$post			= date("Y-m-d");
$carikode = mysqli_query($con, "SELECT MAX(no_agenda) as no FROM surat_masuk") or die (mysqli_error($con));
$datakode = mysqli_fetch_array($carikode);
if($datakode) {
  $no = $datakode['no'];
  $agenda = $no + 1;
} else {
  $agenda = "1";
}
?>
<fieldset>
  <legend>Tambah Surat Masuk</legend>

  <form action="surat/proses_surat_masuk.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>No Agenda</td>
        <td>:</td>
        <td><input type="text" name="no_agenda" value="<?=$agenda;?>"/></td>
        <td width="100">
        <td>Isi Ringkas</td>
        <td>:</td>
        <td><textarea type="text" name="isi"/></textarea></td>
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
        <td><input type="text" name="lampiran"/></td>
      </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Tanggal Surat</td>
        <td>:</td>
        <td><input type="date" name="tgl_surat"/></td>
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
        <td><input type="text" name="asal"/></td>
        <td width="100">
        <td>Sifat</td>
        <td>:</td>
        <td>
          <select name="pilih">
              <option name="pilih" value="">--</option>
              <option name="pilih" value="Biasa">Biasa</option>
              <option name="pilih" value="Rahasia">Rahasia</option>
          </select>
        </td>
        </td>
      </tr>
      <tr height="18">
      <tr>
        <td>Perihal</td>
        <td>:</td>
        <td><input type="text" name="perihal"/></td>
        <td width="10">
          <td>Tanggal Surat</td>
          <td>:</td>
          <td><input type="date" name="tgl_penerimaan" value="<?=$post?>" readonly/></td>
          <td width="1">
          <td><input type="submit" name="tambah_sm" value="Tambah"/></td>
          <td><input type="reset" value="Reset"/></td>
      </td>
      </tr>
    </table>
  </form>

</fieldset>
