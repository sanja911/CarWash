<?php
session_start();
include "koneksi.php";
if (empty($_SESSION['email'])) {
 $email= $_SESSION['email'];
 header("location:index.php"); 
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Nota Transaksi</title>

		<!-- meta -->
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- css -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="css/ionicons.min.css"> -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/owl.theme.css">
		<link rel="stylesheet" href="css/owl.transitions.css">
	    <link rel="stylesheet" href="css/animate.css">
	    <link rel="stylesheet" href="js/nivo-lightbox/nivo-lightbox.css">
		<link rel="stylesheet" href="js/nivo-lightbox/nivo-lightbox-theme.css">
	    <link rel="stylesheet" href="css/custom.css">

	    <!-- js -->
	    <script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/owl.carousel.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.actual.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/jquery.js"></script>
            <script src="js/jquery.ui.datepicker.js"></script>
</head>

	<body data-spy="scroll" data-target="#navbar-example">
	<div class="collapse navbar-collapse" id="navbar-example">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="home.php" class="active">Tentang Kita</a></li>
	  						<li><a href="home.php">Layanan Kita</a></li>
							<li><a href="pesan.php">Pesan Sekarang</a></li>
							
	    					<!-- <li><a href="#price_table">Price Table</a></li> -->
	    					<li><a href="user/"><?php echo $_SESSION['email'];?></a></li>
                            <li><a href="logout.php">Logout</a></li>
							</ul>
					    </div><!-- /.navbar-collapse -->
		
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <p><p>
                <?php
                            $email = $_SESSION['email'];
                            // jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
                            $sql  = "SELECT * FROM kendaraan JOIN pembayaran where kendaraan.email='$email'";
                            $hasil = mysql_query($sql);
                            $data  = mysql_fetch_array($hasil);
                    ?>              
            <table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <td>No.Antrian</td>
                                        <td>Email</td>
                                        <td>Tanggal Order</td>
                                        <td>Jenis Cuci</td>
                                        <td>Nopol Kendaraan</td>
                                        <td>Jenis Bayar</td>
                                        <td>Harga</td>
                                        <td>Subtotal</td>
                                    </tr>
                                </thead><tr>
                                <td><?php echo $data['antrian'];?></td>
                                <td><?php echo $data['email'];?></td>
                                <td><?php echo $data['tgl_order'];?></td>
                                <td><?php echo $data['jenis_cuci'];?></td>
                                <td><?php echo $data['nopol'];?></td>
                                <td><?php echo $data['jenis_bayar'];?></td>
                                <td><?php echo $data['jumlah'];?></td>
                                <td><?php echo $data['jumlah'];?></td>
                                                                
                                </tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><?php echo $data['jumlah'];?></td>
                                
                                    </table>            </div>
                                    <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-submit-fix" onClick="window.print()" href="front.php" >Cetak</button>
                                </div>
                            </div>

				</div>
            <div class="row cart-footer">
        
            </div>
    </div>
</section><!-- footer -->

		<!-- js -->
		<script>
 			new WOW().init();
		</script>
		<script>
			$( function() {
  
			  // change is-checked class on buttons
			  	$('.button-group').each( function( i, buttonGroup ) 
			  	{
			    	var $buttonGroup =$( buttonGroup );
			    	$buttonGroup.on( 'click', 'button', function() 
			    	{
			      		$buttonGroup.find('.is-checked').removeClass('is-checked');
			      		$( this ).addClass('is-checked');
			    	});
			  	});
			  
			});
		</script>
        <script src="js/jquery-ui-1.10.3.min.js"></script>
        <script src="js/jquery.knob.js"></script>
        <script src="js/daterangepicker.js"></script>
        <script src="js/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="js/nivo-lightbox/nivo-lightbox.min.js"></script>
        <script src="js/script.js"></script>
       
	</body>

	</html>
