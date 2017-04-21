<? //include "header.php"; ?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">FAQ's</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
    <div class="row">
  
         <div class="col-md-12 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 
                 </div><!--class="pdt10"-->					
					
					<div class="text-center blackhead" style="font-size:20px; font-weight:bold;">Frequently Asked Questions</div>
					
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?
		foreach($faq as $f) {
		?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<? echo $f['id']; ?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<? echo $f['id']; ?>" aria-expanded="false" aria-controls="collapse">
                        <!-- <i class="more-less glyphicon glyphicon-plus"></i> -->
						<!-- <i class="more-less fa-2x fa fa-angle-double-down" aria-hidden="true"></i> -->
						<i class="more-less fa-2x fa fa-angle-down" aria-hidden="true"></i>
                        <? echo $f['ques']; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<? echo $f['id']; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<? echo $f['id']; ?>">
                <div class="panel-body">
                      <? echo $f['ans']; ?>
                </div>
            </div>
        </div>
		<?
		}
		?>
		
    </div><!-- panel-group -->
                 
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->

<? include "footer.php"; ?>