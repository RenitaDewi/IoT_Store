<?php ob_start();?>
<?php
include "../koneksi.php";
session_start();
echo " <br/>";
$uang=$_POST['uang'];
$jasa=$_POST['Jasa'];
$paket = $_POST['Paket'];
$total = $_POST['total'];
echo "uang: $uang <br/>
	  jasa : $jasa<br/>
	  Paket : $paket<br/>
	  total : $total<br/>";
	  
	  if($uang < $total){
		  header('location:../Detil_inv.php');
		  }else{
			  //echo "<a href='../Detil_inv.php'>Back!</a>";
		  
	  
				$qgen1=mysqli_query($connection,"select max(Cast((SUBSTRING_INDEX(ID_I,'-',-1)) as unsigned)) as angka,SUBSTRING_INDEX(ID_I,'-',1) as huruf from in_k where SUBSTRING_INDEX(ID_I,'-',1) like 'I';");
			while($qgenex=mysqli_fetch_array($qgen1)){
				if(intval($qgenex['angka'])<=9){
					$ID_I = $qgenex['huruf']."0-".($qgenex['angka']+1);
					$INV="INV".($qgenex['angka']+1)."_$_SESSION[ID]";
					//echo "ID I =$ID_I <br/>ID INV = $INV <br/>";						
					$INSinv = mysqli_query($connection,"insert into in_k values('$ID_I','$INV')") or mysqli_error($INSinv);
					$UPdone=mysqli_query($connection,"update keranjang set ID_I='$ID_I',lunas='true',Bayar_Uang=$uang,Jasa='$jasa',Paket='$paket' where ID_p='$_SESSION[ID]' and lunas='false'") or mysql_error($UPdone);		
					$_SESSION['inv']=$ID_I;
					header('location:../index.php');	
				}else 
				
				if(intval($qgenex['angka'])>=10){
					$ID_I = $qgenex['huruf']."-".($qgenex['angka']+1);
					$INV="INV".($qgenex['angka']+1)."_$_SESSION[ID]";	
					//echo "ID I =$ID_I <br/>ID INV = $INV <br/>";	
					$INSinv = mysqli_query($connection,"insert into in_k values('$ID_I','$INV')") or mysqli_error($INSinv);
					$UPdone=mysqli_query($connection,"update keranjang set ID_I='$ID_I',lunas='true',Bayar_Uang=$uang,Jasa='$jasa',Paket='$paket' where ID_p='$_SESSION[ID]' and lunas='false'") or mysql_error($UPdone);	
					$_SESSION['inv']=$ID_I;
					header('location:../index.php');	
	
				}	
			}	
			
}//tutup if uang			
?>
<?php ob_flush();?>