<?php  
session_start();
if ($_SESSION['email'])
{
	session_destroy();
	//session_destroy();
	?><script language="javascript">
	document.location="../../index.php";
	</script><?php 
	
}else{
	?><script language="javascript">
	alert("Maaf, Anda tidak berhak mengakses halaman ini!!");
	document.location="login.php";
	</script>
	<?php 
}
?>