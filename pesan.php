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
		<title>Pesan</title>

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
		<script type="text/javascript" src="jquery-1.2.3.pack.js"></script>
		<script type="text/javascript" src="jquery.validate.pack.js"></script>
		<script src="js/jquery.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/owl.carousel.min.js"></script>
		<script src="js/wow.min.js"></script>
		<script src="js/jquery.actual.min.js"></script>
		<script>
$(document).ready(function(){
$("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
if ($("input[name='ditempat']:checked").val() == "debit" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
if ($("input[name='ditempat']:checked").val() == "bayartempat" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#button").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#button").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}

});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#form").validate({
		messages: {
			email: {
				required: "E-mail harus diisi",
				email: "Masukkan E-mail yang valid"
			}
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
	</head>

	<body data-spy="scroll" data-target="#navbar-example">
	<div class="collapse navbar-collapse" id="navbar-example">
					      <ul class="nav navbar-nav navbar-right">
					        <li><a href="home.php" class="active">Tentang Kita</a></li>
	  						<li><a href="home.php">Layanan Kita</a></li>
							<li><a href="pesan.php">Pesan Sekarang</a></li>
							<li><a href="nota.php">Nota</a></li>
	    					<li><a href="user/"><?php echo $_SESSION['email'];?></a></li>
                            <li><a href="logout.php">Logout</a></li>
							</ul>
					    </div><!-- /.navbar-collapse -->
		<?php 
function nomor() {
	$sql = "SELECT antrian FROM kendaraan ORDER BY antrian DESC LIMIT 0,1";
	$query = mysql_query($sql);
	list ($no_temp) = mysql_fetch_row($query);
 
	if ($no_temp == '') {
		$no_urut = 'A00001';
		
		} else {
		$jum = substr($no_temp,1,6);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'A0000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'A000' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'A00' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'A0' . $jum;
		} elseif ($jum <= 99999) {
			$no_urut = 'A' . $jum; 	
		} else {
			die("Nomor urut melebih batas");		
		}
	}
		return $no_urut;
}
 
$nomor = nomor();
 
?>
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
			<?php 
			if(empty($merk)) {
			$error['merk'] = 'Merk Kendaraan harus diisi';
			} 
			if(empty($nopol)) {
			$error['nopol'] = 'Nopol Kendaraan harus diisi';
				} 
			?>
	          <div id="form" class="row cart-body">
                <form class="form-horizontal" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Jenis Pembayaran <div class="pull-right"></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><input type="radio" name="ditempat" value="bayartempat" class="detail"> Bayar Ditempat </div>
									
								</div>
                            </div>
								<div id="button" class="panel panel-info" >
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span>Verifikasi Pembayaran Ditempat</div>
                        <div class="panel-body">
                                    <button type="submit" id="add_data" name="next" class="btn btn-primary btn-submit-fix" >Next</button>
                                </div>
                            </div>
                            							
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><input type="radio" name="ditempat" value="debit" class="detail"> Debit </div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                </div>
                            </div>
                            
                        </div>
                    </div>
					
                    <!--REVIEW ORDER END-->
					<!-- Button Submit-->
					   
					<!-- Form Pembayaran Debit -->
					<div id="form-input" class="panel panel-info" >
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Jenis Pembayaran:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="jenis_kartu" class="form-control">
                                        <option value="mandiri">Bank Mandiri</option>
                                        <option value="visa">Visa</option>
                                        <option value="bri">Bank BRI</option>
                                        <option value="master card">MasterCard</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="no_kredit" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card CVV:</strong></div>
                                <div class="col-md-12"><input type="text" class="form-control" name="cvv" value="" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>Expiration Date</strong>
                                </div>
                                    <div class="col-md-12"><input type="date" class="form-control" name="tgl_expired" value="" /></div>
                               </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>Pay secure using your credit card.</span>
                                </div>
                                <div class="col-md-12">
                                    <ul class="cards">
                                        <li class="visa hand">Visa</li>
                                        <li class="mastercard hand">MasterCard</li>
                                        <li class="amex hand">Amex</li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-submit-fix">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php
							$email = $_SESSION['email'];
							// jika proses simpan transaksi sukses, maka tampilkan nomor transaksi dan data pembayaran
							$sql = "select * from pelanggan where email='$email'";
							$hasil = mysql_query($sql);
							$data  = mysql_fetch_array($hasil);
					?>				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    
					<!--SHIPPING METHOD-->
					
                    <div class="panel panel-info">
                        <div class="panel-heading">Pemesanan</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Detail Pemesanan</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>No. Antrian:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nomor" value="<?php echo $nomor;?>" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Username:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'];?>" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email:</strong></div>
								<div class="col-md-12"><input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" readonly />
                                </div>
                                
                            </div>
							<!--<div class="form-group">
                                <div class="col-md-12"><strong>No Antrian:</strong></div>
								<div class="col-md-12"><input type="text" name="antrian" class="form-control" value="<?php echo $nomor; ?>" readonly />
                                </div>
                                
                            </div>-->
							<div class="form-group">
                                <div class="col-md-12"><strong>Jenis Kendaraan:</strong></div>
                                <div class="col-md-12">
                                    <select id="check" name="tipe" class="form-control">
                                        <option value="sepeda">Sepeda Motor</option>
                                        <option value="mobil">Mobil</option>
                                        <option value="truck">Truck</option>
                                    </select>
                                </div>
                            </div>
							 <div class="form-group">
                                <div class="col-md-12"><strong>Merk Kendaraan:</strong></div>
								<div class="col-md-12"><input type="text" name="merk" id="check" class="required" />
                                <p style="color:red;"><?php echo '*'; echo ($error['merk']) ? $error['merk'] : ''; ?></p>
								</div>
                                </div>
								 <div class="form-group">
                                <div class="col-md-12"><strong>Nopol:</strong></div>
								<div class="col-md-12"><input type="text" name="nopol" id="check" class="form-control" />
								<p style="color:red;"><?php echo '*'; echo ($error['nopol']) ? $error['nopol'] : ''; ?></p>
								</div>
                            </div>
							<?php 
							$result = mysql_query("select * from cuci");  
							$jsArray = "var jenis = new Array();\n";  
							echo '<div class="form-group">';
							echo '<div class="col-md-12"><strong>Jenis Cuci :</strong></div> <div class="col-md-12"><select id="check" name="jenis_cuci" class="form-control" onchange="changeValue(this.value)">';  
							while ($row = mysql_fetch_array($result)) {  
							echo '<option value="' . $row['jenis_cuci'] . '">' . $row['jenis_cuci'] . '</option>';  
							$jsArray .= "jenis['" . $row['jenis_cuci'] . "'] = {name:'" . addslashes($row['harga']) . "'};\n";  
							}  
							echo '</select>';  
							echo '</div>'; 
							echo '</div>'; 
							?>  
                           <div class="form-group">
						   <div class="col-md-12"><strong>Harga :</strong></div>
						   <div class="col-md-12"><input type="text" name="jumlah" id="charga"class="form-control" readonly />
						   </div>
						   </div>
						   <script type="text/javascript">  
							<?php echo $jsArray; ?>
							function changeValue(id){
							document.getElementById('charga').value = jenis[id].name;
							};
							</script>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Nomor Telepon:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" id="check" class="form-control" value="<?php echo $data['notelp'];?>" /></div>
                            </div>
							<?php 
							$tgl_order = date("Y/m/d");
							?>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Tanggal Order:</strong></div>
                                <div class="col-md-12"><input type="text" name="tgl_order" id="check" class="form-control" value="<?php echo $tgl_order;?>" readonly /></div>
                            </div>
                            
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT END-->
                </div>
                </form>
 
<?php
if(isset($_POST['submit'])){
$email=$_SESSION['email'];
$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$jenis_cuci=$_POST['jenis_cuci'];
$nopol = $_POST['nopol'];
$no_antrian=$_POST['nomor'];
$jenis_kartu=$_POST['jenis_kartu'];
$no_kredit=$_POST['no_kredit'];
$cvv=$_POST['cvv'];
$harga=$_POST['jumlah'];
$tgl_expired=$_POST['tgl_expired'];
$tgl_expired=date('Y-m-d', strtotime($tgl_expired));
$tgl_order=$_POST['tgl_order'];
$query = "SELECT harga from cuci where jenis_cuci='$jenis_cuci'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$query = "SELECT max(idTransaksi) AS last FROM pemesanan WHERE idTransaksi LIKE '$tgl_order%'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNoUrut = substr($lastNoTransaksi, 8, 4); 
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $tgl_order.sprintf('%04s', $nextNoUrut);
$sql1 = mysql_query("INSERT INTO kendaraan (antrian,email,merk,tipe,jenis_cuci,nopol,tgl_order,status,jenis_bayar) VALUES('$no_antrian','$email','$merk','$tipe','$jenis_cuci','$nopol','$tgl_order','proses','credit card')");
$sql2 = mysql_query("INSERT INTO pembayaran (antrian,jenis_kartu,email,no_kredit,cvv,exp_date,jumlah) VALUES('$no_antrian','$jenis_kartu','$email','$no_kredit','$cvv','$tgl_expired','$harga')");
$sql3 = mysql_query("INSERT INTO pemesanan (tgl_order,idTransaksi) VALUES ('$tgl_order','$nextNoTransaksi')");
if ($sql1.$sql2.$sql3){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=nota.php">';
    } else {
        $sql4=mysql_query("update kendaraan set antrian ='$no_antrian',email='$email',merk='$merk',tipe='$tipe',jenis_cuci='$jenis_cuci',nopol='$nopol',tgl_order='$tgl_order',status='proses', jenis_bayar='credit card' where email = '$email'");
		$sql5=mysql_query("update pembayaran set antrian ='$no_antrian',jenis_kartu='$jenis_kartu',email='$email',no_kredit='$no_kredit',cvv='$cvv',exp_date='$tgl_expired',jumlah='$harga' where email = '$email'");
		
		if($sql4.$sql5){
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=nota.php">';
			}
			else{
				echo "Error!" .mysql_error();
			}
        exit;
     }
}

if(isset($_POST['next'])){
$email=$_SESSION['email'];
$merk = $_POST['merk'];
$tipe = $_POST['tipe'];
$jenis_cuci=$_POST['jenis_cuci'];
$nopol = $_POST['nopol'];
$no_antrian=$_POST['nomor'];
$cvv=$_POST['cvv'];
$harga=$_POST['jumlah'];
$tgl_order=$_POST['tgl_order'];
$query = "SELECT harga from cuci where jenis_cuci='$jenis_cuci'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$query = "SELECT max(idTransaksi) AS last FROM pemesanan WHERE idTransaksi LIKE '$tgl_order%'";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$lastNoTransaksi = $data['last'];
$lastNoUrut = substr($lastNoTransaksi, 8, 4); 
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $tgl_order.sprintf('%04s', $nextNoUrut);
$sql6 = mysql_query("INSERT INTO kendaraan (antrian,email,merk,tipe,jenis_cuci,nopol,tgl_order,status,jenis_bayar) VALUES('$no_antrian','$email','$merk','$tipe','$jenis_cuci','$nopol','$tgl_order','belum','ditempat')");
$sql7 = mysql_query("INSERT INTO pembayaran (antrian,email,jumlah) VALUES('$no_antrian','$email','$harga')");
$sql8 = mysql_query("INSERT INTO pemesanan (tgl_order,idTransaksi) VALUES ('$tgl_order','$nextNoTransaksi')");

if ($sql6.$sql7.$sql8){
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=nota.php">';
    } else {
        $sql9=mysql_query("update kendaraan set antrian ='$no_antrian',email='$email',merk='$merk',tipe='$tipe',jenis_cuci='$jenis_cuci',nopol='$nopol',tgl_order='$tgl_order',status='belum', jenis_bayar='ditempat' where email = '$email'");
        $sql10=mysql_query("update pembayaran set antrian ='$no_antrian',email='$email',jumlah='$harga' where email = '$email'");
        
        if($sql9.$sql10){
                echo '<META HTTP-EQUIV="Refresh" Content="0; URL=nota.php">';
            }
            else{
                echo "Error!" .mysql_error();
            }
        exit;
     }
}
?>

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
