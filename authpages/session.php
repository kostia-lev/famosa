<?
//include "admin/AMframe/config.php";

if($_POST['login']) {
   $email=trim(addslashes($_POST['email']));
   $pass=trim($_POST['password']);
   
   if($email!='' && $pass!='') {
	   //$check=$db->singlerec("select * from register where email='$email' and password='$pass'");
       $check = $GLOBALS['db']->
       getAllinsertIdPreparedStatement("select * from register where email=? and encr_password=?", 'ss', [$email, md5($pass)]);

       if($check) {
			if($check[0]['active']==0) {
			    $_SESSION["vrf_usr"]=$email;
				header("Location: $siteurl??inactive"); exit;
			}
			else {
				$_SESSION["usr"]=$email;
				header("Location: dashboard"); exit;
			}
		} 
		else {
			header("Location: $siteurl?lerror"); exit;
		}
    }
	else {
		header("Location: $siteurl?lmt"); exit;
	}
}
else {
	header("Location: $siteurl"); exit;
}

?>