<script>
	$(document).ready(function(){
		//load modalisi
		$('.tampil').load("act/Modalisi.php");
	
		/*$(".btnid").click(function(){
			var del = $(this).attr('id');
			alert('hapus '+del);
			$.ajax({
				type: 'POST',
				url: "act/Beli_delete.php",
				data: 'id2='+del,
				success: function() {
					 //$('.databaru').load("act/Modalisi.php");  
					//alert('berhasil menghapus');
                     
				}
			});
			
		});*/
	});
	</script>
<?php
include "koneksi.php";
//menghitung jumlah barang yang ada di keranjang
						$qto=mysqli_query($connection,"select count(ID_b) as tdata from keranjang where ID_p='$_SESSION[ID]' and lunas='false'");
						while($q=mysqli_fetch_array($qto)){
							$tot= $q['tdata'];
						}
?>
<div class="col-lg-2 " style="margin-top:3%;"><!--<p>Pembungkus .col-lg-2</p>-->
			<div class="list-group active">
            <div class="nav nav-pils nav-stacked">
				<a class="list-group-item active" id="krj" href="index.php" ><span class="glyphicon glyphicon-home"></span> Online Store</a>
				<a class="list-group-item klikmodal" href="" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge"><?php echo "$tot";?></span></a>
				<a class="list-group-item" href="Jualan.php"><span class="glyphicon glyphicon-envelope"></span> Sell something?</a>
                    <!--Jadi Bucket-->
                    <div class="col-lg-12" style="background-color:lavender">
                    	<!--<p>Jadi Bucket tapi tammpilin nama barangnya aja</p>
                        <a href="col.php">klik</a>-->
                        <?php 
						echo "<p class='active'>Level user: ".$_SESSION['lvl']."</p><br/>";
				/*		//select barang yang ada di keranjang
						$query=mysql_query("select * from keranjang where ID_p='$_SESSION[ID]' and lunas='false'");
						echo "Isi keranjang : <br/>";
						$no=1;
						while($q=mysql_fetch_array($query)){
							echo "$no. $q[Nama_b] ($q[Jumlah])<br/>";
							$no++;
						}*/
						?>
                        <!--
                        <form action="col.php" method="post">
                        	<input type="hidden" class="form-control" name="hidenvar" value="<?php echo $_SESSION['uname']; ?>">
                            <input type="text" name="nama">
                            <input type="submit" class="btn btn-primary" align="middle" value="kirim"/>
                        </form>
                        -->
                    </div>
					<!--Jadi Bucket-->
                  </div>  
			</div>
</div>




<!--modal-->
<div class="modal fade bs-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
    	<div class="tampil"></div><!--nmapilin class html pake modal JQuery-->
	</div>
</div>
<!--modal-->       
      
      