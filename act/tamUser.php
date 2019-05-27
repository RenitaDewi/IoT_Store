<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/foundation.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php
include "../koneksi.php";

	/* cara lama
		$qID= mysql_query("select count(*) as tdata from pembeli");

		if(mysql_result($qID, 0) <= 9 ){
			$IDp="p0".(mysql_result($qID, 0)+1);
			//echo "$IDp";	
			}else{
				$IDp="P".(mysql_result($qID, 0)+1);	
				//echo "$IDp";
			}
	*/
	
			echo "<p>New ID generator by query</p>";
        $qgen1=mysqli_query($connection,"select max(Cast(SUBSTRING_INDEX(ID_p,'-',-1) as unsigned)) as angka,SUBSTRING_INDEX(ID_p,'-',1) as huruf from pembeli where SUBSTRING_INDEX(ID_p,'-',1) like 'p'");
			while($qgenex=mysqli_fetch_array($qgen1)){
				if(intval($qgenex['angka'])<=9){
					$IDp = $qgenex['huruf']."0-".($qgenex['angka']+1);	
					echo "$IDb";						
				}else if(intval($qgenex['angka'])>=10){
					$IDp = $qgenex['huruf']."-".($qgenex['angka']+1);	
					echo "$IDb";
						}
				}
	
$nama = $_POST['nama'];
$sandi = $_POST['sandi'];
$email = $_POST['mail'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
echo "nama : ".$nama."<br/> Sandi : ".$sandi."<br/> Email :".$email."<br/> ttl : ".$ttl."ALamat : ".$alamat;

//masukkan ke DB
$sql=mysqli_query($connection,"insert into pembeli(ID_p,Nama,Sandi,Email,Tanggal_lahir,Alamat,level) values ('$IDp','$nama','$sandi','$email','$ttl','$alamat',2)"); 

if($sql){
	header('location:../Masuk.php?pesan=suksesdaftar');
}
?>

Redirect!
<a href="../Daftar.php">Kembali</a>


</body>
</html>

<?php ob_flush(); ?>