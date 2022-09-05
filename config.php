<?php
session_start();
// $conn = mysqli_connect("localhost","dwcdesigners_bilalpro","KPudmMlnLg9W","dwcdesigners_bilalpro");
$conn = mysqli_connect("localhost","root","","cart");
if (!$conn) {
	echo "Not Connected";
}else{
	// echo "Connected Success";
}
?>