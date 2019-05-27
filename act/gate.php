<?php ob_start();?>
<?php
include "../koneksi.php";
session_start();
$id=mysqli_real_escape_string($connection,$_POST[id2]);
$nome=$_POST[id2];

$id1=mysqli_real_escape_string($connection,$_POST['id2']);
$nome1=$_POST['id2'];

$id=mysqli_real_escape_string($connection,$_POST[id2]);
$nome=$_POST[id2];

echo "$id,$nome";
echo "1 $id,1 $nome";

$query=mysqli_query($connection,"select Nama,Email,Tanggal_lahir, Alamat,Foto from pembeli where ID_p='$_SESSION[ID]'");
									while($q=mysqli_fetch_array($query)){
										echo "<img src='$q[Foto]' height='200px;' width='200px;'/> <br/>";
										echo "ID			:". $_SESSION['ID']."<br/>";
										echo "Nama 			:". $q['Nama'] ."<br/>";
										echo "Email 		:". $q['Email'] ."<br/>";
										echo "Tanggal Lahir :". $q['Tanggal_lahir'] ."<br/>";
										echo "Alamat		:". $q['Alamat'] ."<br/>";
										echo "<br/><br/>";
							}

?>
<? ob_flush(); ?>