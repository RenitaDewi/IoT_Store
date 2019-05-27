<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-1.12.2.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
<title>Validasi Admin | IoT Store</title>
</head>
<body>
<?php
include "../koneksi.php";

$query=mysqli_query($connection,"select Count(*) as tdata from barang where Status='false'");
while($q=mysqli_fetch_array($query)){
	$valid = intval($q['tdata']);
}


?>
	<div class="col-lg-2 " ><!--style="background-color:lavender"><p>Pembungkus .col-lg-2</p>-->
    <div style="padding-top:50%">
    	<div class="list-group active">
            <div class="nav nav-pils nav-stacked">
                <a class="list-group-item active" href="admin.php"><span class="glyphicon glyphicon-home"></span> <?php echo $_SESSION['uname'];?></a>
                <a class="list-group-item"href="AvalidasiBarang.php"><span class="glyphicon glyphicon-lock"></span> Validasi Barang <span class="badge"><?php echo "$valid";?></span></a>
                <a class="list-group-item" href="AlistBarang.php"><span class="glyphicon glyphicon-book"></span> Data Barang</a>
                <a class="list-group-item" href="DataPembeli.php"><span class="glyphicon glyphicon-user"></span> Data User</a>
                <a class="list-group-item" href="DataTransaksi.php"><span class="glyphicon glyphicon-user"></span> Data Transaksi</a>
			</div>
    	</div>        
    </div>    
    </div>           
    
</body>
</html>