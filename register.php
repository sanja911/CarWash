<?php
session_start();
include "/koneksi.php";
//$hasil=mysql_fetch_array(mysql_query(" select * from dosen inner join matkul on dosen.kode_matkul=matkul.kode_matkul inner join mahasiswa on mahasiswa.kode_matkul=dosen.kode_matkul where dosen.id_dos = '$name' "));
?>

<!DOCTYPE html>
<html>
<head>
<title>SIGN UP</title>
<!-- Meta tag Keywords -->
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple User Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, SonyErricsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style --> <link rel="stylesheet" href="css/style_2.css">
</head>
<body>
<!--header-->
	<div class="container">
	<h1>SIGN UP</h1>
     <div class="contact-form">
		 <div class="signin">
			<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
				<input placeholder="Nomor KTP" name="no_ktp" class="name" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="User Name" name="username" class="name" type="text" required="">
					<span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="Nomor Telp." name="notelp" class="number" type="text" required="">
					<span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
				<input placeholder="Email" name="email" class="mail" type="text" required="">
					<span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
				<input  placeholder="Password" name="pass_pel" class="pass" type="password" required="">
					<span class="icon6"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				
				<input type="submit" name="reg" value="SIGN UP">
			</form>
			<?php
			if(isset($_POST['reg'])){
			$no_ktp = $_POST['no_ktp'];
			$username = $_POST['username'];
			$notelp = $_POST['notelp'];
			$email = $_POST['email'];
			$pass_pel = $_POST['pass_pel'];
			    $query =mysql_query("INSERT INTO pelanggan VALUES('$no_ktp','$pass_pel','$username','$email','$notelp')");
			    if($query) {
			        header("location:index.php");
			    } else {
						echo "No.KTP sudah terdaftar !";
			        exit;
			     }
			}
			mysql_close();
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>

</body>
</html>