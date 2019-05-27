<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php
include "koneksi.php";
include "act/header.php";
session_start();
	if(!isset($_SESSION['uname'])){
		header('location:Masuk.php?pesan=jualan');
	}else{
		
		/* cara lama
		//echo "ini nilai inc untuk automatic inc: ";
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
		//fungis ambil id pengupload
		//bla bla
		//fungsi ambil id pengupload
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
				
	}
	$pesan=mysqli_real_escape_string($connection,$_POST['pesan']);
	if($pesan=='berhasil'){
	echo "	<div style='padding-top : 4%;'>
				<div style='margin-bottom:-55px; padding-top:1%; padding-bottom:1%;' class='alert alert-info' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Berhasli di Upload! 
				</div>
			</div>	";
	}else if($pesan=='gagal'){
			echo "			<div style='padding-top : 4%;'>
				<div style='margin-bottom:-55px; padding-top:1%; padding-bottom:1%;' class='alert alert-warning' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Gagal Di Upload! 
				</div>
			</div>	";
	}

?>

<?php /*?><?php
include "act/header.php";
include "koneksi.php";
session_start();
	if(!isset($_SESSION['uname'])){
		header('location:Masuk.php?pesan=jualan');
	}else{
		//echo "ini nilai inc untuk automatic inc: ";
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
		//fungis ambil id pengupload
		//bla bla
		//fungis ambil id pengupload
	}
  // code A
  //include koneksi
  // end of code A
   
  // code B
  $lokasi_file = $_FILES['filegb']['tmp_name'];
  $tipe_file   = $_FILES['filegb']['type'];
  $nama_file   = $_FILES['filegb']['name'];
  $direktori   = "img/$nama_file";
  // end of code B
   
  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
   	//echo "$_POST[Nbr]<br/>$_POST[Hbr]<br/>$_POST[Sbr]";
    // code C
    $sql = "insert into barang values('$IDb','$_POST[Nbr]',$_POST[Hbr],$_POST[Sbr],'$nama_file','Belum di isi','False','$_SESSION[ID]')";
    $aksi = mysql_query($sql);
    // end of code C
  	
    // code D
    if (!$aksi) {
    echo "<br/>>maaf gagal memasukan gambar";
    }else{
        //echo "gambar berhasil di upload<br>";
        //echo "untuk melihatnya silakan klik <a href='view_image.php'>Link ini</a>";
		echo "<div style='margin-bottom:-55px; padding-top:9%;' class='alert alert-info' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Berhasli di Upload! </div>";
    }
    // end of code D
  }
 ?>
<?php */?><div style="padding-top: 4%">
<div class="container">
	<div class="panel panel-default">
		<form method="post" enctype="multipart/form-data" action="act/Jualan_act.php">
			<div class="col-md-4 col-md-offset-4" >
				<h3>Masukkan Data Barang <?php echo $_SESSION['ID'];?></h3>
                	<h5>id barang ke <?php echo "$IDb"; ?></h5>
                    <div class="form-group">
						<div class="col-lg-12">
							Nama Barang <input name="Nbr" type="text" class="form-control" placeholder="Nama Barang" required/>
						</div>
					</div>
                    
                    
                    <div class="form-group">
						<div class="col-lg-12">
							Ukuran Barang <input name="Ubr" type="text" class="form-control" placeholder="Ukuran Barang" required/>
						</div>
					</div>                    
                    
                    
                    <div class="form-group">
						<div class="col-lg-12">
							Berat Barang <input name="Bbr" type="text" class="form-control" placeholder="Berat Barang" required/>
						</div>
					</div>                    
                    
                    
					<div class="form-group">
						<div class="col-lg-12">
							Harga Barang <input name="Hbr" type="text" class="form-control" placeholder="Harga Barang" required/>
						</div>
					</div>
            
                    <div class="form-group">
						<div class="col-lg-12">
							Stok Barang <input name="Sbr" type="text" class="form-control" placeholder="Stok Barang" required/>
						</div>
					</div>


					<div class="form-group">
						<div class="col-lg-12">
							Keterangan <textarea name="Kbr" type="file" class="form-control" placeholder="Ketrangan Barang" required></textarea>
						</div>
					</div>
                    
            
					<div class="form-group">
						<div class="col-lg-12">
							Load Gambar <input name="filegb" type="file" class="form-control" required/>
						</div>
					</div>
                         <input name="IDbarang" type="hidden" value="<?php echo "$IDb";?>"/>
              		<div align="center" class="form-group" >
						<div class="col-lg-12">
							<br/>
							<p>
							  <input type="submit" class="btn btn-primary" value="Upload" name="save"/>
						  </p>
		          		</div>
					</div>         		        
                  
				</div>
			</form>
		</div>
</div>     
</div>
<!-- backupnya	
	<form method="post" enctype="multipart/form-data">
		<td colspan="4">
        	Nama Barang : <input type="text" name="Nbr" required /> <br />
        	Harga 		: <input type="text" name="Hbr" required /> <br />
        	Stok 		: <input type="text" name="Sbr" required /> <br />
        	Upload Gambar (Ukuran Maks = 1 MB) : <input type="file" name="filegb" required /> <br />
			<input type="submit" value="Upload" name="save">
        </td>
	</form>
 -->
 
<?php include "act/footer.php";?>

</body>
</html>

<?php ob_flush(); ?>