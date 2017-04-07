<?
include"header.php";
include "../mapapi.php";
?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Gestione Immobili </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">Percorso:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome"> Home </a> </li>
					<li class="active"> Gestione immobili </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$name = isSet($name) ? $name : '' ;
$img = isSet($img) ? $img : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
$UsrImg = isSet($UsrImg) ? $UsrImg : '' ;

if($submit) {
    $crcdt = time();
	$email = trim(addslashes($email));
	$prop_title = trim(addslashes($prop_title));
	$category = trim(addslashes($category));
	$prop_for = trim(addslashes($prop_for));
	$location = trim(addslashes($location));
	$addr = trim(addslashes($addr));
	$exp_price = trim(addslashes($exp_price));
	$covered_area = trim(addslashes($covered_area));
	$plot_area = trim(addslashes($plot_area));
	$poss_sts = trim(addslashes($poss_sts));
	$bedroom = trim(addslashes($bedroom));
	$bathroom = trim(addslashes($bathroom));
	$hall = trim(addslashes($hall));
	$furnished = trim(addslashes($furnished));
	$floors = trim(addslashes($floors));
	$description = trim(addslashes($description));

	if(isset($featured)) { $ftr=1; }
	else { $ftr=0; }
	
	$randuniq = $com_obj->randuniq();
	$slug = str_replace(" ", "-", $prop_title);
	$slug = strtolower($slug);
	$set="slug='$slug'";
	$set.=",email='$email'";
	$set.=",prop_title='$prop_title'";
	$set.=",category='$category'";
	$set.=",prop_for='$prop_for'";
	$set.=",location='$location'";
	$set.=",address='$addr'";
	$set.=",exp_price='$exp_price'";
	$set.=",covered_area='$covered_area'";
	$set.=",plot_area='$plot_area'";
	$set.=",poss_sts='$poss_sts'";
	$set.=",bedroom='$bedroom'";
	$set.=",bathroom='$bathroom'";
	$set.=",hall='$hall'";
	$set.=",furnished='$furnished'";
	$set.=",floors='$floors'";
	$set.=",description='$description'";
	$set.=",featured='$ftr'";
	
	if($upd == 1){
		$set .= ",randuniq='$randuniq'";
		$set  .= ",posted_at = '$crcdt'";    
		$set  .= ",post_sts = 1";
		$idvalue = $db->insertid("insert into listings set $set");
		
		if($_FILES['UsrImg']['tmp_name'] != "" && $_FILES['UsrImg']['tmp_name'] != "null") {
			if(count($_FILES['UsrImg']['name'])>5) {
				echo "<script>swal('Oops..', 'You cant upload more than 5 images!', 'error');</script>";
			}
			$files=array();
			$fdata=$_FILES['UsrImg'];
			if(is_array($fdata['name'])){
				for($i=0;$i<count($fdata['name']);++$i){
					$files[]=array(
					'name'    =>$fdata['name'][$i],
					'type'  => $fdata['type'][$i],
					'tmp_name'=>$fdata['tmp_name'][$i],
					'error' => $fdata['error'][$i], 
					'size'  => $fdata['size'][$i] );
				}
			}
			else $files[]=$fdata;
			foreach($files as $file) {
				$fl=$file['tmp_name'];
				$fln=$file['name'];
				$ext=end(explode(".", $fln));
				$ext=strtolower($ext);
				list($width,$height,$type,$attr)=getimagesize($fl);
				if(($ext != "jpg") && ($ext != "jpeg") && ($ext != "gif") && ($ext != "png")) {
					echo "<script>swal('Oops..', 'Unrecognised image type. Try uploading .jpg or .png types.', 'error');</script>";
				}
				else if($width<800 || $height<500) {
					echo "<script>swal('Oops..', 'Image must be atleast 800*500 pixels!', 'error');</script>";
				}
			}
			
			foreach($files as $file) {
				$fl=$file['tmp_name'];
				$fln=$file['name'];
				$ext=end(explode(".", $fln));
				$ext=strtolower($ext);
				$tmpname=basename($fl);
				$pat=array();
				$pat[0]='/php/';
				$pat[1]='/.tmp/';
				$repl=array();
				$repl[0]='';
				$repl[1]='';
				$oname=strtolower(preg_replace($pat, $repl, $tmpname));
				$newname='prop'.$_SESSION['pid'].'_'.$oname.'.'.$ext;
				$org='../images/prop/org/'.$newname;
				$prf='../images/prop/'.$newname;
				$sm='../images/prop/230_144/'.$newname;
				$tsm='../images/prop/74_46/'.$newname;
				move_uploaded_file($fl, $org);

				$resizeObj = new resize($org);
				
				$resizeObj -> resizeImage(800, 500, 'exact');
				$resizeObj -> saveImage($prf, 72);
				
				$resizeObj -> resizeImage(230, 144, 'exact');
				$resizeObj -> saveImage($sm, 100);
				
				$resizeObj -> resizeImage(74, 46, 'exact');
				$resizeObj -> saveImage($tsm, 100);
				
				$set="pid='$idvalue'";
				$set.=",image='$newname'";
				$db->insertrec("insert into listing_images set $set");
			}
		}
		$act = "add";
	}
	else if($upd == 2){
		$set  .= ",updated_at = '$crcdt'";
		$db->insertrec("update listings set $set where id='$idvalue'");
		$act = "upd";
	}
	header("location:prop?page=$pg&act=$act");
	exit;
}

