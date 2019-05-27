<?php ob_start(); ?>
<?php 
session_start();
include '../koneksi.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$query=mysqli_query($connection,"select * from pembeli where Nama='$uname' and sandi='$pass'")or die(mysql_error());
$queryadmin=mysqli_query($connection,"select * from admin where Nama='$uname' and Pass='$pass'")or die(mysql_error());

while($q=mysqli_fetch_array($query)){
		$_SESSION['ID']=$q['ID_p'];
		$_SESSION['lvl']=$q['level'];
	}
if(mysqli_num_rows($query)==1){//cek pembeli biasa behasil
	$_SESSION['uname']=$uname;
	header("location:../index.php");
}else{//jika pembeli biasa kosong

	while($q=mysqli_fetch_array($queryadmin)){
		$_SESSION['ID']=$q['ID_p'];
		$_SESSION['lvl']=$q['level'];
	}
	if(mysqli_num_rows($queryadmin)==1){ //cek admin berhasil
		$_SESSION['uname']=$uname;
		$_SESSION['pass']=$pass;
		header("location:../admin/admin.php");
	}
	
	else{ //jika keduanya salah
	header("location:../Masuk.php?pesan=gagal")or die(mysqli_error($connection));
	mysqli_error($connection);
	}
}
 ?>
 
<?php ob_start(); ?>