<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login KopiTok | Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 ">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/logo/kopiTokHitam.png"><hr>
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user" action="?module=proses" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Masuk">
                   </form> 
                   <hr>
               </div>
              </div>
            </div>
              <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2019 KopiTok. All right reserved</span>
                  </div>
                </div>
              </footer>
          </div>

      </div>

    </div>


  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<!-- ================================================================== -->
<?php
if (isset ($_GET['pesan'])) {

    if($_GET['pesan']=="gagal") {
        ?><script language="javascript"> 
            alert("Login gagal! email dan password salah");
        </script><?php
    } elseif($_GET['pesan']=="logout") {
        ?><script language="javascript"> 
            alert("Anda berhasil logout");
        </script><?php
    }  elseif($_GET['pesan']=="belum_login") {
        ?><script language="javascript"> 
            alert("Anda harus login untuk mengakses halaman admin");
        </script><?php
    }
}
?>

<?php
    if ($_GET["module"]=='proses'){

session_start();
include_once("file/web/koneksi.php");

//ambil data form
$user=$_POST['username'];
$pass=$_POST['password'];

//ambil dta dari DB
$query=mysqli_query($konek,"SELECT * FROM user WHERE username='$user' AND password='$pass' ");
$cek=mysqli_num_rows($query);

if($cek > 0 ) 
	{

    $data = mysqli_fetch_assoc($query);

    if ($data['level']=="AM") {

        $_SESSION['username']=$user;
        $_SESSION['level']="AM";
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['foto'] = $data['foto'];

        echo "<script> document.location.href='file/AM/home.php'; </script>";

	  }
	  elseif ($data['level']=="PK") {

        $_SESSION['username']=$user;
        $_SESSION['level']="PK";
        $_SESSION['nama_user'] = $data['nama_user'];
        $_SESSION['foto'] = $data['foto'];

        echo "<script> document.location.href='file/PK/home.php'; </script>";
    }
    else {
        echo "<script> document.location.href='index.php?pesan=gagal'; </script>";

    }
	} else {
		    echo "<script> document.location.href='index.php?pesan=gagal'; </script>";
	}
  
}
?>
