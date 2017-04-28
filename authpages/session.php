<?
include "admin/AMframe/config.php";

if($login) {
   $email=trim(addslashes($email));
   $pass=trim(addslashes($password));
   
   if($email!='' && $pass!='') {
	   $check=$db->singlerec("select * from register where email='$email' and password='$pass'");
	   if($check) {
			if($check['active']==0) {
			    $_SESSION["vrf_usr"]=$email;
				echo "<script>location.href='$siteurl?inactive';</script>";
				header("Location: $siteurl??inactive"); exit;
			}
			else {
				$_SESSION["usr"]=$email;
				echo "<script>location.href='dashboard';</script>";
				header("Location: dashboard"); exit;
			}
		} 
		else {
			echo "<script>location.href='$siteurl?lerror';</script>";
			header("Location: $siteurl?lerror"); exit; 
		}
    }
	else {
		echo "<script>location.href='$siteurl?lmt';</script>";
		header("Location: $siteurl?lmt"); exit;
	}
}
else {
	echo "<script>location.href='$siteurl';</script>";
	header("Location: $siteurl"); exit;
}

?>