<?php
  session_start();
  if (!isset($_SESSION['email'])){
        echo " 
        <script>
            document.location.href='../web/kosong.php';
        </script>
        ";
  }
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="../img/logo/kopiTokHitam.png" type="image/png">
	<title>KopiTok</title>
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

<?php
function format_angka($angka) {
  if ($angka > 1) {
    $hasil =  number_format($angka,0, ",",".");
  }
  else {
    $hasil = 0; 
  }
  return $hasil;
}?>


	<!--================Header Menu Area =================-->
	<header class="header_area">
		
		<?php
			include_once"header.php";
		?>
	</header>
	
		<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row ">

				<div class="col-lg-4">
					<div class="left_sidebar_area">

						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Informasi Profil</h3>
							</div>
							<div class="widgets_inner">
								<table>
									<?php

										include_once("../web/koneksi.php");
										$sid = $_SESSION['id_pembeli'];
								        $select=mysqli_query($konek,"SELECT * FROM pembeli where id_pembeli=$sid");
								        $data = mysqli_fetch_array($select);
								            echo"<tr>
								                	<td>Nama</td>
								                	<td>:</td>
								                	<td>".$data['nama_lengkap']."</td>
								            	</tr>
								            	<tr>
								                	<td>Email</td>
								                	<td>:</td>
								                	<td>".$data['email']."</td>
								            	</tr>
								            	<tr>
								                	<td>No Telepon</td>
								                	<td>:</td>
								                	<td>".$data['no_telp']."</td>
								            	</tr>";
									?>
								</table>
								</div>
						</aside>
						<br><br>
					</div>
				</div>
				
						<div class="col-lg-12">
				          <div class="product_top_bar">
				            <div class="left_dorp">
				              <h4>Daftar Pesanan</h4>
				            </div>
				          </div>
				          <div class="latest_product_inner row">
				          	<div class='col-md-12'>
				          	<div class="table-responsive">
								<table class="table table-hover">
				            	<thead>
								<tr>
									<th>No</th>
									<th>Nomer Pesanan</th>
									<th>Waktu</th>
									<th>No Meja</th>
									<th>Status</th>
								</tr>	
								</thead>		
							<?php 
								$sid = $_SESSION['id_pembeli'];
								$no=1;
								$tampil = mysqli_query($konek,"SELECT * FROM beli WHERE id_pembeli='$sid' ORDER BY tanggal DESC");
								while ($data = mysqli_fetch_array($tampil)) {
									echo"<tr>
											<td>".$no."</td>
											<td>".$data['id_beli']."</td>
											<td>".$data['tanggal']."</td>
											<td>".$data['no_meja']."</td>
											<td>".$data['status']."</td>
											<td><a href='detail_terbeli.php?id_beli=".$data['id_beli']."' class='btn btn-info'><i class='fa fa-eye'></i></a></td>
										</tr>";
									$no++;
								}
							?>
							</table>
				            </div>
				          </div>
				        </div>
			</div>
		</div>
	</section>
	<!--================End Category Product Area =================-->





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
	<script src="../../vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="../../vendors/flipclock/timer.js"></script>
	<script src="../../vendors/counter-up/jquery.counterup.js"></script>
	<script src="../../js/mail-script.js"></script>
	<script src="../../js/theme.js"></script>
</body>

</html>