<?php
session_start();
// apabila ditekan tombol logout, session username & level akan hilang 
unset($_SESSION['email']);
header("location:login_admin.php");
?>