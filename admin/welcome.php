<?
include "header.php";
$totusr=$db->singlerec("select count(*) from register");
$actusr=$db->singlerec("select count(*) from register where active=1");
$penusr=$db->singlerec("select count(*) from register where active=0");
$totpr=$db->singlerec("select count(*) from listings");
$actpr=$db->singlerec("select count(*) from listings where post_sts=1");
$penpr=$db->singlerec("select count(*) from listings where post_sts=0");
?>

	<div class="boxed">
		<!--CONTENT CONTAINER-->
		<!--===================================================-->
		<div id="content-container">
			<? include "header_nav.php"; ?>
			<!--Page Title-->
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<div class="pageheader">
				<h3><i class="fa fa-home"></i> Dashboard </h3>
				<div class="breadcrumb-wrapper">
					<span class="label">Percorso:</span>
					<ol class="breadcrumb">
						<li> <a href="#"> Home </a> </li>
						<li class="active"> Dashboard </li>
					</ol>
				</div>
			</div>
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<!--End page title-->
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Registered User-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-info">
								<i class="fa fa-users fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $totusr[0]; ?></p>
								<p class="h5 mar-no text-right">Utenti totali</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--New Order-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-success">
								<i class="fa fa-user fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $actusr[0]; ?></p>
								<p class="h5 mar-no text-right">Utenti attivi</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Comments-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
								<i class="fa fa-user-plus fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $penusr[0]; ?></p>
								<p class="h5 mar-no text-right">Utenti in attesa</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Sales-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-info">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $totpr[0]; ?></p>
								<p class="h5 mar-no text-right">Immobili totali</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Sales-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-success">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $actpr[0]; ?></p>
								<p class="h5 mar-no text-right">Immobili attivi</p>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xm-12">
						<!--Sales-->
						<div class="panel media pad-all">
							<div class="media-left">
								<span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
								</span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-thin text-right"><? echo $penpr[0]; ?></p>
								<p class="h5 mar-no text-right">Immobili in attesa</p>
							</div>
						</div>
					</div>
				</div>
				<!--<div class="row">
				   <div class="col-md-12"> 
                        <div class="panel">
						<div class="panel-headin">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">

							    <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Image</th>
											<th>Title</th>
											<th>Email</th>
											<th>Location</th>
											<th>Address</th>
											<th>Price</th>
											<th>Category</th>
											<th>Property For</th>
											<th>Posted at</th>
											<th class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
                            </div>
                        </div>
						</div>
				</div>
				
				
				
				<div class="row">
				    <div class="col-md-6">

                        <div class="panel">
                            <div class="panel-headin">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Image</th>
											<th>Name</th>										
											<th>Email Id</th>
											<th>Mobile</th>																	
											<th>Created at</th>
											
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
                            </div>
                        </div>
					</div>
					
					
					
					<div class="col-md-6">

                        <div class="panel">
                            <div class="panel-headin">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Image</th>
											<th>Name</th>										
											<th>Email Id</th>
											<th>Mobile</th>																	
											<th>Created at</th>
											
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>-->
				
				
				
				
				
				
				
				
				
				<div class="row">
						  <div class="col-md-12">
						    <h3>Amministrazione</h3>
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="registerupd?upd=1"><div class="circle-icon blue">
							    <i class="fa fa-3x fa-user" aria-hidden="true"></i>
							   </div>
							   Aggiungi utente</a>
							   </div>
							</div>
							
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="register"><div class="circle-icon green">
							    <i class="fa fa-3x fa-users" aria-hidden="true"></i>
							   </div>
							   Gestione utenti</a>
							   </div>
							</div>
							
							
							
							
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="general"><div class="circle-icon red">
							    <i class="fa fa-3x fa-cogs" aria-hidden="true"></i>
							   </div>
							    Impostazioni</a>
							   </div>
							</div>
							
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="cms"><div class="circle-icon purple">
							    <i class="fa fa-3x fa-file-text-o" aria-hidden="true"></i>
							   </div>
							    CMS</a>
							   </div>
							</div>
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="testimonial"><div class="circle-icon orag">
							    <i class="fa fa-3x fa-comments-o" aria-hidden="true"></i>
							   </div>
							   Gestione recensioni</a>
							   </div>
							</div>
							
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="testimonialupd?upd=1"><div class="circle-icon brwn">
							    <i class="fa fa-3x fa-pencil" aria-hidden="true"></i>
							   </div>
							   Aggiungi recensione</a>
							   </div>
							</div>
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="news"><div class="circle-icon yellow">
							    <i class="fa fa-3x fa-newspaper-o" aria-hidden="true"></i>
							   </div>
							    Gestione news</a>
							   </div>
							</div>
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							   <a href="newsupd?upd=1"><div class="circle-icon ylet">
							    <i class="fa fa-3x fa-pencil-square-o" aria-hidden="true"></i>
							   </div>
							   Aggiungi News</a>
							   </div>
							</div>
						  </div>
						  
						  <div class="col-md-12">
						      <h3>Immobili</h3>
							  
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							    <a href="propupd?upd=1"><div class="circle-icon blue">
							    <i class="fa fa-3x fa-home"></i>
							   </div>
							   Aggiungi immobile</a>
							   </div>
							</div>
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							    <a href="prop"><div class="circle-icon green">
							   <i class="fa fa-3x fa-building-o" aria-hidden="true"></i>
							   </div>
							   Gestione immobili</a>
							   </div>
							</div>

						  </div>
						  
						  
						  
						  <div class="col-md-12">
						      <h3>Altro</h3>
							  
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							    <a href="newsletterupd?upd=1"><div class="circle-icon red">
							    <i class="fa fa-3x fa-envelope-o"></i>
							   </div>
							   Aggiungi newsletter</a>
							   </div>
							</div>
							
							<div class="col-sm-3 col-xs-4 ">
							  <div class="well admin-hme">
							    <a href="newsletter"><div class="circle-icon purple">
							   <i class="fa fa-3x fa-envelope-o" aria-hidden="true"></i>
							   </div>
							   Gestione newsletter</a>
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