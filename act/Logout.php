<?php ob_start(); ?>
<?php
	session_start();
	include "../koneksi.php";
	echo "<p>ini id nya $_SESSION[ID]</p>";
	$query=mysqli_query($connection,"Delete from keranjang where ID_p='$_SESSION[ID]' and lunas='false'") or mysqli_error($query);
	session_destroy();
/*	$query=mysql_query("select * from keranjang where ID_p='$_SESSION[ID]' and lunas='false'");
	$num_row=mysql_num_rows($query);
	if($num_row>0){
		//kalo ada di keranjang di delete
		echo "delete query!";
		$querydelete=mysql_query("delete from keranjang where ID_p='$_SESSION[ID]' and lunas='false'");	
		session_destroy();
		}else{
			//syntax delete error
			$querydelete=mysql_query("delete from keranjang where ID_p='$_SESSION[ID]' and lunas='false'");	
			session_destroy();
			echo "hancurkan sesi! id =$_SESSION[ID] = kosong";
	}
	*/
	{
		header("Location:../Masuk.php");	
	}
?>    
<?php ob_flush(); ?>
