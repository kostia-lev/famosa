<?php
include "header.php";
include "mapapi.php";
?>

<div class="container-fluid banner">
    <div class="overlay-banner"></div>
    <div class="container banner-content">
            <div class=" col-md-12 col-sm-12 col-xs-12 mt120">
                 <span class="banner-font-big">Trova il tuo immobile ideale</span>
            </div><!--col-md-12 col-sm-12 col-xs-12 mt60 text-center-->
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 banner-search-form">
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0">
                    <div class="row text-center">
						<form name="quicksrch1" action="property-list" method="post">
                            <div class="banner-group-3 mt20" >
                                <select name="categ" class="form-control banner-group-brdr">
                                    <option value="">Categoria immobile</option>
                                    <option value="appartamento">Appartamento</option>
                                    <option value="attico-mansarda">Attico / Mansarda</option>
                                    <option value="box-garage">Box / Garage</option>
                                    <option value="casa-indipendente">Casa indipendente</option>
                                    <option value="loft-open-space">Loft / Open Space</option>
                                    <option value="palazzo-stabile">Palazzo / Stabile</option>
                                    <option value="rustico-casale">Rustico / Casale</option>
                                    <option value="villa">Villa</option>
                                    <option value="villetta-a-schiera">Villetta a schiera</option>
                                    <option value="terreno">Terreno</option>
                                    <option value="altro">Altro</option>
                                </select>
                            </div><!--col-md-3 col-sm-12 col-xs-12 quick-search-->
                            <div class="banner-group-1 banner-group-brdr-2 mt20">
                                 <input id="addr" onFocus="geolocate()" type="text" name="city" class="form-control banner-group-brdr" placeholder="Inserisci una citt&aacute; o una localit&aacute;">
                            </div><!--banner-group banner-group-brdr-2-->
                            <div class="banner-group mt20" >
                                <select name="pfor" class="form-control banner-group-brdr">
                                    <option value="">Contratto</option>
                                    <option value="vendita">Vendita</option>
                                    <option value="affitto">Affitto</option>
                                </select>
                            </div><!--col-md-3 col-sm-12 col-xs-12 quick-search-->
                             <div class="banner-group mt20">
                                 <input type="number" value="" name="covered_area" class="form-control banner-group-brdr" placeholder="Superficie min. (m²)" min="1">
                            </div><!--banner-group banner-group-brdr-2-->
                            <div class="banner-group mt20">
                                <select name="tbudmin" class="form-control banner-group-brdr">
                                    <option value="">Prezzo min.</option>
                                    <option value="50000">&euro; 50.000</option>
                                    <option value="100000">&euro; 100.000</option>
                                    <option value="150000">&euro; 150.000</option>
                                    <option value="200000">&euro; 200.000</option>
                                    <option value="250000">&euro; 250.000</option>
                                    <option value="300000">&euro; 300.000</option>
                                    <option value="350000">&euro; 350.000</option>
                                    <option value="400000">&euro; 400.000</option>
                                    <option value="450000">&euro; 450.000</option>
                                    <option value="500000">&euro; 500.000</option>
                                    <option value="550000">&euro; 550.000</option>
                                    <option value="600000">&euro; 600.000</option>
                                    <option value="650000">&euro; 650.000</option>
                                    <option value="700000">&euro; 700.000</option>
                                    <option value="750000">&euro; 750.000</option>
                                    <option value="800000">&euro; 800.000</option>
                                    <option value="850000">&euro; 850.000</option>
                                    <option value="900000">&euro; 900.000</option>
                                    <option value="950000">&euro; 950.000</option>
                                    <option value="1000000">&euro; 1.000.000</option>
                                    <option value="1250000">&euro; 1.250.000</option>
                                    <option value="1500000">&euro; 1.500.000</option>
                                    <option value="1750000">&euro; 1.750.000</option>
                                    <option value="2000000">&euro; 2.000.000</option>
                                    <option value="2500000">&euro; 2.500.000</option>
                                    <option value="3000000">&euro; 3.000.000</option>
                                    <option value="4000000">&euro; 4.000.000</option>
                                    <option value="5000000">&euro; 5.000.000</option>
                                    <option value="10000000">&euro; 10.000.000</option>
                                </select>
                            </div><!--banner-group banner-group-brdr-2-->
                            <div class="banner-group mt20">
                                <select name="tbudmax" class="form-control banner-group-brdr">
                                    <option value="">Prezzo max.</option>
                                    <option value="50000">&euro; 50.000</option>
                                    <option value="100000">&euro; 100.000</option>
                                    <option value="150000">&euro; 150.000</option>
                                    <option value="200000">&euro; 200.000</option>
                                    <option value="250000">&euro; 250.000</option>
                                    <option value="300000">&euro; 300.000</option>
                                    <option value="350000">&euro; 350.000</option>
                                    <option value="400000">&euro; 400.000</option>
                                    <option value="450000">&euro; 450.000</option>
                                    <option value="500000">&euro; 500.000</option>
                                    <option value="550000">&euro; 550.000</option>
                                    <option value="600000">&euro; 600.000</option>
                                    <option value="650000">&euro; 650.000</option>
                                    <option value="700000">&euro; 700.000</option>
                                    <option value="750000">&euro; 750.000</option>
                                    <option value="800000">&euro; 800.000</option>
                                    <option value="850000">&euro; 850.000</option>
                                    <option value="900000">&euro; 900.000</option>
                                    <option value="950000">&euro; 950.000</option>
                                    <option value="1000000">&euro; 1.000.000</option>
                                    <option value="1250000">&euro; 1.250.000</option>
                                    <option value="1500000">&euro; 1.500.000</option>
                                    <option value="1750000">&euro; 1.750.000</option>
                                    <option value="2000000">&euro; 2.000.000</option>
                                    <option value="2500000">&euro; 2.500.000</option>
                                    <option value="3000000">&euro; 3.000.000</option>
                                    <option value="4000000">&euro; 4.000.000</option>
                                    <option value="5000000">&euro; 5.000.000</option>
                                    <option value="10000000">&euro; 10.000.000</option>
                                </select>
                            </div><!--banner-group banner-group-brdr-2-->
                            <div class="banner-group-2 mt20">
                                <button type="submit" name="quicksrch1" class="form-control banner-btn banner-group-brdr"><i class="fa fa-search pdr10 fa-2x" aria-hidden="true"></i></button>
                            </div><!--banner-group banner-group-brdr-2-->
						</form>
                        </div><!--row-->
                     </div><!--col-md-10 col-sm-12 col-xs-12 col-md-offset-2-->


                     <div class="mt30 hidden-xs">&nbsp;</div>
        </div><!--col-md-12 col-sm-12 col-xs-12-->
      </div><!--container-->
