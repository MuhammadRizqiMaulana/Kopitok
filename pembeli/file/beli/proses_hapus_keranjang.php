<?php

include "../web/koneksi.php";

$id=$_GET['id_keranjang'];

 mysqli_query($konek,"DELETE FROM keranjang WHERE id_keranjang=$id");
 

                        echo " 
                        <script>
                            alert('Data Berhasil Di Hapus')
                            document.location.href='keranjang.php';
                        </script>
                        ";

?>