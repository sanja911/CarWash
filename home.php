<?php
// koneksi
$conn= mysqli_connect("localhost","root","");
mysqli_select_db($conn,"ta_pbw");
 
 
$lama = 1; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 5 hari
 
// proses untuk melakukan penghapusan data
 
$query = "DELETE FROM kendaraan
          WHERE DATEDIFF(CURDATE(), tgl_order) >= $lama";
$hasil = mysqli_query($conn,$query);
session_start();
 if (empty($_SESSION['email'])) {
 header("location:index.php");  
 }
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>FT Car Wash</title>

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
	</head>

	<body data-spy="scroll" data-target="#navbar-example">

		<!-- ****************************** Preloader ************************** -->
		<<body data-spy="scroll" data-target="#navbar-example">

		<!-- ****************************** Preloader ************************** -->
		<div id="preloader"></div>
		<div id="wrapper">
			<div id="overlay-1">
				<section id="navigation-scroll">
					<nav class="navbar navbar-default navbar-fixed-top">
					  <div class="container">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-example">
					        <span class="sr-only">Toggle navigation</span>
					        <i class="fa fa-bars"></i>
					      </button>
					      <a class="navbar-brand" href="#">FT CAR WASH</a>
					    </div>



					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="navbar-example">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="#about" class="active">Tentang Kita</a></li>
	  						<li><a href="#our_service">Layanan Kita</a></li>
							<li><a href="#download">Pesan Sekarang</a></li>
							<li><a href="nota.php">Nota</a></li>
	    					<li><a href="user/"><?php echo $_SESSION['email'];?></a></li>
	    					<li><a href="logout.php">Logout</a></li>
							</ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>	<!-- navbar -->
				</section>	<!-- #navigation -->
				

				<section id="starting">
					<div class="text-center starting-text wow animated zoomInDown">
						<h2>Welcome in</h2>
						<h1 class="rene">Car Wash </h1>
						
						
					</div>
				</section>
				<div id="bottom" class="bottom text-center">
			        <a href="#about"><i class="ion-ios7-arrow-down"></i></a>
			    </div>
			</div><!-- overlay-1 -->
		</div>	<!-- wrapper -->		
			
		<!-- About Us -->
		<section id="about">
			<div class="container">
				<div class="row text-center heading">
					<div class="wow animated zoomInDown heading-text">
						<h3>About Us</h3>
	                	<hr class="full">
	                	<br/>
					</div>
				</div>	<!-- row -->
				<div class="row about-us-text">
					<div class="col-md-12">
						<p class="text-center">FT (Fourth Team) Car Wash adalah sebuah tempat usaha yang bergerak pada bidang jasa yaitu pencucian motor dan mobil. FT Car Wash dibangun oleh 5 mahasiswa yang bertujuan untuk memudahkan masyarakat dalam mencuci motor atau mobilnya. Walaupun baru didirikan, FT Car Wash selalu mengutamakan kepuasan pelanggan. Keunggulan FT Car Wash daripada tempat usaha yang serupa adalah aksesnya yang mudah karena menggunakan sistem online yang dapat diakses melalui internet dengan mengakses website FT Car Wash. setelah pelanggan masuk pad FT Car Wash, maka pelanggan bisa memilih untuk mencuci motor atay mobilnya serta dapat melihat beraa banyak antrian yang ada. pembayaran juga dilakukan melalui Bank atau ATM dengan mengirimkan ke nomor rekening FT Car Wash.</p>
					</div>
				</div>	<!-- row -->
				<div class="row main_content">
					<div class="col-md-4 col-sm-4 wow animated zoomIn" data-wow-delay="0.1s">
						<figure>
							<img class="pro img-responsive center-block" src="img/3-col-icons-web.png" alt="image">
						</figure>
						<h5 class="text-center">RESPONSIVE</h5>
					</div>	<!-- col-md-4 -->

					
					<div class="col-md-4 col-sm-4 wow animated zoomIn" data-wow-delay="0.1s">
						<figure>
							<img class="pro img-responsive center-block" src="img/3-col-icons-android.png" alt="image">
						</figure>
						<h5 class="text-center">ANDROID</h5>
					</div>	<!-- col-md-4 -->
	<!-- col-md-4 -->
				</div><!-- row main_content -->
			</div>	<!-- container -->
		</section>	<!-- about us -->

		<!-- Our service -->
		<section id="our_service">
			<div class="container">
				<div class="row text-center heading">
	        		<div class="wow animated zoomInDown heading-text">
	        			<h3>Services</h3>
	                	<hr class="full">
	                	<br/>
	        		</div>
		        </div>
			    <div class="main_content">
				    <div class="services">
			        	<div class="row">
			        		<div class="col-md-3 col-sm-6">
			        			<div class="service">
			        				<img src="img/motor.png" alt="service1">
			        				<div class="text-center">
				        				<h4>Pencucian Motor</h4>
				        				<p>
				        					Melakukan pencucian terhadap motor kesayangan anda hingga bersih tanpa debu
				        				</p>	
			        				</div> <!-- .text-center -->
			        			</div> <!-- .service -->
			        		</div> <!-- .col-md-3 -->
			        		<div class="col-md-3 col-sm-6">
			        			<div class="service">
			        				<img src="img/mobil.png" alt="service1">
			        				<div class="text-center">
				        				<h4>Mobile Application</h4>
				        				<p>
				        					Melakukan pencucian mobil tercinta anda hingga kinclong tanpa kotor
				        				</p>	
			        				</div> <!-- .text-center -->
			        			</div> <!-- .service -->
			        		</div> <!-- .col-md-3 -->
			        		<div class="col-md-3 col-sm-6">
			        			<div class="service">
			        				<img src="img/segera.png" width="137" height="270" alt="service1" >
			        				<div class="text-center">
				        				<h4>Perbaikan</h4>
				        				<p>
				        					Melakukan perbaikan kepada kendaraan anda dari team ahli kami
				        				</p>	
			        				</div> <!-- .text-center -->
			        			</div> <!-- .service -->
			        		</div> <!-- .col-md-3 -->
			        		<div class="col-md-3 col-sm-6">
			        			<div class="service">
			        				<img src="img/segera.png" alt="service1">
			        				<div class="text-center">
				        				<h4>Perawatan</h4>
				        				<p>
				        					Memberikan perawatan terbaik untuk kendaraan anda
				        				</p>	
			        				</div> <!-- .text-center -->
			        			</div> <!-- .service -->
			        		</div> <!-- .col-md-3 -->
			        		
			        	</div>	<!-- row -->
					</div>	<!-- services -->
				</div>	<!-- main_content -->
			</div>	<!-- container -->
		</section>	<!-- our_service -->

		
		<!-- Download now -->
		<section id="download">
			<div class="container">
				<div class="row text-center heading">
	        		<div class="wow animated zoomInDown heading-text">
	        			<h3>Pesan Antrian Sekarang</h3>
	                	<hr class="full">
	                	</div>	<!-- row -->
						<div class="row about-us-text">
							<div class="col-md-12">
								<p class="text-center download-subtitle">
			                		Pesan antrian anda sekarang juga
			                	</p>
							</div>
						</div>	<!-- row -->
	        		</div> <!-- #heading-text -->
		        </div>
			    <!-- </div>	container -->
		</section>	<!-- Meet -->
		
		<!-- Price-Table -->
	    <section id="price_table">
	    	<div class="container">
	    		<div class="row main_content">
	    			<ul class="price-table-chart">
                        <li class="text-center">
		                        <strong>Cuci Motor</strong>
								<span class="price_table-pay">Order sekarang lalu pesan salah satu jenis cuci</span>
		                        <span class="price_table-description"><i class="fa fa-check"></i> Foam</span> 
		                        <span class="price_table-description"><i class="fa fa-check"></i> Manual</span> 
		                        <span class="price_table-description"><i class="fa fa-check"></i> Pump</span>
		                        <span class="price_table-description"><i class="fa fa-check"></i> Steam</span>
		                        <br>
		                        <a class="btn btn-sub btn-primary" href="pesan.php" role="button">Order Sekarang</a>
		                </li>
		            
		                <li class="text-center">
		                        <strong>Cuci Mobil</strong>
								<span class="price_table-pay">Order sekarang lalu pesan salah satu jenis cuci</span>
		                        <span class="price_table-description"><i class="fa fa-check"></i> Foam</span> 
		                        <span class="price_table-description"><i class="fa fa-check"></i> Manual</span> 
		                        <span class="price_table-description"><i class="fa fa-check"></i> Pump</span>
		                        <span class="price_table-description"><i class="fa fa-check"></i> Steam</span>
		                        <br>
		                        <a class="btn btn-sub btn-primary" href="pesan.php" role="button">Order Sekarang</a>
		       
		                </li>
		            
		                <li class="text-center">
		                        <strong>Perawatan dan Perbaikan</strong>
		                        <span class="big"></span>
		                        <span class="price_table-pay">Coming Soon</span> 
		                        <br>
		                        <a class="btn btn-sub btn-primary" href="#" role="button">Order Sekarang</a>
		                </li>
		            </ul>
	    		</div>	<!-- row main_content -->
	    	</div>	<!-- container -->
	    </section>	<!-- price_table -->

		<!-- contact -->
	    <section id="contact">
	    	<div class="container text-center">
				<div class="row text-center">
					<div class="bg-image">
						<div class="col-md-6 col-md-offset-3 text-center share-text wow animated zoomInDown heading-text">
		                	<p class="heading">
		                		If you got any questions, please do not hesitate to send us a message.
							</p>
						</div>
					</div>
				</div><div class="row text-center main_content">
					<form method="post" action="<?=$_SERVER['REQUEST_URI']?>" class="">
						<div class="col-md-4 col-md-offset-2 text-center">
							<div class="form">
								<div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-user fa-fw"></i>
	  								</span>
								 	<input name="name" class="form-control" type="text" placeholder="Name" required>
								</div>
								<div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-envelope-o fa-fw"></i>
	  								</span>
								 	<input class="form-control" type="email" placeholder="Email address" name="email" required>
								</div>
								<div class="input-group margin-bottom-sm">
	  								<span class="input-group-addon">
	  									<i class="fa fa-tags fa-fw"></i>
	  								</span>
								 	<input name="subject" class="form-control" type="text" placeholder="Subject">
								</div>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="form">
								<div class="input-group margin-bottom-sm">
									<span class="input-group-addon">
										<i class="fa fa-comment-o fa-fw"></i>
									</span>
									<input type="text" name="text" class="form-control message" placeholder="Your Message">
								</div>
							</div>
						</div>
						</div>
							<input class="btn btn-sub" type="submit" value="Send Message">
						</div>
					</form>	

					<?php
					if(isset($_POST['submit'])){
					$name = $_POST['name'];
					$email = $_POST['email'];
					$subject = $_POST['subject'];
					$text = $_POST['text'];
					$query =mysql_query("INSERT INTO chat VALUES('',$name','$email','$subject','$text')");
					    if($query) {
					        ?>
					        <script language="JavaScript" type="text/javascript">
							<!--
							alert('Berhasil');
							-->
							</script>
							<?php
					    } else {
								echo "No.KTP sudah terdaftar !";
					        exit;
					     }
					}
					mysql_close();
					?>
				
	    </section>	<!-- contacts --> 
			
		<!-- footer -->
		<section id="footer" class="main-footer">
			<div class="container">
				<p>&copy; 2017 Kelompok 4 / S1 PTI Offering D</p>
				<a href="#starting" class="up"><i class="fa fa-arrow-circle-up"></i></a>
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
