<?
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}

include "./AMframe/config.php";
ob_start(); 

$submit = isset($submit)?$submit:'';

$timestamp = time();
date_default_timezone_set("Asia/Kolkata");
$SysDate = date("d-m-Y");
$Time = date("h:i:s");
$ipaddress = $_SERVER['REMOTE_ADDR'];

$Loginid = $_SESSION['vyadmlog'];
$AdminId = $_SESSION['vyusrlog'] ;
$Admin_name = $_SESSION['Admin_name']?$_SESSION['Admin_name']:'' ;
$Adminusrtype_id = $_SESSION['Adminusrtype_id']?$_SESSION['Adminusrtype_id']:'' ;
$Cookie = $_COOKIE['HmAcc'];
if($Cookie == 0 || ($Loginid == 0 && $AdminId == 0)){
	header("location:index.php");
	exit;
	}
if($Admin_name == "Admin"){ // code for Admin profile
	$GetProfile = $db->singlerec("select userimages,username,email_id, id from admin where id='$AdminId'");
	$Pro_Picture = $GetProfile['userimages'];
	$usrcre_name = $GetProfile['username'];
	$user_images = $GetProfile['userimages'];
	$usrcre_email = $GetProfile['email_id'];
	$usrcre_id = $GetProfile['id'];
	$LoginName = $Admin_name;
	$style_permission="";
	$style_permission_staff="";
	$QryForAllocation = '';
	$fltrApprov="";
}
else{
	$fltrApprov="";
	$GetProfile = $db->singlerec("select userimages,username,dept_id,email_id from gen_user_mst where user_auto_id='$AdminId'");
	$Pro_Picture = $GetProfile['userimages'];
	$usrcre_name = $GetProfile['username'];
	$user_images = $GetProfile['userimages'];
	$login_dept_id = $GetProfile['dept_id'];
	$LoginName = @ucfirst($_SESSION['usrName']);
	$usrcre_email = $GetProfile['email_id'];
	$style_permission="style='display:none;'";
	$style_permission_staff="style='display:none;'";
	$QryForAllocation = "and emp_id='$Adminusrtype_id'";
	if($login_dept_id==1){
		$fltrApprov = "and b.approve_st='1'";
	}
	else if($login_dept_id==2){
		$fltrApprov = "and b.approve_st1='1' and b.approval_by1 !=''";
	}	
}
if($livepage=="welcome.php")
	$style_permission_hd="";
else
	$style_permission_hd="style='display:none;'";

?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?echo $sitetitle;?></title>
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
        <!--Switchery [ OPTIONAL ]-->
        <link href="plugins/jvectormap/jquery-jvectormap.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jquery-steps.min.css" rel="stylesheet">
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
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="welcome" class="navbar-brand">
                            
                            <div class="brand-title">
                                <span class="brand-text"><?echo $sitetitle;?></span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-right">
                            <!--Profile toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"><img class="img-circle img-user media-object" src="uploads/userimages/<?echo $user_images;?>"></span>
                                    <div class="username hidden-xs"><?echo $LoginName;?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <!--<li>
                                            <a href="#"> <i class="fa fa-user fa-fw fa-lg"></i> Profile </a>
                                        </li>
                                        <li>
                                            <a href="#">  <i class="fa fa-envelope fa-fw fa-lg"></i> Messages </a>
                                        </li>-->
                                        <li>
                                            <a href="general">  <i class="fa fa-gear fa-fw fa-lg"></i> Impostazioni </a>
                                        </li>
                                        <li>
                                            <a href="logout"> <i class="fa fa-sign-out fa-fw"></i> Esci </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                            <!--Navigation toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs">
                                <a id="demo-toggle-aside" href="#">
                                <i class="fa fa-navicon fa-lg"></i>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Navigation toogle button-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->