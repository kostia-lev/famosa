<?
include 'header.php';
include "pagination.php";
$perpage=5;
$limit=limitation($perpage);
include 'profile_header.php';
if($row['role']=="broker" || $row['role']=="office-manager") {
    session_destroy();
    echo "<script>location.href='$siteurl';</script>";
    header("Location: $siteurl"); exit;
}
?>

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
            <span class="blackhead pdl10">Dashboard</span>
        </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->

        <? include "profile_left.php"; ?>
        <div class="col-md-9 col-sm-12 col-xs-12 mt20">
            <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                <div class="pdt10">
                    <div class="row col-md-9 col-sm-6 col-xs-12 property-dash-head">Gestione utenti<br><hr></div>
                    <div class="row col-md-3 col-sm-6 col-xs-12 mb10 pull-right"><a href="post-ad"><input type="button" class="btn btn-view-detail" value="Aggiungi immobile" /></a><br><br></div>
                </div><!--class="pdt10"-->
                <?
                $que = "select * from register order by id desc";
                $result = $db->get_all($que . $limit);
                if (count($result) >= 1) {
                    echo '<div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
								<table class="table table-striped brdr">
								<tr class="tabl-head">
								<td style="width:20%">Foto</td>
								<td style="width:20%">Nome</td>
								<td style="width:20%">Utente dal</td>
								<td style="width:20%">Ruolo</td>
								<td style="width:20%">Email</td>
								<td style="width:20%">Telefono</td>
								<td style="width:20%">Azione</td>
								</tr>';
                    foreach ($result as $users) { ?>
                        <tr class="tabl-txt">
                            <td><img src="/images/user/<? echo $users["prof_image"]; ?>"
                                     class="img-responsive"/></td>
                            <td><? echo $users['fullname']; ?></td>
                            <td><? echo date("d-M-Y", $users['created_at']); ?></td>
                            <td><? echo $users['role']; ?></td>
                            <td><a href="mailto:<? echo $users['email']; ?>"><? echo $users['email']; ?></a></td>
                            <td><? echo $users['mobile']; ?></td>
                            <td>
                                <a href="agent-info/<? echo $users['randuniq']; ?>/about"
                                   target="_blank" class="table-link"><i class="fa fa-eye fa-2x view" aria-hidden="true"
                                                                         data-toggle="tooltip" data-placement="top" title=""
                                                                         data-original-title="View"></i></a>
                                <?php if($users['active'] == 0){ ?>
                                    <a href="activate-user?randuniq=<? echo $users['randuniq']; ?>&active=1" onclick="return confirm('Sei sicuro di voler attivare questo utente?\r\n ATTENZIONE: Accettando attiverai anche tutti gli immobili dell\'agente.');" class="table-link"><i class="fa fa-toggle-off fa-2x disabled" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Attiva utente"></i></a>
                                <?php } else{ ?>
                                    <a href="activate-user?randuniq=<? echo $users['randuniq']; ?>&active=0" onclick="return confirm('Sei sicuro di voler disattivare questo utente?\r\n ATTENZIONE: Accettando disattiverai anche tutti gli immobili dell\'agente.');" class="table-link"><i class="fa fa-toggle-on fa-2x enabled" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Disattiva utente"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?
                        }
                        echo '</table></div>';
                    } else echo '<br><br><br><br>Nessun immobile trovato!<br><br>';
                ?>
                <div class="text-center boxs">
                    <div class="row">
                        <div class="col-md-12">
                            <? $db->insertrec(getPagingQuery1($que, $perpage, "")); ?>
                            <nav class="pagination-wrapper">
                                <?echo $pagingLink = getPagingLink1($que, $perpage, ""); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
        </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
    </div> <!--container-->

<?
include "footer.php";

if(isset($_SESSION['usrenabled'])) {
    echo "<script>swal('Complimenti', 'L\'utente è stato attivato con successo!', 'success');</script>";
    unset($_SESSION['usrenabled']);
}
else if(isset($_SESSION['usrdisabled'])) {
    echo "<script>swal('Complimenti', 'L\'utente è stato disattivato con successo!', 'success');</script>";
    unset($_SESSION['usrdisabled']);
}
?>