<?php
require_once "../config/config.php";

if(isset($_REQUEST['tambah_kasi'])){

  //validasi form kosong
          $nama = $_REQUEST['nama'];

      if($nama == "") { ?>
        <script type="text/javascript">
        alert("Inputan tidak boleh kosong");
        window.location.href="../index.php?page=kasi&action=tmb";
        </script>
        <?php
      } else {


      $cek = mysqli_query($con, "SELECT * FROM seksi WHERE nama ='$nama'");
      $result = mysqli_num_rows($cek);

          if($result > 0){?>
            <script type="text/javascript">
            alert("Kasi sudah pernah diinput");
            window.location.href="../index.php?page=kasi";
            </script>
            <?php
          } else {

              $query_update = mysqli_query($con, "INSERT INTO seksi(nama_seksi)
                                                            VALUES('$nama')");

              if($query_update == true){ ?>
                <script type="text/javascript">
                alert("Kasi Berhasil DiTambah");
                window.location.href="../index.php?page=kasi";
                </script>
                <?php
              } else { ?>
                  <script type="text/javascript">
                  alert("Kasi gagal DiTambah");
                  window.location.href="../index.php?page=kasi";
                  </script>
                  <?php
              }
              }
            }
          }
elseif(isset($_REQUEST['edit_kasi'])){

  //validasi form kosong
          $id = $_REQUEST['id'];
          $nama = $_REQUEST['nama'];


              $query_update = mysqli_query($con, "UPDATE seksi SET nama_seksi = '$nama' WHERE id_seksi = '$id'");

              if($query_update == true){ ?>
                <script type="text/javascript">
                alert("Kasi Berhasil DiEdit");
                window.location.href="../index.php?page=kasi";
                </script>
                <?php
              } else { ?>
                  <script type="text/javascript">
                  alert("Kasi gagal DiEdit");
                  window.location.href="../index.php?page=kasi";
                  </script>
                  <?php
              }
              }
        ?>
