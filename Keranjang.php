<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
<title>Keranjang | Warung Kertas</title>
</head>

<body>
<p>Ini Keranjang</p>
<?php 
	include "act/header.php";
	include "koneksi.php";
	session_start();
	?>
    <div style="padding-top:4%">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12" style="background-color:lavender"> 
        
				<?php
					if(!isset($_SESSION['uname'])){
						header('location:Masuk.php?pesan=jualan');
					}else{
						/*
					//fungsi buat auto inc + char b 
						$qID= mysql_query("select count(*) as tdata from barang");
					if(mysql_result($qID, 0) <= 9 ){
						$IDb="b0".(mysql_result($qID, 0)+1);
						//echo "$IDb";	
					}else{
						$IDb="b".(mysql_result($qID, 0)+1);	
						//echo "$IDb";
					}
						//fungsi buat  auto inc + charb	
*/




				
				//echo "<p>New ID generator by query</p>";
        	$qgen1=mysqli_query($connection,"select max(Cast((SUBSTRING_INDEX(ID_b,'-',-1)) as unsigned)) as angka,SUBSTRING_INDEX(ID_b,'-',1) as huruf from barang where SUBSTRING_INDEX(ID_b,'-',1) like 'b'");
			while($qgenex=mysqli_fetch_array($qgen1)){
				if(intval($qgenex['angka'])<=9){
					$IDb = $qgenex['huruf']."0-".($qgenex['angka']+1);	
					//echo "$IDb";						
				}else if(intval($qgenex['angka'])>=10){
					$IDb = $qgenex['huruf']."-".($qgenex['angka']+1);	
					//echo "$IDb";
						}
				}
					//cek barang di keranjang udah ada blom
					$querycek=mysqli_query($connection,"select count(*) as tdata from keranjang where ID_p='$_SESSION[ID]' and Lunas='false'");
					while($qc=mysqli_fetch_array($querycek)){
							$total = intval($qc['tdata']);
						}
						
						if($total > 0){
					$query=mysqli_query($connection,"select ID_k,Nama_b,Harga_b,Jumlah,Tanggalbeli from keranjang where ID_p='$_SESSION[ID]' and Lunas='false'");			
					echo "List Barang : <br/>";
							//echo "<p>Nama : $q[Nama_b] <br/> Jumlah : $q[Jumlah] <br/> harga : $q[Harga_b] <br/> total :". $q['Jumlah']*$q['Harga_b'] ."</p>";
							$no=1;
							$inv=0;
								?>    
									<div class="col-sm-12 col-md-12" >
										<table border="1" class="table-hover">
											<tr  align="center">
												<th>No</th>
										    	<th>Id Transaksi</th>
										        <th>Nama Barang</th>
								                <th>Harga Barang</th>
								                <th>Jumlah</th>
								                <th>Total</th>
								                <th>Tanggal Beli</th>
												<th>Aksi</th>
										    </tr>								
                                   <?php         
									while($q=mysqli_fetch_array($query)){
										echo "
										    <tr align='center'>
												<td>$no</th>
								            	<td>$q[ID_k]</td>
								                <td>q[Nama_b]</td>
								                <td>$q[Harga_b]</td>
								                <td>$q[Jumlah]</td>
								                <td>".$q['Harga_b']*$q['Jumlah']."</td>
								                <td>$q[Tanggalbeli]</td>
												<td><a onclick=\"return confirm('Batalkan?')\" href='act/Beli_delete.php?id=$q[ID_k]&stat=satuan' class='btn' style='color:#F00' role='button'><span class='glyphicon glyphicon-remove'></span></a></td>													
										    </tr>";
											$no++;								
										}			
							echo"			<tr>
												<td colspan='9'>
												</td>
											</tr>
										</table>
									";	
									
									$qtot=mysqli_query($connection,"select SUM(Harga_b*jumlah) as totb from keranjang where ID_p='$_SESSION[ID]' and lunas ='false'");
									while($q=mysqli_fetch_array($qtot)){
											$totb=$q['totb'];									
										}
								echo "
									<p>Total Bayar : $totb</p>
						       		</div>";		
						}else{
							echo "Keranjang masih kosong";
							}
							
							echo "<br/>
										<a href='act/Beli_update.php' class='btn btn-group'>Setuju</a><span/>
										<a href='act/Beli_delete.php?id=$_SESSION[ID]&stat=banyak' class='btn btn-group'>Batalkan semua(udah bisa)</a><span/>
										<a href='index.php' class='btn btn-group'>kembali biasa</a><span/>
							";
		
				?>
    		</div>
    	</div>
    </div>
	</div>
    
    <?php include "act/footer.php";?>
</body>
</html>

<?php }?>
<?php ob_flush();?>