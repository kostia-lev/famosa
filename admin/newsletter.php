<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
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
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;

if($act == "del") {
    $db->insertrec("delete from newsletter where id='$id'");
    header("Location: newsletter?act='del'");
    exit;
}

$GetRecord=$db->get_all("select * from newsletter order by id desc");
if(count($GetRecord)==0)
    $Message="Nessun iscritto trovato!";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'] ;
	$name=$GetRecord[$i]['name'];
	$email=$GetRecord[$i]['email'];
	$ip=$GetRecord[$i]['ip'];
	$usercre = $GetRecord[$i]['date'] ;
	$usercre=date("d/M/Y", $usercre);
	
	$slno = $i + 1 ;
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'>$name</td>
				<td  align='left'>$email</td>
				<td  align='left'>$ip</td>
				<td  align='left'>$usercre</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='newsletterview?id=$idvalue' title='Vedi dettagli' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='newsletterupd?upd=2&id=$idvalue' data-toggle='tooltip' title='Modifica' class='btn btn-default' ><i class='fa fa-edit'></i></a>
					<a href='newsletter?id=$idvalue&act=del' onclick=\"return confirm('Sei sicuro di voler cancellare questo iscritto?');\" class='btn btn-default' title='Elimina' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<font color='green'><b>Iscritto cancellato</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Iscritto aggiornato</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Iscritto aggiunto</b></font>" ;
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
								<div class="col-sm-12 text-right"><a class="btn btn-info" href="newsletterupd?upd=1">Aggiungi iscritto</a></div>
							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Nome</th>
											<th>Email</th>
											<th>Indirizzo IP</th>
											<th>Iscritto il</th>
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
