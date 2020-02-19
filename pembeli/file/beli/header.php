<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="home.php">
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
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
								<hr>
									<li class="nav-item">
										<a href="daftar_menu.php?module=semua_kategori" class="icons">
											<i class="fa fa-coffee"><h6>&nbsp; Daftar Menu &nbsp;</h6></i>
										</a>
									</li>
								<hr>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
										<a href="keranjang.php" class="icons">
											<i class="lnr lnr lnr-cart">
											<?php
											
												include"../web/koneksi.php";
												$sid = $_SESSION['id_pembeli'];

												$jml=mysqli_query($konek,"SELECT * FROM keranjang, produk WHERE id_pembeli='$sid' AND keranjang.id_produk = produk.id_produk ");
												$row=mysqli_num_rows($jml);
												
												echo $row;
											 ?></i>
										</a>
									</li>

									<hr>

									<li class="nav-item submenu dropdown">
										<a href="#" class="icons">
											<i class="fa fa-user" aria-hidden="true"></i>
										</a>
											<ul class="dropdown-menu">
											<li class='nav-item'>
												<a class='nav-link ' href='profil.php'>Profil</a></li>
											<li class='nav-item'>
												<a class='nav-link ' href='../web/logout.php'>Log Out</a></li>
										</ul>
									</li>

									<hr>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>