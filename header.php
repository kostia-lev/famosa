<?
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}
include "admin/AMframe/config.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <? include "seotags.php"; ?>

	<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/assets/css/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="<? echo $siteurl; ?>/assets/css/bootstrap-select.min.css" />
	<link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/sweetalert.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,300italic,400italic,300">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500&subset=latin-ext' rel='stylesheet' type='text/css'>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="icon" href="<? echo $siteurl; ?>/favicon.ico">
	<script type="text/javascript" src="<? echo $siteurl; ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<? echo $siteurl; ?>/assets/js/bootstrap.js"></script>
	<script src="https://js.stripe.com/v2/" type="text/javascript"></script>
    <script src="<? echo $siteurl; ?>/assets/js/sweetalert.min.js"></script>
	<script src="<? echo $siteurl; ?>/assets/js/jquery.validate.min.js"></script>
	<script src="<? echo $siteurl; ?>/assets/js/image-prv.js"></script>

<script>

$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');
        }
    );
});
</script>

<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');
        }
    );
});
</script>
</head>

<body>

<div class="modal fade" id="contact-agent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ed1b2e; text-align:center;">
        <button type="button" style="color:#FFF;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 style="color:#FFF; font-weight:bold;" class="modal-title" id="exampleModalLabel">Contatta agente<div id="recname"></div></h4>
      </div>
      <div class="modal-body">
        <form id="cnt_form" name="cont_agent" action="<? echo $siteurl; ?>/contact" method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nome:</label>
            <input type="text" class="form-control" name="name" placeholder="Inserisci il tuo nome" required>
          </div>
		  <?
		  if(!$_SESSION['usr']) {
			echo '<div class="form-group"><label for="recipient-name" class="control-label">Email:</label>
				  <input type="email" class="form-control" name="email" placeholder="Inserisci la tua email" required></div>';
		  }
		  ?>
		  <div class="form-group">
            <label for="recipient-name" class="control-label">Numero di telefono:</label>
            <input type="number" class="form-control" name="mobile" placeholder="Inserisci il tuo numero di telefono" required>
          </div>
		   <div class="form-group">
            <label for="message-text" class="control-label">Oggetto richiesta:</label>
            <input type="text" class="form-control" name="sub" placeholder="Inserisci l'oggetto della richiesta" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Messaggio:</label>
            <textarea style="resize:vertical;" class="form-control" name="message" placeholder="Inserisci la tua richiesta" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-search" name="cont_agent" value="Invia richiesta">
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header avd-serbg">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> <img src="<? echo $siteurl; ?>/assets/images/close-icon.png"></span></button>
                    <h4 class="modal-title mode-tit text-center banner-font-1" style="color:#FFF;" id="myModalLabel">Login</h4>
                  </div>
      <div class="modal-body">
        <form id="lform" action="<? echo $siteurl; ?>/session" method="post">
		<?
		if(isset($_REQUEST['lerror'])) {
				echo '<center><span class="err">Indirizzo email o password non corretti!</span></center>';
		}
		else if(isset($_REQUEST['lmt'])) {
				echo '<center><span class="err">Compila tutti i campi!</span></center>';
		}
		?>
          <div class="form-group">
            <label class="login-font">Indirizzo Email</label>
            <input type="email" class="form-control" name="email" maxlength="30" value="<? echo @$email; ?>" required>
          </div>

           <div class="form-group">
            <label class="login-font">Password</label>
            <input type="password" class="form-control" name="password" maxlength="20" required>
          </div>
          <div class="form-group">
            <small class="pull-left">
              Non hai ancora un account? <a href="#" class="login-link" data-toggle="modal" data-target="#register" data-dismiss="modal" aria-label="Close">Registrati</a>
            </small>
			<small class="pull-right">
              <a href="#" class="login-link" data-toggle="modal" data-target="#forgetpass" data-dismiss="modal" aria-label="Close">Password dimenticata?</a>
            </small>
          </div><br>
          <div class="form-group text-center mt30">
             <input type="submit" class="btn bc3 btn-login" name="login" value="Entra">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="forgetpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header avd-serbg">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> <img src="<? echo $siteurl; ?>/assets/images/close-icon.png"></span></button>
			<h4 class="modal-title mode-tit text-center banner-font-1" style="color:#FFF;" id="myModalLabel">Recupera Password</h4>
		  </div>
      <div class="modal-body">
        <form action="<? echo $siteurl; ?>/forgetpass" method="post">
           <div class="form-group">
            <label class="login-font">Indirizzo Email</label>
            <input type="email" class="form-control" name="mail" required>
          </div>
          <div class="form-group">
            <small class="pull-left">
                Hai gi&aacute; un account? <a href="#" class="login-link" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">Entra</a>
            </small>
            <small class="pull-right">
                Non hai un account? <a href="#" class="login-link" data-toggle="modal" data-target="#register" data-dismiss="modal" aria-label="Close">Registrati</a>
            </small>
          </div>
          <div class="form-group text-center mt30">
             <br><input type="submit" class="btn bc3 btn-login" name="fpass" value="Invia">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header avd-serbg">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> <img src="<? echo $siteurl; ?>/assets/images/close-icon.png"></span></button>
                    <h4 class="modal-title mode-tit text-center banner-font-1" style="color:#FFF;" id="myModalLabel">Registrazione</h4>
                  </div>
      <div class="modal-body">
        <form id="rform" action="<? echo $siteurl; ?>/signup" method="post">
          <div class="form-group">
            <label class="login-font">Nome e cognome</label>
            <input type="text" class="form-control" name="fullname" maxlength="30" value="<? echo @$fullname; ?>">
          </div>

		  <div class="form-group">
			<label class="login-font">Sono un</label>
			  <select class="form-control" name="role">
                  <option value="assistente">Assistente</option>
                  <option value="consulente">Consulente</option>
                  <option value="office-manager">Office Manager</option>
                  <option value="broker">Broker</option>
			  </select>
		  </div>

          <div class="form-group">
            <label class="login-font">Indirizzo Email
			<?
			if(isset($_REQUEST['rmerr'])) {
				echo '&bull; <span class="err">Indirizzo email gi&aacute; presente!</span>';
			}
			?>
			</label>
            <input type="email" class="form-control" name="email" maxlength="30" value="<? echo @$email; ?>">
          </div>

          <div class="form-group">
            <label class="login-font">Numero di cellulare</label>
            <input type="text" class="form-control" name="mobile" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<? @$mobile; ?>">
          </div>

           <div class="form-group">
            <label class="login-font">Password</label>
            <input type="password" class="form-control" name="password" maxlength="20" value="<? @$pass; ?>">
          </div>


          <div class="form-group">
            <label class="login-font">Conferma Password
			<?
			if(isset($_REQUEST['rperr'])) {
				echo '&bull; <span class="err">La password non corrisponde!</span>';
			} ?></label>
            <input type="password" class="form-control" name="cpassword" maxlength="20" value="<? @$cpass; ?>">
          </div>

		  <div class="form-group">
				<input type="checkbox" name="trms" class="" required="required"> <i> &nbsp;&nbsp;Accetto i <a href="#" target="_blank">Termini del Servizio</a> e la <a href="#" target="_blank">Politica sulla Privacy</a></i><br>
		  </div>

          <div class="form-group">
            <small class="pull-right">Hai gi&aacute; un account? <a href="#" class="login-link" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">Entra</a></small><br>
          </div>
          <div class="form-group text-center mt30">
             <input type="submit" class="btn bc3 btn-login" name="signup" value="Registrati">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--LOGO-->

 <div class="container">
  <div class="col-md-3">
      <a href="<? echo $siteurl; ?>/"><img src="<? echo $siteurl; ?>/admin/uploads/general_setting/logo.png" class="logo margn" /></a>
  </div> <!--col-md-12-->
     <div class="col-md-8 header-cta">
         <?php if(isset($_SESSION['usr'])){ ?>
            <div class="header-btn"><a  href="<? echo $siteurl; ?>/post-ad"><i class="fa fa-home" aria-hidden="true"></i> Aggiungi immobile</a></div>
         <?php }else{ ?>
            <img src="<? echo $siteurl; ?>/assets/images/remax-balloon.png" class="margn" style="margin:0;position:absolute;right:200px;"/>
            <div class="header-call" id="clickToShow"><a  href="tel:+390758041092"><i class="fa fa-phone" aria-hidden="true"></i> +39 075-8041092</a></div>
         <?php } ?>
     </div>
 </div><!--container-->

<!--END LOGO-->


<!--MAIN MENU-->

<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
              <li class="menu-li-list-2"><a  href="<? echo $siteurl; ?>/">Home</a></li>
              <li class="menu-li-list"><a  href="<? echo $siteurl; ?>/type/residenziale">Residenziale</a></li>
              <li class="menu-li-list"><a  href="<? echo $siteurl; ?>/type/commerciale">Commerciale</a></li>
              <li class="menu-li-list"><a  href="<? echo $siteurl; ?>/type/immobili-di-lusso">Immobili di lusso</a></li>
              <li class="menu-li-list"><a  href="<? echo $siteurl; ?>/type/nuove-costruzioni">Nuove costruzioni</a></li>
              <li class="menu-li-list"><a href="<? echo $siteurl; ?>/type/asta">Immobili all'asta</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
<!---------------------------------------------END MAIN MENU-------------------------------------------------------->