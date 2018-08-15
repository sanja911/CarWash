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
	<title>Dashboard</title>
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
							$sql = "select * from pelanggan where email='$email'";
							$hasil = mysql_query($sql);
							$data3  = mysql_fetch_array($hasil);
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
				<img src="profil-img/<?php echo $data3['foto'];?>" class="img-responsive" alt="">
			</div>
			 <?php
									$email = $_SESSION['email'];
									// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
									$query = "SELECT username from pelanggan where email='$email'";
									$hasil = mysql_query($query);
									$data  = mysql_fetch_array($hasil);
									?>

			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $data['username'];?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<ul class="nav menu">
			<li class="active"><a href="./user/index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
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
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from pembayaran where email='$email'";
							$hasil = mysql_query($sql);
							$data  = mysql_num_rows($hasil);
				?>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?php echo $data;?></div>
							<div class="text-muted">Transaksi Terakhir</div>
						</div>
					</div>
				</div>
				<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from kendaraan where email='$email' and status='selesai'";
							$hasil = mysql_query($sql);
							$count  = mysql_num_rows($hasil);
				?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?php echo $count;?></div>
							<div class="text-muted">Antrian Selesai</div>
						</div>
					</div>
				</div>
				<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from kendaraan where email='$email' and status='proses'";
							$hasil = mysql_query($sql);
							$data2  = mysql_num_rows($hasil);
				?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?php echo $data2;?></div>
							<div class="text-muted">Antrian Dalam Proses</div>
						</div>
					</div>
				</div>
				<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from kendaraan where email='$email'";
							$hasil = mysql_query($sql);
							$count2  = mysql_num_rows($hasil);
				?>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large"><?php echo $count2;?></div>
							<div class="text-muted">Antrian Terakhir</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">Informasi Pribadi</div>
					<div class="panel-body">	
					<p><?php echo $data3['username'];?></p>
					<p><?php echo $data3['email'];?></p>
					<p><?php echo $data3['no_ktp'];?></p>
					<p><?php echo $data3['notelp'];?></p>
					<p><a href="profile.php">Ubah atau Perbarui Data Anda </p></a>
					</div>
				</div>
			</div>
			<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from kendaraan where email='$email' and status='proses'";
							$hasil = mysql_query($sql);
							$data4  = mysql_fetch_array($hasil);
					?>
			<div class="row">
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">Status Antrian</div>
					<div class="panel-body">	
					<p>No.<?php echo $data4['antrian'];?></p>
					<p>Merk Kendaraan 	: <?php echo $data4['merk'];?></p>
					<p>Jenis Cuci		: <?php echo $data4['jenis_cuci'];?></p>
					<p>Status 	  		: <?php echo $data4['status'];?></p>
					<!--<p><a href="profile.php">Ubah atau Perbarui Data Anda </p></a>-->
					</div>
				</div>
			</div>
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