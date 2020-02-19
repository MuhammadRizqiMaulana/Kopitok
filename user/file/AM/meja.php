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

  <title>Admin KopiTok</title>

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
      include_once("menuadmin.php");
  ?>

<!-- ================================================================ -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
          <?php
            include_once("headeradmin.php");
          ?>

        <!-- ======================================================= -->
            <?php   
                if ($_GET["module"]=='tampil'){
            ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Master Nomor Meja </h1><hr>
          </div>
          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
          <!-- Content Row -->

        <div class="col mr-2">
          
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <a href="?module=tambah" class="btn btn-success" align="right"><i class="fa fa-plus"></i> Tambah Nomor Meja </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="dataTable" class="table table-hover table-bordered" >
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nomor Meja</th>
                        <th>Nama Meja</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

            include_once("../web/koneksi.php");
            $no=1;
            
            

            $select=mysqli_query($konek,"SELECT * FROM meja");
            


    while ($data = mysqli_fetch_array($select)) 
      { 
        echo "<tr>
                <td>".$no."</td>
                <td>".$data['no_meja']."</td>
                <td>".$data['nama_meja']."</td>
                <td><a href='?module=ubah&no_meja=".$data['no_meja']."' class='btn btn-warning btn-circle'><i class='fa fa-pen'></i></a> |
                <a href='?module=hapus&no_meja=".$data['no_meja']."' class='btn btn-danger btn-circle'><i class='fa fa-trash'></i></a></td>
              </tr>";
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
                <h1 class="h3 mb-0 text-gray-800">Tambah Nomor Meja </h1><hr>
              </div>
              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
              <!-- Content Row -->
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                              <a href="?module=tampil" class="btn btn-warning mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <form method="POST" action="#">
                              <table  width="500">
                                  <tr>
                                      <td>Nomor Meja</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                          <input type="text" class="form-control form-control-user" name="no_meja" required>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>Nama Meja</td>
                                      <td>: </td>
                                      <td><div class="col-sm-7 mb-4 mb-sm-2">
                                          <input type="text" class="form-control form-control-user" name="nama_meja" required>
                                          </div>
                                      </td>
                                  </tr>
                                    <td></td>
                                    <td></td>
                                    <td><input type="submit" class="btn btn-success" name ="Tambah" value="Tambah">
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

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Tambah'])) {
        
        $no_meja = $_POST['no_meja'];
        $nama_meja = $_POST['nama_meja'];

        // include database connection file
        include_once("../web/koneksi.php");

                    // Insert user data into table
                    mysqli_query($konek, "INSERT INTO meja(no_meja,nama_meja) VALUES('$no_meja','$nama_meja')");

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

            $id=$_GET['no_meja'];
          
            $result=mysqli_query($konek,"SELECT * FROM meja where no_meja=$id");
            while($user_data = mysqli_fetch_array($result))
        {
            $nama_meja = $user_data['nama_meja'];
        }
        ?>

    <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ubah Nomor Meja</h1><hr>
              </div>
              <!-- Divider -->
              <hr class="sidebar-divider d-none d-md-block">
              <!-- Content Row -->
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="?module=tampil" class="btn btn-warning mb-3"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <form method="POST" action="#">
                              <table  width="1000" >
                                  <tr>
                                      <td>Nomor Meja</td>
                                      <td>: </td>
                                      <td><div class="col-sm-8 mb-4 mb-sm-2">
                                          <input type="text" class="form-control form-control-user" name="no_meja" value="<?php echo $id; ?>" disabled>
                                          </div>
                                          
                                      </td>
                                      <td><span class="text-xs text-danger" >* untuk mengubah nomor meja, silahkan ke form tambah nomor meja</span></td>
                                  </tr>
                                  <tr>
                                      <td>Nama Kategori</td>
                                      <td>: </td>
                                      <td><div class="col-sm-8 mb-4 mb-sm-2">
                                          <input type="text" class="form-control form-control-user" name="nama_meja" value="<?php echo $nama_meja; ?>" required>
                                          </div>
                                      </td>
                                  </tr>
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
    $id=$_GET['no_meja'];
    $nama=$_POST['nama_meja'];


    // update user data
    mysqli_query($konek, "UPDATE meja SET nama_meja='$nama' WHERE no_meja=$id");

    $cek=mysqli_affected_rows($konek);
                    if($cek > 0 ) {
                        echo " 
                        <script>
                            alert('Data Berhasil Di Ubah')
                            document.location.href='?module=tampil';
                        </script>
                        ";
                      }
                      else {
                        echo " 
                        <script>
                            alert('Data Gagal Di Ubah')
                            document.location.href='?module=ubah';
                        </script>
                        ";          
                      }
}
    ?>
<!-- ========================================================-->
<?php

} elseif ($_GET["module"]=='hapus'){
include "../web/koneksi.php";

 $id = $_GET['no_meja']; 

 mysqli_query($konek,"DELETE FROM meja WHERE no_meja=$id");
 
$cek=mysqli_affected_rows($konek);
                    if($cek > 0 ) {
                        echo " 
                        <script>
                            alert('Data Berhasil Di Hapus')
                            document.location.href='?module=tampil';
                        </script>
                        ";
                      }
                      else {
                        echo " 
                        <script>
                            alert('Data Gagal Di Hapus')
                            document.location.href='?module=tampil';
                        </script>
                        ";          
                      }


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
