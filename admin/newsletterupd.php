<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i> Newsletter </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">Percorso:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome"> Home </a> </li>
					<li class="active"> Newsletter </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$name = isSet($name) ? $name : '' ;
$email = isSet($email) ? $email : '' ;

if($submit) {
    $crcdt = time();
	$name = trim(addslashes($name));
	$email = trim(addslashes($email));
	$ip=$_SERVER['REMOTE_ADDR'];
		$checkStatus = $db->check1column("newsletter","email",$email);
	if($name != null && $email != null) {
		if ($upd == 2)
			$checkStatus = 0;

		if ($checkStatus == 0) {
			$set = "name = '$name'";
			$set .= ",email = '$email'";
			if ($upd == 1) {
				$set .= ",ip = '$ip'";
				$set .= ",date = '$crcdt'";
				$idvalue = $db->insertid("insert into newsletter set $set");
				$act = "add";
			} else if ($upd == 2) {
				$set .= ",ip = '$ip'";
				$db->insertrec("update newsletter set $set where id='$idvalue'");
				$act = "upd";
			}
			header("location:newsletter?page=$pg&act=$act");
			exit;
		} else {
			$id = $idvalue;
			$Message = "<font color='red'>$email gi&aacute; esistente!</font>";
		}
	}else{
		$Message = "<font color='red'>Errore, compila tutti i campi!</font>";
	}
}
if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Aggiungi";
}
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Modifica";
}
	
$GetRecord = $db->singlerec("select * from newsletter where id='$id'");
@extract($GetRecord);
$name = stripslashes($name);
$comment = stripslashes($comment);
	
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> iscritto alla newsletter </h3>
						</div>
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Nome <font color="red">*</font></td>
										<td><input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Email <font color="red">*</font></td>
										<td><input type="text" name="email" id="email" value="<? echo $email; ?>" class="form-control">
										</td>
									</tr>
								</table>
								<div class="text-left">
									</br><?php echo $Message; ?>
								</div>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Aggiungi"></div>
								<a class="btn btn-info" href="newsletter">Indietro</a>
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