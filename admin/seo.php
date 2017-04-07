<? include "header.php"; ?>
	<!--===================================================-->
	<!--END NAVBAR-->
	<div class="boxed">
		<!--CONTENT CONTAINER-->
		<!--===================================================-->
		<div id="content-container">
			<? include "header_nav.php"; ?>
			<div class="pageheader">
				<h3><i class="fa fa-home"></i> SEO </h3>
				<div class="breadcrumb-wrapper">
					<span class="label">Percorso:</span>
					<ol class="breadcrumb">
						<li> <a href="welcome.php"> Home </a> </li>
						<li class="active"> SEO </li>
					</ol>
				</div>
			</div>
			<?
			$upd = isset($upd)?$upd:'';
			$Message = isSet($Message) ? $Message : '' ;

			$tag_title=isSet($tag_title)?$tag_title:'';
			$tag_description=isSet($tag_description)?$tag_description:'';
			$og_title=isSet($og_title)?$og_title:'';
			$og_description=isSet($og_description)?$og_description:'';
			$twitter_title=isSet($twitter_title)?$twitter_title:'';
			$twitter_description=isSet($twitter_description)?$twitter_description:'';
			$twitter_nickname=isSet($twitter_nickname)?$twitter_nickname:'';


			if($submit) {
				$crcdt = time();

				$tag_title = trim(addslashes($tag_title));
				$tag_description = trim(addslashes($tag_description));
				$og_title = trim(addslashes($og_title));
				$og_description = trim(addslashes($og_description));
				$twitter_title = trim(addslashes($twitter_title));
				$twitter_description = trim(addslashes($twitter_description));
				$twitter_nickname = trim(addslashes($twitter_nickname));

				$set  = "tag_title = '$tag_title'";
				$set  .= ",tag_description = '$tag_description'";
				$set  .= ",og_title = '$og_title'";
				$set  .= ",og_description = '$og_description'";
				$set  .= ",twitter_title = '$twitter_title'";
				$set  .= ",twitter_description = '$twitter_description'";
				$set  .= ",twitter_site = '$twitter_nickname'";
				$db->insertid("update seo_setting set $set where id='1'");

				header("location:seo?act=scs");
				exit;
			}
			if($upd == 1)
				$hidimg = "style='display:none;'";
			else if($upd == 2)
				$hidimg = "";


			$GetRecord = $db->singlerec("select * from seo_setting where id='1'");
			@extract($GetRecord);
			$tag_title = stripslashes($tag_title);
			$tag_description = stripslashes($tag_description);
			$og_title = stripslashes($og_title);
			$og_description = stripslashes($og_description);
			$twitter_title = stripslashes($twitter_title);
			$twitter_description = stripslashes($twitter_description);
			$twitter_nickname = stripslashes($twitter_site);

			if($act == "scs")
				$Message = "<font color='green'><b>Impostazioni SEO aggiornate con successo!</b></font>" ;
			?>
			<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
			<script type="text/javascript" src="js/tinymce.js" ></script>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<!-- Basic Data Tables -->
				<!--===================================================-->
				<h3>Impostazioni SEO</h3></br>
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><? echo $Message; ?></h3>
					</div>
					<div class="panel-body">
						<table>
							<thead>
							<form method="post" action="seo" enctype="multipart/form-data" class="form-horizontal">
								<tr>
									<td><label>Tag Title Homepage<font color="red">*</font></label></td>
									<td><input type="text" class="form-control" name="tag_title" value="<? echo $tag_title; ?>" placeholder="Inserisci Tag Title" required></td>
								</tr>
								<tr>
									<td><label>Tag Description Homepage<font color="red">*</font></label></td>
									<td><textarea style="resize:vertical;" class="form-control" name="tag_description" placeholder="Inserisci Tag Description" rows="5" cols="5" required><? echo $tag_description; ?></textarea></td>
								</tr>
								<tr>
									<td><label>Facebook Title</label></td>
									<td><input type="text" class="form-control" name="og_title" value="<? echo $og_title; ?>" placeholder="Inserisci Facebook Title" required></td>
								</tr>
								<tr>
									<td><label>Facebook Description</label></td>
									<td><textarea style="resize:vertical;" class="form-control" name="og_description" placeholder="Inserisci Facebook Description" rows="5" cols="5" required><? echo $og_description; ?></textarea></td>
								</tr>
								<tr>
									<td><label>Twitter Title</label></td>
									<td><input type="text" class="form-control" name="twitter_title" value="<? echo $twitter_title; ?>" placeholder="Inserisci Twitter Title" required></td>
								</tr>
								<tr>
									<td><label>Twitter Description</label></td>
									<td><textarea style="resize:vertical;" class="form-control" name="twitter_description" placeholder="Inserisci Twitter Description" rows="5" cols="5" required><? echo $twitter_description; ?></textarea></td>
								</tr>
								<tr>
									<td><label>Twitter Nickname</label></td>
									<td><input type="text" class="form-control" name="twitter_nickname" value="<? echo $twitter_nickname; ?>" placeholder="Inserisci Twitter Nickname" required></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<input type="submit" name="submit" class="btn btn-primary" value="Salva">
										<input type="reset" name="reset" class="btn btn-primary" value="Indietro">
									</td>
								</tr>
							</form>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<!--===================================================-->
			<!--End page content-->
		</div>
		<!--===================================================-->
		<!--END CONTENT CONTAINER-->
		<? include "leftmenu.php"; ?>
	</div>
<?

include "footer.php";
?>