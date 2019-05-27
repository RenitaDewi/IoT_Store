<?php ob_start();?>
<?php 
include "../koneksi.php";
$id=mysqli_real_escape_string($connection,$_GET['id']);
$id2=$_POST['id2'];
$status=mysqli_real_escape_string($connection,$_GET['stat']); 
echo "ini : $id | $status";

		mysqli_query($connection,"delete from keranjang where ID_k='$id2'");
		echo "$id berhasil di hapus<a href='../Keranjang.php'>Kembali</a>";
		header('location:../index.php');
		echo "Ini ID INVOICE dan INVOICENYA <a href='../Keranjang.php'>Kembali</a>";
		//buat act delete all
	{
		header("Location:../index.php?Md=true");	
	}
?>
<?php ob_flush();?>