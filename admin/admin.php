<?php ob_start();?>
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
include "header.php";
include "admincek.php";
session_start();

?>
	<div style="padding-top:4%">
		<h1 align="center">IoT Store</h1><br/>
			<!--<p>Tempat Kerja Admin</p>-->
				<div class="col-lg-12" ><!--style="background-color:lavenderblush">-->
                	<!--<p>Pembungkus .col-lg-12</p>-->
						<?php include "Navigator.php";?>
                    	<div class="col-lg-10"> <!--style="background-color:lavender">-->
                        	<!--<p>pembungkus .col-lg-10</p>-->
                            <!--<h3>WELCOME ADMIN <?php echo $uname; ;?>!</h3><br/>-->
                    	</div>
				<div class="jumbotron">
					<h4>Hello <?php echo $uname; ;?>!</h4><br/>
				</div>
                </div>
	</div>




<?php //include "../act/footer.php";?> 
</body>
</html>


<?php ob_flush();?>