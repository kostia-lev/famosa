<? 
include 'header.php';
include "pagination.php";
$perpage=5;
$limit=limitation($perpage);
include 'profile_header.php';

if($row['role']=="broker" || $row['role']=="office-manager") {
	$totusr = $db->singlerec("select count(*) from register");
	$actusr = $db->singlerec("select count(*) from register where active=1");
	$penusr = $db->singlerec("select count(*) from register where active=0");
	$totpr = $db->singlerec("select count(*) from listings");
	$actpr = $db->singlerec("select count(*) from listings where post_sts=1");
	$penpr = $db->singlerec("select count(*) from listings where post_sts=0");
	$totrq = $db->singlerec("select count(*) from requests");
}else{
	$totpr = $db->singlerec("select count(*) from listings where email='".$row['email']."'");
	$actpr = $db->singlerec("select count(*) from listings where post_sts=1 AND email='".$row['email']."'");
	$penpr = $db->singlerec("select count(*) from listings where post_sts=0  AND email='".$row['email']."'");
	$totrq = $db->singlerec("select count(*) from requests where user_niq='".$row['randuniq']."'");
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

					 <div class="row col-md-9 col-sm-6 col-xs-12 property-dash-head">Dashboard<br><hr></div>
					 <div class="row col-md-3 col-sm-6 col-xs-12 mb10 pull-right"><a href="post-ad"><input type="button" class="btn btn-view-detail" value="Aggiungi immobile" /></a><br><br></div>
				 </div><!--class="pdt10"-->
				 <?php if($row['role']=="broker" || $row['role']=="office-manager"){ ?>
				 <div class="col-md-12 col-sm-12 col-xs-12">
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--Registered User-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-users fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $totusr[0]; ?></p>
								 <p class="h5 mar-no text-right">Utenti totali</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--New Order-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-user fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $actusr[0]; ?></p>
								 <p class="h5 mar-no text-right">Utenti attivi</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--New Order-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $totrq[0]; ?></p>
								 <p class="h5 mar-no text-right">Richieste totali</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--Comments-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $penusr[0]; ?></p>
								 <p class="h5 mar-no text-right">Utenti in attesa</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--Sales-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $totpr[0]; ?></p>
								 <p class="h5 mar-no text-right">Immobili totali</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--Sales-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $actpr[0]; ?></p>
								 <p class="h5 mar-no text-right">Immobili attivi</p>
							 </div>
						 </div>
					 </div>
					 <div class="col-md-3 col-sm-6 col-xm-12">
						 <!--Sales-->
						 <div class="panel media pad-all">
							 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							 </div>
							 <div class="media-body">
								 <p class="text-2x mar-no text-thin text-right"><? echo $penpr[0]; ?></p>
								 <p class="h5 mar-no text-right">Immobili bloccati</p>
							 </div>
						 </div>
					 </div>
				 </div>
				<?php }else{ ?>
					 <div class="col-md-12 col-sm-12 col-xs-12">
						 <div class="col-md-3 col-sm-6 col-xm-12">
							 <!--New Order-->
							 <div class="panel media pad-all">
								 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
								</span>
								 </div>
								 <div class="media-body">
									 <p class="text-2x mar-no text-thin text-right"><? echo $totrq[0]; ?></p>
									 <p class="h5 mar-no text-right">Richieste ricevute</p>
								 </div>
							 </div>
						 </div>
						 <div class="col-md-3 col-sm-6 col-xm-12">
							 <!--Sales-->
							 <div class="panel media pad-all">
								 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
								 </div>
								 <div class="media-body">
									 <p class="text-2x mar-no text-thin text-right"><? echo $totpr[0]; ?></p>
									 <p class="h5 mar-no text-right">Immobili totali</p>
								 </div>
							 </div>
						 </div>
						 <div class="col-md-3 col-sm-6 col-xm-12">
							 <!--Sales-->
							 <div class="panel media pad-all">
								 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
								 </div>
								 <div class="media-body">
									 <p class="text-2x mar-no text-thin text-right"><? echo $actpr[0]; ?></p>
									 <p class="h5 mar-no text-right">Immobili attivi</p>
								 </div>
							 </div>
						 </div>
						 <div class="col-md-3 col-sm-6 col-xm-12">
							 <!--Sales-->
							 <div class="panel media pad-all">
								 <div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
								 </div>
								 <div class="media-body">
									 <p class="text-2x mar-no text-thin text-right"><? echo $penpr[0]; ?></p>
									 <p class="h5 mar-no text-right">Immobili bloccati</p>
								 </div>
							 </div>
						 </div>
					 </div>
				<?php } ?>
				</div>

			 </div><!--col-md-9 col-sm-12 col-xs-12-->
		 </div><!--row-->
	</div>
</div> <!--container-->

<?
include "footer.php";
?>