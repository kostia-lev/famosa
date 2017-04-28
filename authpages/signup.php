<?
//include "admin/AMframe/config.php";

if(isset($_POST['signup'])) {
		$fullname=trim(addslashes($_POST['fullname']));
		$fullname=preg_replace("/[^A-Za-z0-9 ]/", "", $fullname);
		$role=trim(addslashes($_POST['role']));
		$email=trim(addslashes($_POST['email']));
		$mobile=trim(addslashes($_POST['mobile']));
		$pass=trim($_POST['password']);
		$cpass=trim(addslashes($_POST['cpassword']));
		$epass=md5($pass);
		$time=time();
		$ip=$_SERVER['REMOTE_ADDR'];
		$checkmail = $GLOBALS['db']->check1column("register", "email", $email);
		if($checkmail==1) {
				//echo "<script>location.href='$siteurl?rmerr';</script>";
				header("Location: $siteurl?rmerr"); exit;		  
		}
		else if($pass!=$cpass) {
				//echo "<script>location.href='$siteurl?rperr';</script>";
				header("Location: $siteurl?rperr"); exit;
		}
		else {
		    $randuniq = $com_obj->randuniq();
			$set="randuniq='$randuniq',";
			$set.="fullname=?,";
			$set.="role=?,";
			$set.="email=?,";
			$set.="mobile=?,";
			$set.="password=?,";
			$set.="encr_password=?,";
			$set.="prof_image='noimage.jpg',";
			$set.="ip_addr='$ip',";
			$set.="active=0,";
			$set.="agent_ref='',";
			$set.="facebook='',";
			$set.="twitter='',";
			$set.="skype='',";
			$set.="created_at='$time',";
			$set.="updated_at='$time'";

            $insertTypes = 'ssssss';
            $insertParams = [$insertTypes, $fullname, $role, $email, $mobile, $pass, $epass];

            $out = $GLOBALS['db']->insertIdPreparedStatement("insert into register set $set", $insertParams);

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