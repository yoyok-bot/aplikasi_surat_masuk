<?php
require_once "../config/config.php";

unset($_SESSION['admin']);
unset($_SESSION['operator']);
header("location:login.php");
?>
