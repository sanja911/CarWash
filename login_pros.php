<?php 
session_start();
include "koneksi.php";
 
$email = $_POST['email'];
$pass_pel = $_POST['pass_pel'];
$_SESSION['email']=$email;
$_SESSION['pass_pel']=$pass_pel;
 
$login = mysql_query("select * from pelanggan where email='$_SESSION[email]' and pass_pel='$_SESSION[pass_pel]'");
$cek = mysql_num_rows($login);
 
if($cek > 0){
	session_start();
	$_SESSION['email'] = $email;
	header("location:home.php");
}else{
	echo "Email atau Password Salah !!! <br />";
	?>
	<a href="index.php">Kembali</a>
	<?php
}
 
?>