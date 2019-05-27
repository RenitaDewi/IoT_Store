<?php ob_start(); ?>
<?
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Daftar | Warung Kertas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php 
include "act/header.php";
?>
<div style="padding-top:3.5%">
<div class="container">
	<div class="panel panel-default">
		<form name="formI" action="act/tamUser.php" method="POST" >
			<div class="col-md-4 col-md-offset-4" > <!-- style="background-color:#d5d5d5" -->
				<h3 align="center" style="padding-top:15%">Daftar</h3>
                    <div class="form-group">
						<div class="col-lg-12">
							Nama <input name="nama" type="text" class="form-control" placeholder="Nama" autocomplete="on" required/>
						</div>
					</div>
            
                    
					<div class="form-group">
						<div class="col-lg-12">
							Password <input name="sandi" type="password" class="form-control" placeholder="Sandi" autocomplete="on" required/>
						</div>
					</div>
            
                    <div class="form-group">
						<div class="col-lg-12">
							Email <input name="mail" type="email" class="form-control" placeholder="Email" autocomplete="on" required/>
						</div>
					</div>
            
					<div class="form-group">
						<div class="col-lg-12">
							Tanggal Lahir <input name="ttl" type="date" class="form-control" placeholder="ttl" autocomplete="on" required/>
						</div>
					</div>
                    
                    
					<div class="form-group">
						<div class="col-lg-12">
							Alamat <input name="alamat" type="text" class="form-control" placeholder="alamat" autocomplete="on" required/>
						</div>
					</div>
             		
                    
              		<div align="center" class="form-group" >
						<div class="col-lg-12">
							<br/>
							<p>
							  <input type="submit" class="btn btn-primary"  value="Daftar"/>
						  </p>
		          </div>
					</div>         		        
                  
				</div>
			</form>
		</div>
</div>     
</div>   

<!--<div class="jumbotron"><h1>Query berhasil tinggal increment otomatis terus query insert aja</h1></div>-->

<?php 
include "act/footer.php";
?>
</body>
</html>

<script>
function validasi(form) {
    var emailID = document.formI.alamat;

	var validasiAngka = /^[0-9]+$/;
	
            
    if (!formI.nama.value.match(validasiAngka)) {
        alert("Masukkan nama dengan benar!");
        formI.nama.focus();
        return false;
    }
	if ((formI.nama.value == null) || (formI.nama.value == "")) {
        alert("Nama harus diisi!");
        formI.nim.focus();
        return false;
    }
	
		
	
	if ((formI.sandi.value == null) || (formI.sandi.value == "")) {
        alert("sandi harus diisi!");
        formI.sandi.focus();
        return false;
    }
	if ((emailID.value == null) || (emailID.value == "")) {
        alert("Email harus diisi!");
        emailID.focus();
        return false;
    }
    if (echeck(emailID.value) == false) {
        emailID.value = "";
        emailID.focus();
        return false;
    }
	if ((formI.ttl.value == null) || (formI.ttl.value == "")) {
        alert("ttl harus diisi!");
        formI.ttl.focus();
        return false;
    }	
	if ((formI.alamat.value == null) || (formI.alamat.value == "")) {
        alert("alamat harus diisi!");
        formI.alamat.focus();
        return false;
    }	
	
	alert("Berhasil Daftar");
    return true;
}

	function echeck(str) {
    var at = "@";
    var dot = ".";
    var lat = str.indexOf(at);
    var lstr = str.length;
    var ldot = str.indexOf(dot);
    if (str.indexOf(at) == -1) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.indexOf(at) == -1 || str.indexOf(at) == 0 || str.indexOf(at) == lstr) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.indexOf(dot) == -1 || str.indexOf(dot) == 0 || str.indexOf(dot) == lstr) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.indexOf(at, (lat + 1)) != -1) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.substring(lat - 1, lat) == dot || str.substring(lat + 1, lat + 2) == dot) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.indexOf(dot, (lat + 2)) == -1) {
        alert("ID Email tidak valid!");
        return false;
    }
    if (str.indexOf(" ") != -1) {
        alert("ID Email tidak valid!");
        return false;
    }
	
	
    return true;
}
</script>
