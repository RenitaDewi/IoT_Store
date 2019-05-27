<!--

<div class="col-lg-12">


<!--Halaman Utama -->
<div>
	<div class="container-fluid" style="padding-top:6%">
  		<h1 align="center">Toko Kertas</h1><br/>
  			<div class="row"><p>ini row bungkus semua .col-lg-12<p>
			<div class="col-lg-2 " style="margin-top:3%;"><p>Pembungkus .col-lg-2</p>
					<a href="index.php" ><span class="glyphicon glyphicon-home"></span> Warung</a><br/><br/>
					<a href="Keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span> keranjang</a><br/><br/>
					<a href="Jualan.php"><span class="glyphicon glyphicon-envelope"></span> Jualan</a><br/><br/>
			</div>
    			<div class="col-lg-8 pembataskiri"><center>pembungkus .col-lg-10</center>
					<div class="col-lg-10"><center>List Barang .col-lg-12</center>

<?php 
include "koneksi.php";
session_start();

					$query=mysqli_query($connection,"select Nama,Email,Tanggal_lahir, Alamat,Foto from pembeli where ID_p='$_SESSION[ID]'");
						while($q=mysqli_fetch_array($query)){
							echo "<img src='img/profil/$q[Foto]' height='200px;' width='200px;'/> <br/>";
							echo "Nama : $q[Nama] <br/>";
							echo "Nama : $q[Email] <br/>";
							echo "Nama : $q[Tanggal_lahir] <br/>";
							echo "Nama : $q[Alamat] <br/>";

							}
						
?>


			</div> 
            	<div class="col-lg-2" style="background-color:lavenderblush">
                	<div class="col-lg-4" style="background-color:lavenderblush">
                    	<?php
                        $query=mysqli_query($connection,"select ID_I from keranjang where ID_p='$_SESSION[ID]'");
						while($q=mysqli_fetch_array($query)){
								echo "$q[ID_I] ";
							}  
						?>
            		</div>
            	</div>
			</div>

				<!-- update gambar-->
                <div class="col-lg-12"><center>spcae .col-lg-12</center>
                	<div class="col-lg-3">
                		<form method="post" enctype="multipart/form-data">
                        	<div class="form-group">
								<div class="col-lg-12">
        							<input type="file" name="filefoto" class="form-control" required/> <br />
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-lg-12">   
									<input type="submit" value="Upload" name="save" class="btn btn-primary">
                                </div>
                            </div>    
						</form>
                	</div>
                <br/>
				</div>
<?php
			//space^ dan paginationV						
echo "														
					<div class='col-lg-12' align='center'><center>Pagination .col-lg-12</center>
						<ul class='pagination'>	";
							for($x=1;$x<=$halaman;$x++){
								echo "<li><a href='?page=$x'>$x</a></li>";
							}
?>
						</ul>
					</div>
				</div>				
 			</div>
  	</div>
    <!-- ini footer -->
  
  <?php
  // code B
  $lokasi_file = $_FILES['filefoto']['tmp_name'];
  $tipe_file   = $_FILES['filefoto']['type'];
  $nama_file   = $_FILES['filefoto']['name'];
  $direktori   = "img/Profil/$nama_file";
  // end of code B
   
  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
    // code C
    $sql = "update pembeli set Foto='$nama_file' where ID_p='$_SESSION[ID]'";
    $aksi = mysqli_query($connection,$sql);
    // end of code C
     
    // code D
    if (!$aksi) {
    echo "maaf gagal memasukan gambar";
    }else{
        echo "gambar berhasil di upload<br>";  
    }
    // end of code D
  }
  ?>
  
  	<?php
    include "act/footer.php";
	?>














-->