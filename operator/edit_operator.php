<fieldset>
  <legend>Tambah Kasi</legend>
  <?php
  $id = @$_GET['id'];
  $sql = mysqli_query($con, "SELECT*FROM login WHERE id_login = '$id'") or die (mysqli_error($con));
  $data = mysqli_fetch_array($sql);
  ?>
  <form action="operator/proses.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr height="18">
      <tr>
        <td>Username</td>
        <td>:</td>
        <input type="hidden" name="id" value="<?=$data['id_login']?>"/>
        <td><input type="text" name="user" value="<?=$data['username']?>"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="text" name="pass" value="<?=$data['password']?>"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td>Nama</td>
        <td>:</td>
        <input type="hidden" name="id" value="<?=$data['id_login']?>"/>
        <td><input type="text" name="nama" value="<?=$data['nama']?>"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td><input type="submit" name="edit_operator" value="Edit"/></td>
      </tr>
    </table>
  </form>
</fieldset>
