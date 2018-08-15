
<?
header('content-type:text/xml');
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s"));
if($_SERVER["SERVER_PROTOCOL"]=="HTTP/1.0")
 header("Pragma: no-cache");
else
 header("Cache-Control: no-cache, must-revalidate");
 
$cmd=$_GET["cmd"];
 
if($cmd=="tutupwindow")
{
 echo"";
}
if($cmd=="bukawindow")
{
 $str = $_GET["str"];
 ?>
    <div style="position: fixed; top: 0pt; z-index: 1000; opacity: 0.9; height: 100%; left: 0pt; width: 100%; background-color:#999999; padding-top:5%;
          padding-bottom:10px;" align="center">
          <div style="width:500px; height:300px; z-index: 10001; background-color:#000000; padding:5px 5px 5px 5px;">
                  <div style="width:100%; height:100%; z-index: 10002; background-color:#FFFFFF;">
                 <div align="right"><a href="#" onclick="tutupwindow();"><b>X</b></a></div>
                 <form action="login_pros.php" method="post" class="popup-form">
			<div class="panel-body">
                        <form action="login_pros.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass_pel" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block" name="submit">Login</button>
                            </fieldset>
                        </form>
                    </div>
		</form>
          </div>
        </div>
    <?
}
?>