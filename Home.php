

<?php 
include "koneksi.php";
echo "
	<div class='container-fluid' style='padding-top:6%'>
  		<h1 align='center'>Toko Kertas</h1>
  			<div class='row'><p>ini row<p>
			<div class='col-lg-2' style='margin-top:3%'>
					<a href='index.php'><span class='glyphicon glyphicon-home'></span> Warung</a><br/><br/>
					<a href='Keranjang.php'><span class='glyphicon glyphicon-shopping-cart'></span> keranjang</a><br/><br/>
					<a href='pesan.php'><span class='glyphicon glyphicon-envelope'></span> Pesan</a><br/><br/>
			</div>
    			<div class='col-lg-10''><center>pembungkus .col-lg-10</center>
					<div class='col-lg-12'><center>List Barang .col-lg-12</center>";
					
					
				  	include "koneksi.php";
				  	$per_hal=16;
					$jumlah_record=mysqli_query($connection,"SELECT COUNT(*) from barang");
					$jum=mysql_result($jumlah_record, 0);
					$halaman=ceil($jum / $per_hal);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_hal;
					
					$query=mysqli_query($connection,"select * from barang limit $start, $per_hal");
					$no =1;	
						
						while($q=mysqli_fetch_array($query)){
						
							echo "
							
          					    <div class='col-sm-2 col-md-2' >
					                <div class='thumbnail' style='min-height:200px'>
						            	<img src='img/$q[Foto]' alt='' width='100px' style='min-height:100px'>
					                  		<div class='caption'>
												Nama: $q[Nama_b] <br/>
												Harga : $q[Harga_b] <br/>
												<p><a href='Thumbnails.php?br=$q[ID_b]' class='btn btn-default' role='button'>Detail</a></p>
									  		</div>
									</div>
						       </div>
							";
							/*echo "
							<div class='caption' style='background-color:lavender;'>
										<img src='$q[Foto]' width='30px' height='30px'/><br/>
										Nama: $q[Nama_b] <br/>
										Harga : $q[Harga_b] <br/>
										<br/>
									  </div>			
							";*/
						}
			echo "</div>";
			
			
			//space dan pagination						
echo "				
					<div class='col-lg-12'><center>spcae .col-lg-12</center>
					</div>
					
										
					<div class='col-lg-12' align='center'><center>Pagination .col-lg-12</center>
						<ul class='pagination'>	";
							for($x=1;$x<=$halaman;$x++){
								echo "<li><a href='?page=$x'>$x</a></li>";
							}

echo "					</ul>
					</div>
					";
					for($i=0;$i<10;$i++){
						echo "$i <br/>";
					}
echo "					
				</div>
				";
				
				
echo "				
 			</div>
  	</div>
  "; 
  
 //kasih for
  
  
?>