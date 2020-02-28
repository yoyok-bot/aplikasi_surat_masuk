<?php
$post			= date("Y-m-d");
$sampai = $post + 30;
?>
<fieldset>
  <legend>Agenda Surat Keluar</legend>

  <form action="" method="POST">
    <table>
      <tr>
        <td>Tanggal Dari</td>
        <td>:</td>
        <td><input type="date" name="tgl_dari"/></td>
        <td width="18">
          <td>Tanggal Sampai</td>
          <td>:</td>
          <td><input type="date" name="tgl_sampai"/></td>
        <td width="15">
          <td><input type="submit" name="tampilkan" value="Tampilkan"/></td>
      </td>
      </tr>
    </table>
  </form>
  </fieldset>
  <br>
  <?php
  if(isset($_REQUEST['tampilkan'])){
    $dari_tanggal = $_REQUEST['tgl_dari'];
    $sampai_tanggal = $_REQUEST['tgl_sampai'];

    if($_REQUEST['tgl_dari'] == "" || $_REQUEST['tgl_sampai'] == ""){
      ?>
        <script type="text/javascript">
        alert("Belum diatur dari tanggal sampai tanggal untuk mencetak agenda");
        window.location.href="";
        </script>
        <?php
    } else {

    $query = mysqli_query($con, "SELECT * FROM surat_keluar inner join seksi on surat_keluar.id_seksi = seksi.id_seksi WHERE tanggal_surat BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");

    $y = substr($dari_tanggal,0,4);
    $m = substr($dari_tanggal,5,2);
    $d = substr($dari_tanggal,8,2);
    $y2 = substr($sampai_tanggal,0,4);
    $m2 = substr($sampai_tanggal,5,2);
    $d2 = substr($sampai_tanggal,8,2);

    if($m == "01"){
        $nm = "Januari";
    } elseif($m == "02"){
        $nm = "Februari";
    } elseif($m == "03"){
        $nm = "Maret";
    } elseif($m == "04"){
        $nm = "April";
    } elseif($m == "05"){
        $nm = "Mei";
    } elseif($m == "06"){
        $nm = "Juni";
    } elseif($m == "07"){
        $nm = "Juli";
    } elseif($m == "08"){
        $nm = "Agustus";
    } elseif($m == "09"){
        $nm = "September";
    } elseif($m == "10"){
        $nm = "Oktober";
    } elseif($m == "11"){
        $nm = "November";
    } elseif($m == "12"){
        $nm = "Desember";
    }

    if($m2 == "01"){
        $nm2 = "Januari";
    } elseif($m2 == "02"){
        $nm2 = "Februari";
    } elseif($m2 == "03"){
        $nm2 = "Maret";
    } elseif($m2 == "04"){
        $nm2 = "April";
    } elseif($m2 == "05"){
        $nm2 = "Mei";
    } elseif($m2 == "06"){
        $nm2 = "Juni";
    } elseif($m2 == "07"){
        $nm2 = "Juli";
    } elseif($m2 == "08"){
        $nm2 = "Agustus";
    } elseif($m2 == "09"){
        $nm2 = "September";
    } elseif($m2 == "10"){
        $nm2 = "Oktober";
    } elseif($m2 == "11"){
        $nm2 = "November";
    } elseif($m2 == "12"){
        $nm2 = "Desember";
    }
    echo '
    <p class="warna agenda">Agenda Surat Keluar dari tanggal <strong>'.$d." ".$nm." ".$y.'</strong> sampai dengan tanggal <strong>'.$d2." ".$nm2." ".$y2.'</strong></p>
    <br>
    <form action="laporan/cetak_agenda_surat_keluar.php" method="POST" style="float:right;" >
      <table>
        <tr>
        <input type="hidden" name="dari_tanggal" value="'.$dari_tanggal.'"/>
        <input type="hidden" name="sampai_tanggal" value="'.$sampai_tanggal.'"/>
        </td>
          <td width="100">
            <td><button type="submit" name="cetak" formtarget="_blank"/>CETAK AGENDA</button></td>
        </td>
        </tr>
      </table>
    </form>
    <br>';
    ?>
  </br>
</br>
    <fieldset>
    <legend>Agenda Surat Keluar</legend>
      <br>
    <br>
      <table width="100%" border="1px" style="border-collapse:collapse;">
        <tr>
          <th width="10%">No. Agenda</br>No Surat</th>
          <th width="10%">Perihal</br>Sifat</th>
          <th width="30%">Isi Ringkas<br/> File</th>
          <th width="18%">Asal Surat</th>
          <th width="18%">Tgl Surat</th>
        </tr>
        <tr>
        <?php

        if(mysqli_num_rows($query) > 0) {
            while($data = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?=$data['no_agenda']?></br><hr></hr><?=$data['no_surat']?></td>
                <td><?=$data['perihal']?></br><hr></hr><?=$data['sifat']?></td>
                <td><?=substr($data['isi_ringkas'],0,200)?></td>
                  <td><?=$data['nama_seksi']?></td>
                  <?php
                  $y = substr($data['tanggal_surat'],0,4);
                  $m = substr($data['tanggal_surat'],5,2);
                  $d = substr($data['tanggal_surat'],8,2);

                  if($m == "01"){
                      $nm = "Januari";
                  } elseif($m == "02"){
                      $nm = "Februari";
                  } elseif($m == "03"){
                      $nm = "Maret";
                  } elseif($m == "04"){
                      $nm = "April";
                  } elseif($m == "05"){
                      $nm = "Mei";
                  } elseif($m == "06"){
                      $nm = "Juni";
                  } elseif($m == "07"){
                      $nm = "Juli";
                  } elseif($m == "08"){
                      $nm = "Agustus";
                  } elseif($m == "09"){
                      $nm = "September";
                  } elseif($m == "10"){
                      $nm = "Oktober";
                  } elseif($m == "11"){
                      $nm = "November";
                  } elseif($m == "12"){
                      $nm = "Desember";
                  }?>
                  <td><?=$d;?> - <?=$nm;?> - <?=$y;?></td>
            </tr>
        <?php
        }
    } else {
        echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak ditemukan</td></tr>";
    }
    ?>
        </tr>
      </table>
      <br>
    </fieldset>
<?php
}
}
  ?>