</div><!--container-fluid banner-->

<!---------------------------------------------------------Featured Property------------------------------------------------------->
<div class="container mt20">
     <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12 brdr-new-1">
              <!---------Slider List--------->

          <div class="row brdr-new-1-bg">
                      <div class="col-md-12">
                          <p><span class="whitehead"> Occasioni del mese</span><a href="property-list"><span class="btn btn-view pull-right">Vedi tutti</span></a></p>
                      </div>     <!--col-md-12-->
                  </div>

                  <div id="carousel-example-1" class="carousel slide " data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" style="overflow:visible;">
                          <div class="item active">
                              <div class="row">
								<?

                                $que="select * from listings where post_sts=1 and featured=1 order by rand() desc limit 0, 40";

								$result=$db->get_all($que);
								foreach($result as $key => $row) {

                                        //Colors flags
                                        $ccount++;
                                        if($ccount==1){ $color="#4083cc"; }
                                        else if($ccount==2){ $color="#509630"; }
                                        else if($ccount==3){ $color="#d9001a"; }
                                        else { $color="#f2bb3d"; }

                                        if($ccount == 4){ $ccount = 0; }

										$im=$db->singlerec("select * from listing_images where pid='".$row['id']."' order by id limit 1");
								?>
                                  <div class="col-md-3 col-sm-6 col-xs-12 mt20">
                                      <div class="carshop-item brdr-2">
                                          <div class="photo">
                                              <div class="carshop-item-flags">
                                                  <div class="flag newFlag" style="background-color:<?php echo $color; ?>">Occasione</div>
                                              </div>
                                              <a href="listing/<? echo $row['randuniq']; ?>/<? echo $row['slug']; ?>"><img src="images/prop/230_144/<? echo $im['image']; ?>" class="img-responsive" alt="a" /></a>
                                          </div><!--photo-->
                                             <div class="info row">
                                                  <div class="col-md-12">
                                                      <p class="new-properties-type pdl10 mt10"><? echo ucfirst(str_replace("-", " ",$row['types'])); ?></p>
                                                      <p class="new-properties-head pdl10"><? echo substr($row['prop_title'], 0, 20)."..."; ?></p>
                                                      <p class="new-properties-place pdl10 "><? echo $row['location']; ?></p>
                                                      <p class="bluehead pdl10">&euro; <? echo number_format($row['exp_price'] , 0, ',', '.'); if($row['prop_for']=='affitto'){echo ' al mese';} ?></p>
                                                         <div class="col-md-12">
                                                             <div class="row">
                                                                 <div class=" col-xs-4 new-properties-details">
                                                                      <span><i class="fa fa-area-chart" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['covered_area']; ?> mq<span>
                                                                 </div><!--col-md-4-->
                                                                 <div class=" col-xs-4 new-properties-details">
                                                                      <span><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['hall']; ?> locali</span>
                                                                 </div><!--col-md-4-->
                                                                 <div class=" col-xs-4 new-properties-details">
                                                                    <span><i class="fa fa-bath" aria-hidden="true"></i>&nbsp;&nbsp;<? echo $row['bathroom']; ?> bagni</span>
                                                                 </div><!--col-md-4-->
                                                             </div><!--row-->
                                                         </div><!--brdr-2-->
                                                   </div><!--price col-md-12-->
                                                  </div><!--info row-->
                                              </div><!--carshop-item-->
                                         </div><!--col-md-3-->
											<?
											}
											?>
                              </div><!--row-->
                          </div><!--item-->
                      </div>
              </div>

          </div><!--col-md-12 col-sm-12 col-xs-12 brdr-->
     </div><!--col-md-9 col-sm-12 col-xs-12-->
