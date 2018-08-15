<?php
session_start();
include "koneksi.php";
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>

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

	   
	</head>

	<body data-spy="scroll" data-target="#navbar-example">
	<div class="collapse navbar-collapse" id="navbar-example">
					      <ul class="nav navbar-nav navbar-left">
					        <li><a href="index.php" class="active">Tentang Kita</a></li>
	  						<li><a href="index.php">Layanan Kita</a></li>
							<li><a href="index.php">Pesan Sekarang</a></li>
							</ul>
					    </div>
		<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
	          <div class="row cart-body">
                <form class="form-horizontal" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    
                    <!--REVIEW ORDER END-->
                </div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Sign Up</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>SIGN UP</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>No. KTP:</strong></div>
                                <div class="col-md-12">
                                    <input placeholder="Nomor KTP" name="no_ktp" type="text" class="form-control" required="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Username:</strong></div>
								<div class="col-md-12"><input placeholder="User Name" name="username" type="text" class="form-control" required="" />
                                </div>
                                
                            </div>
							
							 <div class="form-group">
                                <div class="col-md-12"><strong>No. Telp./HP:</strong></div>
								<div class="col-md-12"><input placeholder="Nomor Telp./HP" name="notelp" type="text" class="form-control" required="" />
                                </div>
                                </div>
								 <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
								<div class="col-md-12"><input placeholder="Email" name="email" type="text" class="form-control" required="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Password:</strong></div>
								<div class="col-md-12"><input placeholder="Password" name="pass_pel" type="text" class="form-control" required="" />
                                </div>
							
                        </div>
                    </div>
                    <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="reg" class="btn btn-primary btn-submit-fix">Sign Up</button>
                                </div>
                            </div>
                </div>
                
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
			        ?>
			        <script language="JavaScript" type="text/javascript">
					<!--
					alert('Sign Up Berhasil');
					-->
					</script>
					<?php
			        header("location:index.php");
			    } else {
						echo "No.KTP sudah terdaftar !";
			        exit;
			     }
			}
			mysql_close();
			?>

				</div>
            <div class="clear">
        
            </div>
    </div>
       
	</body>

	</html>
