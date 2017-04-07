<?
include "admin/AMframe/config.php";

if(isset($signup)) {
		$fullname=trim(addslashes($fullname));
		$fullname=preg_replace("/[^A-Za-z0-9 ]/", "", $fullname);
		$role=trim(addslashes($role));
		$email=trim(addslashes($email));
		$mobile=trim(addslashes($mobile));
		$pass=trim(addslashes($password));
		$cpass=trim(addslashes($cpassword));
		$epass=md5($pass);
		$time=time();
		$ip=$_SERVER['REMOTE_ADDR'];
		$checkmail=$db->check1column("register", "email", $email);
		if($checkmail==1) {
				echo "<script>location.href='$siteurl?rmerr';</script>";
				header("Location: $siteurl?rmerr"); exit;		  
		}
		else if($pass!=$cpass) {
				echo "<script>location.href='$siteurl?rperr';</script>";
				header("Location: $siteurl?rperr"); exit;
		}
		else {
		    $randuniq = $com_obj->randuniq();
			$set="randuniq='$randuniq',";
			$set.="fullname='$fullname',";
			$set.="role='$role',";
			$set.="email='$email',";
			$set.="mobile='$mobile',";
			$set.="password='$pass',";
			$set.="encr_password='$epass',";
			$set.="prof_image='noimage.jpg',";
			$set.="ip_addr='$ip',";
			$set.="active=0,";
			$set.="created_at='$time',";
			$set.="updated_at='$time'";
			$db->insertrec("insert into register set $set");
			$mset="email='$email',";
			$mset.="code='$randuniq'";
			$db->insertrec("insert into mail_verification set $mset");
			$url="".$siteurl."/verify_mail?ref=$randuniq";
			$com_obj->signup_mail($siteemail,$email,$url);
			$_SESSION["vrf_usr"]=$email;
			echo "<script>location.href='$siteurl?rdone';</script>";
			header("Location: $siteurl?rdone"); exit;
		}
}
else {
	echo "<script>location.href='$siteurl';</script>";
	header("Location: $siteurl"); exit;
}
?>