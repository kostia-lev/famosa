<?
include "admin/AMframe/config.php";

if(isset($ref)) {
	$ref=trim(addslashes($ref));
	$chk=$db->check1column("mail_verification", "code", $ref);
	if($chk==1) {
		$dt=$db->singlerec("select * from mail_verification where code='$ref'");
		$db->singlerec("update register set email_verified=1 where email='".$dt['email']."'");
		$db->singlerec("delete from mail_verification where code='$ref' and email='".$dt['email']."' limit 1");
		echo "<script>location.href='$siteurl?verified';</script>";
		header("Location: $siteurl?verified"); exit;
	}
	else {
		echo "<script>location.href='$siteurl';</script>";
		header("Location: $siteurl"); exit;
	}
}
else {
	echo "<script>location.href='$siteurl';</script>";
	header("Location: $siteurl"); exit;
}
?>