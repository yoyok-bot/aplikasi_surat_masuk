<fieldset>
  <legend>Tambah Kasi</legend>
  <?php
  $id = @$_GET['no'];
  $sql = mysqli_query($con, "SELECT*FROM seksi WHERE id_seksi = '$id'") or die (mysqli_error($con));
  $data = mysqli_fetch_array($sql);
  ?>
  <form action="kasi/proses.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr height="18">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <input type="hidden" name="id" value="<?=$data['id_seksi']?>"/>
        <td><input type="text" name="nama" value="<?=$data['nama_seksi']?>"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td><input type="submit" name="edit_kasi" value="Edit"/></td>
      </tr>
    </table>
  </form>
</fieldset>
