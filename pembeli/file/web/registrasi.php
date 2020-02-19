<?php
    session_start();
    
    if (isset($_SESSION['email'])) 
    {
        
        header('Location: ../beli/home.php');
    }
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.css">
	<link rel="stylesheet" href="../../vendors/linericon/style.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" href="../../vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="../../vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="../../vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="../../vendors/animate-css/animate.css">
	<link rel="stylesheet" href="../../vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/responsive.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>Hubungi: (0123) 4896</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<h6>Untuk pemesanan silahkan Login   |</h6>
								
						</li>
						<li>
							<a href="login.php"> Login/Register
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="../../../img/logo/kopiTokHitam.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
								<hr>
									<li class="nav-item">
										<a href="login.php" class="icons">
											<i class="fa fa-sign-in"><h6>&nbsp; Login / Register &nbsp;</h6></i>
										</a>
									</li>
								<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="../../index.php">Home</a>
						<a href="registrasi.php">Register</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="../../img/login.jpg" alt="">
						<div class="hover">
							<h4>Kenapa harus mendaftar ?</h4>
							<p>Dengan mendaftar akan mempermudah dalam transaksi, dan untuk keamanan</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Buat Akun Baru</h3>
						<form class="row login_form" action="" method="post">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" name="no_telp" placeholder="Masukkan Nomor Telepon">
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="txtpassword" name="password" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="txtulangpass" name="ulangpass" placeholder="Ulangi password">
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" id="btnSubmit" name="daftar" value="Daftar" class="btn submit_btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
<?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['daftar'])) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $ulangpass = $_POST['ulangpass'];
        $nama = $_POST['nama'];
        $no_telp = $_POST['no_telp'];

        // include database connection file

        if ($password == $ulangpass ) {
        	include_once("koneksi.php");

        			$cek = mysqli_num_rows(mysqli_query($konek,"SELECT email FROM pembeli WHERE email = '$email'"));
                    if($cek > 0 ) {
                    	echo " 
                        <script>
                            alert('Email Sudah terdaftar')
                            document.location.href='registrasi.php';
                        </script>
                        "; 
                        
                      }
                      else {
                             
                    	// Insert user data into table
                    	mysqli_query($konek, "INSERT INTO pembeli(id_pembeli,email,password,nama_lengkap,no_telp) VALUES('','$email','$password','$nama','$no_telp')");
                        
                        echo " 
                        <script>
                            alert('Data Berhasil Di Tambahkan')
                            document.location.href='login.php';
                        </script>
                        ";    
                      }
        }else{
        	echo " 
                        <script>
                            alert('Pastikan Masukkan Password harus sama')
                            document.location.href='registrasi.php';
                        </script>
                        ";
        }

    }
    ?>

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> KopiTok. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
	</footer>
	<!--================ End footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script type="text/javascript">
		$(function() {
			$("#btnSubmit").click(function() {
				var password = $("#txtpassword").val();
				var confirmPassword = $("#txtulangpass").val();

				if (password != confirmPassword) {
					alert("Pastikan Password harus sama.");
					return false;
				}
				return true;
			})
		})
	</script>



	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/popper.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/stellar.js"></script>
	<script src="../../vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="../../vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../../vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="../../vendors/isotope/isotope-min.js"></script>
	<script src="../../vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="../../js/jquery.ajaxchimp.min.js"></script>
	<script src="../../js/mail-script.js"></script>
	<script src="../../vendors/jquery-ui/jquery-ui.js"></script>
	<script src="../../vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="../../vendors/counter-up/jquery.counterup.js"></script>
	<script src="../../js/theme.js"></script>
</body>

</html>