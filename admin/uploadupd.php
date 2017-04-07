<?include "header.php"; 
$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$Message = isSet($Message) ? $Message : '' ;
$name=isset($name)?$name:'';
$desc_info=isSet($desc_info)?$desc_info:'';
$cat_id1=isSet($cat_id1)?$cat_id1:'';
$cat_id2=isSet($cat_id2)?$cat_id2:'';
$cat_id3=isSet($cat_id3)?$cat_id3:'';
$cat1=isSet($cat1)?$cat1:'' ;
$cat2=isSet($cat2) ? $cat2 : '' ;
$cat3=isSet($cat3)?$cat3:'';
$high_resol=isSet($high_resol)?$high_resol:'';
$widget_rdy=isSet($widget_rdy)?$widget_rdy:'';
$soft_version=isSet($soft_version)?$soft_version:'';
$compatible_browser=isSet($compatible_browser)?$compatible_browser:'';
$compatible_with=isSet($compatible_with)?$compatible_with:'';
$framework=isSet($framework)?$framework:'';
$th_f_included=isSet($th_f_included)?$th_f_included:'';
$column=isSet($column)?$column:'';
$layout=isSet($layout)?$layout:'';
$prev_url=isSet($prev_url)?$prev_url:'';
$down_url=isSet($down_url)?$down_url:'';
$price=isSet($price)?$price:'0.00';
$tags=isSet($tags)?$tags:'';
$support=isSet($support)?$support:'';
$comment=isSet($comment)?$comment:'';
$terms=isSet($terms)?$terms : '' ;
$crcdt =isSet($crcdt )?$crcdt :'';
$now = date("Y-m-d h:i:s");
$product_img = isSet($product_img) ? $product_img : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
$DisplayDeleteImgLink = isSet($DisplayDeleteImgLink) ? $DisplayDeleteImgLink : '' ;
$UsrImg = isSet($UsrImg) ? $UsrImg : '' ;
$main_category_id=isset($main_category_id)?$main_category_id:0;
if(!($main_category_id===0))
{
		$category = $db->singlerec("select name from product where product_id='$main_category_id'");
		$main_category = $category[0];
}
else{
$main_category = 'NA';
}

