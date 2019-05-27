<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beli Barang</title>
</head>
<body>
<?php
include"../koneksi.php";
session_start();		
if(!isset($_SESSION['uname'])){
		header('location:../Masuk.php');
	}else{
		//POST dari form detil.php
		$id=$_POST['idbr'];
		$jmlbr=intval($_POST['jmlbrg']);
		$Namab=$_POST['nama'];
		$Hargab=$_POST['harga'];
		$stok=intval($_POST['stok']);
		$ID_k = $_POST['idk'];
		
		echo "1. ini sesi : $_SESSION[ID] <br/>
			  2. ini ID_k : $ID_k <br/>
			  3. ini id barang : $id <br/>
			  4. ini  nama barang : $Namab <br/>
			  5. ini harga barang : $Hargab <br/>
			  6. ini jumlah :$jmlbr <br/>
			  <a href='../Detil.php?br=$_POST[idbr]'> Kembali </a>";
		//POST dari form detil.php
				
				// berhasil 
				$insert = "insert into keranjang(ID_k,ID_p,ID_b,Nama_b,Harga_b,ID_I,Tanggalbeli,Jumlah,lunas) values('$ID_k','$_SESSION[ID]','$id','$Namab',$Hargab,null,now(),$jmlbr,'false')";
				
				//berhasil
				$update = "update keranjang set Jumlah=Jumlah+$jmlbr where ID_p='$_SESSION[ID]' and ID_b='$id'"; 
				
				
				$qcek = mysqli_query($connection,"select count(*) as tdata from keranjang where ID_p='$_SESSION[ID]' and ID_b='$id' and lunas='false'");
				while($q=mysqli_fetch_array($qcek)){
					$record = intval($q['tdata']);	
					}
					
				echo "jumlah record : ".intval($record);
				if($jmlbr < $stok ){//jika pesanan lebih kecil dari stok
				
				if($record > 0){
						//kalo ada update 
						$aksi = mysqli_query($connection,$update) or mysqli_error($update);
						echo "Update!!:>> $update";
						
					}else{
						//kalo enggak ada insert
						echo "Insert!!:>> $insert";
						$aksi = mysqli_query($connection,$insert) or mysqli_error($insert);
					}
					
				}
				header("location:../Detil.php?br=$_POST[idbr]");
	}
	?>
</body>
</html>
<?php ob_flush(); ?>