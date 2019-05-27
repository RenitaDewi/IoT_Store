<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.12.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<title>Data Pembeli | IoT Store</title>
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
				<div class="col-lg-12"> <!--style="background-color:lavenderblush"-->
                	<!--<p>Pembungkus .col-lg-12</p>-->
						<?php include "Navigator.php";?>
                    	<div class="col-lg-10"> <!--style="background-color:lavender"-->
                        <!--	<p>pembungkus .col-lg-10</p>-->
                            <h3>WELCOME ADMIN <?php echo $uname ;?>!</h3><br/>
                            <div class="col-lg-12"><center>Data Pembeli</center>
  
									<div class="col-sm-12 col-md-12">
										<table class="table table-hover">
											<tr  align='center'>
												<th>No</th>
										    	<th>Id Pembeli</th>
										        <th>Nama Pembeli</th>
								                <th>Sandi Pembeli</th>
								                <th>Email Pembeli</th>
								                <th>TL Pembeli</th>
								                <th>Alamat</th>
								                <th>Foto</th>
												<th>Aksi!</th>
										    </tr>
									<?php
									$query=mysqli_query($connection,"select*from pembeli;");
									$no=1;        
									while($q=mysqli_fetch_array($query)){
										echo "
										    <tr align='center'>
												<td>$no</th>
								            	<td>$q[ID_p]</td>
								                <td>$q[Nama]</td>
								                <td>$q[Sandi]</td>
								                <td>$q[Email]</td>
								                <td>$q[Tanggal_lahir]</td>
								                <td>$q[Alamat]</td>
								                <td><img src='../$q[Foto]' width='30px;' height='30px;'/></td>
												<td><a onclick=\"return confirm('hapus?')\" href='Qvalid.php?id=$q[ID_p]&stat=userdel' class='btn' style='color:#F00' role='button'><span class='glyphicon glyphicon-remove'></span></a></td>
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