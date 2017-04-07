<? 
include 'header.php';
include "pagination.php";
$perpage=5;
$limit=limitation($perpage);
include 'profile_header.php';
?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Dashboard</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
         <? include "profile_left.php"; ?> 
         <div class="col-md-9 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 <div class="row col-md-9 col-sm-6 col-xs-12 property-dash-head">Gestione immobili<br><hr></div>
                 <div class="row col-md-3 col-sm-6 col-xs-12 mb10 pull-right"><a href="post-ad"><input type="button" class="btn btn-view-detail" value="Aggiungi immobile" /></a><br><br></div>
                 </div><!--class="pdt10"-->
						<?
						if($row['role']=="broker" || $row['role']=="office-manager") {
							$que = "select * from listings order by id desc";
							$result = $db->get_all($que . $limit);
							if (count($result) >= 1) {
								echo '<div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
									<table class="table table-striped brdr">
									<tr class="tabl-head">
									<td style="width:5%">Evidenzia</td>
									<td style="width:20%">Immobile</td>
									<td style="width:20%">Titolo</td>
									<td style="width:20%">Inserito in data</td>
									<td style="width:20%">Prezzo</td>
									<td style="width:20%">Utente</td>
									<td style="width:20%">Azione</td>
									</tr>';
								foreach ($result as $listing) {
									$im = $db->singlerec("select * from listing_images where pid='" . $listing['id'] . "' limit 1");
									$getusr = $db->singlerec("select * from register where email='" . $listing['email'] . "' limit 1");

									?>
									<tr class="tabl-txt">
										<td>
											<? if($listing['featured'] == 1){ ?>
												<a href="featured-property?randuniq=<? echo $listing['randuniq']; ?>&ftr=0" onclick="return confirm('Sei sicuro di voler togliere l\'evidenza di questo immobile?');" class="table-link">
													<i class="fa fa-star fa-2x featured" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Metti in evidenza"></i>
												</a>
											<?php }else{ ?>
												<a href="featured-property?randuniq=<? echo $listing['randuniq']; ?>&ftr=1" onclick="return confirm('Sei sicuro di voler mettere in evidenza questo immobile?');" class="table-link">
													<i class="fa fa-star fa-2x nofeatured" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Metti in evidenza"></i>
												</a>
											<?php } ?>
										</td>
										<td><img src="images/prop/230_144/<? echo $im['image']; ?>"
												 class="img-responsive"/></td>
										<td><? echo $listing['prop_title']; ?></td>
										<td><? echo date("d-M-Y", $listing['posted_at']); ?></td>
										<td>&euro; <? echo number_format($listing['exp_price'] , 0, ',', '.'); if($listing['prop_for']=='affitto'){echo ' al mese';}?></td>
										<td><? echo $getusr['fullname']; ?></td>
										<td>

											<a href="listing/<? echo $listing['randuniq']; ?>/<? echo $listing['slug']; ?>"
											   target="_blank" class="table-link"><i class="fa fa-eye fa-2x view" aria-hidden="true"
																	 data-toggle="tooltip" data-placement="top" title=""
																	 data-original-title="Vedi dettagli"></i></a>

											<a href="edit-property/<? echo $listing['randuniq'] ?>/<? echo $listing['slug']; ?>"
											   class="table-link"><i class="fa fa-pencil fa-2x edit" aria-hidden="true"
																	 data-toggle="tooltip" data-placement="top"
																	 title="Modifica immobile"
																	 data-original-title="Edit"></i>
											</a>

											<a href="delete-property/<? echo $listing['randuniq']; ?>/<? echo $listing['slug']; ?>" onclick="return confirm('Sei sicuro di voler cancellare questo immobile?');" class="table-link"><i class="fa fa-trash fa-2x delete" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancella"></i></a>
										</td>
									</tr>
									<?
								}
								echo '</table></div>';
							} else echo '<br><br><br><br>Nessun immobile trovato!<br><br>';
						}else{
							$que="select * from listings where email='".$_SESSION['usr']."' order by id desc";
							$result=$db->get_all($que . $limit);
							if(count($result)>=1) {
								echo '<div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
								<table class="table table-striped brdr">
								<tr class="tabl-head">
								<td style="width:5%">Evidenzia</td>
								<td style="width:20%">Immobile</td>
								<td style="width:20%">Titolo</td>
								<td style="width:20%">Inserito in data</td>
								<td style="width:20%">Prezzo</td>
								<td style="width:20%">Azione</td>
								</tr>';
								foreach($result as $listing) {
									$im=$db->singlerec("select * from listing_images where pid='".$listing['id']."' limit 1");

									?>
									<tr class="tabl-txt">
										<td>
												<? if($listing['featured'] == 1){ ?>
													<a href="featured-property?randuniq=<? echo $listing['randuniq']; ?>&ftr=0" onclick="return confirm('Sei sicuro di voler togliere l\'evidenza di questo immobile?');" class="table-link">
													<i class="fa fa-star fa-2x featured" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Metti in evidenza"></i>
													</a>
												<?php }else{ ?>
													<a href="featured-property?randuniq=<? echo $listing['randuniq']; ?>&ftr=1" onclick="return confirm('Sei sicuro di voler mettere in evidenza questo immobile?');" class="table-link">
													<i class="fa fa-star fa-2x nofeatured" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Metti in evidenza"></i>
													</a>
												<?php } ?>
										</td>
										<td><img src="images/prop/230_144/<? echo $im['image']; ?>" class="img-responsive" /></td>
										<td><? echo $listing['prop_title']; ?></td>
										<td><? echo date("d-M-Y", $listing['posted_at']); ?></td>
										<td>&euro; <? echo number_format($listing['exp_price'] , 0, ',', '.'); if($listing['prop_for']=='affitto'){echo ' al mese';}?></td>
										<td>

											<a href="listing/<? echo $listing['randuniq']; ?>/<? echo $listing['slug']; ?>" class="table-link"><i class="fa fa-eye fa-2x view" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"></i></a>&nbsp;&nbsp;&nbsp;

											<a href="edit-property/<? echo $listing['randuniq'] ?>/<? echo $listing['slug']; ?>" class="table-link"><i class="fa fa-pencil fa-2x edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Modifica immobile" data-original-title="Edit"></i>
											</a>&nbsp;&nbsp;&nbsp;

											<a href="delete-property?randuniq=<? echo $listing['randuniq']; ?>&del=1" onclick="return confirm('Sei sicuro di voler cancellare questo immobile?');" class="table-link"><i class="fa fa-trash fa-2x delete" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
										</td>
									</tr>
									<?
								} echo '</table></div>';
							} else echo '<br><br><br><br>Nessun immobile trovato!<br><br>';
						}
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

if(isset($_SESSION['posted'])) {
	echo "<script>swal('Complimenti', 'L\'immobile è stato aggiunto con successo!', 'success');</script>";
	unset($_SESSION['posted']);
}
else if(isset($_SESSION['prupd'])) {
	echo "<script>swal('Complimenti', 'L\'immobile è stato aggiornato con successo!', 'success');</script>";
	unset($_SESSION['prupd']);
}
else if(isset($_SESSION['prdel'])) {
	echo "<script>swal('Complimenti', 'L\'immobile è stato cancellato con successo!', 'success');</script>";
	unset($_SESSION['prdel']);
}
else if(isset($_SESSION['prftr'])) {
	echo "<script>swal('Complimenti', 'Lo stato di evidenza dell\'immobile è stato cambiato con successo!', 'success');</script>";
	unset($_SESSION['prftr']);
}
else if(isset($_SESSION['ftrerror'])) {
    echo "<script>swal('Errore', 'Non è stato possibile cambiare lo stato di evidenza dell\'immobile, solo chi ha inserito l\'immobile può cambiarne lo stato!', 'error');</script>";
    unset($_SESSION['ftrerror']);
}
?>