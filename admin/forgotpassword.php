<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Forgot Password </title>
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
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
        <!--Jquery Tag It [ OPTIONAL ]-->
        <link href="plugins/tag-it/jquery.tagit.css" rel="stylesheet">
        <!--Ion.RangeSlider [ OPTIONAL ]-->
        <link href="plugins/ion-rangeslider/ion.rangeSlider.css" rel="stylesheet">
        <link href="plugins/ion-rangeslider/ion.rangeSlider.skinNice.css" rel="stylesheet">
        <!--Chosen [ OPTIONAL ]-->
        <link href="plugins/chosen/chosen.min.css" rel="stylesheet">
        <!--noUiSlider [ OPTIONAL ]-->
        <link href="plugins/noUiSlider/jquery.nouislider.min.css" rel="stylesheet">
        <link href="plugins/noUiSlider/jquery.nouislider.pips.min.css" rel="stylesheet">
        <!--Bootstrap Timepicker [ OPTIONAL ]-->
        <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <!--Bootstrap Datepicker [ OPTIONAL ]-->
        <link href="plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
        <!--Dropzone [ OPTIONAL ]-->
        <link href="plugins/dropzone/dropzone.css" rel="stylesheet">
        <!--Summernote [ OPTIONAL ]-->
        <link href="plugins/summernote/summernote.min.css" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="css/demo/jasmine.css" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="plugins/pace/pace.min.css" rel="stylesheet">
        <script src="plugins/pace/pace.min.js"></script>
		<script type="text/javascript" src="./admin/js/header.js"></script> 
		<script type="text/javascript" src="js/register.js"></script> 
	
</head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="cls-container">
            <!-- REGISTRATION FORM -->
            <!--===================================================-->
            <div class=" container-fluid">
                <div class="panel container">
					<?
					include "/AMframe/config.php";
					ob_start();
					$submit = isset($submit)?$submit:'';
					$Message = isset($Message)?$Message:'';
					if($submit){
						if($pass==$cfpass){
							$checkStatus = $db->check2column("register","user_profileid",$user_profileid,"email",$email);
							if($checkStatus==1){
								$encpass = md5($pass);
								$set = "password='$encpass'";
								$set .= ",decript_password='$pass'";
								$db->insertrec("update register set $set where user_profileid='$user_profileid' and email='$email'");
								echo "<script>location.href='login.php?act=scs';</script>";
							}
							else{
								$Message = "<font color='red'>Invalid Email and Profile ID !.</font>";
							}
						}
						else{
							$Message = "<font color='red'>Password doesn't match !.</font>";
						}
					}
					?>
				  <!-- Tab panes -->
					<div class="tab-content">
						<div class="row">
						<form id="registration" class="form-horizontal" action="forgotpassword.php" style="padding:3%" method="post" enctype="multipart/form-data">                        
							<div class="row">
								<div class=" form-group pdt10 col-sm-5">
									<label class="col-xs-5">Email Id:<span style="color:red;font-size:12;"> *</span></label>
									<div class="col-xs-7"><input type="email" name="email"  class="form-control" required></div><br/><br/>
									<label class="col-xs-5">User Profile ID:<span style="color:red;font-size:12;"> *</span></label>
									<div class="col-xs-7"><input type="text" name="user_profileid"  class="form-control" required></div><br/><br/>
									<label class="col-xs-5">New Password:<span style="color:red;font-size:12;"> *</span></label>
									<div class="col-xs-7"><input type="password" name="pass"  class="form-control" required></div><br/><br/>
									<label class="col-xs-5">Confirm Password:<span style="color:red;font-size:12;"> *</span></label>
									<div class="col-xs-7"><input type="password" name="cfpass"  class="form-control" required></div><? echo $Message;?><br/><br/>
									<label class="col-xs-5"></label>
									<div class="col-xs-7"><input type="submit" name="submit" class="form-control"></div>
								</div>
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
         <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--jQuery UI [ REQUIRED ]-->
        <script src="js/jquery-ui.min.js"></script>
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
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <script src="plugins/tag-it/tag-it.min.js"></script>
        <!--Chosen [ OPTIONAL ]-->
        <script src="plugins/chosen/chosen.jquery.min.js"></script>
        <!--Dropzone [ OPTIONAL ]-->
        <script src="plugins/dropzone/dropzone.min.js"></script>
        <!--Summernote [ OPTIONAL ]-->
        <script src="plugins/summernote/summernote.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/jasmine.js"></script>
		<!--Bootstrap Datepicker [ OPTIONAL ]-->
        <script src="plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
		<script src="js/datepicker.js"></script>
    </body>
</html>