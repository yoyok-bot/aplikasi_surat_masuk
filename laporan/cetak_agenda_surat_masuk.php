<html>
<head>
  <title>Cetak Agenda</title>
</head>
<body>
  <style>
  body{
    margin-left: 13%;
    margin-right: 13%;
    border:1px;
    padding: 4%;
    border-color: #000;
    border-style: solid;
    margin-bottom: 50px;
  }
  table{
    width: 100%;
  }
  table ,td{
  border :1px solid black;
  border-collapse:collapse;
  }
  th ,td {
  padding:10px;
  text-align:left;
  }
  th{
  border: 0px;
  }
  .kop{
  text-align: center;
  }
  .kop1{
  font-size: 20px;
  }
  .kop2{
  font-size: 25px;
  font: bold;
  }
</style>
<?php
require_once "../config/config.php";

$dari_tanggal = $_REQUEST['dari_tanggal'];
$sampai_tanggal = $_REQUEST['sampai_tanggal'];

$query = mysqli_query($con, "SELECT * FROM surat_masuk WHERE tanggal_surat BETWEEN '$dari_tanggal' AND '$sampai_tanggal'");
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

<div class="kop">
	<div class="kop1">PEMERINTAH KABUPATEN SITUBONDO</br></div>
	<div class="kop2">KEJAKSAAN NEGERI SITUBONDO<br></div>
	Jl. Basuki Rahmat No.1A, Mimbaan Utara, Mimbaan, Kec. Panji<br>
  Kabupaten Situbondo, Jawa Timur 68323
	<hr style="height:5px; background-color:#000;margin-bottom:0px;">
	<hr style="height:1px; background-color:#000;margin-bottom:0px;margin-top:1px;">

	<div class="kop1" style="margin-bottom:20px;margin-top:20px;"> LEMBAR AGENDA SURAT MASUK</div>
  <p class="warna agenda">Agenda Surat Masuk dari tanggal <strong>'.$d." ".$nm." ".$y.'</strong> sampai dengan tanggal <strong>'.$d2." ".$nm2." ".$y2.'</strong></p>
  ';?>
  <table width="100%" border="1px" style="border-collapse:collapse;">
    <tr>
      <th width="10%">No. Agenda</br>No Surat</th>
      <th width="10%">Perihal</br>Sifat</th>
      <th width="30%">Isi Ringkas</th>
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
            <td><?=$data['isi_ringkas']?></td>
              <td><?=$data['asal_surat']?></td>
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
</div>
</body>
<script>
window.print('legal');
</script>
</html>
