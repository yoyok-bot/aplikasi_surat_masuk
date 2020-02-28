<html>
<head>
  <title>Cetak Disposisi</title>
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
  table ,td{
  border :1px solid black;
  border-collapse:collapse;
  }
  th ,td {
  padding:10px;
  text-align:left;
  }
  .agenda{
    padding-bottom:  90px;
    width: 400;
  }
  .info{
    padding-bottom:  110px;
    width: 402;
  }
  .catatan{
    padding-bottom:  180px;
    width: 392;
  }
  .diteruskan{
    padding-bottom:  110px;
  }
  .dis{
    padding-bottom:  140px;
  }
  .perihal{
    padding-bottom:  1;
    width: 621;
  }
  .sifat{
    width: 200;
    text-align:center;
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

$no_surat = $_GET['no'];

$query = mysqli_query($con, "SELECT * FROM surat_masuk WHERE no_surat = '$no_surat'");
	$data = mysqli_fetch_array($query);
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
  }
?>
	<div class="kop" style="margin-bottom:20px;margin-top:20px;"> KARTU PENERUS DISPOSISI </div>
  <center><table>
    <tr>
      <td class="agenda">NO AGENDA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$data['no_agenda']?><br>TANGGAL PENYELESAIAN : <?=$d;?> - <?=$nm;?> - <?=$y;?> </td>
      <td class="sifat">SIFAT<hr><?=$data['sifat']?><hr>TANGGAL PENYAMPAIAN<hr><?=$d;?> - <?=$nm;?> - <?=$y;?></td>
    </tr>
    <tr>
  </table></center>
  <tr>
  <center><table>
    <tr>
      <td class="perihal">PERIHAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$data['perihal']?><br><br><br><br><br><br><br>TANGGAL PENYELESAIAN : <?=$d;?> - <?=$nm;?> - <?=$y;?> <br>NOMOR SURAT &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$data['no_surat']?><br>ASAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=$data['no_surat']?></td>
    </tr>
    <tr>
  </table></center>
  <center><table>
    <tr>
      <td class="info">INFORMASI/INSTRUKSI :<br> - </td>
      <td class="diteruskan">DITERUSKAN KEPADA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br> - </td>
    </tr>
    <tr>
  </table></center>
</table></center>
<center><table>
  <tr>
    <td class="catatan">CATATAN <br> - </td>
    <td class="dis">KARTU PENERUS DISPOSISI<br>DITERUSKAN KEPADA :<br>1.KAUR..................<br>2.BENDAHARA............. </td>
  </tr>
</table></center>
</body>
<script>
window.print('legal');
</script>
</html>
