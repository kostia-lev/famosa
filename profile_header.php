<?

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
	exit('Accesso non consentito') ;
}

if(!$_SESSION["usr"]) {
	echo "<script>location.href='$siteurl?nl';</script>";
	header("Location: $siteurl?nl"); exit;
}
$ref = "email='".$_SESSION['usr']."'";
$row=$db->singlerec("select * from register where $ref");
if($_SESSION['usr']!=$row['email']) {
	session_destroy();
	echo "<script>location.href='$siteurl';</script>";
	header("Location: $siteurl"); exit;
}

if(isset($prof_upd)) {

	$usr = $_SESSION['usr'];

    $agent_ref=trim(addslashes($agent_ref));
    $name=trim(addslashes($fullname));
	$email=trim(addslashes($email));

	$db->insertrec("update listings set email='$email' where email='$usr'");

    $mobile=trim(addslashes($mobile));
    $site=trim(addslashes($website));
    $dtl=trim(addslashes($details));
    $set = "agent_ref='$agent_ref',";
	$set .= "fullname='$name',";
	$set .= "email='$email',";
	$set .= "mobile='$mobile',";
	$set .= "website='$site',";
	$set .= "details='$dtl'";
	$db->insertrec("update register set $set where email='".$_SESSION['usr']."'");

	$_SESSION['usr'] = $email;

	echo "<script>swal('Complimenti', 'Il tuo profilo è stato aggiornato con successo!', 'success')</script>";
	echo "<script>location.href='$siteurl/my-account'</script>";
	header("Location: $siteurl/my-account");
	exit;
}

if(isset($chpass)) {
	$cpass=trim(addslashes($cpass));
	$npass=trim(addslashes($npass));
	$rpass=trim(addslashes($rpass));
	$epass=md5($npass);
    
	$checkcpass=$db->check2column("register", "password", $cpass, "email", $_SESSION['usr']);
	if($checkcpass==0) {
		echo "<script>swal('Errore', 'La password inserita non è corretta!', 'error')</script>";
	}
	else {
			if($npass!=$rpass) {
					echo "<script>swal('Errore', 'La password inserita non corrisponde!', 'error')</script>";
			}
			else {
				   $set = "password='$npass',";
				   $set .= "encr_password='$epass'";
				   $db->insertrec("update register set $set where email='".$_SESSION['usr']."'");
				   echo "<script>swal('Complimenti', 'La tua password è stata aggiornata con successo!', 'success')</script>";
			}
	}
}

if(isset($updsoc)) {
    $fburl=trim(addslashes($fb));
	$twturl=trim(addslashes($twt));
	$skpid=trim(addslashes($skp));	 
	$set = "facebook='$fburl',";
	$set .= "twitter='$twturl',";
	$set .= "skype='$skpid'";
	$db->insertrec("update register set $set where email='".$_SESSION['usr']."'");
	echo "<script>swal('Complimenti', 'Il tuo profilo social è stato aggiornato con successo!', 'success')</script>";
}

if(isset($nletter)) {
     if($rcv==1&&$agreed==1) {
	        $name=stripslashes($row['fullname']);
			$mail=stripslashes($row['email']);
			$ip=$_SERVER['REMOTE_ADDR'];
			$time=time();
			$check=$db->check1column("newsletter", "email", $mail);
			if($check==0) { 
				$set="name='$name',";
				$set.="email='$mail',";
				$set.="ip='$ip',";
				$set.="date='$time'";
				$db->insertrec("insert into newsletter set $set");
				echo "<script>swal('Complimenti', 'Ti sei iscritto con successo alla Newsletter!', 'success')</script>";
			}
			else {
				echo "<script>swal('Errrore', 'Sei già iscritto alla Newsletter!', 'error')</script>";
			}
	    }
		else if($rcv==0&&$agreed==0 || $rcv==1&&$agreed==0 || $rcv==0&&$agreed==1) {
				echo "<script>swal('Errore', 'Non sei iscritto alla Newsletter!', 'error');</script>";
	    }
}

if(isset($prf_img)) {
	$file=$_FILES['file']['tmp_name'];
	$temp = explode(".", $_FILES["file"]["name"]);
	$ext = end($temp);
	list($width,$height,$type,$attr) = getimagesize($file);
	$mime = image_type_to_mime_type($type);
	if(($mime != "image/jpeg") && ($mime != "image/jpeg") && ($mime != "image/png")) {
			echo "<script>swal('Errore', 'Formato di immagine non riconosciuto, prova caricando una foto con formato jpg o png!', 'error')</script>";
	}
	else if($width<150 || $height<150) {
		echo "<script>swal('Errore', 'L\'immagine deve essere grande almeno 150x150 pixel!', 'error');</script>";
	}
	else {
			$newname = 'user_xe'.$row['id'];
			$org='images/user/org/'.$newname.'.'.$ext;
			$prf='images/user/'.$newname.'.'.$ext;
			move_uploaded_file($file, $org);
			$resizeObj = new resize($org);		
			$resizeObj -> resizeImage(200, 200, 'auto');
			$resizeObj -> saveImage($prf, 100);	
			@unlink($org);
			$imgurl = $newname.'.'.$ext;
			$set = "prof_image='$imgurl'";
			$db->insertrec("update register set $set where email='".$_SESSION["usr"]."'");
			echo "<script>location.href='my-account';</script>";
			header("Location: my-account"); exit;
	}
}
?>