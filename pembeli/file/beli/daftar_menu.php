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
	<!--================Header Menu Area =================-->

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Daftar Menu</h2>
					<div class="page_link">
						<a href="home.php">Home</a>
						<a href="daftar_menu.php?module=semua_kategori">Daftar Menu</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row ">

				<div class="col-lg-3">
					<div class="left_sidebar_area">

						<aside class="left_widgets cat_widgets">
							<div class="l_w_title">
								<h3>Daftar Kategori Menu</h3>
							</div>
							<div class="widgets_inner">
								<ul class="list">
									<?php

												include_once("../web/koneksi.php");
								                $select=mysqli_query($konek,"SELECT * FROM kategori");
								                while ($data = mysqli_fetch_array($select)) 
								                {
								                	echo"<li>
															<a href='?module=kategori&id_kategori=".$data['id_kategori']."' >".$data['nama_kategori']."</a>
														</li>";
								                }

											?>
									
								</ul>
							</div>
						</aside>

					</div>
				</div>
				<?php
					if ($_GET["module"]=='semua_kategori') {
						?>
						<div class="col-lg-9">
				          <div class="product_top_bar">
				            <div class="left_dorp">
				              <h4>Menu Terbaru</h4>
				            </div>
				            
				          </div>
				          <div class="latest_product_inner row">
				            <?php
				              include("../web/koneksi.php");

				                    
				                      $result=mysqli_query($konek,"SELECT * FROM produk ORDER BY id_produk DESC");
				                      while($user_data = mysqli_fetch_array($result))
				                    {
				                       
				                      echo "<div class='col-lg-3 col-md-3 col-sm-6'>
				                      <div class='f_p_item'>
				                        <div class='f_p_img'>
				                          <img class='img-fluid' src='../../../img/GambarProduk/".$user_data['gambar']."' alt=''>
				                          <div class='p_icon'>
				                            <a href='aksi_keranjang.php?id=".$user_data['id_produk']."'>
				                              <i class='lnr lnr-cart'></i>
				                            </a>
				                          </div>
				                        </div>
				                          	<h4>".$user_data['nama_produk']."</h4>
				                        	<h5>Rp.".format_angka($user_data['harga'])."</h5>
				                      </div>
				                    </div>";
				                    }
				                ?>
				            
				          </div>
				        </div>

					<?php
					} elseif ($_GET["module"]=='kategori') {
						?>
						<div class="col-lg-9">
				          <div class="product_top_bar">
				            <div class="left_dorp">
				             	
				            </div>
				           
				          </div>
				          <div class="latest_product_inner row">
				            <?php
				              include("../web/koneksi.php");

				                      $id=$_GET['id_kategori'];

				                      $result=mysqli_query($konek,"SELECT * FROM produk where id_kategori=$id");
				                      while($user_data = mysqli_fetch_array($result))
				                    {
				                       
				                      echo "<div class='col-lg-3 col-md-3 col-sm-6'>
				                      <div class='f_p_item'>
				                        <div class='f_p_img'>
				                          <img class='img-fluid' src='../../../img/GambarProduk/".$user_data['gambar']."' alt=''>
				                          <div class='p_icon'>
				                            <a href='aksi_keranjang.php?id=".$user_data['id_produk']."'>
				                              <i class='lnr lnr-cart'></i>
				                            </a>
				                          </div>
				                        </div>
				                          	<h4>".$user_data['nama_produk']."</h4>
				                        	<h5>Rp.".format_angka($user_data['harga'])."</h5>
				                      </div>
				                    </div>";
				                    }
				                ?>
				            
				          </div>
				        </div>
				<?php
					}
				?>

			

				
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
	<script src="../../js/mail-script.js"></script>
	<script src="../../vendors/jquery-ui/jquery-ui.js"></script>
	<script src="../../vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="../../vendors/counter-up/jquery.counterup.js"></script>
	<script src="../../js/theme.js"></script>
</body>

</html>