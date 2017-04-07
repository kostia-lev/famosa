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

$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$usercre = isSet($usercre) ? $usercre : '' ;


$GetRecordView = $db->singlerec("select * from listings where id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from listings where id='$id'");
@extract($GetRefereBy);

?> <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>Visualizza immobile</h3><a href="prop" class="btn btn-success" style="margin-bottom:10px;">Indietro</a></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table>
                                    <thead>
                                        <tr>
											<td width="150">Titolo immobile: </td><td></td><td><? echo $prop_title;?></td>
											</tr>
											<tr><td width="150">Email contatto: </td><td></td><td><? echo $email;?></td></tr>
											<tr><td width="150">Citt&aacute;: </td><td></td><td><? echo $location;?></td></tr>
											<tr><td width="150">Indirizzo: </td><td></td><td><? echo $address;?></td></tr>
											<tr><td width="150">Categoria: </td><td></td><td><? echo ucwords($category); ?></td></tr>
											<tr><td width="150">Prezzo immobile: </td><td></td><td><? echo $exp_price;?></td></tr>
											<tr><td width="150">Descrizione: </td><td></td><td><? echo $description;?></td></tr>
											<tr><td width="150">Camere da letto: </td><td></td><td><? echo $bedroom;?></td></tr>
											<tr><td width="150">Bagni: </td><td></td><td><? echo $bathroom;?></td></tr>
											<tr><td width="150">Totale locali: </td><td></td><td><? echo $hall;?></td></tr>
											<tr><td width="150">Immobile in: </td><td></td><td><? echo ucwords($prop_for); ?></td></tr>
											<tr><td width="150">Superficie immobile: </td><td></td><td><? echo $covered_area;?></td></tr>
											<tr><td width="150">Superficie totale: </td><td></td><td><? echo $plot_area;?></td></tr>
											<tr><td width="150">Piani totali: </td><td></td><td><? echo $floors;?></td></tr>
											<tr><td width="150">Inserito il: </td><td></td><td><? echo date("d/M/Y", $posted_at); ?></td></tr>
                                    </thead>
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
<?
include "footer.php";
?>