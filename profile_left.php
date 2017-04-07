<?
if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
	exit('Accesso non consentito') ;
}
?>
<div class="row">
<div class=" col-md-3 col-sm-12 col-xs-12 mt20">
 <div class="col-md-12 col-sm-12 col-xs-12 profile-brdr">
		  <div class="profile-sidebar row">
			  <div class="profile-userpic">
				  <img src="<? echo $siteurl; ?>/images/user/<? echo $row["prof_image"]; ?>" class="img-responsive" alt=""><br><center><a style="text-decoration: none;" href="<? echo $siteurl; ?>/change-picture">Cambia foto profilo</a></center>
			  </div><!--profile-userpic-->
			  <div class="profile-usertitle">
				  <div class="profile-usertitle-name">
					 <? echo strtoupper($row["fullname"]); ?>
				  </div><!--profile-usertitle-name--><? echo 'Attivo dal: '.date("d-M-Y", $row['created_at']); ?>
			  </div><!--profile-usertitle-->
			  <div class="profile-usermenu">
				  <ul class="nav">
					  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='dashboard.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/dashboard">Dashboard </a></li>
					  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='post-ad.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/post-ad">Aggiungi immobile</a></li>
					  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='manage-your-list.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/manage-your-list">Gestione immobili</a></li>
					  <?php if($row['role']=="broker"){ ?>
						  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='manage-users.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/manage-users">Gestione utenti</a></li>
					  <?php } ?>
					  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='requests.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/requests">Richieste</a></li>
					  <li <? if(basename($_SERVER['SCRIPT_NAME'])=='my-account.php') echo 'class="active"'; ?>><a href="<? echo $siteurl; ?>/my-account">Mio account</a></li>
					  <li><a href="<? echo $siteurl; ?>/logout">Esci</a></li>
				  </ul>
			  </div><!--profile-usermenu-->
		  </div><!--profile-sidebar-->
	  </div><!--col-md-12 col-sm-12 col-xs-12 profile-brdr-->
</div><!--col-md-3 col-sm-12 col-xs-12-->