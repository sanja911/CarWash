<?php
session_start();
include "../koneksi.php";
if (empty($_SESSION['email'])) {
 $email= $_SESSION['email'];
 header("location:login_admin.php"); 
}
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
	    width: 45%;
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
				<li class="active">Karyawan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Karyawan</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<form method="post" action="#">
				<table border="1">
				   	<tr>
				  		<th width="5%">No.</th>
				  		<th width="20%">Nama</th>
				   		<th width="20%">No. HP</th>
				   	</tr>
				   	<?php
							$sql = "select * from karyawan";
							$hasil = mysql_query($sql);
							$data = mysql_fetch_array($hasil);
					$no=1;
					while ($data = mysql_fetch_array($hasil)){
						echo "
							<tr>
								<td>$no</td>
								<td>".$data['nama']."</td>
								<td>".$data['no_hp']."</td>
							</tr>";
						$no++;
					}
				   	?>
			    </table> 
			</form><br/>
			<button type="button" class="btn btn-sm btn-info">Tambah</button>
			<p><br/>
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