<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.12.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<title>Validasi Admin | IoT Store</title>
</head>

<body>
<?php 
include "header.php";
include "../koneksi.php";
include "admincek.php";
?>
	<div style="padding-top:4%">
		<h1 align="center">IoT Store</h1><br/>
			<!--<p>Tempat Kerja Admin</p>-->
				<div class="col-lg-12"><!-- style="background-color:lavenderblush">-->
                	<!--<p>Pembungkus .col-lg-12</p>-->
						<?php include "Navigator.php";?>
                    	<div class="col-lg-10"> <!--style="background-color:lavender">-->
                        <!--	<p>pembungkus .col-lg-10</p>-->
				<h3>WELCOME ADMIN <?php echo $uname ;?>!</h3><br/>
						<div class="col-lg-12"><center>Data Barang</center>                           
<?php 
//session_start();
$per_hal=16;
					$jumlah_record=mysqli_query($connection,"SELECT COUNT(*) from barang");
					$jum=is_int($jumlah_record);
					$halaman=ceil($jum / $per_hal);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_hal;
					//for($i=0;$i<3;$i++){
				
						  ?>
							<div class="col-sm-12 col-md-12" >
								<table class="table table-hover">
									<tr>
										<th>No</th>
								    	<th>Id barang</th>
								        <th>Nama Barang</th>
								        <th>Harga Barang</th>
								        <th>Stok Barang</th>
								        <th>Foto</th>
								        <th>Keterangan</th>
								        <th>Status</th>
								        <th>Pengupload</th>
									</tr>
                            <?php        
						$query=mysqli_query($connection,"select * from barang where status = 'true' limit $start, $per_hal");
						$no=1;								
						while($q=mysqli_fetch_array($query)){
							echo "
								 <tr>
									<td>$no</td>
								    <td>$q[ID_b]</td>
								    <td>$q[Nama_b]</td>
								    <td>RP.$q[Harga_b].00,-</td>
								    <td>$q[Stok]</td>
								    <td><img src='../img/$q[Foto]' width='30px;' height='30px;'/></td>
								    <td>$q[Ket]</td>
								    <td>$q[Status]</td>
								    <td>$q[Pengupload]</td>
								</tr>";
							$no++;
							}	
							echo "
								</table>
							</div>";									

						//}
?>
								</div>
                                
                                <div class="col-lg-12"><center></center>
                					<br/>
								</div>
                                
                               	<!--space^ dan paginationV-->																			
								<div class="col-lg-12" align="center"><center></center>
									<ul class="pagination">	
									<?php
										for($x=1;$x<=$halaman;$x++){
											echo "<li><a href='?page=$x'>$x</a></li>";
										}
									?>
									</ul>
								</div>   
                    	</div>
                        
                </div>
	</div>




<?php //include "../act/footer.php";?> 
</body>
</html>

<?php ob_flush();?>