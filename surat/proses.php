<?php
require_once "../config/config.php";

if(isset($_REQUEST['tambah_skb'])){

  //validasi form kosong
          $no_agenda = $_REQUEST['no_agenda'];
          $no_surat = $_REQUEST['no_surat'];
          $tgl_surat = $_REQUEST['tgl_surat'];
          $tujuan = $_REQUEST['tujuan'];
          $lampiran = $_REQUEST['lampiran'];
          $perihal = $_REQUEST['perihal'];
          $isi = $_REQUEST['isi_ringkas'];
          $asal_surat = $_REQUEST['asal'];

      if($no_surat == "" || $asal_surat == "" || $perihal == "" || $isi == "" || $lampiran == "" || $tujuan == "") { ?>
        <script type="text/javascript">
        alert("Inputan tidak boleh kosong");
        window.location.href="../index.php?page=sk&action=tmb";
        </script>
        <?php
      } else {


      $cek = mysqli_query($con, "SELECT * FROM surat_keluar WHERE no_surat='$no_surat'");
      $result = mysqli_num_rows($cek);

          if($result > 0){?>
            <script type="text/javascript">
            alert("Surat sudah pernah diinput");
            window.location.href="../index.php?page=sk";
            </script>
            <?php
          } else {

            $lokasi_file = $_FILES['gambar']['tmp_name'];
            $tipe_file   = $_FILES['gambar']['type'];
            $nama_file   = $_FILES['gambar']['name'];
            $direktori   = "file_surat_keluar/";

            if (!empty($lokasi_file)) {
              $rand = rand(1,10000);
              $nfile = "Sk - ".$rand." - ".$nama_file;
              if (move_uploaded_file($lokasi_file,$direktori.$nfile)) {
                //upload gambar selesai disini//

                $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                          file_surat,id_seksi)
                                                              VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Biasa','$isi','$nfile','$asal_surat')");

                if($query_update == true){ ?>
                  <script type="text/javascript">
                  alert("Surat Berhasil DiTambah");
                  window.location.href="../index.php?page=sk";
                  </script>
                  <?php
                }
              } else {
                $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                          file_surat,id_seksi)
                                                              VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Biasa','$isi','','$asal_surat')");

                if($query_update == true){ ?>
                  <script type="text/javascript">
                  alert("Surat Berhasil DiTambah");
                  window.location.href="../index.php?page=sk";
                  </script>
                  <?php
                }
              }
            } else {

              $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                        file_surat,id_seksi)
                                                            VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Biasa','$isi','','$asal_surat')");

              if($query_update == true){ ?>
                <script type="text/javascript">
                alert("Surat Berhasil DiTambah");
                window.location.href="../index.php?page=sk";
                </script>
                <?php
              } else { ?>
                  <script type="text/javascript">
                  alert("Surat gagal DiTambah");
                  window.location.href="../index.php?page=sk";
                  </script>
                  <?php
              }
              }
            }
          }
        }
