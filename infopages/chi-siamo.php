<?
include "header.php";
$cms=$db->singlerec("select * from cms where active_status=1");
?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Chi siamo</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
    <div class="row">
	
         <div class="col-md-12 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 
                 </div><!--class="pdt10"-->					
					
					<div class="text-center blackhead" style="font-size:20px; font-weight:bold;">Chi siamo</div>
					
					<div class="text-center customer-review-font mt10">
					    <? echo $cms['whoarewe']; ?>
					</div>
                 
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
    <div class="col-md-12 col-sm-12 col-xs-12 row mt20">
        <div class="market-place-head-bg col-md-12">
            <span class="blackhead">I nostri agenti</span>
        </div>
    </div><!--col-md-12 col-sm-12 col-xs-12 market-place-head-bg mt20-->
    <div class="col-md-12 mt20 row" style="padding-left:0px; padding-right:0px;">
        <?
        $que="select * from register where active=1";
        $result=$db->get_all($que);
        if(count($result)<1) {
            echo "<br>Nessun agente trovato!";
        }
        else {
            foreach($result as $row) {
                ?>
                <div class="col-md-3">
                    <div class="col-md-12 dealer-box text-center">
                        <img src="images/user/<? echo $row['prof_image']; ?>" width="150" height="220" class="img-rounded pdt20" />
                        <div class="dealer-name"><? echo strtoupper($row['fullname']); ?></div>
                        <div class="dealer-body">Telefono: <? echo $row['mobile']; ?></div>
                        <div class="dealer-body">Email: <? echo $row['email']; ?></div>
                        <a href="agent-info/<? echo $row['randuniq']; ?>/about" class="btn-dealer btn">Vedi profilo</a>

                        <div style="bottom:0px;">
                            <a href="tel:<? echo $row['mobile']; ?>"><button class="btn-merchant-directory-list-button"><i class="fa fa-phone"></i></button></a>
                            <a href="mailto:<? echo $row['email']; ?>"><button class="btn-merchant-directory-list-button"><i class="fa fa-envelope-o"></i></button></a>
                            <? if($row['website'] != null){ ?>
                                <a href="<? echo $row['website']; ?>"><button class="btn-merchant-directory-list-button"><i class="fa fa-globe"></i></button></a>
                            <? } ?>
                        </div>


                    </div><!--col-md-3-->
                </div><!--col-md-3 dealer-box-->
                <?
            }
        }
        ?>
    </div><!--col-md-12-->
</div> <!--container-->

<? include "footer.php"; ?>