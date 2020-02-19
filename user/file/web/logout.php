<?php  
session_start();
session_destroy();

unset($_SESSION['username']);
?><script language="javascript"> 
            alert("Anda berhasil logout");
        </script><?php
echo "<script> document.location.href='../../index.php'; </script>";
?>