<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> News </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome"> Home </a> </li>
                                <li class="active">News </li>
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
		$RemoveImage = "../images/news/$nimg";
		@unlink($RemoveImage);
	}
    $db->insertrec("delete from news where id='$id'");
    header("location:news.php?act=del");
    exit ;
}
if($status == "1") {
    $db->insertrec("update news set active_status='0' where id='$id'");
    header("location:news.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update news set active_status='1' where id='$id'");
    header("location:news?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from news order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$name=$GetRecord[$i]['name'];
	$comment=$GetRecord[$i]['comment'];
	$img=$GetRecord[$i]['image'];
	$active_status = $GetRecord[$i]['active_status'] ;
	$usercre = $GetRecord[$i]['created_at'] ;
	$usercre = date("d/M/Y", $usercre);
	
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
		$EditLink = "<a href='newsupd?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$name</td>
				<td  align='left'><img src='../images/news/$img' width='50px'></td>
				<td  align='left'>$comment</td>
				<td  align='left'>$usercre</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='newsview?id=$idvalue&status=$active_status' title='View User Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='news?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='news?id=$idvalue&act=del&img=$img' onclick='return confirm('Are you sure to delete?');' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<font color='green'><b>News cancellata</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>News aggiornata</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>News aggiunta</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Stato news cambiato</b></font>" ;
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="newsupd?upd=1">Aggiungi news</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Nome</th>
											<th>Immagine</th>
											<th>Descrizione</th>
											<th>Creata il</th>
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
