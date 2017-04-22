<?
include "admin/AMframe/config.php";

if(isset($cont_agent)) { //Form contatta agente
	$name=trim(addslashes($name));
	$email=trim(addslashes($email));
	$mobile=trim(addslashes($mobile));
	$sub=trim(addslashes($sub));
	$message=trim(addslashes($message));
	$propniq=$_SESSION['prop_randuniq'];

	//Search property in DB
	$prop=$db->singlerec("select * from listings where randuniq='$propniq'");
	$urlprop= $prop['slug'];
	$proptitle=$prop['prop_title'];

	if(isset($_SESSION['usr'])) { $fmail=$_SESSION['usr']; }
	else { $fmail=$email; }
	$tomail=$_SESSION['tomail'];
	$user_niq=$_SESSION['agent_randuniq'];
	$time=time();

	$set.="user_email='$tomail',";
	$set.="user_niq='$user_niq',";
	$set.="prop_niq='$propniq',";
	$set.="name='$name',";
	$set.="email='$fmail',";
	$set.="mobile='$mobile',";
	$set.="sub='$sub',";
	$set.="message='$message',";
	$set.="request_date='$time'";
	$db->insertrec("insert into requests set $set");

	$subject = "Nuova richiesta di contatto per immobile!";

	$msg .= "
	<html>
	<body>
	<div align='center'>
		<table border='0' cellpadding='5' cellspacing='5' width='100%'>
			<tbody>
			<tr>
				<th>
					<img src='$siteurl/assets/images/logo.png' alt='logo'>
					<br>
				</th>
			</tr>
			<tr>
				<td style='text-align: left;' valign='top'>
					Nome: $name
					<br>
					Telefono: $mobile
					<br>
					Email: $fmail
					<br>
					Oggetto: $sub
					<br>
					Messaggio: $message
					<br>
					Immobile: <a href='$siteurl/listing/$propniq/$urlprop'>$proptitle</a>
					<br>
				</td>
			</tr>
			<tr>
				<td style='text-align: left;'>
					<i>Richiesta arrivata dal sito principale.
					</i>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
	
	</body>
	</html>
	";

	$com_obj->email($fmail, $tomail, $subject, $msg);
	unset($_SESSION['tomail']);
	echo "<script>location.href='$siteurl?cmailsent'</script>";
	header("Location: $siteurl?cmailsent"); exit;
}
if(isset($cont_us)) { //Form contatto sito
	$name=trim(addslashes($name));
	$email=trim(addslashes($email));
	$mobile=trim(addslashes($mobile));
	$message=trim(addslashes($message));

	$sub="Nuova richiesta dal form di contatto del sito!";

	$msg .= "
	<html>
	<body>
	<div align='center'>
		<table border='0' cellpadding='5' cellspacing='5' width='100%'>
			<tbody>
			<tr>
				<th>
					<img src='$siteurl/assets/images/logo.png' alt='logo'>
					<br>
				</th>
			</tr>
			<tr>
				<td style='text-align: left;' valign='top'>
					Nome: $name
					<br>
					Telefono: $mobile
					<br>
					Email: $email
					<br>
					Messaggio: $message
					<br>
				</td>
			</tr>
			<tr>
				<td style='text-align: left;'>
					<i>Richiesta arrivata dal sito principale.
					</i>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
	
	</body>
	</html>
	";

	$com_obj->email($email, $siteemail, $sub, $msg);
	echo "<script>location.href='$siteurl?cmailsent'</script>";
	header("Location: $siteurl?cmailsent"); exit;
}
else {
	echo "<script>location.href='$siteurl'</script>";
	header("Location: $siteurl"); exit;
}
?>