$category=isset($category)? mysql_real_escape_string(base64_decode($category)):'nil';
if($category!='nil'){
$versions = $db->get_all_assoc("SELECT version_id,name from version where product_id='$category' AND active_status=1;");	
$compatibles = $db->get_all_assoc("SELECT compatible_id,name from compatible where product_id='$category' AND active_status=1;");	

}
if($act ==  "del" && $nimg != "") {
    $RemoveImage = "../uploads/product_image/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update ads set product_img='noimage.jpg' where id='$id'");
    header("Location:uploadupd.php?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}

$compt_browser="";
if($compatible_browser!=''){
	foreach($compatible_browser as $selected){
		$compt_browser .= $selected.",";
	}
}
$compatiple_with="";
if($compatible_with!=''){
	foreach($compatible_with as $selected){
		$compatiple_with .= $selected.",";
	}
}
$soft_ver="";
if($soft_version!=''){
	foreach($soft_version as $selected){
		$soft_ver .= $selected.",";
	}
}
if($submit) {
	$main_category_id=strtolower($main_category_id); 
	$name=trim(addslashes($name));
	$desc_info=trim(addslashes($desc_info));
	$high_resol=strtolower($high_resol);
	$widget_rdy=strtolower($widget_rdy);
	$compatiple_with=strtolower($compatiple_with);
	$compt_browser=strtolower($compt_browser);
	$soft_ver=strtolower($soft_ver);
	$support=strtolower($support);
	$framework=strtolower($framework);
	$layout=strtolower($layout);
	$column=strtolower($column);
	$prev_url=trim(addslashes($prev_url));
	$down_url=trim(addslashes($down_url));
	$price=trim($price);
	$tags=trim(addslashes($tags));
	$comment=trim(addslashes($comment));
	
		$checkStatus = $db->check1column("upload","name",$name);
		if($upd == 2)
			$checkStatus = 0;
		
	if($_FILES['UsrImg']['tmp_name'] != "" && $_FILES['UsrImg']['tmp_name'] != "null") {
		$fpath = $_FILES['UsrImg']['tmp_name'] ;
		$fname = $_FILES['UsrImg']['name'] ;
		$getext = substr(strrchr($fname, '.'), 1);
		$ImgExt = strtolower($getext); 
	}
	if($ImgExt=="jpg" || $ImgExt == "jpeg" || $ImgExt == "gif" || $ImgExt == "png" || $ImgExt == ''){	
		if($checkStatus == 0){
	$set = "name='$name'";
	$set .= ",desc_info='$desc_info'";	
	$set .= ",cat_id1='$cat_id1'";
	$set .= ",cat_id2='$cat_id2'";
	$set .= ",cat_id3='$cat_id3'";
	$set .= ",cat1='$cat1'";
	$set .= ",cat2='$cat2'";
	$set .= ",cat3='$cat3'";
	$set .= ",high_resol='$high_resol'";
	$set .= ",widget_rdy='$widget_rdy'";
	$set .= ",compatible_browser='$compt_browser'";
	$set .= ",framework='$framework'";
	$set .= ",soft_version  = '$soft_ver'";
	$set .= ",compatible_with  = '$compatiple_with'";
	$set .= ",th_f_included  = '$th_f_included'";
	$set .= ",column_val  = '$column'";
	$set .= ",layout  = '$layout'";
	$set .= ",prev_url  = '$prev_url'";
	$set .= ",down_url  = '$down_url'";
	$set .= ",price = '$price'";
	$set .= ",tags  = '$tags'";
	$set .= ",support  = '$support'";
	$set .= ",comment  = '$comment'";
	$set .= ",terms  = '$terms'";
	$set .= ",upload_date = '$now'";
			
			if($upd == 1){
				$set  .= ",main_category_id = '$category'";
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$idvalue = $db->insertid("insert into upload set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update upload set $set where id='$idvalue'");
				$act = "upd";
			}
			if($_FILES['UsrImg']['tmp_name'] != "" && $_FILES['UsrImg']['tmp_name'] != "null") {
				$fpath = $_FILES['UsrImg']['tmp_name'] ;
				$fname = $_FILES['UsrImg']['name'] ;
				$getext = substr(strrchr($fname, '.'), 1);
				$ext = strtolower($getext);
				$NgImg= $idvalue."_".time().".".$ext;
					
				$set_img = "product_img = '$NgImg'" ;
				$img_org = "../uploads/product_image/$NgImg";
				
				$img_big = "../uploads/product_image/800x600/$NgImg";
				$img_mid = "../uploads/product_image/600x600/$NgImg";
				$img_sml = "../uploads/product_image/400x400/$NgImg";
				
				move_uploaded_file($fpath,$img_org) ;
				
				$resizeObj = new resize($img_org);
				
				$resizeObj -> resizeImage(800, 600, 'exact');
				$resizeObj -> saveImage($img_big, 100);
				
				$resizeObj -> resizeImage(600, 600, 'exact');
				$resizeObj -> saveImage($img_mid, 100);
				
				$resizeObj -> resizeImage(400, 400, 'exact');
				$resizeObj -> saveImage($img_sml, 100);
				$set_img = "product_img = '$NgImg'" ;
				$des = "../uploads/product_image/$NgImg";
				move_uploaded_file($fpath,$des) ;
				chmod($des,0777);
				$iimg=$db->insertrec("select product_img from upload where id='$idvalue'");
				if($iimg!= "noimage.jpg") {
					$RemoveImage = "../uploads/product_image/$nimg";
					@unlink($RemoveImage);
				}
				$db->insertrec("update upload set $set_img where id='$idvalue'");
			}
			header("location:upload.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			 $id = $idvalue;
			$Message = "<font color='red'>$name Already Exit's</font>";
		}
	}
	else{
		$id = $idvalue;
		$Message = "<font color='red'>kindly upload jpg,gif,png image format only</font>";
	}
}
$GetRecord = $db->singlerec("select * from upload where id='$id'");
@extract($GetRecord);
$name = stripslashes($name);
$desc_info = stripslashes($desc_info);
$high_resol=strtolower($high_resol);
$widget_rdy=strtolower($widget_rdy);
$soft_version=strtolower($soft_version);
$support=strtolower($support);
$framework=strtolower($framework);
$compatible_with=strtolower($compatible_with);
$compatible_browser=strtolower($compatible_browser);
$price=strtolower($price);
$column=strtolower($column_val);
$layout=strtolower($layout);
$prev_url=stripslashes($prev_url);
$down_url=stripslashes($down_url);
$tags=stripslashes($tags);
$comment =stripslashes($comment);
$category =stripslashes($category);

$productmode = "<option value=''>- - Select- -</option>";
$DropDownQry = "select product_id as main_category_id,name from product order by product_id asc";
$productmode .= $drop->get_dropdown($db,$DropDownQry,$main_category_id);
									
$versionlist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select version_id as soft_version,name from version where product_id='1' order by version_id asc";
$versionlist .= $drop->get_dropdown_multiple($db,$DropDownQry,$soft_version);

$browserlist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id as compatible_browser,name from browser order by id asc";
$browserlist .= $drop->get_dropdown_multiple($db,$DropDownQry,$compatible_browser);

$compatiblelist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select compatible_id as compatible_with,name from compatible where product_id='1' order by compatible_id asc";
$compatiblelist .= $drop->get_dropdown_multiple($db,$DropDownQry,$compatible_with);

$frameworklist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id as framework,name from framework order by id asc";
$frameworklist .= $drop->get_dropdown($db,$DropDownQry,$framework);

$cat_id1=isset($cat_id1)?$cat_id1:'';
$catlist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id as cat_id1,name from category where parent_id='0' and child_id='0' order by id asc";
$catlist .= $drop->get_dropdown($db,$DropDownQry,$cat_id1);


if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Add";
}
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Edit";

	$getsubcat=$db->singlerec("select name from category where id='$cat_id2'");
	$subcatname=$getsubcat['name'];
	$catlist2="<option value='$cat_id2'>$subcatname</option>";

	$getchldt=$db->singlerec("select name from category where id='$cat_id3'");
	$chldcatname=$getchldt['name'];
	$catlist3="<option value='$cat_id3'>$chldcatname</option>";
}
//code for images 
if($product_img == "noimage.jpg") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '';
    }
