<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.12.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<title>Data Transaksi | Warung Kertas</title>
</head>

<body>
<?php 
include "header.php";
include "../koneksi.php";
include "admincek.php";
?>
	<div style="padding-top:4%">
		<h1 align="center">IoT Store</h1><br/>
		<!--	<p>Tempat Kerja Admin</p>-->
				<div class="col-lg-12" ><!--style="background-color:lavenderblush">-->
                	<!--<p>Pembungkus .col-lg-12</p>-->
						<?php include "Navigator.php";?>
                    	<div class="col-lg-10"> <!--style="background-color:lavender">-->
                        	<!--<p>pembungkus .col-lg-10</p>-->
                            <h3>WELCOME ADMIN <?php echo $uname ;?>!</h3><br/>
                            <div class="col-lg-12"><center>Data Transaksi</center>
									<div class="col-sm-12 col-md-12">
										<table class="table table-bordered table-hover">
											<tr  align="center">
												<th>No</th>
										    	<th>Id Transaksi</th>
										        <th>Id Pembeli</th>
								                <th>Id Barang</th>
								                <th>Nama Barang</th>
								                <th>Harga Barang</th>
								                <th>ID invoice</th>
								                <th>Tanggal Beli</th>
												<th>Jumlah</th>
												<th>Bayar</th>
												<th>Jasa</th>
												<th>Paket</th>
												<th>Lunas</th>
										    </tr>
									 <?php
                                    $query=mysqli_query($connection,"select*from keranjang");
                                    $no=1;                                            								
									while($q=mysqli_fetch_array($query)){
										echo "
										    <tr align='center'>
												<td>$no</th>
								            	<td>$q[ID_k]</td>
								                <td>$q[ID_p]</td>
								                <td>$q[ID_b]</td>
								                <td>$q[Nama_b]</td>
								                <td>$q[Harga_b]</td>
								                <td>$q[ID_I]</td>
												<td>$q[Tanggalbeli]</td>
												<td>$q[Jumlah]</td>											
												<td>$q[Bayar_Uang]</td>
												<td>$q[Lunas]</td>
												<td>$q[Jasa]</td>
												<td>$q[Paket]</td>
												
										    </tr>";
											$no++;
										}
								echo "
										</table>
						       		</div>";		
							?>
                    	</div>
                </div>
	</div>
	<a onclick=\"return confirm('hapus?')\"


<?php //include "../act/footer.php";?> 
</body>
</html>

<?php ob_flush();?>