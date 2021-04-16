<?php
$conn=mysqli_connect("localhost","users","P4\$\$w0rd123","cartDB");
// Check connection
if (!$conn){
	echo "hi";
	echo 'connection error:' . mysqli_connect_error();
}

?>
