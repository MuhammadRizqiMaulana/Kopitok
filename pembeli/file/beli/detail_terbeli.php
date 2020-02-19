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

				<div class="col-lg-12">
					<div class="left_sidebar_area">

						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Detail Pesanan</h3>
							</div>
							<div class="widgets_inner">
								<table class="table table-hover">
					            	<thead>
										<tr>
											<th>No</th>
											<th>Gambar</th>
											<th>Nama Produk</th>
											<th>Harga</th>
											<th>Jumlah</th>
											<th>Subtotal</th>
										</tr>	
									</thead>
									<?php
										$id=$_GET['id_beli'];
										$no=1;
										$total=0;
										include_once("../web/koneksi.php");
								        $select=mysqli_query($konek,"SELECT * FROM detail_beli, produk WHERE id_beli='$id' AND detail_beli.id_produk = produk.id_produk");
								        while ($data = mysqli_fetch_array($select)) {
								        	$subtotal = $data['harga'] * $data['jumlah'];
											$total    = $total + $subtotal;
												echo"<tr>
														<td>".$no."</td>
														<td><img width='100' src='../../../img/GambarProduk/".$data['gambar']." ' alt=''></td>
														<td>".$data['nama_produk']."</td>
														<td>Rp.".format_angka($data['harga'])."</td>
														<td>".$data['jumlah']."</td>
														<td>Rp.".format_angka($subtotal)."</td>
													</tr>";
												$no++;
											}
									?>
									<tr>
										<td></td>
										<td><h5>Total Pembayaran : </h5></td>
										<td></td>
										<td></td>
										<td></td>
										<td>
											<h5><?php echo "Rp.".format_angka($total).""; ?></h5>
										</td>
									</tr>
								</table>
							</div>
						</aside>
						<br><br>
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