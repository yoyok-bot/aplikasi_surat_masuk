<fieldset>
  <legend>Tambah Operator</legend>

  <form action="operator/proses.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Username</td>
        <td>:</td>
        <td><input type="text" name="username"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="text" name="password"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td><input type="text" name="nama"/></td>
      </tr>
      <tr height="18">
      <tr>
        <td><input type="submit" name="tambah_operator" value="Tambah"/></td>
        <td><input type="reset" value="Reset"/></td>
      </tr>
    </table>
  </form>

</fieldset>
