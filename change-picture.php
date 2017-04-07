<? 
include 'header.php';
include 'profile_header.php';
?>
<style>
input[type="button" i], input[type="file" i] { background: #0053a0;color: #fff;padding: 8px; width:100%; }
</style>
<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Dashboard</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
         <? include "profile_left.php"; ?>     
         <div class="col-md-9 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 <div class="row col-md-10 col-sm-6 col-xs-12 property-dash-head">Carica foto profilo<hr></div>
                 </div><!--class="pdt10"-->
                 
                 <div class=" col-md-12 col-sm-12 col-xs-12 table-responsive">
						<form action="change-picture" method="post" enctype="multipart/form-data">
						<img id="previewing">
						<hr id="line">
						<div class="col-md-12 " id="selectImage"><span class="blackhead" style="font-size:16px;">Seleziona immagine</span><br><br>
						   <div class="row"><div class="col-md-12">
								<input type="file" name="file" id="file" required="required">
							</div></div>
							<div class="row"><div class="col-md-6">
								<input type="submit" name="prf_img" value="Carica" class="submit"><br><br>
							</div></div>
						</div>
						<div class="row"><div class="col-md-6">
								<span class="mt10"><b>* L'immagine deve essere almeno 200x200 pixel!</b></span>
						</div></div>
						</form>
                 </div><!--table-responsive-->
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->

<? include "footer.php"; ?>