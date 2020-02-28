<?php
require_once "../config/config.php";
if(isset($_REQUEST['tambah_sm'])){

      //validasi form kosong
              $no_agenda = $_REQUEST['no_agenda'];
              $no_surat = $_REQUEST['no_surat'];
              $tgl_surat = $_REQUEST['tgl_surat'];
              $asal_surat = $_REQUEST['asal'];
              $perihal = $_REQUEST['perihal'];
              $sifat = $_REQUEST['pilih'];
              $isi = $_REQUEST['isi'];
              $tgl_penerimaan = $_REQUEST['tgl_penerimaan'];
              $lampiran = $_REQUEST['lampiran'];

          if($no_surat == "" || $asal_surat == "" || $perihal == "" || $isi == "" || $lampiran == "" || $sifat == "") { ?>
            <script type="text/javascript">
            alert("Inputan tidak boleh kosong");
            window.location.href="../index.php?page=sm&action=tmb";
            </script>
            <?php
          } else {


          $cek = mysqli_query($con, "SELECT * FROM surat_masuk WHERE no_surat='$no_surat'");
          $result = mysqli_num_rows($cek);

              if($result > 0){?>
                <script type="text/javascript">
                alert("Surat sudah pernah diinput");
                window.location.href="../index.php?page=sm";
                </script>
                <?php
              } else {

                $lokasi_file = $_FILES['gambar']['tmp_name'];
                $tipe_file   = $_FILES['gambar']['size'];
                $nama_file   = $_FILES['gambar']['name'];
                $direktori   = "file_surat_masuk/";

                if (!empty($lokasi_file)) {
                  $rand = rand(1,10000);
                  $nfile = "Sm - ".$rand." - ".$nama_file;
                      if($tipe_file > 2500000){

                	if (move_uploaded_file($lokasi_file,$direktori.$nfile)) {
                		//upload gambar selesai disini//
                    $query_update = mysqli_query($con, "INSERT INTO surat_masuk(no_agenda,no_surat,tanggal_surat,asal_surat,perihal,sifat,isi_ringkas,tanggal_penerimaan,lampiran,
                                                              file_surat)
                                                                  VALUES('$no_agenda','$no_surat','$tgl_surat','$asal_surat','$perihal','$sifat','$isi','$tgl_penerimaan','$lampiran','$nfile')");

                    if($query_update == true){ ?>
                      <script type="text/javascript">
                      alert("Surat Berhasil DiTambah");
                      window.location.href="../index.php?page=sm";
                      </script>
                      <?php
                    }
                	} else {
                    $query_update = mysqli_query($con, "INSERT INTO surat_masuk(no_agenda,no_surat,tanggal_surat,asal_surat,perihal,sifat,isi_ringkas,tanggal_penerimaan,lampiran,
                                                              file_surat)
                                                                  VALUES('$no_agenda','$no_surat','$tgl_surat','$asal_surat','$perihal','$sifat','$isi','$tgl_penerimaan','$lampiran','')");

                    if($query_update == true){ ?>
                      <script type="text/javascript">
                      alert("Surat Berhasil DiTambah");
                      window.location.href="../index.php?page=sm";
                      </script>
                      <?php
                    }
                	}
                } else{ ?>
                  <script type="text/javascript">
                  alert("File TErlalu Besar");
                  window.location.href="../index.php?page=sm";
                  </script>
                  <?php
                }
              } else {
                  $query_update = mysqli_query($con, "INSERT INTO surat_masuk(no_agenda,no_surat,tanggal_surat,asal_surat,perihal,sifat,isi_ringkas,tanggal_penerimaan,lampiran,
                                                            file_surat)
                                                                VALUES('$no_agenda','$no_surat','$tgl_surat','$asal_surat','$perihal','$sifat','$isi','$tgl_penerimaan','$lampiran','')");
                  if($query_update == true){ ?>
                    <script type="text/javascript">
                    alert("Surat Berhasil DiTambah");
                    window.location.href="../index.php?page=sm";
                    </script>
                    <?php
                  } else { ?>
                      <script type="text/javascript">
                      alert("Surat gagal DiTambah");
                      window.location.href="../index.php?page=sm";
                      </script>
                      <?php
                  }
                  }
                }
              }
            }

else if(isset($_REQUEST['edit_sm'])) {
  $no_surat = $_REQUEST['no_surat'];
  $asal_surat = $_REQUEST['asal'];
  $tgl_surat = $_REQUEST['tgl_surat'];
  $perihal = $_REQUEST['perihal'];
  $isi = $_REQUEST['isi'];
  $lampiran = $_REQUEST['lampiran'];
  $sifat = $_REQUEST['pilih'];

  $cek2 = mysqli_query($con, "SELECT * FROM surat_masuk WHERE no_surat ='$no_surat'");
  $data = mysqli_fetch_array($cek2);

  $lokasi_file = $_FILES['gambar']['tmp_name'];
  $tipe_file   = $_FILES['gambar']['type'];
  $nama_file   = $_FILES['gambar']['name'];
  $direktori   = "file_surat_masuk/";

  if (!empty($lokasi_file)) {
    $rand = rand(1,10000);
    $nfile = "Sm - ".$rand." - ".$nama_file;
  	if (move_uploaded_file($lokasi_file,$direktori.$nfile)) {
  		//untuk keperluan upload gambar//
  		$query_ambil_file_gambar_lama	= mysqli_query($con, "SELECT file_surat FROM surat_masuk WHERE no_surat = '$no_surat'");
  		$data_file_gambar_lama			= mysqli_fetch_array($query_ambil_file_gambar_lama);

  		unlink("file_surat_masuk/".$data_file_gambar_lama['file_surat']);
  		//upload gambar selesai disini//

  		$query_update	= mysqli_query($con, "UPDATE surat_masuk SET tanggal_surat = '$tgl_surat', asal_surat = '$asal_surat', perihal = '$perihal', sifat = '$sifat', isi_ringkas = '$isi', lampiran = '$lampiran', file_surat = '$nfile' WHERE no_surat = '$no_surat'");
      if($query_update == true){ ?>
        <script type="text/javascript">
        alert("Surat Berhasil diEdit");
        window.location.href="../index.php?page=sm";
        </script>
        <?php
      }
  	} else {
  		$query_update	= mysqli_query($con, "UPDATE surat_masuk SET tanggal_surat = '$tgl_surat', asal_surat = '$asal_surat', perihal = '$perihal', sifat = '$sifat', isi_ringkas = '$isi', lampiran = '$lampiran' WHERE no_surat = '$no_surat'");

      if($query_update == true){ ?>
        <script type="text/javascript">
        alert("Surat Berhasil diEdit");
        window.location.href="../index.php?page=sm";
        </script>
        <?php
      }
  	}
  } else {
  	$query_update	= mysqli_query($con, "UPDATE surat_masuk SET tanggal_surat = '$tgl_surat', asal_surat = '$asal_surat', perihal = '$perihal', sifat = '$sifat', isi_ringkas = '$isi', lampiran = '$lampiran' WHERE no_surat = '$no_surat'");

    if($query_update == true){ ?>
      <script type="text/javascript">
      alert("Surat Berhasil diEdit");
      window.location.href="../index.php?page=sm";
      </script>
      <?php
    } else { ?>
        <script type="text/javascript">
        alert("Surat gagal DiEdit");
        window.location.href="../index.php?page=sm";
        </script>
        <?php
  }
}
}
?>
