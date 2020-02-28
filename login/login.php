<?php
require_once "../config/config.php";
if(isset($_SESSION['admin'])) {
    if(isset($_SESSION['operator'])) {
        header("location:../index.php");
    }
} else {
?>
<html>
	<head>
		<title>Form Login</title>
		<style>
		body{
		background-image: url(../assets/background/Kejaksaan1-665x420.jpeg);
    background-repeat: no-repeat;
		position: relative;
    width:100%;
		height:100%;
    background-size: 100%;
		}
		fieldset{
		margin:250 50;
		width:250px;
		height:150px;

		}
		label{
		font-family:tahoma;
		color:black;
		}
		legend{
		font-family:algerian;
		color:black;
		}
		input{
		margin:5px;
		padding:5px;
		{
		</style>
	</head>

	<body>
  <marquee><h1>Aplikasi Pengarsipan Surat Kejaksaan Negeri Situbondo</h1></marquee>
		<form action="proses.php" method="post">
		<fieldset>
			<table >
				<legend>ANDA HARUS LOGIN</legend>
				<tr>
				<td><label>Username</label>
				<td><input name="user" type="username" placeholder="Username"></td></tr>

				<td><label>Password</label>
				<td><input name="pass" type="password" placeholder="Password"></td></tr>
				<td></td>
				<td><input name="login" type="submit" value="LOGIN"></td></tr>
			</table>
		</fieldset>
		</form>
	</body>
</html>
<?php } ?>
