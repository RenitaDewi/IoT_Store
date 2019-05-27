<?php ob_start(); ?>

<?
    include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>IoT Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
	.garistepi{
	  border: 1px solid #000;
	  border-radius: 5px;
	  }
	.pembataskiri{
		border-left: 1px solid #d5d5d5;
	  }
	.pembataskanan{
		border-right: 1px solid #d5d5d5;
	  }
	.pembatasatas{
		border-top: 1px solid #d5d5d5;
	  }
	.pembatasbawah{
		border-bottom: 1px solid #d5d5d5;
	  }
	  #footer{
		  background:#f0f0f0;
		  position:absolute;
		  bottom:0;
		  width:80%;
		  text-align:center;
		  color:#808080;
		}
  </style>  
</head>
<body>
<?php
include "act/header.php";
include "koneksi.php";
//$id=mysql_real_escape_string($_POST['Md']);
?>
<!--Halaman Utama -->
<div style="padding-top:4%; padding-bottom:0%;">
	<div class="container-fluid" >
    	<div class="col-lg-12">
  		<h1 align="center">IoT Store</h1>
        </div>
  			<div class="row"> <!-- <p>ini row bungkus semua .col-lg-12<p> -->
            		
                        <!--Modal-->
        					<?php //include "act/ModalK.php";?>
                        <!---Modal-->
                        
                    <!-- search box -->
                	<div class="col-lg-12"><!--<p align="center">Bar Cari</p> -->
                   		<div class="col-lg-10">
                        </div>
                        	<form name="Fcari" method="post">
                    		<div class="col-sm-2" align="left">
                            	<div class="input-group">
                                	<input type="text" class="form-control" placeholder="Search" required name="cari"/>
                                    <span class="input-group-btn">
                                    	<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                    		</div>
                            </form>
                            
                    	</div>
                    <!-- search box -->
            		<div class="actnav"><!--pembungkus navigator -->
                    <!--Navigator -->
                    <?php include "act/navuser.php";?>
                    <!--Navigator -->
					</div>	
    			<div class="col-lg-10 pembataskiri"><br/> <!-- <center>pembungkus .col-lg-10</center> -->
					<div class="col-lg-12"><!-- <center>List Barang .col-lg-12</center> -->

<?php
       // session_destroy();
						//session_start(); 
				  	$per_hal=18;
					$jumlah_record=mysqli_query($connection,"select count(*) from barang");
					$jum=is_int($jumlah_record);
					$halaman=($jum/$per_hal);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_hal;
					//for($i=0;$i<3;$i++){
						if(isset($_POST['cari'])){
							$cari = $_POST['cari'];
							$query=mysqli_query($connection,"select * from barang where status = 'true' and Nama_b like '%$cari%' or ID_b like '%$cari%' order by Harga_b desc limit $start, $per_hal");
						}else if(!isset($_POST['cari'])){
							$query=mysqli_query($connection,"select * from barang where status = 'true' order by harga_b desc limit $start, $per_hal");
						}
						$cekrow=mysqli_num_rows($query);
						//echo "row query:".$cekrow;
						if ($cekrow>0){
						while($q=mysqli_fetch_array($query)){
							echo "
          					    <div class='col-sm-2 col-md-2' >
					                <div class='thumbnail' style='min-height:200px; max-width:200px; '>
						            	<img src='img/$q[Foto]' alt='' width='100px' style='height:100px;' />
					                  		<div class='caption'>
												<center><strong>$q[Nama_b]</strong></center>
												<center>Rp.$q[Harga_b].00,-</center>
												<p><center><a href='Detil.php?br=$q[ID_b]' class='btn btn-info' role='button'>Detail</a></center></p>
									  		</div>
									</div>
						       </div>
							";
							}
						}else{
							 echo "
							 	 <div class='col-sm-12'>
								 	<p align='center'><Strong>Tidak Ada Hasil</Strong></p>
								 </div>
							 ";
						}
				
?>
			</div>
				
                <div class="col-lg-12"><center>______</center>
                <br/>
				</div>

			<!--space^ dan paginationV-->																			
					<div class="col-lg-12" align="center"><center></center>
						<ul class="pagination">	
<?php							echo "<li><a href='?page=1'><<</a></li>";
								for($x=1;$x<=$halaman;$x++){
									echo "<li><a href='?page=$x'>$x</a></li>";
							}
								echo "<li><a href='?page=$halaman'>>></a></li>";
							
?>
						</ul>
					</div>
				</div>				
 			</div>
    <!-- ini footer -->
    <footer class="footer" style="background-color:skyblue; padding-left:0px; padding-right:0px;">
      <div class="col-lg-12" style="background-color:lavender;">
        <H4 align="center" class="text-muted">Created By Muh Croassacipto</H4>
      </div>
      <div class="col-lg-12" style="background-color:lavender;">
      	<h6 align="right"><a href="admin/admin.php">Are u an admin?</a></h6>
      </div>
    </footer>
    
    
    </div>
</div>


   
</body>
</html>



<?php ob_flush(); ?>