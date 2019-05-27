<?php ob_start(); ?>
<?php
include "../koneksi.php";
include "../Jualan.php";
session_start();
	if(!isset($_SESSION['uname'])){
		header('location:Masuk.php?pesan=jualan');
	}else{
	/*	cara lama
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
			$IDb = mysqli_real_escape_string($connection,$_POST['IDbarang']);
			echo "ini :$IDb";
  // code A
  //include koneksi
  // end of code A
   
  // code B
  $lokasi_file = $_FILES['filegb']['tmp_name']; //di komputer sendiri
  $tipe_file   = $_FILES['filegb']['type'];
  $nama_file   = $_FILES['filegb']['name'];
  $direktori   = "../img/$nama_file"; //di server
  // end of code B
   
  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
   	//echo "$_POST[Nbr]<br/>$_POST[Hbr]<br/>$_POST[Sbr]";
    // code C
	echo "Gambar berhasil di upload ke direktori lokal<br/>
			cek di<a href='http://localhost/bootstrapmybs/img/'>sini</a> ";
    $sql = "insert into barang (ID_b,Nama_b,Harga_b,Berat,Ukuran,Stok,Foto,Status,Ket,Pengupload) values('$IDb','$_POST[Nbr]',$_POST[Hbr],'$_POST[Bbr] gsm','$_POST[Ubr]',$_POST[Sbr],'$nama_file','false','$_POST[Kbr]','$_SESSION[ID]')";
    $aksi = mysqli_query($connection,$sql);
    // end of code C
  	
    // code D
    if (!$aksi) {
    	header('location:../Jualan.php?pesan=gagal');
    }else{
        //echo "gambar berhasil di upload<br>";
        //echo "untuk melihatnya silakan klik <a href='view_image.php'>Link ini</a>";
		//echo "<div style='margin-bottom:-55px; padding-top:9%;' class='alert alert-info' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Berhasli di Upload! </div>";
		header('location:../Jualan.php?pesan=berhasil');
		
    }
    // end of code D
  }
	}//tutup session
 ?>
<?php ob_flush(); ?>