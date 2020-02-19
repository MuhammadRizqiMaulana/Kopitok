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
	        <!-- Begin Page Content -->
	        <div class="container-fluid">

	          <!-- Page Heading -->
	          	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	            	<h1 class="h3 mb-0 text-gray-800">Daftar Pesanan </h1><hr>
	          	</div>
	          <!-- Divider -->
	          	<hr class="sidebar-divider d-none d-md-block">
	          <!-- Content Row -->

	          		<div class="col mr-2">
			            <div class="card shadow mb-4">
			              	<div class="card-body">
				              	<a href="export_excel.php" class="btn btn-success" target="_blank"> Export ke Excel</a>

							         <form action="laporan.php" method="post" name="postform">
							            <p align="center"><font color="blue" size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font></p><br />
							            	<table border="0">
								                <tr>
								                    <td width="125"><b>Dari Tanggal</b></td>
								                    <td colspan="2" width="190">: <input type="date" name="tanggal_awal" size="16" />
								                                   
								                    </td>
								                    <td width="125"><b>Sampai Tanggal</b></td>
								                    <td colspan="2" width="190">: <input type="date" name="tanggal_akhir" size="16" />
								                                    
								                    </td>
								                    <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian"/></td>
								                    <td colspan="2" width="70"><input type="reset" value="Reset" /></td>
								                </tr>
							            	</table>
							        </form><br/>

							        <?php
							        	//proses jika sudah klik tombol pencarian data
										if (isset($_POST['pencarian'])) {
											//menangkap nilai form
								            $tanggal_awal=$_POST['tanggal_awal'];
								            $tanggal_akhir=$_POST['tanggal_akhir'];
								            if(empty($tanggal_awal) || empty($tanggal_akhir)){
									            //jika data tanggal kosong
									            ?>
									            <script language="JavaScript">
									                alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
									                document.location='laporan.php';
									            </script>
									            <?php
									        } else { 
									        ?>
									        	<i><font color="orange"><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo $_POST['tanggal_awal']?></b> s/d <b><?php echo $_POST['tanggal_akhir']?></b></font></i>
									            <?php
									            include_once("../web/koneksi.php");
									           
									            $select=mysqli_query($konek,"SELECT detail_beli.id_detail_beli, beli.id_beli, beli.tanggal, produk.nama_produk, produk.harga, detail_beli.jumlah 
									              FROM beli INNER JOIN (produk INNER JOIN detail_beli ON produk.id_produk = detail_beli.id_produk) ON beli.id_beli = detail_beli.id_beli WHERE beli.status = 'Selesai' and beli.tanggal between '$tanggal_awal' and '$tanggal_akhir'");
									        }

										} else {
											include_once("../web/koneksi.php");
											//fetch data dari database
											$select=mysqli_query($konek,"SELECT detail_beli.id_detail_beli, beli.id_beli, beli.tanggal, produk.nama_produk, produk.harga, detail_beli.jumlah FROM beli INNER JOIN (produk INNER JOIN detail_beli ON produk.id_produk = detail_beli.id_produk) ON beli.id_beli = detail_beli.id_beli WHERE beli.status = 'Selesai' ORDER BY beli.tanggal ASC");
										}
									?>
									<div class="table-responsive">
						                  <table id="dataTable" class="table table-hover table-bordered" >
						                    <thead>
						                      <tr>
						                        <th>No</th>
						                        <th>Id Detail Beli</th>
						                        <th>Tanggal</th>
						                        <th>Nama Produk</th>
						                        <th>Harga</th>
						                        <th>Jumlah</th>
						                        <th>Sub Total</th>
						                      </tr>
						                    </thead>
						                    <tbody>
						                      <?php

						            
						            $no=1;
						            $total = 0;   

						    while ($data = mysqli_fetch_array($select)) 
						      { 
						        echo "<tr>
						                <td>".$no."</td>
						                <td>".$data['id_detail_beli']."</td>
						                <td>".$data['tanggal']."</td>
						                <td>".$data['nama_produk']."</td>
						                <td>Rp.".format_angka($data['harga'])."</td>
						                <td>".$data['jumlah']."</td>
						                <td>Rp. ".format_angka($data['harga'] * $data['jumlah'])."</td>
						              </tr>";
						            $no++;
						            $total = $total + $data['harga'] * $data['jumlah'];
						        }
						        ?>
						    </tbody>
	                  </table>
					<hr><h3>Total Penjualan	: Rp. <?= format_angka($total); ?></h3>

	                    </div>



							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
</body>
</html>