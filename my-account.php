<? 
include 'header.php';
include 'profile_header.php';
?>

<div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20">
        <span class="blackhead pdl10">Dashboard </span>
		
    </div><!--col-md-12 col-sm-12 col-xs-12  market-place-head-bg mt20-->
         
		 <? include "profile_left.php"; ?>
         <div class="col-md-9 col-sm-12 col-xs-12 mt20">
             <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr-2">
                 <div class="pdt10">
                 <div class="row col-md-8 col-sm-6 col-xs-12 property-dash-head">Mio Account</div>
                 <div class="row col-md-4 col-sm-6 col-xs-12 mb10 pull-right" style="text-transform: uppercase;font-size: 16px;font-weight: 600;">Ruolo: <? echo str_replace("-", " ", $row["role"]); ?></div>
                 <br><br><hr>
                 </div><!--class="pdt10"-->
                    
                    
                     <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Informazioni personali</a></li>
                          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Cambia Password</a></li>
                          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Social</a></li>
                          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Newsletter</a></li>
                        </ul>
                      
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active change" id="home">						
                               <form id="maform" action="my-account" method="post">
                                   <? if($row['role'] == "assistente"){

                                       $GetUsers=$db->get_all("select * from register where role='agente'");
                                       $disp = "";

                                       foreach($GetUsers as $GetUser) {

                                           $idvalue = $GetUser['id'] ;
                                           $agent_code=$GetUser['randuniq'];
                                           $userName=$GetUser['fullname'];

                                           $disp .="<option value='" . $agent_code . "'>" . $userName . "</option>";
                                       }

                                       ?>
                                   <div class="form-group">
                                       <label class="label-c">Consulente di riferimento: *</label>
                                       <select class="form-control" name="agent_ref" required>
                                       <? echo $disp; ?>
                                       </select>

                                   </div>
                                   <? } ?>
                                  <div class="form-group">
                                    <label class="label-c">Nome e Cognome:</label>
                                    <input type="text" class="form-control" name="fullname" value="<? echo @$row["fullname"]; ?>">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Indirizzo Email: </label>
                                    <input type="email" class="form-control" name="email" value="<? echo @$row["email"]; ?>">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="label-c">Numero di Cellulare: </label>
                                    <input type="text" class="form-control" name="mobile" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<? echo @$row["mobile"]; ?>">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Sito Web: </label>
                                    <input type="text" class="form-control" name="website" value="<? echo @$row["website"]; ?>">
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="label-c">Dettagli: </label>
                                    <textarea class="form-control" name="details" rows="5" required><? echo @$row["details"]; ?></textarea>
                                  </div>
                                  
                                  <input type="submit" class="btn btn-view-detail" name="prof_upd" value="Aggiorna">
                                </form>
                               
                            </div><!--home-->
                            <div role="tabpanel" class="tab-pane change" id="profile">
                                 <form id="cpform" action="my-account" method="post">
                                  <div class="form-group ">
                                    <label class="label-c">Password attuale</label>
                                    <input type="password" class="form-control" name="cpass" placeholder="Inserisci la password attuale">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Nuova password</label>
                                    <input type="password" class="form-control" name="npass" placeholder="Inserisci la nuova password">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Reinserisci password</label>
                                    <input type="password" class="form-control" name="rpass" placeholder="Reinserisci la nuova password">
                                  </div>
                                  <input type="submit" class="btn btn-view-detail" name="chpass" value="Aggiorna">
                                </form>
                            </div><!--profile-->
                            <div role="tabpanel" class="tab-pane change" id="messages">
                                 <form id="updsoc" action="my-account" method="post">
                                  <div class="form-group ">
                                    <label class="label-c">Facebook</label>
                                    <input type="text" class="form-control" name="fb" placeholder="URL Facebook" value="<? echo $row['facebook']; ?>">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Twitter</label>
                                    <input type="text" class="form-control" name="twt" placeholder="URL Twitter" value="<? echo $row['twitter']; ?>">
                                  </div>
                                  
                                   <div class="form-group">
                                    <label class="label-c">Skype</label>
                                    <input type="text" class="form-control" name="skp" placeholder="Nome utente Skype" value="<? echo $row['skype']; ?>">
                                  </div>
                                  <input type="submit" class="btn btn-view-detail" name="updsoc" value="Aggiorna">
                                </form>
                            </div><!--messages-->
                            <div role="tabpanel" class="tab-pane change" id="settings">
                               
                               <form action="my-account" method="post">
                                   <div class="form-group">
                                       <p style="color:#333;">Desideri ricevere aggiornamenti dal mondo Re/Max?</p>
									   <?
									   $mail=$_SESSION['usr'];
									   $chk=$db->check1column("newsletter", "email", $mail);
									   ?>
                                       <label class="radio-inline" style="color:#333;">
                                        <input type="radio" name="rcv" id="inlineRadio1" value="1" <? if($chk==1) echo "checked"; ?>> Si
                                      </label>
                                       <label class="radio-inline" style="color:#333;">
                                        <input type="radio" name="rcv" id="inlineRadio1" value="0" <? if($chk==0) echo "checked"; ?>> No
                                      </label>
                                      
                                      <div class="checkbox">
                                        <label style="color:#333;">
                                          <input type="checkbox" name="agreed" value="1" checked="checked">
                                            Ho letto e accetto i Termini e condizioni e sulla privacy
                                        </label>
                                      </div>
                                   </div>
                                   
                                    <input type="submit" class="btn btn-view-detail" name="nletter" value="Invia">
                               </form>
                            
                            </div><!--settings-->
                        </div><!--tab-content-->
                        <!-- Nav tabs end-->
                    
                 
             </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
         </div><!--col-md-9 col-sm-12 col-xs-12-->
    </div><!--row-->
</div> <!--container-->


<? include 'footer.php'; ?>