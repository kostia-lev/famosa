<div class="container">
   <div class="col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20">
        <h1 class="blackhead"><? echo $prop['prop_title'] . " a " . strtok($prop['location'], ','); ?></h1>
    </div><!--col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20-->
    
    
    <div class="col-sm-9">

       <div class=" col-md-12 col-sm-12 col-xs-12 row">
       <div id="thumbcarousel" class="carousel slide" data-interval="false">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" data-toggle="modal" data-target="#preview<? echo $prop['limid'] ?>">
                    <img src="/images/prop/<? echo $prop['limimage'] ?>" class="imge" />
                </div>
                <!-- Modal -->
                <div class="modal scale" id="preview<? echo $prop['limid'] ?>" role="dialog">
                    <div class="modal-dialog modal-img">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <img src="<? echo $siteurl; ?>/images/prop/<? echo $prop['limimage'] ?>" class="imge" />
                    </div>

                  </div>
                </div>
				<?

				$result=$db->get_all("select * from listing_images where pid='".$prop['id']."' order by id limit 1, 25");
                if(count($result)>=1) {
					foreach($result as $row) {
						echo '<div class="item" data-toggle="modal" data-target="#preview'. $row['id'] .'"><img src="'.$siteurl.'/images/prop/'.$row['image'].'" class="imge"></div>';

					    ?>

					    <!-- Modal -->
                        <div class="modal scale" id="preview<? echo $row['id']; ?>" role="dialog">
                            <div class="modal-dialog modal-img">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <img src="<? echo $siteurl; ?>/images/prop/<? echo $row['image']; ?>" class="imge">
                            </div>

                          </div>
                        </div>

					    <?

					}
				}
				?>
                <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
                               
                
                </div><!--carousel-inner-->
            </div><!--carousel slide-->
        </div> <!--thumbcarousel-->

    <div class="clearfix">
        <div id="thumbcarousel" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
                <div class="item active">
				<?
				$res=mysqli_query($db->getDbh(), "select * from listing_images where pid='".$prop['id']."' order by id limit 25");
				$row_count=mysqli_num_rows($res);
					if($row_count>=1) {
						$i=0;
						while($row=mysqli_fetch_assoc($res)) {
				?>
					<div data-target="#carousel" data-slide-to="<? echo $i; ?>" class="thumb"><img src="<? echo $siteurl;   ?>/images/prop/230_144/<? echo $row['image']; ?>"></div>
				<?
				$i++;
				}
				}
				?>
                </div><!-- /item -->
                
            </div><!-- /carousel-inner -->
            
        </div> <!-- /thumbcarousel -->
    </div><!-- /clearfix -->

    </div><!--row-->

    <div class="col-md-12 col-sm-12 col-xs-12 prop-features mt30">
        <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-bed fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $prop['bedroom']; ?> Camere da letto</label>
           </div><!--col-md-3 col-sm-6 col-xs-12-->
           <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-bath fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $prop['bathroom']; ?> Bagni</label>
           </div><!--col-md-3 col-sm-6 col-xs-12-->
           <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-home fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $prop['hall']; ?> Locali</label>
           </div><!--col-md-3 col-sm-6 col-xs-12-->
           <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                <label class="col-md-12 col-sm-6 col-xs-12 mt10"><span href="" onclick="window.print();"><i class="fa fa-print fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;Stampa</span></label>
           </div><!--col-md-3 col-sm-6 col-xs-12-->

            <? if($prop['leveled_apartment'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Appartamento su pi&uacute; piani</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['bungalow'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Bungalow</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['old_building'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Edificio d'epoca</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['farmhouse_four_sides'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fattoria su quattro lati</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['farmhouse_three_sides'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fattoria su tre lati</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['farmhouse_one_side'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fattoria su un lato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['villa_vintage'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Villa d'epoca</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['accessible_people'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Accessibile persone</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['electric_gate'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Portone automatico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['to_be_restructured'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Da ristrutturare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['alarm_system'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Impianto di allarme</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_public_transportation'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Mezzi pubblici vicini</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['position'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Posizione</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['restructured'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ristrutturato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['high_traffic'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Strada ad alto passaggio</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_highway'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Autostrada</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['rooftop_terrace'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Altana - Terrazza sul Tetto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['balcony'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Balcone</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['basement_garage'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Box con Porta Automatica</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['concrete'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Calcestruzzo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['garage_box'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Garage/Box</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['garden'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Giardino</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['pond'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Laghetto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['exposed_brick'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Mattoni a vista</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['mosaic'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Mosaico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['noted_palace'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Palazzo Celebre</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['panels'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pannelli</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['parking'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Parcheggio</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['glass_wall'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Parete di Vetro</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['stone'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pietra</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['pool'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Piscina</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['parking_space'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Posto Auto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['cesspool'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pozzo Nero</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['prefabricated'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Prefabbricato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['closet'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ripostiglio</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['independent_closet'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ripostiglio indipendente</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['wood_coating'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Rivestimento in legno</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['structure_under_construction'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Struttura in costruzione</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['putty'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stucco</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['patio_deck'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Terrazza/Veranda</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['flat_roof'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Tetto Piatto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['unfinished'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Al grezzo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['lift_elevator'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ascensore/Montacarichi</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['redeveloped'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Esterno Riadattato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['outdoor_pool'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Piscina all'aperto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['indoor_pool'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Piscina coperta</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['reception'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Portineria</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['first_owner'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Primo proprietario</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['needs_redevelopment'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ristrutturazione necessaria</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['security_service'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Servizio di sorveglianza</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['frescoes'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Affreschi</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['large_hall'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ampio ingresso</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['large_closet'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ampio ripostiglio</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['kitchenette'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Angolo cottura</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['conditioned_air'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Aria condizionata</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['central_air_conditioned'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Aria condizionata centralizzata</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['independent_room'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Camera indipendente</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['fireplace'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Caminetto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['livable_kitchen'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Cucina abitabile</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['livable_kitchen_den'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Cucina abitabile/Tinello</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['tiled_kitchen'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Cucina piastrellata</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['kitchen_kitchenette'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Cucina/Cucinotto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['circular_windows'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Finestre circolari</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['internal_plasterboard'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Interni in cartongesso</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['washing_facilities'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Lavanderia condominiale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['laundry_room'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Locale Lavanderia</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['tiled_floors'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pavimenti in cotto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['parquet_floor'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pavimento in Parquet</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['underfloor_heating'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento a Pavimento</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['gas_stove'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stufa a Gas</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['accessible_by_boat'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Accessibile da imbarcazione</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['town_center'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Centro citt&aacute;</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['business_center'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Centro d'affari</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['old_town'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Centro storico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['surrounded_by_beaches'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Circondato da spiagge</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['easily_accessible_by_car'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Facilmente raggiungibile in auto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['lagoon_front'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fronte laguna</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['country_side'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> In campagna</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['settlement'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Insediamento</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['isolated'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Isolato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['isolated_far_from_settlements'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Isolata/distante da insediamenti</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['forest_edge'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Margine della foresta</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['isolated_location'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Posizione isolata</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_golf_course'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Presso campo da golf</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['outskirts'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Prima periferia</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['private_location'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Privato - Localit&aacute; riservata</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['quiet_street'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Su strada tranquilla</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['on_the_sea'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Sul mare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['on_the_beach'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Sulla spiaggia</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['airport_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Aereoporto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['forest_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Bosco</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['channel_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Canale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_congress_center'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Centro Congressuale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_church'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Chiesa</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_bus'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Fermata Autobus</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['school_bus_stop_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Fermata Scuolabus</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_lake'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Lago</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_sea'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Mare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_subway'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Metropolitana</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_mountain'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Montagna/Impianti da Sci</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['shops_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Negozi</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_hospital'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Ospedale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_gym'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Palestra/Centro Fitness</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_park'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Parco</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['walking_nearby'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Passeggiate</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_wood'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Pineta</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_school'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Scuole</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_beach'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Spiaggia</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_train_station'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Stazione Ferroviaria</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['near_tangential'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vicinanze Tangenziale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['canal_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista Canale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['lake_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista Lago</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['sea_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista Mare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['mountain_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista Montagne</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['city_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista panoramica citt&aacute;</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['nature_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista panoramica natura</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['beach_view'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vista spiagge</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['nord'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Nord</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['nord_est'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Nord-Est</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['est'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Est</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['sud_est'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Sud-Est</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['sud'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Sud</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['sud_ovest'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Sud-Ovest</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['ovest'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Ovest</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['nord_ovest'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Nord-Ovest</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['ancient'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Antico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['art_deco'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Art Deco</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['art_nouveau'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Art Nouveau</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['barocco'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Barocco</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['biedermeier'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Biedermeier</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['british'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Britannico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['attic_rooms'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Casa con locali nell'attico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['century_home'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Casa secolare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['colonnade'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Colonnato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['contemporary'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Contemporaneo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['edwardian'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Edoardiano</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['elizabethan'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Elisabettiano</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['french'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Francese</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['gothic'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gotico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['english'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Inglese</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['liberty'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Liberty</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['mediterranean'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Mediterranea</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['modern'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Moderno</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['neoclassic'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Neoclassico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['fine_arts'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Protetto Belle Arti (Storico)</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['regency'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Regency</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['renaissance'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Rinascimentale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['roman'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Romano</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['spanish'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Spagnolo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1200'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1200</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1300'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1300</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1400'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1400</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1500'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1500</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1600'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1600</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1700'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1700</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_1800'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile 1800</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_60_70'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile anni 60-70</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['style_900'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Stile Inizio 900</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['tudor'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Tudor</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['victorian'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Vittoriano</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['running_water'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Acqua Corrente</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['fireplace_chimney'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Camino/Caminetto</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['water_tank'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Cisterna d'Acqua</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['solar_collectors'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Collettore - Solare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['electricity'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Elettricit&aacute;</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['geothermal_energy'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Energia geotermica</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['sanitation'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fognature</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['source_of_water'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Fonte/Sorgente d'acqua propria</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['gas'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gas</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['gas_gpl'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gas - GPL</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['methane_gas'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gas - Metano</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['natural_gas'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gas - Naturale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['ups_generator'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Gruppo elettrogeno di continuit&aacute;</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['adsl_line'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Linea ADSL</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heat_pump'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Pompa di calore</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['fireplace_predisposition'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Predisposizione Camino</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['network_computing'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Rete Informatica</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_hot_air'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Aria Calda</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_none'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Assente</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['autonomous_heating'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Autonomo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_central_boiler'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Boiler Centrale</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['centralized_warming'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Centralizzato</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_solid_fuel'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Combustibile Solido</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['electric_heating'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Elettrico</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_gas_gpl'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Gas GPL</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_oil'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Gasolio</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_solar'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Solare</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['heating_district_heating'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Riscaldamento - Teleriscaldamento</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['satellite'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> Satellite</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
            <? if($prop['cable_tv'] == 1){ ?>
                <div class="col-md-6 col-sm-6 col-xs-12 detail-bg">
                    <label class="col-md-12 col-sm-6 col-xs-12 mt10"><i class="fa fa-check-circle" aria-hidden="true"></i> TV via cavo</label>
                </div><!--col-md-3 col-sm-6 col-xs-12-->
            <?php } ?>
        </div><!--row brdr-->

        <div class="row brdr">

              <div class="detail-small-font mt10"><? echo $prop['location']; ?></div>
              <div class="detail-small-font mt10"><? echo $prop['address']; ?></div>
              <div class="row detail-brdr-btm"></div>
              <div class="detail-price mt10">&euro; <? echo number_format($prop['exp_price'] , 0, ',', '.'); if($prop['prop_for']=='affitto'){echo ' al mese';}?></div><br>
              <p class="detail-small-font-2"><? echo $prop['description']; ?></p>
              <div class="row detail-property-fnt pdl10">
                   Condividi: <a href="https://twitter.com/share?url=http://<? echo getenv("SERVER_NAME"); ?>&amp;text=<? echo getenv("SERVER_NAME"); ?>&amp;hashtags=<? echo getenv("SERVER_NAME"); ?>" target="_blank"><img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/twitter.png" class="ml10"/></a>
				   
                   <a href="http://www.facebook.com/sharer.php?u=http://<? echo getenv("SERVER_NAME"); ?>" target="_blank"><img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/fb.png" class="ml10"  /></a>
				   
                   <a href="https://plus.google.com/share?url=http://<? echo getenv("SERVER_NAME"); ?>"><img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/g+.png" class="ml10"  /></a>
              </div>
              <div class="row related-property-fnt">
                  Classe energetica
              </div>
              <div class=" col-md-12 col-sm-12 col-xs-12 mt20 mb20">
                  <div class="col-md-3 col-sm-6 col-xs-12 mt10">
                    <?php if($prop['energy'] == 1){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/a+.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 2){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/a.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 3){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/b.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 4){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/c.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 5){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/d.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 6){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/e.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 7){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/f.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 8){ ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/g.gif" class="ml10"/>
                    <?php }else if($prop['energy'] == 9){ ?>
                        <b>In fase di rilascio</b>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/releasing.gif" class="ml10"/>
                    <?php }else { ?>
                        <img src="<? echo $siteurl;   ?>/assets/images/property-detail-page/energy/nc.gif" class="ml10"/>
                    <?php } ?>
                  </div>
                  <div class="col-md-9 col-sm-6 col-xs-12 mt10">
                  <p>La classe di Rendimento Energetico è un indice delle performance termiche che indica i livelli di riscaldamento e raffrescamento richiesti in inverno ed in estate.<br>Gli immobili di classe A o B garantiscono maggior comfort e sono i più efficienti in termini di consumi di energia.</p>
                  </div>
              </div>
              <?php if(!empty($prop['actual_morgage']) || $prop['balance_difference'] != null || $prop['rate_type'] != null || $prop['remain_loan'] != null || $prop['remain_years'] != null || $prop['periodicity_installment'] != null || $prop['payment'] != null || $prop['bank'] != null){ ?>
                  <div class="row related-property-fnt">
                      Mutuo sull'immobile
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 mt20 mb20">
                      <p>Mutuo attuale: <?php echo $prop['actual_mortgage']; ?></p>
                      <p>Differenza a saldo: <?php echo $prop['balance_difference']; ?></p>
                      <p>Tipo mutuo: <?php echo $prop['rate_type']; ?></p>
                      <p>Residuo mutuo: <?php echo $prop['remain_loan']; ?></p>
                      <p>Residuo anni: <?php echo $prop['remain_years']; ?></p>
                      <p>Periodicit&aacute; rata: <?php echo $prop['periodicity_installment']; ?></p>
                      <p>Pagamento: <?php echo $prop['payment']; ?></p>
                      <p>Banca: <?php echo $prop['bank']; ?></p>
                  </div>
              <?php } ?>
              <?php if($prop['video'] != null){ ?>
              <div class="row related-property-fnt">
                  Video
              </div>
              <div class=" col-md-12 col-sm-12 col-xs-12 mt20 mb20">
                  <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $prop['video']?>?rel=0" frameborder="0" allowfullscreen></iframe>
              </div>
              <?php } ?>
              <div class="row related-property-fnt mt20">
                       Mappa
              </div>
              
              <div class=" col-md-12 col-sm-12 col-xs-12 mt20">
              <iframe class="detail-map-height" src="https://www.google.com/maps/embed/v1/place?key=<? echo $agency['google_api']; ?>&q=<? if($prop['address'] != null){ echo $prop['address']; }else{ echo $prop['location']; } ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
        </div><!--row brdr-->
    
    </div><!--col-md-12 col-sm-12 col-xs-12-->
    </div> <!-- /col-sm-9 -->

    
    
    <div class="col-md-3 col-sm-12 col-xs-12 row">
       <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 property-news-head mt15">
             Agente
         </div><!--col-md-12 col-sm-12 col-xs-12 property-news-head mt30-->
         <div class="col-md-12 col-sm-12 col-xs-12 brdr text-center">
             <a href="<? echo $siteurl; ?>/agent-info/<? echo $prop['rranduniq']; ?>/about" target="_blank"><img src="<? echo $siteurl; ?>/images/user/<? echo $prop['rprof_image']; ?>" class="im_ag pdb10" /></a>
             <p class="property-detail-page-agent-info-font"><? echo $prop['rfullname']; ?></p>
             <p class="property-detail-page-agent-info-font"><i class="fa fa-phone" aria-hidden="true"></i> <? echo $prop['rmobile']; ?></p>
			 <?
			 if($prop['remail']!=($_SESSION['usr']?? null)) {
					$_SESSION['tomail']=$prop['remail'];
                    $_SESSION['agent_randuniq']=$prop['rranduniq'];
                    $_SESSION['prop_randuniq']=$prop['rranduniq'];
					echo '<a href="javascript:;" data-toggle="modal" data-target="#contact-agent"><input type="button" class="btn btn-agent" value="Contatta agente"></a><br><br>';
			}
			echo "<hr>Riferimento codice immobile:<br><b>" . $prop['prop_ref'] . "</b>";
			?>
         </div><!--col-md-12 col-sm-12 col-xs-12 brdr-->
       </div><!--row-->

           <div class="row mt10">
                 <div class="col-md-12 col-sm-12 col-xs-12 property-news-head mt20">
                     Cerca immobile
                 </div><!--col-md-12 col-sm-12 col-xs-12 property-news-head mt30-->
                  <div class="col-md-12 col-sm-12 col-xs-12 brdr">
                      <form name="advsrch" action="<? echo $siteurl; ?>/property-list" class="form-horizontal" method="post">
                          <div class=" form-group">
                              <div class="col-sm-12 pdt15">
                                  <input type="text" name="keyword" class="form-control form-ctrl-height" placeholder="Titolo o Indirizzo immobile" value="<? echo @$keyword; ?>">
                              </div>
                          </div>
                          <div class=" form-group">
                              <div class="col-sm-6">
                                  <select name="categ" class="form-control form-ctrl-height">
                                      <option value="">Categoria</option>
                                      <option value="appartamento" <? if($categ=='appartamento') echo "selected"; ?>>Appartamento</option>
                                      <option value="attico-mansarda" <? if($categ=='attico-mansarda') echo "selected"; ?>>Attico / Mansarda</option>
                                      <option value="box-garage" <? if($categ=='box-garage') echo "selected"; ?>>Box / Garage</option>
                                      <option value="casa-indipendente" <? if($categ=='casa-indipendente') echo "selected"; ?>>Casa indipendente</option>
                                      <option value="loft-open-space" <? if($categ=='loft-open-space') echo "selected"; ?>>Loft / Open Space</option>
                                      <option value="palazzo-stabile" <? if($categ=='palazzo-stabile') echo "selected"; ?>>Palazzo / Stabile</option>
                                      <option value="rustico-casale" <? if($categ=='rustico-casale') echo "selected"; ?>>Rustico / Casale</option>
                                      <option value="villa" <? if($categ=='villa') echo "selected"; ?>>Villa</option>
                                      <option value="villetta-a-schiera" <? if($categ=='villetta-a-schiera') echo "selected"; ?>>Villetta a schiera</option>
                                      <option value="altro" <? if($categ=='altro') echo "selected"; ?>>Altro</option>
                                  </select>
                              </div>
                              <div class="col-sm-6">
                                  <select name="pfor" class="form-control form-ctrl-height">
                                      <option value="">Immobile in</option>
                                      <option value="vendita" <? if($pfor=='vendita') echo "selected"; ?>>Vendita</option>
                                      <option value="affitto" <? if($pfor=='affitto') echo "selected"; ?>>Affitto</option>
                                  </select>
                              </div>
                          </div>
                          <div class=" form-group">
                              <div class="col-sm-6">
                                  <select name="bed" class="form-control form-ctrl-height">
                                      <option value="">Camere da letto</option>
                                      <option value="1" <? if($bed==1) echo "selected"; ?>>1</option>
                                      <option value="2" <? if($bed==2) echo "selected"; ?>>2</option>
                                      <option value="3" <? if($bed==3) echo "selected"; ?>>3</option>
                                      <option value="4" <? if($bed==4) echo "selected"; ?>>4</option>
                                      <option value="5" <? if($bed==5) echo "selected"; ?>>5</option>
                                      <option value="6" <? if($bed==6) echo "selected"; ?>>6</option>
                                      <option value="7" <? if($bed==7) echo "selected"; ?>>7</option>
                                      <option value="8" <? if($bed==8) echo "selected"; ?>>8</option>
                                      <option value="9" <? if($bed==9) echo "selected"; ?>>9</option>
                                      <option value="10" <? if($bed==10) echo "selected"; ?>>10</option>
                                      <option value="11" <? if($bed==11) echo "selected"; ?>>11</option>
                                      <option value="12" <? if($bed==12) echo "selected"; ?>>12</option>
                                      <option value="13" <? if($bed==13) echo "selected"; ?>>13</option>
                                      <option value="14" <? if($bed==14) echo "selected"; ?>>14</option>
                                      <option value="15" <? if($bed==15) echo "selected"; ?>>15</option>
                                      <option value="16" <? if($bed==16) echo "selected"; ?>>16</option>
                                      <option value="17" <? if($bed==17) echo "selected"; ?>>17</option>
                                      <option value="18" <? if($bed==18) echo "selected"; ?>>18</option>
                                      <option value="19" <? if($bed==19) echo "selected"; ?>>19</option>
                                      <option value="20" <? if($bed==20) echo "selected"; ?>>20</option>
                                  </select>
                              </div>
                              <div class="col-sm-6">
                                  <select name="bath" class="form-control form-ctrl-height">
                                      <option value="">Bagni</option>
                                      <option value="1" <? if($bed==1) echo "selected"; ?>>1</option>
                                      <option value="2" <? if($bed==2) echo "selected"; ?>>2</option>
                                      <option value="3" <? if($bed==3) echo "selected"; ?>>3</option>
                                      <option value="4" <? if($bed==4) echo "selected"; ?>>4</option>
                                      <option value="5" <? if($bed==5) echo "selected"; ?>>5</option>
                                      <option value="6" <? if($bed==6) echo "selected"; ?>>6</option>
                                      <option value="7" <? if($bed==7) echo "selected"; ?>>7</option>
                                      <option value="8" <? if($bed==8) echo "selected"; ?>>8</option>
                                      <option value="9" <? if($bed==9) echo "selected"; ?>>9</option>
                                      <option value="10" <? if($bed==10) echo "selected"; ?>>10</option>
                                      <option value="11" <? if($bed==11) echo "selected"; ?>>11</option>
                                      <option value="12" <? if($bed==12) echo "selected"; ?>>12</option>
                                      <option value="13" <? if($bed==13) echo "selected"; ?>>13</option>
                                      <option value="14" <? if($bed==14) echo "selected"; ?>>14</option>
                                      <option value="15" <? if($bed==15) echo "selected"; ?>>15</option>
                                      <option value="16" <? if($bed==16) echo "selected"; ?>>16</option>
                                      <option value="17" <? if($bed==17) echo "selected"; ?>>17</option>
                                      <option value="18" <? if($bed==18) echo "selected"; ?>>18</option>
                                      <option value="19" <? if($bed==19) echo "selected"; ?>>19</option>
                                      <option value="20" <? if($bed==20) echo "selected"; ?>>20</option>
                                  </select>
                              </div>
                          </div>
                          <div class=" form-group">
                              <div class="col-sm-6">
                                  <select name="minp" class="form-control form-ctrl-height">
                                      <option value="">Prezzo min.</option>
                                      <option value="50000" <? if($budgetmin==50000) echo "selected" ?>>&euro; 50.000</option>
                                      <option value="100000" <? if($budgetmin==100000) echo "selected" ?>>&euro; 100.000</option>
                                      <option value="150000" <? if($budgetmin==150000) echo "selected" ?>>&euro; 150.000</option>
                                      <option value="200000" <? if($budgetmin==200000) echo "selected" ?>>&euro; 200.000</option>
                                      <option value="250000" <? if($budgetmin==250000) echo "selected" ?>>&euro; 250.000</option>
                                      <option value="300000" <? if($budgetmin==300000) echo "selected" ?>>&euro; 300.000</option>
                                      <option value="350000" <? if($budgetmin==350000) echo "selected" ?>>&euro; 350.000</option>
                                      <option value="400000" <? if($budgetmin==400000) echo "selected" ?>>&euro; 400.000</option>
                                      <option value="450000" <? if($budgetmin==450000) echo "selected" ?>>&euro; 450.000</option>
                                      <option value="500000" <? if($budgetmin==500000) echo "selected" ?>>&euro; 500.000</option>
                                      <option value="550000" <? if($budgetmin==550000) echo "selected" ?>>&euro; 550.000</option>
                                      <option value="600000" <? if($budgetmin==600000) echo "selected" ?>>&euro; 600.000</option>
                                      <option value="650000" <? if($budgetmin==650000) echo "selected" ?>>&euro; 650.000</option>
                                      <option value="700000" <? if($budgetmin==700000) echo "selected" ?>>&euro; 700.000</option>
                                      <option value="750000" <? if($budgetmin==750000) echo "selected" ?>>&euro; 750.000</option>
                                      <option value="800000" <? if($budgetmin==800000) echo "selected" ?>>&euro; 800.000</option>
                                      <option value="850000" <? if($budgetmin==850000) echo "selected" ?>>&euro; 850.000</option>
                                      <option value="900000" <? if($budgetmin==900000) echo "selected" ?>>&euro; 900.000</option>
                                      <option value="950000" <? if($budgetmin==950000) echo "selected" ?>>&euro; 950.000</option>
                                      <option value="1000000" <? if($budgetmin==1000000) echo "selected" ?>>&euro; 1.000.000</option>
                                      <option value="1250000" <? if($budgetmin==1250000) echo "selected" ?>>&euro; 1.250.000</option>
                                      <option value="1500000" <? if($budgetmin==1500000) echo "selected" ?>>&euro; 1.500.000</option>
                                      <option value="1750000" <? if($budgetmin==1750000) echo "selected" ?>>&euro; 1.750.000</option>
                                      <option value="2000000" <? if($budgetmin==2000000) echo "selected" ?>>&euro; 2.000.000</option>
                                      <option value="2500000" <? if($budgetmin==2500000) echo "selected" ?>>&euro; 2.500.000</option>
                                      <option value="3000000" <? if($budgetmin==3000000) echo "selected" ?>>&euro; 3.000.000</option>
                                      <option value="4000000" <? if($budgetmin==4000000) echo "selected" ?>>&euro; 4.000.000</option>
                                      <option value="5000000" <? if($budgetmin==5000000) echo "selected" ?>>&euro; 5.000.000</option>
                                      <option value="10000000" <? if($budgetmin==10000000) echo "selected" ?>>&euro; 10.000.000</option>
                                  </select>
                              </div>
                              <div class="col-sm-6">
                                  <select name="maxp" class="form-control form-ctrl-height">
                                      <option value="">Prezzo max.</option>
                                      <option value="50000"  <? if($budgetmax==50000) echo "selected"; ?>>&euro; 50.000</option>
                                      <option value="100000" <? if($budgetmax==100000) echo "selected"; ?>>&euro; 100.000</option>
                                      <option value="150000" <? if($budgetmax==150000) echo "selected"; ?>>&euro; 150.000</option>
                                      <option value="200000" <? if($budgetmax==200000) echo "selected"; ?>>&euro; 200.000</option>
                                      <option value="250000" <? if($budgetmax==250000) echo "selected"; ?>>&euro; 250.000</option>
                                      <option value="300000" <? if($budgetmax==300000) echo "selected"; ?>>&euro; 300.000</option>
                                      <option value="350000" <? if($budgetmax==350000) echo "selected"; ?>>&euro; 350.000</option>
                                      <option value="400000" <? if($budgetmax==400000) echo "selected"; ?>>&euro; 400.000</option>
                                      <option value="450000" <? if($budgetmax==450000) echo "selected"; ?>>&euro; 450.000</option>
                                      <option value="500000" <? if($budgetmax==500000) echo "selected"; ?>>&euro; 500.000</option>
                                      <option value="550000" <? if($budgetmax==550000) echo "selected"; ?>>&euro; 550.000</option>
                                      <option value="600000" <? if($budgetmax==600000) echo "selected"; ?>>&euro; 600.000</option>
                                      <option value="650000" <? if($budgetmax==650000) echo "selected"; ?>>&euro; 650.000</option>
                                      <option value="700000" <? if($budgetmax==700000) echo "selected"; ?>>&euro; 700.000</option>
                                      <option value="750000" <? if($budgetmax==750000) echo "selected"; ?>>&euro; 750.000</option>
                                      <option value="800000" <? if($budgetmax==800000) echo "selected"; ?>>&euro; 800.000</option>
                                      <option value="850000" <? if($budgetmax==850000) echo "selected"; ?>>&euro; 850.000</option>
                                      <option value="900000" <? if($budgetmax==900000) echo "selected"; ?>>&euro; 900.000</option>
                                      <option value="950000" <? if($budgetmax==950000) echo "selected"; ?>>&euro; 950.000</option>
                                      <option value="1000000" <? if($budgetmax==1000000) echo "selected"; ?>>&euro; 1.000.000</option>
                                      <option value="1250000" <? if($budgetmax==1250000) echo "selected"; ?>>&euro; 1.250.000</option>
                                      <option value="1500000" <? if($budgetmax==1500000) echo "selected"; ?>>&euro; 1.500.000</option>
                                      <option value="1750000" <? if($budgetmax==1750000) echo "selected"; ?>>&euro; 1.750.000</option>
                                      <option value="2000000" <? if($budgetmax==2000000) echo "selected"; ?>>&euro; 2.000.000</option>
                                      <option value="2500000" <? if($budgetmax==2500000) echo "selected"; ?>>&euro; 2.500.000</option>
                                      <option value="3000000" <? if($budgetmax==3000000) echo "selected"; ?>>&euro; 3.000.000</option>
                                      <option value="4000000" <? if($budgetmax==4000000) echo "selected"; ?>>&euro; 4.000.000</option>
                                      <option value="5000000" <? if($budgetmax==5000000) echo "selected"; ?>>&euro; 5.000.000</option>
                                      <option value="10000000" <? if($budgetmax==10000000) echo "selected"; ?>>&euro; 10.000.000</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <button class="btn btn-search" type="submit" name="advsrch">Cerca</button>
                              </div>
                          </div>
                      </form>
                    
               </div><!--col-md-12 col-sm-12 col-xs-12 brdr-->
         </div><!--row-->
        <?php if($prop['prop_for']=="vendita"){ ?>
         <div class="row mt10">
               <div class="col-md-12 col-sm-12 col-xs-12 brdr">
                  <div id="ctl07_ctl00_divMortgageCalculator" class="mortgage box-specials">
                    <iframe src="http://tool.credipass.it/boxrata?Canale=REMAX&amp;CostoImmobile=<?php echo $prop['exp_price']?>&amp;IdConv=0&amp;CodiceImmobile=<?php echo $prop['randuniq']?>&amp;Width=430&amp;HideConv=1" id="ctl07_ctl00_iFrameMortgageCalc" frameborder="0" name="iFrameMortgageCalc" width="100%" height="315"></iframe>
                  </div>
               </div>
         </div><!--row-->
        <?php } ?>
    </div><!--col-md-3 col-sm-12 col-xs-12-->
  </div> <!-- /row -->
</div> <!-- /container -->
<div class="container">
    <div class="row ml10 mt20">
    <div class="col-md-12 col-sm-12 col-xs-12 related-property-fnt row">
         Immobili correlati
    </div><!--col-md-12 col-sm-12 col-xs-12-->

       <div style="padding-left:0px;">
			<?
			$result=$db->get_all("select l.*, (select `image` from listing_images where pid = l.id limit 1) as rprimimage 
from listings l where l.post_sts=1 and l.category='".$prop['category']."' and randuniq!='$pid' order by id desc limit 4");
			if(count($result)>=1) {
				foreach($result as $key => $rp) {
					//$rpim=$db->singlerec("select * from listing_images where pid='".$rp['id']."'");

			?>
            <div class="col-md-3 col-sm-6 col-xs-12 mt30">
                  <div class="carshop-item brdr-2">
                      <div class="photo">
                          <a href="<? echo $siteurl; ?>/listing/<? echo $rp['randuniq']; ?>/<? echo $rp['slug']; ?>"><img src="<? echo $siteurl; ?>/images/prop/230_144/<? echo $rp['rprimimage']; ?>" class="img-responsive" alt="a" /></a>
                      </div><!--photo-->
                         <div class="info row">                                    
                              <div class="col-md-12">
                                     <p class="related-property-miami mt10"><? echo ucfirst(str_replace("-", " ",$rp['types'])); ?></p>
                                     <p class="related-property-place"><? echo substr($rp['prop_title'], 0, 30)."..."; ?></p>
                                     <p class="related-property-miami"><? echo $rp['location']; ?></p>
                                     <p class="related-property-price">&euro; <? echo number_format($rp['exp_price'] , 0, ',', '.'); if($rp['prop_for']=='affitto'){echo ' al mese';} ?></p>
                                     <div class=" col-md-12">
                                        <div class="row">
                                             <div class=" col-md-4 new-properties-details">
                                                  <span><i class="fa fa-area-chart" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $rp['covered_area']; ?> mq<span>
                                             </div><!--col-md-4-->
                                             <div class=" col-md-4 new-properties-details">
                                                  <span><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $rp['hall']; ?> locali</span>
                                             </div><!--col-md-4-->
                                             <div class=" col-md-4 new-properties-details">
                                                <span><i class="fa fa-bath" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $rp['bathroom']; ?> bagni</span>
                                             </div><!--col-md-4-->
                                         </div><!--row-->
                                     </div><!--brdr-2-->
                               </div><!--price col-md-12-->                                      
                              </div><!--info row-->
                          </div><!--carshop-item-->
                     </div><!--col-md-3-->
						<?
						}
						}
						?>
                     </div><!--row-->
  </div><br>
</div><!--container-->

<? include "footer.php"; ?>