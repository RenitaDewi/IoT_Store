<?php ob_start();?>
<?php
	include "../koneksi.php";
	if($_SESSION['lvl']<>1){
		header("location:../index.php?");
	}
	
?>
<?php ob_flush(); ?>