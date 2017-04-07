<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Recensioni </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active"> Recensioni </li>
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
		$RemoveImage = "../images/testimonial/$img";
		@unlink($RemoveImage);
	}
    $db->insertrec("delete from testimonial where id='$id'");
    header("location:testimonial?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update testimonial set active_status='0' where id='$id'");
    header("location:testimonial?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update testimonial set active_status='1' where id='$id'");
    header("location:testimonial?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from testimonial order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$name=$GetRecord[$i]['name'];
	$comment=$GetRecord[$i]['comment'];
	$img=$GetRecord[$i]['image'];
	$active_status = $GetRecord[$i]['active_status'] ;
	$usercre = $GetRecord[$i]['posted_at'] ;
	$usercre=date("d/M/Y", $usercre);
	
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
		$EditLink = "<a href='testimonialupd?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$name</td>
				<td  align='left'><img src='../images/testimonial/$img' width='50px'></td>
				<td  align='left'>$comment</td>
				<td  align='left'>$usercre</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='testimonialview?id=$idvalue&status=$active_status' title='View User Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='testimonial?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='testimonial?id=$idvalue&act=del&img=$img' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<font color='green'><b>Recensione cancellata</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Recensione aggiornata</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Recensione aggiunta</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Stato recensione cambiato</b></font>" ;
?>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="testimonialupd?upd=1">Aggiungi recensione</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Nome</th>
											<th>Immagine</th>
											<th>Recensione</th>
											<th>Inserita il</th>
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
