<?php
  session_start();
  if (!isset($_SESSION['username'])){
        echo " 
        <script>
            document.location.href='../web/kosong.php';
        </script>
        ";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pemilik KopiTok</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

      <?php
        include_once("menupemilik.php");
      ?>

<!-- ================================================================ -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
            <?php
            include_once("headerpemilik.php");
            ?>
                    
<!-- ======================================================= -->

        <!-- ======================================================= -->
            <?php   
                if ($_GET["module"]=='tampil'){
            ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Pegawai </h1><hr>
          </div>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Content Row -->

              <div class="col mr-2">
                 <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <a href="?module=tambah" class="btn btn-success" align="right"><i class="fa fa-plus"></i> Tambah Pegawai</a>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">

                  <table id="dataTable" class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>No Hp</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

            include_once("../web/koneksi.php");
            $no=1;
            
    $select=mysqli_query($konek,"SELECT * FROM user");
    while ($data = mysqli_fetch_array($select)) 
      {
        echo "<tr>
                <td>".$no."</td>
                <td>".$data['nama_user']."</td>
                <td>".$data['username']."</td>
                <td>".$data['password']."</td>
                <td>".$data['no_hp']."</td>
                <td>".$data['level']."</td>
                <td><img src=../../img/fotoprofil/".$data['foto']." width='100' height='100'></td>";

        if ($data['level']=="PK") {
          echo "
                <td><a href='?module=ubah&id_user=".$data['id_user']."' class='btn btn-warning btn-circle disabled'><i class='fa fa-pen'></i></a> |
                <a href='?module=hapus&id_user=".$data['id_user']."' class='btn btn-danger btn-circle disabled'><i class='fa fa-trash'></i></a></td>
              </tr>"; 
        }
        else{
          echo "
              <td><a href='?module=ubah&id_user=".$data['id_user']."' class='btn btn-warning btn-circle'><i class='fa fa-pen'></i></a> |
                <a href='?module=hapus&id_user=".$data['id_user']."' class='btn btn-danger btn-circle'><i class='fa fa-trash'></i></a></td>
              </tr>"; 
        }
            $no++;
        }
          ?>            
           </tbody>
                  </table>
                    </div>
                  </div>
                </div>
             </div><!-- /.box-body -->
        </div>
        <!-- /.container-fluid ===================================== -->

        <!-- ============================================================= -->

     <?php
    }
    if ($_GET["module"]=='tambah'){
    ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Pegawai </h1><hr>
              </div>
              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
              <!-- Content Row -->
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <a href="?module=tampil" class="btn btn-warning mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <form method="POST" action="#" enctype="multipart/form-data">
                              <table>
                                  <tr>
                                      <td>Nama Pegawai</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="nama_user" required>
                                          </div>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>Username</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="username" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Password</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="password" class="form-control form-control-user" name="password" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>No HP</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="no_hp" required>
                                          </div>
                                      </td>
                                      
                                  </tr>
                                  <tr>
                                      <td>Foto Profil</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="file" name="foto" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Level</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                            <select name="level" class="form-control form-control-user">
                                                <option value="AM" selected>Admin</option>
                                            </select>
                                          </div>
                                      </td>
                                  </tr>
                              </table>
                                   <input type="submit" class="btn btn-success" name ="Tambah" value="Tambah">
                                  <input type="reset" class="btn btn-danger" value="reset">
                              </form>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>

                <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Tambah'])) {
        $nama = $_POST['nama_user'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $no_hp = $_POST['no_hp'];
        $level = $_POST['level'];

        $foto=$_FILES['foto']['name'];
        $file=$_FILES['foto']['tmp_name'];

        // include database connection file
        include_once("../web/koneksi.php");

        move_uploaded_file($file, "../../img/fotoprofil/$foto");
        
        // Insert user data into table
        $result = mysqli_query($konek, "INSERT INTO user(id_user,nama_user,username,password,no_hp,foto,level) VALUES('','$nama','$user','$pass','$no_hp','$foto','$level')");

                    $cek=mysqli_affected_rows($konek);
                    if($cek > 0 ) {
                        echo " 
                        <script>
                            alert('Data Berhasil Di Tambahkan')
                            document.location.href='?module=tampil';
                        </script>
                        ";
                      }
                      else {
                        echo " 
                        <script>
                            alert('Data Gagal Di Tambahkan')
                            document.location.href='?module=tambah';
                        </script>
                        ";          
                      }
    }
    ?>


        <!-- ============================================================= -->

     <?php
    }
    elseif ($_GET["module"]=='ubah'){
    
    include("../web/koneksi.php");

            $id=$_GET['id_user'];
          
            $result=mysqli_query($konek,"SELECT * FROM user where id_user=$id");
            $data = mysqli_fetch_array($result)

        ?>

    <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ubah Data Pegawai </h1><hr>
              </div>
              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
              <!-- Content Row -->
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="?module=tampil" class="btn btn-warning mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <form method="POST" action="#" enctype="multipart/form-data">
                              <table  width="500" border="1">
                                  <tr>
                                      <td>Nama Pegawai</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                            <input type="text" class="form-control form-control-user" name="nama_user"value="<?php echo $data['nama_user'];?>" required>
                                          </div>
                                      </td>
                                      <td rowspan="6"><img src="../../img/fotoprofil/<?php echo $data['foto'];?>" width='100'></td>
                                  </tr>
                                  <tr>
                                      <td>Username</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="username" value="<?php echo $data['username']; ?>" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Password</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="password" value="<?php echo $data['password']; ?>" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>No HP</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="text" class="form-control form-control-user" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Level</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                            <select name="level" class="form-control form-control-user">
                                                <option value="AM" <?php if ($data['level'] == 'AM') {echo 'selected';} ?> selected>Admin</option>
                                            </select>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Foto</td>
                                      <td>: </td>
                                      <td>
                                          <div class="col-sm-7 mb-4 mb-sm-2">
                                              <input type="file" name="foto">
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-success" name ="Ubah" value="Ubah">
                                        <input type="reset" class="btn btn-danger" value="reset">
                                    </td>
                                  </tr>
                              </table>
                              </form>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
<?php
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['Ubah']))
{
    $id=$_GET['id_user'];
    $nama=$_POST['nama_user'];
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $no_hp=$_POST['no_hp'];
    $level=$_POST['level'];

    $foto=$_FILES['foto']['name'];
    $file=$_FILES['foto']['tmp_name'];

    move_uploaded_file($file, "../../img/fotoprofil/$foto");



    // update user data
    $result = mysqli_query($konek, "UPDATE user SET nama_user='$nama',username='$user',password='$pass',no_hp='$no_hp',foto='$foto',level='$level' WHERE id_user=$id");

    // Redirect to homepage to display updated user in list
    echo "<script>document.location.href='?module=tampil'</script>";
}
    ?>
<!-- ========================================================-->
<?php

} elseif ($_GET["module"]=='hapus'){
include "../web/koneksi.php";

 $id = $_GET['id_user']; 

 $hasil = mysqli_query($konek,"DELETE FROM user WHERE id_user=$id");
 
 if ($hasil){
      echo " 
        <script>
            alert('Data Berhasil Di Hapus')
            document.location.href='?module=tampil';
        </script>
        ";
 }

?>

            
<?php
}
?>



      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2019 KopiTok. All right reserved</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>
</body>

</html>
