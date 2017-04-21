<? //include "header.php"; ?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Privacy Policy</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
    <div class="row">
         
         <div class="col-md-12 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 
                 </div><!--class="pdt10"-->					
					
					<div class="text-center blackhead" style="font-size:20px; font-weight:bold;">Privacy Policy</div>
					<div class="col-md-12">
					<?
					//$cms=$db->singlerec("select * from cms where active_status=1");
					?>
					<div class="col-md-12 col-sm-6">					   
					   <div class="customer-review-font  mt10">
					    <? echo $cms['privacy']; ?>
					</div>
					</div>
					</div>
					
                 
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->

<? include "footer.php"; ?>