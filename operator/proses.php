<?php
require_once "../config/config.php";

if(isset($_REQUEST['tambah_operator'])){

  //validasi form kosong
          $username = $_REQUEST['username'];
          $password = $_REQUEST['password'];
          $nama = $_REQUEST['nama'];

      if($username == "" || $password == "" || $nama == "") { ?>
        <script type="text/javascript">
        alert("Inputan tidak boleh kosong");
        window.location.href="../index.php?page=operator&action=tmb";
        </script>
        <?php
      } else {


      $cek = mysqli_query($con, "SELECT * FROM login WHERE username ='$username'");
      $result = mysqli_num_rows($cek);

          if($result > 0){?>
            <script type="text/javascript">
            alert("Username sudah pernah diinput");
            window.location.href="../index.php?page=operator";
            </script>
            <?php
          } else {

              $query_update = mysqli_query($con, "INSERT INTO login(id_login,username,password,nama,level)
                                                            VALUES('','$username','$password','$nama','operator')");

              if($query_update == true){ ?>
                <script type="text/javascript">
                alert("Operator Berhasil DiTambah");
                window.location.href="../index.php?page=operator";
                </script>
                <?php
              } else { ?>
                  <script type="text/javascript">
                  alert("Operator gagal DiTambah");
                  window.location.href="../index.php?page=operator";
                  </script>
                  <?php
              }
              }
            }
          }
          elseif(isset($_REQUEST['edit_operator'])){

            //validasi form kosong
                    $id = $_REQUEST['id'];
                    $user = $_REQUEST['user'];
                    $pass = $_REQUEST['pass'];
                    $nama = $_REQUEST['nama'];


                        $query_update = mysqli_query($con, "UPDATE login SET username = '$user', password = '$pass', nama = '$nama' WHERE id_login = '$id'");

                        if($query_update == true){ ?>
                          <script type="text/javascript">
                          alert("Operator Berhasil DiEdit");
                          window.location.href="../index.php?page=operator";
                          </script>
                          <?php
                        } else { ?>
                            <script type="text/javascript">
                            alert("Operator gagal DiEdit");
                            window.location.href="../index.php?page=operator";
                            </script>
                            <?php
                        }
                        }
        ?>
