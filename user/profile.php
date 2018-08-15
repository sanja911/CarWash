<!DOCTYPE html>
<?php
session_start();
include '../koneksi.php';
if (empty($_SESSION['email'])) {
 $email= $_SESSION['email'];
 header("location:index.php"); 
}
  
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
 <?php
									$email = $_SESSION['email'];
									// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
									$query = "SELECT * from pelanggan where email='$email'";
									$hasil = mysql_query($query);
									$data  = mysql_fetch_array($hasil);
									?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="../index.php"><span>FT CAR WASH</span>User</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="profil-img/<?php echo $data['foto'];?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $data['username'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="profile.php"><i class="fa fa-user m-r-10" aria-hidden="true"></i> Pengaturan Akun</a></li>
			<li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Profil</h1>
			</div>
		</div><!--/.row-->
				<?php
							if (isset($_POST['add'])) {
							$no_ktp = $_POST['no_ktp'];
							$pass_pel = $_POST['pass_pel'];
							$username = $_POST['username'];
							$email = $_POST['email'];
							$notelp = $_POST['notelp'];
							$jenis_kel = $_POST['jenis_kel'];
							$keterangan = $_POST['keterangan'];
							$ekstensi_diperbolehkan	= array('png','jpg');
							$nama = $_FILES['file']['name'];
							$x = explode('.', $nama);
							$ekstensi = strtolower(end($x));
							$ukuran	= $_FILES['file']['size'];
							$file_tmp = $_FILES['file']['tmp_name'];	
								if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
									if($ukuran < 1044070){			
									move_uploaded_file($file_tmp, 'profil-img/'.$nama);
							$query = mysql_query("UPDATE pelanggan SET no_ktp='$no_ktp',pass_pel='$pass_pel',username='$username',email='$email',notelp='$notelp',jenis_kel='$jenis_kel',keterangan='$keterangan',foto='$nama' where email='$email'");
							if($query){
							echo '<div class="row">
			<div class="col-lg-12"><div class="alert bg-teal" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Data Sukses Diperbarui<a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>';
							}else{
							echo '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Gagal Upload <em class="fa fa-lg fa-close"></em></a></div>
			';
							}
							}else{
							echo '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> File Terlalu Besar <em class="fa fa-lg fa-close"></em></a></div>
			';			
			}
							}else{
										echo '<div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> File tidak didukung <em class="fa fa-lg fa-close"></em></a></div>
			';}
							}
							?>


				<div class="panel panel-default">
					<div class="panel-heading">User Setting</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form" action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
									<label>No.KTP</label>
									<input class="form-control" placeholder="Placeholder" name="no_ktp" value="<?php echo $data['no_ktp'];?>">
								</div>
								
								<div class="form-group">
									<label>Username</label>
									<input class="form-control" placeholder="Placeholder" name="username" value="<?php echo $data['username'];?>">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control" placeholder="Placeholder" name="email" value="<?php echo $data['email'];?>">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="pass_pel" value="<?php echo $data['pass_pel'];?>">
								</div>
								<div class="form-group checkbox">
									<label>
										<input type="checkbox">Remember me
									</label>
								</div>
									<div class="form-group">
										<label>Jenis Kelamin</label>
										<select class="form-control" name="jenis_kel">
											<option value="l">Laki-laki</option>
											<option value="p">Perempuan</option>
											</select>
											</div>
									<div class="form-group">
									<label>No.Telepon</label>
									<input class="form-control" placeholder="Placeholder" name="notelp" value="<?php echo $data['notelp'];?>">
								</div>
								
								<div class="form-group">
									<label>Upload Foto Profil</label>
									<input type="file" name="file">
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<div class="form-group">
									<label>Tentang Anda</label>
									<textarea class="form-control" rows="3" name="keterangan" value="<?php echo $data['keterangan'];?>"></textarea>
								</div>
								<input type="submit" name="add" class="btn btn-primary" value="sign up">
									<button type="reset" class="btn btn-default">Cancel</button>
								</div>
							</form>
							
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<div class="col-sm-12">
				<p class="back-link">Kelompok 4 / S1 PTI Offering D 2015</p>
			</div>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
