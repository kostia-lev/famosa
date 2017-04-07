<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Gestione immobili </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active">Gestione immobili </li>
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
		$RemoveImage = "../images/prop/$nimg";
		@unlink($RemoveImage);
	}
    $db->insertrec("delete from listing_images where pid='$id'");
	$db->insertrec("delete from listings where id='$id' limit 1");
	echo "<script>location.href='prop?act='del'';</script>";
    header("location:prop?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update listings set post_sts=0 where id='$id'");
	echo "<script>location.href='prop?act=sts';</script>";
    header("location:prop?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update listings set post_sts=1 where id='$id'");
	echo "<script>location.href='prop?act=sts';</script>";
    header("location:prop?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from listings order by id desc");
$GetUser = $db->singlerec("select * from register where email='" . $email . "' limit 1");
if(count($GetRecord)==0)
    $Message="Nessun risultato trovato!";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$title=$GetRecord[$i]['prop_title'];
	$email=$GetRecord[$i]['email'];
    $location=$GetRecord[$i]['location'];
	$address=$GetRecord[$i]['address'];
	$price=$GetRecord[$i]['exp_price'];
    $type=$GetRecord[$i]['types'];
    $type=ucwords($type);
	$cat=$GetRecord[$i]['category'];
	$cat=ucwords($cat);
	$prop_for=$GetRecord[$i]['prop_for'];
	$prop_for=ucwords($prop_for);
	$active_status = $GetRecord[$i]['post_sts'] ;
	$usercre = $GetRecord[$i]['posted_at'] ;
	$usercre = date("d/M/Y", $usercre);
	$GetImage=$db->singlerec("select * from listing_images where pid='$idvalue' limit 1");
    $GetUser = $db->singlerec("select * from register where email='" . $email . "' limit 1");

    $fullname = $GetUser['fullname'];

    @extract($GetImage);
	
	$slno = $i + 1 ;
	if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
		}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='propupd?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'><img src='../images/prop/74_46/$image' width='50px'></td>
				<td  align='left'>$title</td>
				<td  align='left'>$email</td>
				<td  align='left'>$fullname</td>
				<td  align='left'>$location</td>
				<td  align='left'>$price</td>
				<td  align='left'>";
    $disp .= str_replace('-', ' ', $type);
    $disp .="</td>
				<td  align='left'>";
    $disp .= str_replace('-', ' ', $cat);
    $disp .="</td>
				<td  align='left'>$prop_for</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='propview?id=$idvalue&status=$active_status' title='Vedi dettagli' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='prop?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='prop?id=$idvalue&act=del&img=$image' onclick=\"return confirm('Sei sicuro di voler cancellare questo immobile?');\" class='btn btn-default' title='Elimina' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<font color='green'><b>Immobile cancellato</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Immobile modificato</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Immobile aggiunto</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Stato immobile cambiato</b></font>" ;
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="propupd?upd=1">Aggiungi immobile</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>ID</th>
											<th>Immagine</th>
											<th>Titolo</th>
											<th>Email</th>
                                            <th>Utente</th>
                                            <th>Citt&aacute;</th>
											<th>Prezzo</th>
											<th>Tipo</th>
                                            <th>Categoria</th>
                                            <th>Immobile in</th>
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
