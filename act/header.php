
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-1.12.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
<div>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header" style="padding-left:9%">
      <a class="navbar-brand" href="index.php"><img src="img/Profil/IoT_Icon.png" width="100px" height="100px;"/></a><span/>
      <a class="navbar-brand" href="index.php">IoT Store</a>
    </div>
    
    <!-- dropdown di kanan -->
		<ul class="nav navbar-nav navbar-right" style="padding-right:9%;">	
        	<li class="dropdown">
	<?php 
	session_start();
	if(!isset($_SESSION['uname'])){
		//belum login
		echo "
		   <a href='Masuk.php'><span class='glyphicon glyphicon-user'></span> Masuk</a>
        	</li>
		</ul>";
	}else{ 
		$uname=$_SESSION['uname'];
		//udah login
		echo "
          		<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span > $uname</a>
        			<ul class='dropdown-menu'>
            			<li><a href='Profil.php'><span class='glyphicon glyphicon-envelope'></span> Profil</a></li>
            			<li><a href='act/Logout.php'><span class='glyphicon glyphicon-off'></span> Logout</a></li>
          			</ul>";		
		}
	?>
    
    		</li>
		</ul>
  </div>
</nav>
</div>




