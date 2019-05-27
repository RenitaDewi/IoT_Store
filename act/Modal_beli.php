<?php ob_start();?>
<?php
include "../koneksi.php";
session_start();
$id=mysqli_real_escape_string($connection,isset($_POST[id2]));
//nome=$_POST[id2];
//$id_p=$_POST[id_p];
?> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.12.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <div class="modal-content">

      <div class="modal-content">
     	<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    	     <h3 class="modal-title" id="myModalLabel1" align="center"><strong>Barang yang sudah di beli</strong></h3>
        </div>
        <div class="modal-body"> 
 <?php			
			   $query=mysqli_query($connection,"select ID_I,ID_b,ID_k,Nama_b,Harga_b,Jumlah,Tanggalbeli from keranjang where ID_p='$_SESSION[ID]' and Lunas<>'false'  order by tanggalbeli desc");
							$no=1;
							$inv=0;
								    ?>
									<div class="panel panel-primary">
                                        <div class="panel-heading">List Barang:</div>
                                    	
										<table class="table table-Stripped table-hover">
                                        <thead > <!-- bgcolor="#337ab7" --> 
											<tr >
												<th>No</th>
                                                <th>Invoice</th>
										        <th>Nama Barang</th>
								                <th>Harga Barang</th>
								                <th>Jumlah</th>
								                <th>Total</th>
								                <th>Tanggal Beli</th>
										    </tr>								
                                        </thead>    
                                   <?php         
									while($q=mysqli_fetch_array($query)){
										echo "
										<body>
										    <tr align='center'>
												<td>$no</th>
												<td>$q[ID_I]</td>
								                <td><a href='Detil.php?br=$q[ID_b]'>$q[Nama_b]</td>
								                <td>$q[Harga_b]</td>
								                <td>$q[Jumlah]</td>
								                <td>".$q['Harga_b']*$q['Jumlah']."</td>
								                <td>$q[Tanggalbeli]</td>";
												//<td><a onclick=\"return confirm('Batalkan?')\" href='act/Beli_delete.php?id=$q[ID_k]&stat=satuan' class='btn' style='color:#F00' role='button'><span class='glyphicon glyphicon-remove'></span></a></td>	
										echo"							
										    </tr>
											</tbody>";
											
											$no++;								
										}	
									$qtot=mysqli_query($connection,"select SUM(Harga_b*jumlah) as totb from keranjang where ID_p='$_SESSION[ID]' and lunas ='true'");
									while($q=mysqli_fetch_array($qtot)){
											$totb=$q['totb'];									
										}		
							echo"</table>
								</div>
								<p align='right'><Strong>Total Harga: Rp.$totb.00,-</Strong></p>
								";
					?>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                          </div>
                                    </div>
  
  
  
                                    <!--<div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel1" align="center"><strong>Invoice Data</strong></h4>
                                          </div>
                                          <div class="modal-body">
                                          	<p>ini modal buat nampilian Data Invoice ganti select nya</p>
                                            <?php
							/*				$idI=$_POST['idI'];
											//echo "$invv dan ini idI : $idI";
											$query=mysql_query("select Nama,Email,Tanggal_lahir, Alamat,Foto from pembeli where ID_p='$_SESSION[ID]'");
												while($q=mysql_fetch_array($query)){
													echo "<img src='img/profil/$q[Foto]' height='200px;' width='200px;'/> <br/>";
													echo "Nama 			:". $q[Nama] ."<br/>";
													echo "Email 		:". $q[Email] ."<br/>";
													echo "Tanggal Lahir :".$q[Tanggal_lahir] ."<br/>";
													echo "Alamat		:". $q[Alamat] ."<br/>";
													echo "<br/><br/>";
												}
												echo "ini idI: $idI"; */
											?>
                                         </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                          </div>
                                    </div>
-->
<?php ob_flush(); ?>