</div><!--container-->

<? include "footer.php"; ?>
<?
if(isset($nslet)) {
	$name=trim(addslashes($name));
	$mail=trim(addslashes($email));
	$ip=$_SERVER['REMOTE_ADDR'];
	$time=time();
	if(empty($name)||empty($mail)) {
	    echo "<script>swal('Errore', 'Inserisci un nome ed un\'email per iscriverti alla Newsletter!', 'error')</script>";
	}
	else {
		$check=$db->check1column("newsletter", "email", $mail);
		if($check==0) {
			$set="name='$name',";
			$set.="email='$mail',";
			$set.="ip='$ip',";
			$set.="date='$time'";
			$db->insertrec("insert into newsletter set $set");
			echo "<script>swal('Complimenti', 'Ti sei iscritto con successo alla Newsletter!', 'success')</script>";
		}
		else {
			echo "<script>swal('Errore', 'Sei già iscritto alla Newsletter!', 'error')</script>";
		}
	}
}
else if(isset($_REQUEST['rdone'])) {
	echo "<script>swal('Complimenti', 'Ti sei iscritto con successo! Controlla la tua email per verificare l\'account!', 'success');</script>";
}
else if(isset($_REQUEST['inactive'])) {
	echo "<script>swal('Errore', 'Il tuo account è in attesa di attivazione! Attendi che il broker attivi il tuo account!', 'error');</script>";
}
else if(isset($_REQUEST['fpmail'])) {
	echo "<script>swal('Operazione riuscita', 'Ti abbiamo inviato un\'email con il link per resettare la password. Controlla la tua email e clicca sul link!', 'success');</script>";
}
else if(isset($_REQUEST['cmail'])) {
	echo "<script>swal('Errore', 'Indirizzo email non valido!', 'error');</script>";
}
else if(isset($_REQUEST['cmailsent'])) {
	echo "<script>swal('Complimenti', 'La tua richiesta è stata inviata all\'agente!', 'success');</script>";
}
else if(isset($_REQUEST['verified'])) {
    echo "<script>swal('Complimenti', 'Il tuo account è stato verificato! Ora attendi che il broker attivi il tuo account!', 'success')</script>";
}
?>