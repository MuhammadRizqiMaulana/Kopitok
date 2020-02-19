<?php
    session_start();
    
    if (isset($_SESSION['email'])) 
    {
        
        header('Location: ../beli/home.php');
    }
?>
<html >

<head>
	<!-- Required meta tags -->	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../../../img/logo/kopiTokHitam.png" type="image/png">
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
							<h6>Untuk pemesanan silahkan Login</h6>
								
						</li>
					</ul>
				</div>
			</div>
		</div>		
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="../../index.php">
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
						<a href="login.php">Login</a>
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
							<a class="main_btn" href="registrasi.php">Buat akun</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in Untuk masuk</h3>
						<form class="row login_form" action="?module=proses" method="POST">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email" placeholder="Email" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							
							<div class="col-md-12 form-group">
								<input type="submit" class="btn submit_btn" value="Log in">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->





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

<!-- ================================================================== -->

<?php
if ($_GET["module"]=='proses'){

ob_start();
include_once "koneksi.php";
	
$email=$_POST['email'];
$password=($_POST['password']);

$query=mysqli_query($konek,"SELECT * FROM pembeli WHERE email='$email' AND password='$password' ");
if($data=mysqli_fetch_array($query)) 
	{
		$_SESSION['logged-in'] = true;
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['id_pembeli'] = $data['id_pembeli'];
		$_SESSION['nama_lengkap'] = $data['nama_lengkap'];

		echo "<script> document.location.href='../beli/home.php'; </script>";
	}
	elseif($username=="" or $password=="")
	{
    echo "<script>alert('Masih ada yang kosong');</script>";
		$_SESSION['kosong']='kosong';
		echo "<script> document.location.href='login.php'; </script>";
	}
	else
	{
    echo "<script>alert('Password / Username Salah');</script>";
		$_SESSION['salah']='salah';
		echo "<script> document.location.href='login.php'; </script>";
	}

		}
?>