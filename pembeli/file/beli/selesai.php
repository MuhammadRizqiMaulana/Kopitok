<?php 
	
	session_start();

	include_once "../web/koneksi.php";

	$sid = $_SESSION['id_pembeli'];

	//fungsi untuk mendapatkan isikeranjang belanja

	function isi_keranjang() {
		$konek=mysqli_connect("localhost","root","","kopitok");
		$isikeranjang = array();
		$sid = $_SESSION['id_pembeli'];
		$sql = mysqli_query($konek,"SELECT * FROM keranjang WHERE id_pembeli = '$sid' ");

		while ($result = mysqli_fetch_array($sql)) {
			$isikeranjang[] = $result;
		}
		return $isikeranjang;
	}
	$tgl_sekarang = date("y-m-d H:i:s");

	//simpan data pemesanan 
	mysqli_query($konek,"INSERT INTO beli(id_beli,tanggal,id_pembeli,no_meja,status) VALUES ('','$tgl_sekarang','$sid','1','antri') ");

	//mendapatkan nomor order dari tabel pembelian
	$id_order = mysqli_insert_id($konek);

	//panggil fungsi isi_kernjangdan hitung jumlah produk yang dipesan
	$isikeranjang = isi_keranjang();
	$jml          = count($isikeranjang);

	//simpan data detail pemesanan
	for ($i = 0; $i < $jml; $i++){
		mysqli_query($konek,"INSERT INTO detail_beli(id_beli, id_produk, jumlah) VALUES ('$id_order', {$isikeranjang[$i]['id_produk'] }, {$isikeranjang[$i]['jumlah']} ) ");
	}

	//setelah data pemesanan tersimpan, hapus data pemesanan di tabel keranjang
	for ($i = 0; $i < $jml; $i++) {
		mysqli_query($konek,"DELETE FROM keranjang WHERE id_keranjang = {$isikeranjang[$i]['id_keranjang']} ");
	}


	echo "Nomor pesanan : <b> $id_order</b><br><br>";

	echo "Tanggal pesanan : <b> $tgl_sekarang</b><br><br>";

	echo "<h1>Rincian Belanja </h1>
				<table border=1>
					<tr>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Sub Total</th>
					</tr>";
	$r = mysqli_query($konek,"SELECT * FROM detail_beli, produk WHERE detail_beli.id_produk = produk.id_produk AND id_beli = '$id_order' ");
	$total = 0;
	while($d = mysqli_fetch_array($r)) {
		$subtotal = $d['harga'] * $d['jumlah'];
		$total    = $total + $subtotal;

		echo "<tr>
				<td>".$d['nama_produk']."</td>
				<td>".$d['harga']."</td>
				<td>".$d['jumlah']."</td>
				<td>$subtotal</td>
			</tr> ";
	}
	echo "</table>
	 		<h2>Total Belanja  : <b>$total</b></h2>	";
	echo "Untuk Pembayaran silahkan "

	echo "<a href=home.php>Kembali Ke Halaman Utama";	 
?>