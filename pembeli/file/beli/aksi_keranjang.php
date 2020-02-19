<?php

session_start();

include_once"../web/koneksi.php";
$sid = $_SESSION['id_pembeli'];
$id=$_GET['id'];

//cek dulu apakah barang yang sudah dibelisudah dikeranjang

$sql = mysqli_query($konek,"SELECT id_produk FROM keranjang WHERE id_produk='$id' AND id_pembeli='$sid' ");

$ketemu = mysqli_num_rows($sql);

if ($ketemu == 0) {
	//kalau baranng belum ada, maka dijalankan perintah insert
	mysqli_query($konek, "INSERT INTO keranjang (id_produk, jumlah, id_pembeli) VAlUES ('$id', 1, '$sid')");
} else {
	//kalau baranag sudah ada, maka dijalankan perintah update
	mysqli_query($konek, "UPDATE keranjang SET jumlah = jumlah + 1 WHERE id_pembeli = '$sid' AND id_produk ='$id' ");
}
header('Location:keranjang.php');

?>