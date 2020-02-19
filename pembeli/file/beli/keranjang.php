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
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Keranjang</title>
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
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Shopping Cart</h2>
					<div class="page_link">
						<a href="home.php">Home</a>
						<a href="keranjang.php">Cart</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">		
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Menu</th>
								<th scope="col">Harga</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Sub Total</th>
							</tr>
						</thead>
						<tbody>

							<?php 

								$sid = $_SESSION['id_pembeli'];
								$total=0;

								include_once "../web/koneksi.php";

								//jalankan perintah innner join
								$sql = mysqli_query($konek,"SELECT * FROM keranjang, produk WHERE id_pembeli='$sid' AND keranjang.id_produk = produk.id_produk ");
								while ($datakeranjang = mysqli_fetch_array($sql)) {
										$subtotal = $datakeranjang['harga'] * $datakeranjang['jumlah'];
										$total    = $total + $subtotal;
										echo "<tr>	
													<td>
														<div class='media'>
															<div class='d-flex'>
																<img width='50' src='../../../img/GambarProduk/".$datakeranjang['gambar']." ' alt=''>
															</div>
															<div class='media-body'>
																<p>".$datakeranjang['nama_produk']."</p>
															</div>
														</div>
													</td>
													<td>Rp.".format_angka($datakeranjang['harga'])."</td>";?>
													<td>

														<a href="proses_hapus_keranjang.php?id_keranjang=<?php echo "$datakeranjang[id_keranjang]";?> " class='btn btn-danger'><i class='fa fa-trash'></i></a>
														<div class="product_count">
															<input type="text" name="qty" id="sst<?php echo $datakeranjang['id_produk']; ?>" maxlength="12" value="<?php echo $datakeranjang['jumlah']; ?>" title="Quantity:" class="input-text qty">
															<button onclick="var result = document.getElementById('sst<?php echo $datakeranjang['id_produk']; ?>'); var sst<?php echo $datakeranjang['id_produk']; ?> = result.value; if( !isNaN( sst<?php echo $datakeranjang['id_produk']; ?> )) result.value++;return false;"
															 class="increase items-count" type="button">
																<i class="lnr lnr-chevron-up"></i>
															</button>
															<button onclick="var result = document.getElementById('sst<?php echo $datakeranjang['id_produk']; ?>'); var sst<?php echo $datakeranjang['id_produk']; ?> = result.value; if( !isNaN( sst<?php echo $datakeranjang['id_produk']; ?> ) &amp;&amp; sst<?php echo $datakeranjang['id_produk']; ?> > 1 ) result.value--;return false;"
															 class="reduced items-count" type="button">
																<i class="lnr lnr-chevron-down"></i>
															</button>
														</div>
													</td>
													<?php echo"<td>Rp.".format_angka($subtotal)."</td>
											</tr>";
									}
								?>


							<tr class="bottom_button">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td>

								</td>
								<td>
							<div class="col-lg-7 pr-0 ">
							<span class="btn btn-warning" aria-hidden="true">
								<select name="meja" class="btn btn-warning">
                                            <?php
                                                  include_once("../web/koneksi.php");
      
                                                  $querykategori=mysqli_query($konek,"SELECT * FROM meja");
                                                  while ($isikategori = mysqli_fetch_assoc($querykategori))
                                                  {
                                                    echo"<option value='".$isikategori['id_meja']."'>".$isikategori['nama_meja']."</option>";
                                                  }
                                            ?>
                                            </select>
                            </span>
							</div>
								</td>
								<td>
									<h5>Total Pembayaran</h5>
								</td>
								<td>
									<h5><?php echo "Rp.".format_angka($total).""; ?></h5>
								</td>
							</tr>
							<tr class="out_button_area">
								<td>

								</td>
								<td>

								</td>
								<td>

								</td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn " href="home.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Lihat Menu</a>
										<a class="main_btn" href="selesai.php"> Pesan  <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->

	<!--================ Subscription Area ================-->
	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
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