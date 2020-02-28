<?php
if(@$_SESSION['admin']){?>
  <h1>ini halaman ADMIN</h1>
  <?php
} else { ?>
  <h1>ini halaman OPERATOR</h1>
  <?php
}
?>
