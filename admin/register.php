<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-users"></i> Utenti </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active">Utenti </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
	if($img !="noimage.jpg"){
		$RemoveImage = "../images/user/$img";
		@unlink($RemoveImage);
	}
    $user=$db->singlerec("select * from register where id='$id' limit 1");
    $user_email = $user['email'];

    $db->insertrec("delete from mail_verification where email='$user_email' limit 1");
    $db->insertrec("delete from register where id='$id' limit 1");
    echo "<script>location.href='register?act='del'';</script>";
    header("location:register?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update register set active='0' where id='$id'");
	echo "<script>location.href='register?act=sts';</script>";
    header("location:register?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update register set active='1' where id='$id'");
	echo "<script>location.href='register?act=scs';</script>";
    header("location:register?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from register where id !=0 order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
   @extract($GetRecord[$i]);
    $idvalue = $GetRecord[$i]['id'];
	$email=$GetRecord[$i]['email'];
	$mobile=$GetRecord[$i]['mobile'];
	$crcdt=$GetRecord[$i]['created_at'];
	$created=date("d/M/Y", $crcdt);
	$slno = $i + 1 ;
	if($mplan==0) $mplan="Free";
	if($mplan==1) $mplan="Silver";
	if($mplan==2) $mplan="Gold";
	if($mplan==3) $mplan="Platinum";
    if($active == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Attiva";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
	}	
    else if($active == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Disattiva";
		$status_active = "Active";
		$EditLink = "<a href='registerupd?upd=2&id=$idvalue' title='Modifica' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td><img src='../images/user/$prof_image' width='30px'></td>
				<td  align='left'>$fullname</td>
				<td  align='left'>$role</td>
				<td  align='left'>$email</td>
				<td  align='center'>$mobile</td>
				<td  align='center'>$ip_addr</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='registerview.php?id=$idvalue&status=$active' title='Vedi dettagli' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
				<a href='register?id=$idvalue&status=$active' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
				$EditLink
				<a href='register?id=$idvalue&act=del&img=$prof_image' onclick=\"return confirm('Sei sicuro di voler cancellare questo utente?');\" class='btn btn-default' title='Elimina' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}
if($act == "'del'")
    $Message = "<font color='green'><b>Utente cancellato</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Utente aggiornato</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Utente aggiunto</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Stato aggiornato</b></font>" ;
?>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-headin">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
							<div class="col-sm-12 text-right"><a class="btn btn-info" href="registerupd?upd=1">Aggiungi utente</a></div>
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>ID</th>
											<th>Immagine</th>
											<th>Nome</th>
											<th>Ruolo</th>
											<th>Email</th>
											<th>Telefono</th>
											<th>Indirizzo IP</th>
											<th class='cntrhid'>Azione</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
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