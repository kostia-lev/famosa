<?
include "./AMframe/config.php";
ob_start();


$act=isSet($act)?$act:'';
$Message=isSet($Message)?$Message:'';
$_SESSION['vyusrlog'] = isset($_SESSION['vyusrlog'])?$_SESSION['vyusrlog']:'0'; 

error_reporting(E_ALL ^ E_NOTICE); // Avoid COOKIE Error
$Cookie = $_COOKIE['HmAcc']; 
if($Cookie == 0){
	@session_destroy();
}
if(($Cookie != 0 || $_SESSION['vyusrlog'] != 0)){
	header("location:welcome.php");
	exit;
}
		
if($act=="err_psw")
	$Message = "<center><font color='red'>Invalid Credentials</font></center>";
else if($act=="scs")
	$Message = "<center><font color='green'><b>Password Updated Successfully</b></font></center>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login Page | Property Listing</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="cls-container">
            <!-- LOGIN FORM -->
            <!--===================================================-->
            <div class="lock-wrapper">
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="img/user.png" class="img-circle"/> </div>
                    <h4>Pannello di Amministrazione</h4>
                    <p class="text-center">Inserisci le credenziali per entrare:</p>
                    <div class="row">
                        <form action="session.php" class="form-inline" method="post">
						<input type="hidden" name="ctadby" value="1">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
							<?echo $Message;?>
                                <div class="text-left">
                                    <label class="text-muted">Nome utente </label>
                                    <input id="signupInputEmail1" type="text"  name="username" placeholder="Inserisci nome utente" class="form-control" required />
                                </div>
                                <div class="text-left">
                                    <label for="signupInputPassword" class="text-muted">Password</label>
                                    <input id="signupInputPassword" type="password" name="pass" placeholder="Inserisci Password" class="form-control lock-input" required />
                                </div>
                               <!-- <div class="pull-left pad-btm">
                                    <label class="form-checkbox form-icon form-text">
                                    <input type="checkbox"> Remember Me
                                    </label>
                                </div>-->
                                <input type="submit" name="submit" class="btn btn-block btn-primary" value="Entra">
                            </div>
                        </form>
                    </div>
					
                </div>
                <!--<div class="registration"> Don't have an account ! <a href="register.php"> <span class="text-primary"> Sign Up </span> </a> </div>-->
            </div>
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/jasmine.js"></script>
    </body>
</html>