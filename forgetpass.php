<?
include "admin/AMframe/config.php";

if(isset($fpass)) {
    $mail=trim(addslashes($mail));
	$chk=$db->check1column("register", "email", $mail);
	if($chk==1) {
	    $c=$db->singlerec("select * from register where email='$mail'");
	    $usr=$c['email'];
		$pass=$c['password'];
	    $msg="Your password is <b><i>$pass</i></b><br><br> Click the below link to login back to the site,<br><br><a href='$siteurl?nl'>Click here</a>";
		$com_obj->email($siteemail, $mail, "Password Reset Mail", $msg);
		echo "<script>location.href='$siteurl?fpmail';</script>";
		header("Location: $siteurl?fpmail"); exit;
	}
	else {
		echo "<script>location.href='$siteurl?cmail';</script>";
		header("Location: $siteurl?cmail"); exit;
	}
}
else {
	echo "<script>location.href='$siteurl';</script>";
	header("Location: $siteurl"); exit;
}
?>