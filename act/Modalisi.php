<?php ob_start();?>
<?php
include "../koneksi.php";
session_start();
?> 
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 

<script>
	$(document).ready(function(){
		//load modalisi
		$(".btnid").click(function(){
			var del = $(this).attr('id');
			//alert('hapus '+del);
			$.ajax({
				type: 'POST',
				url: "act/Beli_delete.php",
				data: 'id2='+del,
				success: function() {
					 $('.tampil').load("act/Modalisi.php");  
					//alert('berhasil menghapus');
                     
				}
			});
			
		});
	});
	</script>
 
     <div class="modal-content" >
     	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	     <h3 class="modal-title" id="myModalLabel1" align="center"><strong>Keranjang</strong></h3>
        </div>
        <div class="modal-body">                      
<!--        <form method="post" action="">
        	<input type="hidden" class="tempid" value="id"/>
        </form>-->
 <?php
                    //cek barang di keranjang udah ada blom
					$querycek=mysqli_query($connection,"select count(*) as tdata from keranjang where ID_p='$_SESSION[ID]' and Lunas='false'");
					while($qc=mysqli_fetch_array($querycek)){
							$total = intval($qc['tdata']);
						}
						
						if($total > 0){
					$query=mysqli_query($connection,"select ID_b,ID_k,Nama_b,Harga_b,Jumlah,Tanggalbeli from keranjang where ID_p='$_SESSION[ID]' and Lunas='false'");			
							$no=1;
							$inv=0;
								    ?>
									<div class="panel panel-primary">
                                        <div class="panel-heading" align="center">List Barang</div>
                                    	
										<table class="table table-Stripped table-hover">
                                        <thead > <!-- bgcolor="#337ab7" --> 
											<tr >
												<th>No</th>
										        <th>Nama Barang</th>
								                <th>Harga Barang</th>
								                <th>Jumlah</th>
								                <th>Total</th>
								                <th>Tanggal Beli</th>
												<th>Aksi</th>
										    </tr>								
                                        </thead>    
                                   <?php         
									while($q=mysqli_fetch_array($query)){
										echo "
										<body>
										    <tr align='center'>
												<td>$no</th>
								                <td><a href='Detil.php?br=$q[ID_b]'>$q[Nama_b]</td>
								                <td>$q[Harga_b]</td>
								                <td>$q[Jumlah]</td>
								                <td>".$q['Harga_b']*$q['Jumlah']."</td>
								                <td>$q[Tanggalbeli]</td>";
												//<td><a onclick=\"return confirm('Batalkan?')\" href='act/Beli_delete.php?id=$q[ID_k]&stat=satuan' class='btn' style='color:#F00' role='button'><span class='glyphicon glyphicon-remove'></span></a></td>	
										echo"	<td><a class='btn btnid' id='$q[ID_k]'><span class='glyphicon glyphicon-remove' style='color:#F00' ></span> Batal</a></td>									
										    </tr>
											</tbody>";
											
											$no++;								
										}		
										$totb=0;	
									$qtot=mysqli_query($connection,"select SUM(Harga_b*jumlah) as totb from keranjang where ID_p='$_SESSION[ID]' and lunas ='false'");
									while($q=mysqli_fetch_array($qtot)){
											$totb=$q['totb'];									
										}
								   echo"</table>
								 		</div>
										<p align='right'><Strong>Total Harga: Rp.$totb.00,-</Strong></p>
								
								
										<div class='col-lg-12'>
                                        	<form action='act/Beli_update.php' method='post'>
												<div class='col-lg-4'>
													<select name='Jasa' class='form-control' required>
														<option value=''>--PIlih Jasa pengiriman--</option>
														<option value='JNE'>JNE</option>
														<option value='TIKI'>TIKI</option>
														<option value='Kantor Pos'>Kantor Pos</option>
													</select>
												</div>
												<input type='hidden' name='total' value='$totb' />
                                            
												<div class='col-lg-3'>
													<select name='Paket' class='form-control' required>
														<option value=''>--PIlih Paket--</option>
														<option value='1 Hari'>1 Hari</option>
														<option value='2 Hari'>2 Hari</option>
														<option value='3 Hari'>3 Hari</option>
													</select>
												</div>
                                            
												<div class='col-lg-3'>
													<input name='uang' type='number' min='$totb' value='$totb' class='form-control' placeholder='Pembayaran' required/>    
												</div>
                                            
												<div class='col-lg-2'>
													<center><input type='submit' class='btn btn-primary' value='Setuju'></center>
												</div>    
                                            </form>
										</div>
								";
								
								

						}else{
							echo "<h5 align='center'>Keranjang masih kosong</h5>";
							}
					?>
                    
                    
                                          </div>
                                      .    <div class="modal-footer">
                                          <?php
                                        /*   if($total > 0){
                    	   					echo"<a href='Detil_inv.php' class='btn btn-success' role='button'>Lanjut</a><span/>"; 
												//<a href='act/Beli_update.php' class='btn btn-success' role='button'>Setuju</a><span/>
												
												}*/
										  ?>
                                            <!--<button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>-->
                                            
                                            
                                          </div>
                                    </div>
<?php ob_flush(); ?>