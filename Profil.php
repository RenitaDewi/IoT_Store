<?php ob_start(); ?>
<?
    include "koneksi.php";
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profil | Warung Kertas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script> 
  	$(document).ready(function(){
		$('.belidet').load("act/Modal_beli.php");
			
			$(".invoice").click(function(){
				var idI = $(this).attr('name');
				//var inv = document.getElementsByName(inv);
				//alert (idI);
				$.ajax({
					type: 'POST',
					url: "act/gate.php",
					data: 'id2='+idI,
					success: function() {
						 //$('.belidet').load("act/Modal_beli.php"); 
						 //alert (idI);
					}
				});
			});
	});

    function getidbarang(id){
      
          $.ajax({
          type: 'POST',
          url: "act/Modal_beli.php",
          data: 'id_p='+id,
          success: function() {
             
             //alert("sukses");
          }
        });
    }
	</script>
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
	  
  </style>
</head>
<body>
<?php

include "act/header.php";
	if(!isset($_SESSION['uname'])){
		header('location:Masuk.php');
	}else{
?>

<div style="padding-top:4%;">    
    <div class="container-fluid" ><!-- <p>ini container fluid 12</p> -->
    	<h1 align="center">IoT Store</h1><br/> 
        <div class="row" ><!-- <p>ini row 12</p>
            <div class="col-lg-12" > <!-- <p>ini col-lg 12</p> -->
            	<div > <!-- buat navigator divnya udah ada di navigator class="col-lg-2" --> 
                	<!-- <p>ini col-lg 2</p> -->
                    <?php include "act/NavUser.php";?>
                </div>
                <div class="col-lg-7 pembataskiri pembataskanan" >
                	<!-- <p>ini col-lg 8</p> -->
                    <div class="col-lg-12" >
                    	<!-- <p>query profil</p> -->
                        <?php 
							//include "koneksi.php";
							//session_start();
								$query=mysqli_query($connection,"select Nama,Email,Tanggal_lahir, Alamat,Foto from pembeli where ID_p='$_SESSION[ID]'");
									while($q=mysqli_fetch_array($query)){
										echo "<img src='$q[Foto]' height='200px;' width='200px;'/> <br/>";
										echo "ID			: ". $_SESSION['ID']."<br/>";
										echo "Nama 			: ". $q['Nama'] ."<br/>";
										echo "Email         : ". $q['Email'] ."<br/>";
										echo "Tanggal Lahir : ". $q['Tanggal_lahir'] ."<br/>";
										echo "Alamat		: ". $q['Alamat'] ."<br/>";
										echo "<br/><br/>";
							}
							

						?>
                    </div>
                    <div class="col-lg-12">
                    	<!-- <p>query Upload Foto</p>-->
                        <div >
                		<form method="post" enctype="multipart/form-data">
                        	<div class="form-group">
								<div class="col-lg-5">
        							<input type="file" name="filefoto" class="form-control" required/> <br />
                                </div>
                                <div class="col-lg-7"> <!--buat menuhin / ngegeser input filenya -->
                                </div>
                            </div>
                            <div class="form-group">
								<div class="col-lg-12">   
									<input type="submit" value="Upload" name="save" class="btn btn-primary">
                                </div>
                            </div>    
						</form>
                	</div>
                    </div>
                </div>
                <div class="col-lg-3">
                	<!-- <p>ini col-lg 2</p> -->
                    
                    		<div class="col-lg-12 panel panel-default" style="background-color:lavender">
                            <p>Invoice</p>
                    			<?php
									
									//$IdModal ;
                        			$query=mysqli_query($connection,"select distinct ID_I from keranjang  where ID_p='$_SESSION[ID]' order by tanggalbeli desc");
									$no=1;
									while($q=mysqli_fetch_array($query)){
										//echo "<a href='#' data-toggle='modal' data-target='#ModalInv'>invoice : $q[ID_I]<br/></a>";
										
										echo "<a class='invoice' id='$q[ID_I]' name='$q[ID_I]' onClick='getidbarang(this.id)' role='button' data-toggle='modal' data-target='#ModalInv'>$no.Invoice : $q[ID_I]</a><br/>
                                        ";
										//$IdModal=$q['ID_I'];
										//echo $IdModal;
										$no++;
									}
									
									//echo "<a class='btnidI' role='button' data-toggle='modal' data-target='#ModalInv'>$no.Invoice : $q[ID_I]     (glypIco)</a><br/>";	  
								?>
            		</div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

  
   <?php
  // code B
	if(!empty($_FILES['filefoto'])){
  	$lokasi_file = $_FILES['filefoto']['tmp_name'];
	$tipe_file   = $_FILES['filefoto']['type'];
	$nama_file   = $_FILES['filefoto']['name'];
  	$direktori   = "img/Profil/$nama_file";
	}
		// end of code B
   
  if (!empty($lokasi_file)) {
    move_uploaded_file($lokasi_file,$direktori);
    // code C
    $sql = "update pembeli set Foto='$direktori' where ID_p='$_SESSION[ID]'";
    $aksi = mysqli_query($connection,$sql);
    // end of code C
     
    // code D
    if (!$aksi) {
    echo "Unable to load picture";
    }else{
        echo "Upload Success !<br>";  
    }
    // end of code D
  }
  
  
  ?>
  
  	<?php
    include "act/footer.php";
	}//tutup session
	?>
  
</body>
</html>



<div class="modal fade bs-example-modal-lg" id="ModalInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                           		<div class="belidet"></div>
                            </div>
                        </div>
<!--modal-->      
<?php ob_flush(); ?>