if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Aggiungi";
}
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Modifica";
}
	
$GetRecord = $db->singlerec("select * from listings where id='$id'");
@extract($GetRecord);	
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> immobile</h3>
						</div>
						<form class="form-horizontal" method="post" action="propupd" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
								    <tr>
										<td>Email contatto <font color="red">*</font></td>
										<td><input type="email" name="email" value="<? echo $email; ?>" placeholder="Inserisci email di contatto" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Titolo immobile <font color="red">*</font></td>
										<td><input type="text" name="prop_title" value="<? echo $prop_title; ?>" placeholder="Inserisci titolo immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Categoria immobile<font color="red">*</font></td>
										<td><select name="category" class="form-control">
												<option value="appartamento" <? if($categ=='appartamento') echo "selected"; ?>>Appartamento</option>
												<option value="attico-mansarda" <? if($categ=='attico-mansarda') echo "selected"; ?>>Attico / Mansarda</option>
												<option value="box-garage" <? if($categ=='box-garage') echo "selected"; ?>>Box / Garage</option>
												<option value="casa-indipendente" <? if($categ=='casa-indipendente') echo "selected"; ?>>Casa indipendente</option>
												<option value="loft-open-space" <? if($categ=='loft-open-space') echo "selected"; ?>>Loft / Open Space</option>
												<option value="palazzo-stabile" <? if($categ=='palazzo-stabile') echo "selected"; ?>>Palazzo / Stabile</option>
												<option value="rustico-casale" <? if($categ=='rustico-casale') echo "selected"; ?>>Rustico / Casale</option>
												<option value="villa" <? if($categ=='villa') echo "selected"; ?>>Villa</option>
												<option value="villetta-a-schiera" <? if($categ=='villetta-a-schiera') echo "selected"; ?>>Villetta a schiera</option>
												<option value="altro" <? if($categ=='altro') echo "selected"; ?>>Altro</option>
										</select>
										</td>
									</tr>
									<tr>
										<td>Immobile in <font color="red">*</font></td>
										<td><select name="prop_for" class="form-control">
												<option value="vendita" <? if(isset($pfor)=='vendita') echo "selected"; ?>>Vendita</option>
												<option value="affitto" <? if(isset($pfor)=='affitto') echo "selected"; ?>>Affitto</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Citt&aacute; immobile <font color="red">*</font></td>
										<td><input id="autocomplete" type="text" onFocus="geolocate();" name="location" value="<? echo $location; ?>" placeholder="Inserisci citt&aacute; immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Indirizzo immobile <font color="red">*</font></td>
										<td><input id="addr" type="text" onFocus="geolocate();" name="addr" value="<? echo $location; ?>" placeholder="Inserisci citt&aacute; immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Prezzo immobile <font color="red">*</font></td>
										<td><input type="number" name="exp_price" value="<? echo $exp_price; ?>" placeholder="Inserisci prezzo immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Superficie immobile <font color="red">*</font></td>
										<td><input type="number" name="covered_area" value="<? echo $covered_area; ?>" placeholder="Inserisci superficie immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Superficie totale <font color="red">*</font></td>
										<td><input type="number" name="plot_area" value="<? echo $plot_area; ?>" placeholder="Inserisci superficie totale immobile" class="form-control" required>
										</td>
									</tr>
									<tr>
										<td>Stato attuale immobile <font color="red">*</font></td>
										<td><select name="poss_sts" class="form-control">
											<option value="1" <? if(@$poss_sts==1) echo "selected"; ?>>In costruzione</option>
											<option value="2" <? if(@$poss_sts==2) echo "selected"; ?>>Pronto al trasloco</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Occasione </td>
										<td><input type="checkbox" name="featured" style="margin-top:15px;margin-left:10px;" <? if(@$featured==1) echo "checked"; ?>>
										</td>
									</tr>
									<tr>
										<td>Camere da letto <font color="red">*</font></td>
										<td><select name="bedroom" class="form-control">
											<option value="1" <? if(@$bedroom==1) echo "selected"; ?>>1</option>
											<option value="2" <? if(@$bedroom==2) echo "selected"; ?>>2</option>
											<option value="3" <? if(@$bedroom==3) echo "selected"; ?>>3</option>
											<option value="4" <? if(@$bedroom==4) echo "selected"; ?>>4</option>
											<option value="5" <? if(@$bedroom==5) echo "selected"; ?>>5</option>
											<option value="6" <? if(@$bedroom==6) echo "selected"; ?>>6</option>
											<option value="7" <? if(@$bedroom==7) echo "selected"; ?>>7</option>
											<option value="8" <? if(@$bedroom==8) echo "selected"; ?>>8</option>
											<option value="9" <? if(@$bedroom==9) echo "selected"; ?>>9</option>
											<option value="10" <? if(@$bedroom==10) echo "selected"; ?>>10</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Bagni <font color="red">*</font></td>
										<td><select name="bathroom" class="form-control">
											<option value="1" <? if(@$bathroom==1) echo "selected"; ?>>1</option>
											<option value="2" <? if(@$bathroom==2) echo "selected"; ?>>2</option>
											<option value="3" <? if(@$bathroom==3) echo "selected"; ?>>3</option>
											<option value="4" <? if(@$bathroom==4) echo "selected"; ?>>4</option>
											<option value="5" <? if(@$bathroom==5) echo "selected"; ?>>5</option>
											<option value="6" <? if(@$bathroom==6) echo "selected"; ?>>6</option>
											<option value="7" <? if(@$bathroom==7) echo "selected"; ?>>7</option>
											<option value="8" <? if(@$bathroom==8) echo "selected"; ?>>8</option>
											<option value="9" <? if(@$bathroom==9) echo "selected"; ?>>9</option>
											<option value="10" <? if(@$bathroom==10) echo "selected"; ?>>10</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Totale locali <font color="red">*</font></td>
										<td><select name="hall" class="form-control">
											<option value="1" <? if(@hall==1) echo "selected"; ?>>1</option>
											<option value="2" <? if(@hall==2) echo "selected"; ?>>2</option>
											<option value="3" <? if(@hall==3) echo "selected"; ?>>3</option>
											<option value="4" <? if(@hall==4) echo "selected"; ?>>4</option>
											<option value="5" <? if(@hall==5) echo "selected"; ?>>5</option>
											<option value="6" <? if(@hall==6) echo "selected"; ?>>6</option>
											<option value="7" <? if(@hall==7) echo "selected"; ?>>7</option>
											<option value="8" <? if(@hall==8) echo "selected"; ?>>8</option>
											<option value="9" <? if(@hall==9) echo "selected"; ?>>9</option>
											<option value="10" <? if(@hall==10) echo "selected"; ?>>10</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Stato arredamento <font color="red">*</font></td>
										<td><select name="furnished" class="form-control">
											<option value="1" <? if(@$furnished==1) echo "selected"; ?>>Arredato</option>
											<option value="2" <? if(@$furnished==2) echo "selected"; ?>>Non arredato</option>
											<option value="3" <? if(@$furnished==3) echo "selected"; ?>>Parzialmente arredato</option></select>
										</td>
									</tr>
									<tr>
										<td>Piani totali <font color="red">*</font></td>
										<td><select name="floors" class="form-control">
											<option value="1" <? if(@$floors==1) echo "selected"; ?>>1</option>
											<option value="2" <? if(@$floors==2) echo "selected"; ?>>2</option>
											<option value="3" <? if(@$floors==3) echo "selected"; ?>>3</option>
											<option value="4" <? if(@$floors==4) echo "selected"; ?>>4</option>
											<option value="5" <? if(@$floors==5) echo "selected"; ?>>5</option>
											<option value="6" <? if(@$floors==6) echo "selected"; ?>>6</option>
											<option value="7" <? if(@$floors==7) echo "selected"; ?>>7</option>
											<option value="8" <? if(@$floors==8) echo "selected"; ?>>8</option>
											<option value="9" <? if(@$floors==9) echo "selected"; ?>>9</option>
											<option value="10" <? if(@$floors==10) echo "selected"; ?>>10</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>Descrizione immobile <font color="red">*</font></td>
										<td><textarea style="resize:vertical;height:180px;" name="description" placeholder="Inserisci descrizione immobile" class="form-control" rows="5" cols="5" required><? echo $description; ?></textarea>
										</td>
									</tr>
									<? if($upd==1) { ?>
									<tr>
										<td>Foto immobile</td>
										<td><input name="UsrImg" type="file" multiple="multiple" style="margin-top:15px;margin-left:10px;" required="required"></td>
									</tr>
									<? } ?>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Salva"></div>
								<a class="btn btn-info" href="prop">Cancella</a>
							</div>
						</form>
						<!--===================================================-->
						<!--End Horizontal Form-->
					</div>
				</div>
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
<? include "footer.php"; ?>