<<!DOCTYPE html>
<html>
<head>
  <title></title>
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

  <?php
      header("Content-type: application/vnd-ms-excel");
      header("Content-Disposition: attachment; filename=DataLaporan.xls");
  ?>
  <h2>Laporan Penjualan</h2>
<table border="1">
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

            include_once("../web/koneksi.php");
            $no=1;
            $total = 0;
            
            

            $select=mysqli_query($konek,"SELECT detail_beli.id_detail_beli, beli.id_beli, beli.tanggal, produk.nama_produk, produk.harga, detail_beli.jumlah 
              FROM beli INNER JOIN (produk INNER JOIN detail_beli ON produk.id_produk = detail_beli.id_produk) ON beli.id_beli = detail_beli.id_beli WHERE beli.status = 'Selesai' ORDER BY beli.tanggal ASC");
            


    while ($data = mysqli_fetch_array($select)) 
      { 
        echo "<tr>
                <td>".$no."</td>
                <td>".$data['id_detail_beli']."</td>
                <td>".$data['tanggal']."</td>
                <td>".$data['nama_produk']."</td>
                <td>Rp. ".format_angka($data['harga'])."</td>
                <td>".$data['jumlah']."</td>
                <td>Rp. ".format_angka($data['harga'] * $data['jumlah'])."</td>
              </tr>";
            $no++;
            $total = $total + $data['harga'] * $data['jumlah'];
        }
          ?>            
</tbody>
</table>
<hr><h3>Total Penjualan : Rp. <?= format_angka($total); ?></h3>

</body>
</html>