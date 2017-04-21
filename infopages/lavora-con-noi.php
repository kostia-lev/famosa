<?
//include "header.php";
//$cms=$db->singlerec("select * from cms where active_status=1");
?>

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
            <span class="blackhead pdl10">Lavorare in RE/MAX</span>
        </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12 mt20">
                <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                    <div class="pdt10">

                    </div><!--class="pdt10"-->

                    <div class="text-center blackhead" style="font-size:20px; font-weight:bold;">LAVORA CON NOI</div>

                    <div class="text-center customer-review-font mt10">
                        <? echo $cms['aboutus']; ?>
                    </div>


                    <div class="text-center mt15 blackhead" style="font-size:18px; font-weight:bold;">
                        RE/MAX offre un modo assolutamente nuovo e intelligente di fare agenzia immobiliare.
                    </div>


                    <div class="col-sm-6 mt20 text-center">
                        <img src="assets/images/mission.png">

                        <div class="text-center mt15 blackhead" style="font-size:18px; font-weight:bold; border-top:2px solid#4fb948">
                            SUPPORTO RE/MAX
                        </div>

                        <div class="text-center customer-review-font mt10">
                            <? echo $cms['what_wedo']; ?>
                        </div>
                    </div>


                    <div class="col-sm-6 mt20 text-center">
                        <img src="assets/images/vission.png">

                        <div class="text-center mt15 blackhead" style="font-size:18px; font-weight:bold; border-top:2px solid#4fb948">
                            BENEFICI DI LAVORARE IN RE/MAX 
                        </div>
                        <div class="text-center customer-review-font mt10">
                            <? echo $cms['our_vision']; ?>
                        </div>
                    </div>


                </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
            </div><!--col-md-9 col-sm-12 col-xs-12-->
        </div><!--row-->
    </div> <!--container-->

<? include "footer.php"; ?>