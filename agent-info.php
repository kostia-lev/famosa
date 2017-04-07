<?
include "header.php";
$id=trim(addslashes($id));
		if($id=='') {
		   echo "<script>location.href='$siteurl';</script>";
		   header("Location: $siteurl"); exit;
		}
$user=$db->singleasso("select * from register where randuniq='$id'");
		if($user['id']=='') {
			echo "<script>location.href='$siteurl';</script>";
			header("Location: $siteurl"); exit;
		}
?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 row market-place-head-bg mt20">
        <span class="blackhead"><? echo strtoupper($user['fullname']); ?></span>
    </div><!--col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20-->

       <div class="col-md-12 col-sm-12 col-xs-12 row mt15  brdr">
            <div class="col-md-3">
               <img src="<? echo $siteurl; ?>/images/user/<? echo $user['prof_image']; ?>" class="img-rounded img-responsive img-thumbnail">
                <div><strong><br><? echo strtoupper($user['fullname']); ?></strong></div>
                 
                 <div class="text-left mt10"><i class="fa fa-phone"></i> <? echo $user['mobile']; ?></div>
                 <div class="text-left mt10"><i class="fa fa-envelope-o"></i> <a href="mailto:<? echo $user['email']; ?>"><? echo $user['email']; ?></a></div>
				 
				<? 
				if($user['skype']!='') 
						echo '<div class=" text-left mt10"><i class="fa fa-skype"></i> '.$user['skype'].'</div>'; 
				if($user['facebook']!='') 
						echo '<div class=" text-left mt10"><i class="fa fa-facebook-square"></i> '.$user['facebook'].'</div>';
				if($user['twitter']!='') 
						echo '<div class=" text-left mt10"><i class="fa fa-twitter-square"></i> '.$user['twitter'].'</div>';

				if($user['email']!=$_SESSION['usr']) {
						$_SESSION['tomail']=$user['email'];
						echo '<br><div class="mt10"><a href="javascript:;" data-toggle="modal" data-target="#contact-agent"><input type="button" class="btn btn-view-detail"  value="Contatta agente"></a></div>';
			    }
				  ?>
                 
            </div><!--col-md-3-->
             <div class="col-md-9 mt15">
                 <p><? echo $user['details']; ?></p>
            </div><!--col-md-3-->
       </div><!--col-md-12-->
         
         
         <div class="col-md-12 col-sm-12 col-xs-12 row brdr-new-1 mt15 ">
              <!---------Slider List--------->

          <div class="row brdr-new-1-bg">
                      <div class="col-md-12">
                          <p><span class="whitehead">Immobili inseriti da <? echo $user['fullname']; ?></p>
                      </div>     <!--col-md-12-->                 
                  </div>
                  
                  <div id="carousel-example-1" class="carousel slide " data-ride="carousel">
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" style="overflow:visible;">
                          <div class="item active">
                              <div class="row">
								<?
								$result=$db->get_all("select * from listings where email='".$user['email']."' order by id desc limit 8");
								if(count($result)>=1) {
									foreach($result as $key => $row) {
											$im=$db->singlerec("select * from listing_images where pid='".$row['id']."' limit 1");
								?> 
                                  <div class="col-md-3 col-sm-6 col-xs-12 mt30">
                                      <div class="carshop-item brdr-2">
                                          <div class="photo">
                                              <a href="<? echo $siteurl; ?>/listing/<? echo $row['randuniq']; ?>/<? echo $row['slug']; ?>"><img src="<? echo $siteurl; ?>/images/prop/230_144/<? echo $im['image']; ?>" class="img-responsive" alt="a"></a>
                                          </div><!--photo-->
                                             <div class="info row">                                    
                                                  <div class="col-md-12">
                                                         <p class="new-properties-place pdl10 mt10"><? echo ucfirst(str_replace("-", " ",$row['types'])); ?></p>
                                                         <p class="new-properties-head pdl10"><? echo substr($row['prop_title'], 0, 30)."..."; ?></p>
                                                         <p class="new-properties-place pdl10 "><? echo $row['location']; ?></p>
                                                         <p class="bluehead pdl10">&euro; <? echo number_format($row['exp_price'] , 0, ',', '.'); if($row['prop_for']=='affitto'){echo ' al mese';} ?></p>
                                                         <div class=" col-md-12">
                                                             <div class="row">
                                                                 <div class="col-md-4 new-properties-details">
                                                                      <img src="<? echo $siteurl; ?>/assets/images/square.png"><span class="pdl5"><? echo $row['covered_area']; ?></span>
                                                                 </div><!--col-md-4-->
                                                                 <div class="col-md-4 new-properties-details">
                                                                      <img src="<? echo $siteurl; ?>/assets/images/bed.png"><span class="pdl10"><? echo $row['bedroom']; ?></span>
                                                                 </div><!--col-md-4-->
                                                                 <div class="col-md-4 new-properties-details">
                                                                    <img src="<? echo $siteurl; ?>/assets/images/bath.png"><span class="pdl10"><? echo $row['bathroom']; ?></span>
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
										else {
												echo "&nbsp; &nbsp; Nessun immobile trovato!";
										}
                                        ?>
                              </div><!--row-->
                          </div><!--item-->
                      </div>
              </div> 

          </div>
</div>
</div><!--container-->

<? include "footer.php"; ?>