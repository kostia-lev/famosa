<?
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}
$categ = $categ?? null;
$bed = $bed?? null;
$bath = $bath?? null;
$pfor = $pfor?? null;
$budgetmin = $budgetmin?? null;
$budgetmax = $budgetmax?? null;
?>
<div class="col-md-3 col-sm-12 col-xs-12 row ml10" style="padding-right:0px; padding-left:0px;">
         <div class="col-md-12 col-sm-12 col-xs-12 mt10 brdr">
          
              <p><span class="blackhead"> Cerca immobile</span></p>
              <div class="new-properties-brdr-btm-2"></div>
                  <form name="advsrch" action="/property-list" class="form-horizontal" method="get">
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
                                      <option value="terreno" <? if($categ=='terreno') echo "selected"; ?>>Terreno</option>
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
                                   <option value="1" <? if($bath==1) echo "selected"; ?>>1</option>
                                   <option value="2" <? if($bath==2) echo "selected"; ?>>2</option>
                                   <option value="3" <? if($bath==3) echo "selected"; ?>>3</option>
                                   <option value="4" <? if($bath==4) echo "selected"; ?>>4</option>
                                   <option value="5" <? if($bath==5) echo "selected"; ?>>5</option>
                                   <option value="6" <? if($bath==6) echo "selected"; ?>>6</option>
                                   <option value="7" <? if($bath==7) echo "selected"; ?>>7</option>
                                   <option value="8" <? if($bath==8) echo "selected"; ?>>8</option>
                                   <option value="9" <? if($bath==9) echo "selected"; ?>>9</option>
                                   <option value="10" <? if($bath==10) echo "selected"; ?>>10</option>
                                   <option value="11" <? if($bath==11) echo "selected"; ?>>11</option>
                                   <option value="12" <? if($bath==12) echo "selected"; ?>>12</option>
                                   <option value="13" <? if($bath==13) echo "selected"; ?>>13</option>
                                   <option value="14" <? if($bath==14) echo "selected"; ?>>14</option>
                                   <option value="15" <? if($bath==15) echo "selected"; ?>>15</option>
                                   <option value="16" <? if($bath==16) echo "selected"; ?>>16</option>
                                   <option value="17" <? if($bath==17) echo "selected"; ?>>17</option>
                                   <option value="18" <? if($bath==18) echo "selected"; ?>>18</option>
                                   <option value="19" <? if($bath==19) echo "selected"; ?>>19</option>
                                   <option value="20" <? if($bath==20) echo "selected"; ?>>20</option>
                               </select>
                          </div>
                      </div>
                      <div class=" form-group">
                          <div class="col-sm-6">
                              <select name="tbudmin" class="form-control form-ctrl-height">
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
                               <select name="tbudmax" class="form-control form-ctrl-height">
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
          
     </div><!--col-md-12 col-sm-12 col-xs-12-->
          
          <div class="col-md-12 col-sm-12 col-xs-12  brdr mt20">
           
				<p><span class="blackhead">Ricevi aggiornamenti</span></p>
				<div class="new-properties-brdr-btm-2"></div><br>
				<div class="property-news-font-1">Inserisci il tuo nome e la tua email per sapere quali sono gli ultimi immobili in arrivo.</div><!--property-news-font--><br>
				<form name="nslet" action="<?php echo "/index.php"; ?>" method="post">
				<input type="text" name="name" class="form-control" placeholder="Il tuo nome" value="<? echo @$name; ?>" required="">
				<div class="mt10"><input type="email" name="email" class="form-control" placeholder="La tua email" <? echo @$email; ?> required=""></div>
				<label class="col-md-12 col-sm-12 col-xs-12 mt20">
				<input type="radio" name="agr" required="" checked=""><span class="property-news-head-2"><i> &nbsp;&nbsp;Accetto i <a href="#" target="_blank">Termini del Servizio</a> e la <a href="#" target="blank">Politica sulla Privacy </a></i></span>
				</label> 

				<div class="col-md-12 col-sm-12 col-xs-12 pdt10" style="padding-left:0px;">
				<button class="btn btn-search" type="submit" name="nslet">Invia!</button>
				</div> 
				</form>
          
     </div><!--col-md-12 col-sm-12 col-xs-12  brdr mt20-->
     
     
     <div class="col-md-12 col-sm-12 col-xs-12 mt10 text-center brdr">
          <a href="#"><img src="/assets/images/ad.jpg" class="img-responsive"><a>
         
     </div><!--col-md-3 col-sm-12 col-xs-12-->
     
    </div>