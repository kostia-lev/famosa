<? include "header.php"; ?>
<? $agency=$db->singlerec("select * from general_setting where id='1'"); ?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Dove siamo</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12 mt20">
            <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">

                <div class="text-center customer-review-font mt10 mb10">
                    <iframe class="detail-map-height" src="https://www.google.com/maps/embed/v1/place?key=<? echo $agency['google_api']; ?>&q=<? echo $agency['agency_address']; ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
        </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->

    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Contattaci</span>
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
    
    <div class="row">
         
         <div class="col-md-12 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">

					<div class="col-md-6 mt10">
                                    <form action="contact" method="post">
                                      <div class="form-group">
                                        <label class="heading-black-small-2">Nome</label>
                                        <input type="text" name="name" class="form-control" required>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="heading-black-small-2">Indirizzo email</label>
                                        <input type="email" name="email" class="form-control" required>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="heading-black-small-2">Numero di cellulare</label>
                                        <input type="number" name="mobile" class="form-control" required>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="heading-black-small-2">Messaggio</label>
                                        <textarea class="form-control" name="message" rows="5" name="textarea" required></textarea>
                                      </div>
                                      
                                      <div class="form-group pdt15">
                                          <input name="cont_us" class="btn btn-search" type="submit" value="Invia richiesta!">
                                      </div>
                                     
                             
                                    </form>
                               </div>
                               <div class="col-md-6">
                                        <p class=" heading-black  pdt20">Contatti:</p>
                                        <ul class="contact-list">
                                        <li ><i class="fa fa-phone page-links" aria-hidden="true"></i> &nbsp; (Italia) (+39) 0742 352831</li>
                                        <li ><i class="fa fa-phone page-links" aria-hidden="true"></i> &nbsp; (Italia) (+39) 340 9790084</li>
                                        <li ><i class="fa fa-envelope-o page-links" aria-hidden="true"></i> &nbsp; info@remax-famosa.it </li>
                                        <li ><i class="fa fa-address-card page-links" aria-hidden="true"></i>  &nbsp; Via Ruggero D'Andreotto, 1, 06124 Perugia  </li>
                                     </ul>
                                    
                                    
                               </div>
                 
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->

<? include "footer.php"; ?>