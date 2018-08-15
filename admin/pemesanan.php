<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Car Wash</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="../admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="../admin/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<style>
	table, td, th {    
	    border: 1px solid #ddd;
	    text-align: left;
	}

	table {
	    border-collapse: collapse;
	    width: 100%;
	}

	th, td {
	    padding: 15px;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><span>FourthTeam</span>Admin</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="../img/administrator.png" width="50px" height="50px" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="karyawan.php">Karyawan</a></li>
			<li><a href="pemesanan.php">Pemesanan</a></li>
			<li><a href="keuangan.php">Keuangan</a></li>
			<li><a href="logout_admin.php">Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li class="active">Pemesanan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Pemesanan</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
		<form method="get" action="<?php $_SERVER['PHP_SELF'];?>">
			<table border="1">
				   	<tr>
				   		<th>No. Antrian</th>
				   		<th>No. KTP</th>
				   		<th>Merk</th>
				   		<th>Tipe</th>
				   		<th>Jenis Cucian</th>
				   		<th>No Pol</th>
				   		<th>Tanggal Order</th>
				   		<th>Bayar</th>
				   		<th width="25%">Aksi</th>
				   		<th>Status</th>
				   	</tr>
				   	<?php
				   	$query="Select * from kendaraan join pelanggan where kendaraan.email=pelanggan.email";
					$hasil=mysql_query($query);
							
					while ($data = mysql_fetch_array($hasil)){
					?>
						<tr>
							<td><?php echo $data['antrian']; ?></td>
							<td><?php echo $data['no_ktp']; ?></td>
							<td><?php echo $data['merk']; ?></td>
							<td><?php echo $data['tipe']; ?></td>
							<td><?php echo $data['jenis_cuci']; ?></td>
							<td><?php echo $data['nopol']; ?></td>
							<td><?php echo $data['tgl_order']; ?></td>
							<td><?php echo $data['jenis_bayar']; ?></td>
							<td>
								
								<a href=pemesanan.php?aksi1=belum&antrian=<?php echo $data['antrian']; ?> type="button" class="btn btn-sm btn-danger" name="belum">Belum</a>
								<a href=pemesanan.php?aksi2=proses&antrian=<?php echo $data['antrian']; ?> type="button" class="btn btn-sm btn-warning" name="proses">Proses</a>
								<a href=pemesanan.php?aksi3=selesai&antrian=<?php echo $data['antrian']; ?> type="button" class="btn btn-sm btn-success" name="selesai">Selesai</a>
							</td>
							<td><?php echo $data['status']; ?></td>
						</tr>
					<?php
					}
					?>
			   </table> 
			   </form>
			   <?php
			   if (isset($_GET['aksi1']) == 'belum'){
						$antrian = $_GET['antrian'];
						$query1="update kendaraan set status = 'belum' where antrian = '$antrian'";
						$hasil1=mysql_query($query1);
				}
				if (isset($_GET['aksi2']) == 'proses'){
						$antrian = $_GET['antrian'];
						$query2="update kendaraan set status = 'proses' where antrian = '$antrian'";
						$hasil2=mysql_query($query2);
				}
				if (isset($_GET['aksi3']) == 'selesai'){
						$antrian = $_GET['antrian'];
						$query3="update kendaraan set status = 'selesai' where antrian = '$antrian'";
						$hasil3=mysql_query($query3);
					}
			   ?>
		<br/>
			
		</div>
		
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>