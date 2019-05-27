<?php ob_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<title>Masuk IoT Store</title>
</head>

	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>

<body>
<?php //include "act/header.php";?>
<!-- style="padding-top:3%" -->
<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:-55px' class='alert alert-danger' role='alert'><center><span class='glyphicon glyphicon-warning-sign'></span>  Login Gagal !! Username dan Password Salah !!</center></div>";
			}else 
				if($_GET['pesan'] == "jualan"){
				echo "<div style='margin-bottom:-55px' class='alert alert-info' role='alert'><center><span class='glyphicon glyphicon-warning-sign'></span>  Masuk dulu Sebelum Jual/Beli </center></div>";
			}else 
				if($_GET['pesan'] == "admin"){
				echo "<div style='margin-bottom:-55px' class='alert alert-warning' role='alert'><center><span class='glyphicon glyphicon-warning-sign'></span>  Wilayah administrator! </center></div>";
			}else 
				if($_GET['pesan'] == "suksesdaftar"){
				echo "<div style='margin-bottom:-55px' class='alert alert-success' role='alert'><center><span class='glyphicon glyphicon-warning-sign'></span>  Berhasil Daftar, Silahkan masukan nama dan password anda! </center></div>";
			}

		}
		?>
		<div class="panel panel-default" style="padding-bottom:0%;"> 
			<form action="act/MasukQ.php" method="post">
				<div class="col-lg-4 col-lg-offset-4 kotak" style="padding-top:0%;">
                <a href="index.php"><center><img src="img/Profil/IoT_Icon.png" width="45%" height="45%"  /></center></a><br/>
					<!--<h3 align="center">Silahkan Login</h3>-->
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
                    <div align="center">
						<div class="input-group">			
							<input type="submit" class="btn btn-primary" value="Login">
						</div>
                    </div>
        				<p><center>Belum Punya akun? klik <a href="Daftar.php"> Daftar! </a></center></p>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php ob_flush();?>