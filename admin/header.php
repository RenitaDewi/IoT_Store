<div>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header" style="padding-left:9%">
      <a class="navbar-brand" href="../index.php"><img src="../img/Profil/IoT_Icon.png" width="70px" height="70px;"/></a><span/>
      <a class="navbar-brand" href="../index.php">IoT Store</a>
    </div>
    
    <!-- dropdown di kanan -->
		<ul class="nav navbar-nav navbar-right" style="padding-right:9%;">	
        	<li class="dropdown">
	<?php 
	session_start();
	if(!isset($_SESSION['uname'])){
		header('location:../Masuk.php?pesan=admin');
	}else{
		$uname=$_SESSION['uname'];
		//udah login
		?>
		<a href="../act/Logout.php"><span class="glyphicon glyphicon-off"></span > <?php echo $uname ;?>,Logout</a>	
		<?php
		}
	?>
    
    		</li>
		</ul>
  </div>
</nav>
</div>