elseif(isset($_REQUEST['tambah_skr'])){
  $no_agenda = $_REQUEST['no_agenda'];
  $no_surat = $_REQUEST['no_surat'];
  $tgl_surat = $_REQUEST['tgl_surat'];
  $tujuan = $_REQUEST['tujuan'];
  $lampiran = $_REQUEST['lampiran'];
  $perihal = $_REQUEST['perihal'];
  $isi = $_REQUEST['isi_ringkas'];
  $asal_surat = $_REQUEST['asal'];

  if($no_surat == "" || $asal_surat == "" || $perihal == "" || $isi == "" || $lampiran == "" || $tujuan == "") { ?>
  <script type="text/javascript">
  alert("Inputan tidak boleh kosong");
  window.location.href="../index.php?page=sk&action=tmb";
  </script>
  <?php
  } else {


  $cek = mysqli_query($con, "SELECT * FROM surat_keluar WHERE no_surat='$no_surat'");
  $result = mysqli_num_rows($cek);

  if($result > 0){?>
    <script type="text/javascript">
    alert("Surat sudah pernah diinput");
    window.location.href="../index.php?page=sk";
    </script>
    <?php
  } else {

    $lokasi_file = $_FILES['gambar']['tmp_name'];
    $tipe_file   = $_FILES['gambar']['type'];
    $nama_file   = $_FILES['gambar']['name'];
    $direktori   = "file_surat_keluar/";

    if (!empty($lokasi_file)) {
      $rand = rand(1,10000);
      $nfile = "Sk - ".$rand." - ".$nama_file;
      if (move_uploaded_file($lokasi_file,$direktori.$nfile)) {
        //upload gambar selesai disini//

        $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                  file_surat,id_seksi)
                                                      VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Rahasia','$isi','$nfile','$asal_surat')");

        if($query_update == true){ ?>
          <script type="text/javascript">
          alert("Surat Berhasil DiTambah");
          window.location.href="../index.php?page=sk";
          </script>
          <?php
        }
      } else {
        $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                  file_surat,id_seksi)
                                                      VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Rahasia','$isi','','$asal_surat')");

        if($query_update == true){ ?>
          <script type="text/javascript">
          alert("Surat Berhasil DiTambah");
          window.location.href="../index.php?page=sk";
          </script>
          <?php
        }
      }
    } else {

      $query_update = mysqli_query($con, "INSERT INTO surat_keluar(no_agenda,no_surat,tanggal_surat,tujuan,lampiran,perihal,sifat,isi_ringkas,
                                                file_surat,id_seksi)
                                                    VALUES('$no_agenda','$no_surat','$tgl_surat','$tujuan','$lampiran','$perihal','Rahasia','$isi','','$asal_surat')");

      if($query_update == true){ ?>
        <script type="text/javascript">
        alert("Surat Berhasil DiTambah");
        window.location.href="../index.php?page=sk";
        </script>
        <?php
      } else { ?>
          <script type="text/javascript">
          alert("Surat gagal DiTambah");
          window.location.href="../index.php?page=sk";
          </script>
          <?php
      }
      }
    }
  }
  }
  elseif(isset($_REQUEST['edit_sk'])){
    $no_surat = $_REQUEST['no_surat'];
    $tgl_surat = $_REQUEST['tgl_surat'];
    $tujuan = $_REQUEST['tujuan'];
    $lampiran = $_REQUEST['lampiran'];
    $perihal = $_REQUEST['perihal'];
    $isi = $_REQUEST['isi_ringkas'];
    $asal_surat = $_REQUEST['asal'];

      $lokasi_file = $_FILES['gambar']['tmp_name'];
      $tipe_file   = $_FILES['gambar']['type'];
      $nama_file   = $_FILES['gambar']['name'];
      $direktori   = "file_surat_keluar/";

      if (!empty($lokasi_file)) {
        $rand = rand(1,10000);
        $nfile = "Sk - ".$rand." - ".$nama_file;
        if (move_uploaded_file($lokasi_file,$direktori.$nfile)) {

          $query_ambil_file_gambar_lama	= mysqli_query($con, "SELECT file_surat FROM surat_keluar WHERE no_surat = '$no_surat'");
      		$data_file_gambar_lama			= mysqli_fetch_array($query_ambil_file_gambar_lama);

      		unlink("file_surat_keluar/".$data_file_gambar_lama['file_surat']);
          //upload gambar selesai disini//

          $query_update = mysqli_query($con, "UPDATE surat_keluar SET tanggal_surat = '$tgl_surat',tujuan = '$tujuan', perihal = '$perihal', lampiran = '$lampiran', isi_ringkas = '$isi', file_surat = '$nfile', id_seksi = '$asal_surat' WHERE no_surat = '$no_surat'");

          if($query_update == true){ ?>
            <script type="text/javascript">
            alert("Surat Keluar Berhasil DiEdit");
            window.location.href="../index.php?page=sk";
            </script>
            <?php
          }
        } else {
          $query_update = mysqli_query($con, "UPDATE surat_keluar SET tanggal_surat = '$tgl_surat',tujuan = '$tujuan', perihal = '$perihal', lampiran = '$lampiran', isi_ringkas = '$isi', id_seksi = '$asal_surat' WHERE no_surat = '$no_surat'");

          if($query_update == true){ ?>
            <script type="text/javascript">
            alert("Surat Keluar Berhasil DiEdit");
            window.location.href="../index.php?page=sk";
            </script>
            <?php
          }
        }
      } else {

        $query_update = mysqli_query($con, "UPDATE surat_keluar SET tanggal_surat = '$tgl_surat',tujuan = '$tujuan', perihal = '$perihal', lampiran = '$lampiran', isi_ringkas = '$isi', id_seksi = '$asal_surat' WHERE no_surat = '$no_surat'");
        if($query_update == true){ ?>
          <script type="text/javascript">
          alert("Surat Keluar Berhasil DiEdit");
          window.location.href="../index.php?page=sk";
          </script>
          <?php
        } else { ?>
            <script type="text/javascript">
            alert("Surat Keluar gagal DiEdit");
            window.location.href="../index.php?page=sk";
            </script>
            <?php
        }
        }
    }
  ?>
