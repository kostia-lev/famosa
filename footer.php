<?
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}
?>
<div class="container-fluid footerbox mt20">
 <div class="container mt20">
  <div class="row col-md-12">
  
  
    <div class="col-md-3 col-sm-6 col-xs-12 pdb20">
          <p class="footerboxheader">Sei un agente?</p>
        <?
        if(!@$_SESSION['usr']) {
            echo '<p><a href="" rel="nofollow" data-toggle="modal" data-target="#login" class="footerboxlink">Entra</a></p>';
            echo '<p><a href="" rel="nofollow" data-toggle="modal" data-target="#register" class="footerboxlink">Registrati</a></p>';
        } else {
            $row=$db->singlerec("select * from register where email='".$_SESSION['usr']."'");
            $img=$row['prof_image'];
            echo '<p><a href="'.$siteurl.'/dashboard" class="footerboxlink">Mio account</a></p>';
            echo '<p><a href="'.$siteurl.'/logout" class="footerboxlink">Esci</a></p>';
        }
        ?>
          
    </div><!--col-md-3-->

       
     <div class="col-md-3 col-sm-6 col-xs-12 pdb20">
         <p class="footerboxheader">Links</p>
         <p class="mt20"><a href="<? echo $siteurl; ?>/faq" class="footerboxlink">FAQ</a></p>
         <p><a href="<? echo $siteurl; ?>/terms-condition" class="footerboxlink">Termini e Condizioni</a></p>
         <p><a href="<? echo $siteurl; ?>/privacy-policy" class="footerboxlink">Politica sulla Privacy</a></p>
    </div><!--col-md-3-->

    <div class="col-md-3 col-sm-6 col-xs-12 pdb20">
          <p class="footerboxheader">Agenzia</p>
          <p class="mt20"><a href="<? echo $siteurl; ?>/contatti" class="footerboxlink">Contatti</a></p>
          <p><a href="<? echo $siteurl; ?>/chi-siamo" class="footerboxlink">Chi siamo</a></p>
          <p><a href="<? echo $siteurl; ?>/lavora-con-noi" class="footerboxlink">Lavora con noi</a></p>
          
    </div><!--col-md-3-->

      <div class="col-md-3 col-sm-6 col-xs-12 pdb20">
          <p class="footerboxheader">Seguici sui Social</p><p class="mt20"></p>
          <div class=" center-block mt10 pdb25">
              <a href="#"><i id="social-fb" class="social fb"></i><img src="<? echo $siteurl; ?>/assets/images/social icon 1.png"></a>
              <a href="#"><i id="social-tw" class="social tw"></i><img src="<? echo $siteurl; ?>/assets/images/social icon 2.png"></a>
              <a href="#"><i id="social-gp" class="social gg"></i><img src="<? echo $siteurl; ?>/assets/images/social icon 3.png"></a>
              <a href="#"><i id="social-em" class="social skype"></i><img src="<? echo $siteurl; ?>/assets/images/social icon 4.png"></a>
          </div>

      </div><!--col-md-3-->
    
    
  </div><!--row col-md-12-->
 </div><!--container-->
</div><!--container-fluid footerbox-->
<!--End Footer Box-->


<!--Footer-->
<div class="container-fluid footer">
<div class="container">
  <div class="row col-md-12">
    
      <div class="col-md-6 col-xs-12 col-sm-12 text-left">
      Copyright &copy; 2017 <?php echo strtoupper($generalset['website_title']); ?> | All rights reserved.
      </div><!--col-md-6-->
    
  </div><!--row-->
</div><!--container-->
</div><!--container-fluid-->
<!--End Footer-->

</body></html>

<? include "jsfunction.php"; ?>