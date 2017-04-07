<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>News </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">Percorso:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome"> Home </a> </li>
					<li class="active"> News </li>
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
$comment = isSet($comment) ? $comment : '' ;
$img = isSet($img) ? $img : '' ;
$ImgExt = isSet($ImgExt) ? $ImgExt : '' ;
$DisplayDeleteImgLink = isSet($DisplayDeleteImgLink) ? $DisplayDeleteImgLink : '' ;
$UsrImg = isSet($UsrImg) ? $UsrImg : '' ;

if($act ==  "del" && $nimg != "") {
    $RemoveImage = "../images/news/$nimg";
    @unlink($RemoveImage);
    $db->insertrec("update news set image='noimage.jpg' where id='$id'");
    header("Location:newsupd?upd=2&msg=nimgscs&id=$id") ;
    exit ;
}

if($submit) {
    $crcdt = time();
	$name = trim(addslashes($name));
	$comment = trim(addslashes($comment));
		$checkStatus = $db->check1column("news","name",$name);
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
			$set  = "name = '$name'";
			$set  .= ",comment = '$comment'";
			if($upd == 1){
				$set  .= ",created_at = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$idvalue = $db->insertid("insert into news set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",updated_at = '$crcdt'";
				$db->insertrec("update news set $set where id='$idvalue'");
				$act = "upd";
			}
			
			if($_FILES['UsrImg']['tmp_name'] != "" && $_FILES['UsrImg']['tmp_name'] != "null") {
					$fpath = $_FILES['UsrImg']['tmp_name'] ;
					$fname = $_FILES['UsrImg']['name'] ;
					$getext = substr(strrchr($fname, '.'), 1);
					$ext = strtolower($getext);
					$NgImg= $idvalue.".".$ext;
					$set_img = "image = '$NgImg'" ;
					$des = "../images/news/$NgImg";
					
					move_uploaded_file($fpath,$des) ;
					chmod($des,0777);
					$iimg=$db->insertrec("select image from news where id='$idvalue'");
					if($iimg!= "noimage.jpg") {
						$RemoveImage = "../images/news/$nimg";
						@unlink($RemoveImage);
					}
					$db->insertrec("update news set $set_img where id='$idvalue'");
				}
			header("location:news?page=$pg&act=$act");
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
if($upd == 1){
	$hidimg = "style='display:none;'";
	$TextChange = "Aggiungi";
}
else if($upd == 2){
	$hidimg = "";
	$TextChange = "Modifica";
}
	
$GetRecord = $db->singlerec("select * from news where id='$id'");
@extract($GetRecord);
$name = stripslashes($name);
$comment = stripslashes($comment);

//code for images 
if($img == "noimage.jpg") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '';
    }
else if($img != "") {
        $ShowOldImg = "";
   $DisplayDeleteImgLink = '<a href="newsupd?upd=2&act=del&nimg='.$img.'&id='.$id.'">Delete</a>';
    }
	
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> news</h3>
						</div>
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Nome <font color="red">*</font></td>
										<td><input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>News <font color="red">*</font></td>
										<td><input type="text" name="comment" id="comment" value="<? echo $comment; ?>" class="form-control">
										</td>
									</tr>
									<tr>
										<td>Immagine</td>
										<td><img src="../images/news/<? echo $image; ?>" width="120px" height="120px" <?echo $hidimg;?>> <br><? echo $DisplayDeleteImgLink; ?>
										<input name="UsrImg" type="file" style="margin-top:10px;margin-left:10px;"></td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Inserisci"></div>
								<a class="btn btn-info" href="news">Cancella</a>
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