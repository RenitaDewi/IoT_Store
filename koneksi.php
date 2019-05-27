	<?php
		$host = "localhost";
		$username = "root";
		$password = "";
		$database = "keranjang";
		
		$connection = mysqli_connect($host,$username,$password) or die ("Connection Timeout !");
		mysqli_select_db($connection,$database) or die ("Database doesn't exist !");
	?>