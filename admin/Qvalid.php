<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="3;url=AvalidasiBarang.php" />
<title>Untitled Document</title>
</head>

<body>
<p>Redirect</p>
<?php 

include "../koneksi.php";
$id=mysqli_real_escape_string($connection,$_GET['id']);
$status=mysqli_real_escape_string($connection,$_GET['stat']);

echo "ini : $id_brg <br/> $status";
	if($status=='edit'){
		mysqli_query($connection,"update barang set status='true' where ID_b='$id'");
		echo "berhasil di update<a href='AvalidasiBarang.php'>Kembali</a>";
		header('location:AvalidasiBarang.php');
	}
	if($status=='del'){
		mysqli_query($connection,"delete from barang where ID_b='$id'");
		echo "berhasil di hapus<a href='AvalidasiBarang.php'>Kembali</a>";
		header('location:AvalidasiBarang.php');
	}if($status=='userdel'){
		mysqli_query($connection,"delete from pembeli where ID_p='$id'");
		echo "$id berhasil di hapus<a href='DataPembeli.php'>Kembali</a>";
		header('location:DataPembeli.php');
	}
	
	
?>

<!-- <a href="AvalidasiBarang.php"></a> -->

</body>
</html>
<?php ob_flush(); ?>