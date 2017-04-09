<?
include "header.php";
include "pagination.php";
$perpage=12;
$limit=limitation($perpage);
include "srch_algorithm.php";
include "mapapi.php";
?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20">
        <span class="blackhead">Lista immobili
            <?php
            if($types != null){ echo "di tipo " . strtoupper(str_replace("-", " ", $types)); }
            else if($cat != null){ echo "della categoria " . strtoupper(str_replace("-", " ", $cat)); }
            if(!empty($loc)){ echo " a " . strtoupper(str_replace("-", " ", $loc)); }
            if(!empty($propfor)){ echo " in " . $propfor; }

            ?>
        </span>
    </div><!--col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20-->
    <div class="col-md-9 col-sm-12 col-xs-12 row">
	  	<a href="<?php echo $siteurl;?>/map" class="btn btn-map mt20"><i class="fa fa-map-marker" aria-hidden="true"></i> Visualizza su Mappa</a>
    </div>
	<div class="col-md-9 col-sm-12 col-xs-12 row">
			<?
            $color = ($color ?? '');
			$result=$db->get_all($que . $limit);
			if(count($result)<1) {
				echo "<br>Nessun immobile trovato con le caratteristiche selezionate!";
			}
			else {
				foreach($result as $row) {
					$im=$db->singlerec("select * from listing_images where pid='".$row['id']."'");
			?>
        <div class="col-md-4 col-sm-6 col-xs-12 mt20  market-place-pddng">
            <div class="carshop-item brdr-2">
                <div class="photo">
                    <?php if($row['prop_for']=='vendita'){?>
                    <div class="carshop-item-flags">
                        <dd class="flag newFlag-green" style="background-color:<?php echo $color; ?>">In vendita</dd>
                    </div>
                    <?php }else{ ?>
                        <div class="carshop-item-flags">
                        <dd class="flag newFlag-yellow" style="background-color:<?php echo $color; ?>">In affitto</dd>
                    </div>
                    <?php } ?>
                    <a href="<? echo $siteurl; ?>/listing/<? echo $row['randuniq']; ?>/<? echo $row['slug']; ?>"><img src="<? echo $siteurl; ?>/images/prop/230_144/<? echo $im['image']; ?>"  alt="*" /></a>
                </div><!--photo-->
                   <div class="info row">
                        <div class="col-md-12">
                            <p class="market-place-list-type pdl10 mt10"><? echo ucfirst(str_replace("-", " ",$row['types'])); ?></p>
                            <p class="market-place-list-head pdl10"><? echo substr($row['prop_title'], 0, 20)."..."; ?></p>
                               <p class="market-place-list-place  pdl10 "><? echo $row['location']; ?></p>
                               <p class="market-place-list-bluehead  pdl10">&euro; <? echo number_format($row['exp_price'] , 0, ',', '.'); if($row['prop_for']=='affitto'){echo ' al mese';}?></p>
                               <div class=" col-md-12">
                                   <div class="row">
                                       <div class=" col-md-4 new-properties-details">
                                            <span><i class="fa fa-area-chart" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['covered_area']; ?> mq<span>
                                       </div><!--col-md-4-->
                                       <div class=" col-md-4 new-properties-details">
                                            <span><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['hall']; ?> locali</span>
                                       </div><!--col-md-4-->
                                       <div class=" col-md-4 new-properties-details">
                                          <span><i class="fa fa-bath" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['bathroom']; ?> bagni</span>
                                       </div><!--col-md-4-->
                                   </div><!--row-->
                               </div><!--brdr-2-->
                         </div><!--price col-md-12-->
                       <div class="col-md-12 col-sm-12 col-xs-12">
						 <?
						    if($row['email']!=($_SESSION['usr'] ?? null)) {
						    	$_SESSION['tomail']=$row['email'];
						    	echo '<div class="col-md-6 col-sm-6 col-xs-6 text-left pdt10 pdl40 mb5">
                                <a href="javascript:;" data-toggle="modal" data-target="#contact-agent"><input type="button" class="btn btn-view-detail"  value="Contatta"></a>
						    	</div>';
						    }
						    ?>

						    <div class="col-md-6 col-sm-6 col-xs-6 text-right pdt10 pdr40 mb5">
                                <a href="<? echo $siteurl; ?>/listing/<? echo $row['randuniq']; ?>/<? echo $row['slug']; ?>" class="btn btn-view-detail">
                                Dettagli</a>
                            </div>
                       </div>
                        </div><!--info row-->
                    </div><!--carshop-item brdr-2-->
               </div><!--col-md-4-->
				   <?
				   }
				   }
				   ?>
		<div class="text-center boxs">
			<div class="row">
				<div class="col-md-12"><br>
					<? $db->insertrec(getPagingQuery1($que, $perpage, "")); ?>
					<nav class="pagination-wrapper">
					   <?echo $pagingLink = getPagingLink1($que, $perpage, ""); ?>
					</nav>
				</div>
			</div>
		</div>

</div><!--col-md-9 col-sm-12 col-xs-12 row-->
<? include "listing_right.php"; ?>
</div><!--container-->

<? include "footer.php"; ?>