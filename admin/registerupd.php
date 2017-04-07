<? include "header.php"; 

$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act  = isSet($act) ? $act : '' ;
$page  = isSet($page) ? $page : '' ;
$Message   = isSet($Message) ? $Message : '' ;
$password = isset($password)?$password:'';
$encr_password  = isSet($encr_password) ? $encr_password : '' ;
$name  = isSet($name) ? $name : '' ;
$mobile  = isSet($mobile) ? $mobile : '' ;
$email  = isSet($email) ? $email : '' ;
$website  = isSet($website) ? $website : '' ;
$nimg = isset($nimg)?$nimg:'';
$DisplayDeleteImgLink = isset($DisplayDeleteImgLink)?$DisplayDeleteImgLink:''; 
$Img_Ext = isset($Img_Ext)?$Img_Ext:'';
$ShowOldImg = "style='display:none;'";
$psw = isset($psw)?$psw:'';
$img = isSet($img) ? $img : '' ;

if($act ==  "del" && $nimg != "") {
    $RemoveImage = "../images/user/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update register set prof_image = 'noimage.jpg' where id='$id'");
    header("Location:registerupd?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}
if($submit) {
    $crcdt = time();
	$ip=$_SERVER['REMOTE_ADDR'];
    $name = trim(addslashes($name));
	$role= trim(addslashes($role));
	$password_length = strlen($password);
	$dpassword = $password;
	$encr_password = trim(addslashes($password));
	$encr_password = md5($encr_password);
	$mobile = trim(addslashes($mobile));
	$email = trim(addslashes($email));
	
	if($_FILES['UsrImage']['tmp_name'] != "" && $_FILES['UsrImage']['tmp_name'] != "null") {
		$fpath = $_FILES['UsrImage']['tmp_name'] ;
		$fname = $_FILES['UsrImage']['name'] ;
		$getext = substr(strrchr($fname, '.'), 1);
		$Img_Ext = strtolower($getext); 
	}
	if($Img_Ext == "jpg" || $Img_Ext == "jpeg" || $Img_Ext == "gif" || $Img_Ext == "png" || $Img_Ext == ''){
		if($password_length >= 4){
			$set  = "fullname = '$name'"; 
			$set  .= ",role = '$role'";
			$set  .= ",mobile = '$mobile'";
			$set  .= ",email = '$email'";		
			if($password !=""){
				$set  .= ",password = '$dpassword'";  		
				$set  .= ",encr_password = '$encr_password'";
			}
			if($upd == 1){
			    $randuniq = $com_obj->randuniq();
				$set  .= ",created_at = '$crcdt'";    
				$set  .= ",active = 1";
				$set  .= ",randuniq='$randuniq'";
				$set .= ",ip_addr='$ip'";
				$set .= ",mplan=0";
				$set .= ",canpost=2";
				$set .= ",canpost_avail=2";
				$idvalue = $db->insertid("insert into register set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",updated_at = '$crcdt'";    
				$db->insertrec("update register set $set where id='$idvalue'");
				$act = "upd";
			}
			if($_FILES['UsrImage']['tmp_name'] != "" && $_FILES['UsrImage']['tmp_name'] != "null") {
				$fpath = $_FILES['UsrImage']['tmp_name'] ;
				$fname = $_FILES['UsrImage']['name'] ;
				$getext = substr(strrchr($fname, '.'), 1);
				$ext = strtolower($getext);
				$NgImg= "userxe_".$idvalue.".".$ext;	
				$set_img = "prof_image = '$NgImg'" ;
				$des = "../images/user/$NgImg";
				move_uploaded_file($fpath,$des) ;
				chmod($des,0777);
				$iimg=$db->insertrec("select prof_image from register where id='$idvalue'");
				if($iimg !="noimage.jpg"){
					$RemoveImage = "../images/user/$nimg";
					@unlink($RemoveImage);
				}
				$db->insertrec("update register set $set_img where id='$idvalue'");
			}
			echo "<script>location.href='register?act=$act';</script>";
			header("location:register?act=$act");
			exit;		
		}
		else {
			header("location:registerupd?&id=$idvalue&upd=$upd&act=ps");
			exit;
		}
	}
	else{
		header("location:registerupd?&id=$idvalue&upd=$upd&act=img");
		exit;
	}
} 

$GetRecord = $db->singlerec("select * from register where id='$id'");
@extract($GetRecord);
$img = $prof_image;

//code for images 
if($img == "noimage.jpg") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '';
    }
else if($img != "") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '<a href="registerupd?upd=2&act=del&nimg='.$img.'&id='.$id.'">Cancella immagine</a>';
    }

if($upd==2){
	$TextChange = "Modifica";
	$imghid = "";
	if($psw == 1){$passshow = "<b><font color='green'>La password decriptata &egrave;: $password</font></b>";}
else{$passshow = "<span><a href='registerupd?upd=$upd&id=$id&page=$page&psw=1'>Scopri password</a></span>";}
}
else{
	$TextChange = "Aggiungi";
	$imghid = "style='display:none;'";
	$passshow = "";
}

if($act == "ps")
	$Message = "<b><font color='red'>Inserisci almeno 4 caratteri!</font></b>";
else if($act == "img")
	$Message = "<b><font color='red'>Sono supportati i seguenti formati di immagini: png, jpg, jpeg, gif</font></b>" ;

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-users"></i>Gestione utenti </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">Percorso:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome"> Home </a> </li>
					<li class="active"> Gestione utenti </li>
				</ol>
			</div>
		</div>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> utente <?echo $Message;?></h3>
						</div>
						<form class="form-horizontal" method="post" action="registerupd" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Nome e Cognome <font color="red">*</font></td>
										<td><input type="text" name="name" class="form-control" id="name" placeholder="Inserisci nome e cognome" value="<? echo $fullname; ?>">
										</td>
									</tr>
									<tr>
										<td>Ruolo <font color="red">*</font></td>
										<td><select class="form-control" name="role" id="role">
												<option value="agente" <? if(@$role=='agente') echo "selected"; ?>>Agente</option>
												<option value="broker" <? if(@$role=='broker') echo "selected"; ?>>Broker</option>
										</td>
									</tr>
									<tr>
										<td>Password <font color="red">*</font></td>
										<td><input type="password" class="form-control" id="password" name="password" size="40"  value="<? echo $password; ?>" placeholder="Inserisci password" >
										<? echo $passshow; ?>
										</td>
									</tr>
									<tr>
										<td>Telefono <font color="red">*</font></td>
										<td><input type="text" class="form-control" id="mobile" name="mobile" value="<? echo $mobile; ?>" placeholder="Inserisci numero di telefono" maxlength="10" onkeypress = "return InpOnlyNumbers(event)"></td>
									</tr>
									<tr>
										<td>Email <font color="red">*</font></td>
										<td><input type="email" class="form-control" id="email" name="email" placeholder="Inserisci email" value="<? echo $email; ?>"></td>
									</tr>
									<tr>
										<td>Foto profilo</td>
										<td><span <?echo $imghid;?>><img src="../images/user/<? echo $prof_image; ?>"><br><? echo $DisplayDeleteImgLink; ?></span>
										<input name="UsrImage" type="file" style="margin-top:15px;margin-left:10px;"></td>
									</tr>
									<tr>
										<td></td><td colspan="3"><span id="DispResign"></span></td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Salva"></div>
								<a class="btn btn-info" href="register">Indietro</a>
							</div>
						</form>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
				</div>
			  </div>
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
	</div>
	<!--===================================================-->
	<!--END CONTENT CONTAINER-->
	<? include "leftmenu.php"; ?>
</div>
<? include "footer.php"; ?>