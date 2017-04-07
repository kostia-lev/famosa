<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> CMS</h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">Percorso:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active"> CMS </li>
                            </ol>
                        </div>
                    </div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$aboutus=isSet($aboutus)?$aboutus:'';
$welcome_text=isSet($welcome_text)?$welcome_text:'';
$what_wedo=isSet($what_wedo)?$what_wedo:'';
$terms=isSet($terms)?$terms:'';
$privacy=isSet($privacy)?$privacy:'';

if($submit) {
    $crcdt = time();
	$aboutus = trim(addslashes($aboutus));
	$welcome_text = trim(addslashes($welcome_text));
	$what_wedo = trim(addslashes($what_wedo));
	$our_vision = trim(addslashes($our_vision));
	$terms = trim(addslashes($terms));
	$privacy = trim(addslashes($privacy));
	
	$set  = "aboutus = '$aboutus'";
	$set  .= ",welcome_text = '$welcome_text'";
	$set  .= ",what_wedo = '$what_wedo'";
	$set  .= ",our_vision = '$our_vision'";
	$set  .= ",terms = '$terms'";
	$set  .= ",privacy = '$privacy'";
	$set  .= ",ipaddr = '$ipaddress'";
	$set  .= ",chngdt = '$crcdt'";    
	$set  .= ",userchng = '$usrcre_name'";
	$db->insertrec("update cms set $set where id='1'");
	header("location:cms.php?page=$pg&act=$act");
	exit;
}
if($upd == 1)
	$hidimg = "style='display:none;'";
else if($upd == 2)
	$hidimg = "";

$GetRecord = $db->singlerec("select * from cms where id='1'");
@extract($GetRecord);
$aboutus = stripslashes($aboutus);
$welcome_text = stripslashes($welcome_text);
$what_wedo = stripslashes($what_wedo);
$terms = stripslashes($terms);
$privacy = stripslashes($privacy);
?>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce.js" ></script>
<!--Page content-->
<!--===================================================-->
<div id="page-content">
<!-- Basic Data Tables -->
<!--===================================================-->
<h3>Gestione CMS</h3></br>
<div class="panel">
<div class="panel-heading">
	</div>
		<div class="panel-body">
			<table>
				<thead>
					<form method="post" action="cms" enctype="multipart/form-data" class="form-horizontal" >
					<input type="hidden" name="idvalue" value="<? echo $id; ?>" />
					<input type="hidden" name="pg" value="<? echo $page; ?>" />
					<input type="hidden" name="upd" value="<? echo $upd; ?>" />
					<tr>
						<td valign="top"><label>Chi siamo  <font color="red">*</font></label></td>
						<td><textarea name="aboutus" class="form-control tiny" ><? echo $aboutus; ?></textarea></td>
					</tr>
					<tr>
						<td valign="top"><label>Testo di benvenuto</label></td>
						<td><textarea name="welcome_text" class="form-control tiny" ><? echo $welcome_text; ?></textarea></td>
					</tr>
					<tr>
						<td valign="top"><label>La nostra missione</label></td>
						<td><textarea name="what_wedo" class="form-control tiny" ><? echo $what_wedo; ?></textarea></td>
					</tr>
					<tr>
						<td valign="top"><label>La nostra visione</label></td>
						<td><textarea name="our_vision" class="form-control tiny" ><? echo $our_vision; ?></textarea></td>
					</tr>
					<tr>
						<td valign="top"><label>Termini e Condizioni </label></td>
						<td><textarea name="terms" class="form-control tiny" ><? echo $terms; ?></textarea></td>
					</tr>
					<tr>
						<td valign="top"><label>Politica sulla Privacy</label></td>
						<td><textarea name="privacy" class="form-control tiny" ><? echo $privacy; ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="submit" class="btn btn-primary" value="Save">
							<input type="reset" name="reset" class="btn btn-primary" value="Reset">
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