else if($product_img != "") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '<a href="uploadupd.php?upd=2&act=del&nimg='.$product_img.'&id='.$id.'">Delete</a>';
    }
	
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript" src="js/tinymce.js" ></script>
<script src="js/upload.js"></script>
<script type="text/javascript">
</script>

<div class="boxed">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<? include "header_nav.php"; ?>
	<div class="pageheader">
		<h3><i class="fa fa-file"></i>Upload File</h3>
		<div class="breadcrumb-wrapper">
			<span class="label">You are here:</span>
			<ol class="breadcrumb">
				<li> <a href="welcome.php"> Home </a> </li>
				<li class="active"> Upload File </li>
			</ol>
		</div>
	</div>
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<div class="row">
		  <div class="eq-height">
			 <div class="col-sm-6 eq-box-sm">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><? echo $TextChange;?> Upload File <?echo $Message;?></h3>
					</div>
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="idvalue" value="<?echo $id;?>" />
						<input type="hidden" name="upd" value="<?echo $upd;?>" />
						<div class="panel-body">
							<table style="padding:25px;">
								<tr>
									<td style="width:30%">Name <font color="red">*</font></td>
									<td><input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control" required>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Description <font color="red">*</font></td>
									<td style="width:50%"><textarea name="desc_info" class="form-control tiny" placeholder="" id="desc"><? echo $desc_info; ?></textarea>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Image</td>
									<td><img src="../uploads/product_image/<? echo $product_img; ?>" width="120px" height="120px" <?echo $hidimg;?>> <br><? echo $DisplayDeleteImgLink; ?>
									<input name="UsrImg" type="file"></td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Category <font color="red">*</font></td>
									<td>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <select name="cat_id1" class="form-control" id="cat1_id" onchange="maincatfn(this.value);" ><?echo $catlist;?></select>
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                       
                                          <select name="cat_id2" class="form-control" id="cat2_id" onchange="subcatfn(this.value);"><?echo $catlist2;?></select>
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                           <select name="cat_id3" class="form-control" id="cat3_id"><?echo $catlist3;?></select>
                                       </div><!--col-md-4-->
                                    </div><!--row-->
                                    </td>
          						</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>High Resolution <font color="red">*</font></td>
                                    <td>
                                    <div class="row">
                                       <div class="col-md-4">
                                         <input type="radio" name="high_resol" value="yes" <? if($high_resol=="yes") echo "checked";?> id="hr1">&nbsp;&nbsp;YES
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                          <input type="radio" name="high_resol"value="no" <? if($high_resol=="no") echo "checked";?> id="hr2">&nbsp;&nbsp;NO
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                            <input type="radio" name="high_resol" value="na" <? if($high_resol=="na") echo "checked";?> id="hr3">&nbsp;&nbsp;N/A
                                       </div><!--col-md-4-->
                                     </div><!--row-->

									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Widget Ready<font color="red">*</font></td>
                                    <td>
                                    <div class="row">
                                       <div class="col-md-4">
                                          <input type="radio" name="widget_rdy" value="yes" <? if($widget_rdy=="yes") echo "checked";?> id="wr1">&nbsp;&nbsp;YES
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                           <input type="radio" name="widget_rdy" value="no" <? if($widget_rdy=="no") echo "checked";?> id="wr2" />&nbsp;&nbsp;NO
                                       </div><!--col-md-4-->
                                       <div class="col-md-4">
                                            <input type="radio" name="widget_rdy" value="na" <? if($widget_rdy=="na") echo "checked";?> id="wr3">&nbsp;&nbsp;N/A
                                       </div><!--col-md-4-->
                                    </div><!--row-->
                                    </td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Compatible Browser: <font color="red">*</font></td>
									<td><select name="compatible_browser[]" class="form-control" id="soft_ver" multiple><?echo $browserlist; ?></select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<?php if(!empty($versions) ){ ?><tr>
									<td>Software Version : <font color="red">*</font></td>
									<td><select name="soft_version[]" class="form-control" id="soft_ver" multiple><? echo $versionlist; ?></select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								
								<?php } if(!empty($compatibles) ){ ?><tr>
									<td>Compatible with : <font color="red">*</font></td>
									<td><select name="compatible_with[]" class="form-control" id="compatible_with" multiple><? echo $compatiblelist; ?></select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<?php } if($category === '1'){ ?>
								<tr>
									<td>Framework :  <font color="red">*</font></td>
									<td><select name="framework" class="form-control" id="framework"><? echo $frameworklist; ?></select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<?php } ?>
								<tr>
									<td>ThemeForest Files Included :  <font color="red">*</font></td>
									<td><select name="th_f_included" class="form-control" id="th-f-i">
										<option value="select">select</option>
										<option value="file1" <? if($th_f_included=="file1"){ echo "selected";} ?>>file1</option>
										<option value="file2" <? if($th_f_included=="file2"){ echo "selected"; }?>>file2</option>
										<option value="file3" <? if($th_f_included=="file3"){ echo "selected"; }?>>file3</option>
									</select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Columns : <font color="red">*</font></td>
									<td><select name="column" class="form-control" data-live-search="true" id="column">
                                        <option value="select">select</option>
										<option value="1" <? if($column=="1") echo "selected"; ?>>1</option>
                                        <option value="2" <? if($column=="2") echo "selected"; ?>>2</option>
                                        <option value="3" <? if($column=="3") echo "selected"; ?>>3</option>
                                        <option value="4+" <? if($column=="4+") echo "selected"; ?>>4+</option>
                                        <option value="N/A" <? if($column=="N/A") echo "selected"; ?>>N/A</option>
                                    </select>  
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Layout : <font color="red">*</font></td>
									<td><select name="layout" class="form-control" value="<? echo $framework;?>" data-live-search="true" id="layout">
                                        <option value="select">select</option>
										<option value="fluid" <? if($layout=="fluid") echo "selected"; ?>>Fluid</option>
                                        <option value="fixed" <? if($layout=="fixed") echo "selected"; ?>>Fixed</option>
                                        <option value="responsive" <? if($layout=="responsive") echo "selected"; ?>>Responsive</option>
                                    </select>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Preview URL : <font color="red">*</font></td>
									<td> <input type="text" name="prev_url" class="form-control" value="<? echo $prev_url; ?>" id="p-url">    
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Download URL :  <font color="red">*</font></td>
									<td> <input type="text" name="down_url" class="form-control" value="<? echo $down_url; ?>" id="d-url">       
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Price:  <font color="red">*</font></td>
									<td><input type="text" name="price" class="form-control" value="$<? echo $price; ?>" id="price" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength=4 value="0">       
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Tags <font color="red">*</font></td>
									<td><textarea name="tags" class="form-control" id="tags"><? echo $tags; ?></textarea>
									</td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Your current global support <br>setting is set to supported:</label>
								Item will be supported? <font color="red">*</font></td>
                                
                                <td>
                                    <div class="row">
                                       <div class="col-md-6">
                                            <input type="radio" name="support" value="yes" <?if($support=="yes") echo "checked"; ?> id="supr1" style="width:100px;">&nbsp;&nbsp;YES
                                       </div><!--col-md-6-->
                                       <div class="col-md-6">
                                            <input type="radio" name="support" value="no" <?if($support=="no") echo "checked"; ?> id="supr2" style="width:100px;">&nbsp;&nbsp;NO
                                       </div><!--col-md-6-->
                                     </div><!--row-->
                                 </td>
								</tr>
								<tr><td><br></td></tr>
								<tr>
									<td>Comments  :  <font color="red">*</font></td>
									<td><textarea name="comment" class="form-control tiny" id="comments" style="width:100px;"><? echo $comment; ?></textarea> 
									</td>
								</tr>
							</table>
						</div>
						<div class="panel-footer text-left">
							<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Sign in" onclick="return validate_upload_form();" ></div>
							<a class="btn btn-info" href="upload.php">Cancel</a>
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
