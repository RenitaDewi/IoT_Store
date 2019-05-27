<?php ob_start(); ?>
<?php include "koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
<title>Untitled Document</title>
<script>
	//$(document).ready(function() {
//        $('#btndet').click(function(){
//				var id = $('#idbr').val();
//				var jml = $('#jmlbrg').val();
//				var harga = $('#harga').val();
//				var nama = $('#nama').val();
//				var stok = $('#stok').val();
//				
//
//				//if ((harga.value ==null) || (harga !="")){				
//				//alert('post ke detil_act terus terima hapus query select * from barang id = '+id+' jmlbrg='+jml + ' Harga='+harga+' nama='+nama+' stok='+stok);
//				var data = 'idbr='+ id + '&jmlbrg=' + jml +'&harga='+harga+'&nama='+nama+'&stok='+stok;
//				
//				$.ajax({
//						type: 'POST',
//						url: "act/Detil_act.php",
//						data: data,
//						
//					});
//			//	}else{
//			//		alert ('harga kosong!');
//			//	}
//			});
//    });

</script>


</head>
<style>
	.pembatas{
		border-left: 1px solid #d5d5d5;
		border-right: 1px solid #d5d5d5;
	  }
</style>
<body>
<?php
	session_start();
	include "act/header.php"; 
?>
<div style="padding-top:4%">
	<div class="container-fluid" style="padding-top:1%">
    	<div class="col-lg-12">
  		<h1 align="center">Warung Kertas</h1>
        </div>
  			<div class="row" style="padding-top:2%"> <!-- <p>ini row bungkus semua .col-lg-12<p> -->
				<div ><!--pembungus navigator -->
                	<!--Navigator + modal keranjang-->
                    
                    <?php include "act/navuser.php";?>
                    
                    <!--Navigator + modal keranjang-->
				</div>
	    			<div class="col-lg-8 pembatas" ><center><!-- pembungkus .col-lg-8 --></center>
						<div class="col-lg-12" ><center><!-- List Barang .col-lg-12 --></center>
							<?php
								$ID=$_GET['br'];
				//echo "Select ke Database pake query ini Idnya ".$ID."<br/>";
								$query=mysqli_query($connection,"select * from barang where ID_b='$ID'");							
									while($q=mysqli_fetch_array($query)){					
									//potong dari sini								
									//id nama harga




								//Buat ID
								$ID_k ='';
								$qgen1=mysqli_query($connection,"select max(Cast((SUBSTRING_INDEX(ID_k,'-',-1)) as unsigned)) as angka,SUBSTRING_INDEX(ID_k,'-',1) as huruf from keranjang where SUBSTRING_INDEX(ID_k,'-',1) like 'k'");
								while($qgenex=mysqli_fetch_array($qgen1)){
									if(intval($qgenex['angka'])<=9){
										$idhasil = $qgenex['huruf']."0-".($qgenex['angka']+1);	
										//echo "$ID_k";						
									}else if(intval($qgenex['angka'])>=10){
										$idhasil = $qgenex['huruf']."-".($qgenex['angka']+1);	
										//echo "$ID_k";
											}
									}
								$ID_k = $idhasil;
								echo "ini ID K :".$ID_k;
				


									echo "
									<div>
									    <div class='col-lg-12'>
						       			</div>
									    <div class='col-lg-4'>
											<p align=center><strong>$q[Nama_b]</strong></p> 
											<center><img src='img/$q[Foto]' height='200px;' width='200px;'/></center>
						       			</div>			
										<div class='col-lg-8'>
											<form action='act/detil_act.php' method='POST'>
										<div class='table-responsive'>
											<table class='table'>
											
												<br/>
												
												<tr>
				                                	<td>Berat</td>
				                                    <td>:</td>
				                                    <td >$q[Berat]</td>
				                                </tr>
												
												<tr>
				                                	<td>Ukuran</td>
				                                    <td>:</td>
				                                    <td >$q[Ukuran]</td>
				                                </tr>
												
				                            	<tr>
				                                	<td>Harga</td>
				                                    <td>:</td>
				                                    <td >$q[Harga_b]</td>
				                                </tr>
				                                <tr>
				                                	<td>Stok</td>
				                                    <td>:</td>
                				                    <td>$q[Stok]</td>
                                				</tr>
				                                <tr>
                				                	<td>Pengupload</td>
				                                    <td>:</td>
				                                    <td>$q[Pengupload]</td>
				                                </tr>
				                                <tr>
                				                	<td>Jumlah</td>
				                                    <td>:</td>
				                                    <td>";
												if(intval($q['Stok'])>0){
													echo "<input type='number' min='1' max='$q[Stok]' name='jmlbrg' id='jmlbrg' required />";
												}else{
													echo "Stok Habis";
												}
														
												echo "
													</td>
												</tr>
												
													<input type='hidden' name='idbr' id='idbr' value='$ID'/>
													<input type='hidden' name='harga' id='harga' value='$q[Harga_b]'/>
													<input type='hidden' name='nama' id='nama' value='$q[Nama_b]'/>
													<input type='hidden' name='stok' id='stok' value='$q[Stok]'/>
													<input type='hidden' name='idk' id='idk' value='$ID_k'/>
													
												
												<tr>
													<td colspan='4' align='center'>";
														if(intval($q['Stok'])>0){
														echo " 
															<input type='submit' id='btndet' class='btn btn-primary' name='oke' value='Beli' ><span/>
														";
														}
														echo "
															<a href='index.php' class='btn btn-info' role='button'>Kembali</a>													
													</td>
												</tr>
				                            </table>
										</div>
										</form>
						       			</div>	
										
										<div class='col-lg-12'>
											<br/>
											<p>Keterangan : <br/> $q[Ket]</p>";
											//<p><a href='index.php' class='btn btn-info' role='button'>Kembali</a></p>
							echo"			</div>						
									</div>	
										<br />";
										
									}
									
							?>
                            
                            <!-- <a href="act/Detil_act.php?id=<?php echo $ID; ?>" class="btn btn-info" role="button">CEKID</a> -->

						</div>	
					</div>	
        	    <div class="col-lg-2 "><p>Pembungkus .col-lg-2</p>
				</div>    			
 			</div>
            
            
            
  	</div>

    
</div>




<?php
//include "act/footer.php";
?>
</body>
</html>


<?php ob_flush();?>