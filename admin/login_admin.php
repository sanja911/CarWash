<?php
session_start();
include "../koneksi.php";

if(isset($_GET['submit'])){
	$nama = $_GET['nama'];
	$pass_kar = $_GET['pass_kar'];
	$_SESSION['nama']=$nama;
	$_SESSION['pass_kar']=$pass_kar;
	 
	$login = mysql_query("select * from karyawan where nama='$_SESSION[nama]' and pass_kar='$_SESSION[pass_kar]'");
	$cek = mysql_num_rows($login);
	 
	if($cek > 0){
		session_start();
		$_SESSION['nama'] = $nama;
		header("location:karyawan.php");
	}else{
		echo "<script>alert('nama atau Password Salah !')</script>";	
	}
}

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">

  <title>Login Admin</title>

  <link rel="stylesheet" href="css/style_login.css" media="screen" type="text/css" />

</head>

<body>

  <span href="#" class="button" id="toggle-login">Log in</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Admin</h1>
  <form method="get" action="<?php $_SERVER['PHP_SELF'];?>">
    <input type="nama" name="nama" placeholder="nama" autofocus="autofocus" required />
    <input type="password" name="pass_kar" placeholder="Password" required />
    <input type="submit" name="submit" value="Login"/>
  </form>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>