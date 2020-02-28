<fieldset>
  <legend>File Surat Keluar</legend>
  <center><table>
    <tr>
      <td><?php
      $no = @$_GET['no'];
      $sql = mysqli_query($con, "SELECT*FROM surat_keluar WHERE no_surat = '$no'") or die (mysqli_error($con));
      $data = mysqli_fetch_array($sql);
    if(!empty($data['file_surat'])){
      $file = $data['file_surat'];
      ?>
        <center><img src="surat/file_surat_keluar/<?=$data['file_surat'];?>" width="300" /></center>
        <?php
    } else { ?>
        <em>Tidak ada file yang di upload</em>
        <?php
    }?></td>
    </tr>
  </table></center>
</fieldset>
