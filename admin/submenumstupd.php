<? include "header.php"; 

$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$MM_id = isSet($MM_id) ? $MM_id : '' ;
$sub_menu = isSet($sub_menu) ? $sub_menu : '' ;
$disp_sub_menu=isSet($disp_sub_menu) ? $disp_sub_menu : '' ;

if($submit) {
    $crcdt = time();
	$disp_sub_menu = trim(addslashes($disp_submenu));
		$checkStatus = $db->check2column("sub_menu_mst","sub_menu",$sub_menu,"main_menu_id",$MM_id);
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			//$disp_sub_menu = str_replace(".php","",$sub_menu);
			$set  = "main_menu_id = '$MM_id'";
			$set  .= ",sub_menu = '$sub_menu'";
			$set  .= ",disp_sub_menu = '$disp_sub_menu'";
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$db->insertrec("insert into sub_menu_mst set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update sub_menu_mst set $set where sub_menu_id='$idvalue'");
				$act = "upd";
			}
			header("location:submenumst.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$Message = "<font color='#000'>$sub_menu Already Exit's to the same Main Menu</font>";
		}
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2){
	$TextChange = "Update";
$GetRecord = $db->singlerec("select * from sub_menu_mst where sub_menu_id='$id'");
@extract($GetRecord);
$sub_menu = stripslashes($sub_menu);
$MM_id=$main_menu_id;
}
$MM_List = "<option value=''>- - Select - -</option>";
$DropDownQry = "select main_menu_id,main_menu from  main_menu_mst where active_status='1' order by main_menu";
$MM_List .= $drop->get_dropdown($db,$DropDownQry,$MM_id);

?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Sub Menu </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Sub Menu </li>
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
							<h3 class="panel-title"><? echo $TextChange;?> Sub Menu</h3>
						</div>
						<form class="form-horizontal" method="post" action="submenumstupd.php" >
							<input type="hidden" name="idvalue" value="<? echo $id; ?>" />
							<input type="hidden" name="upd" value="<? echo $upd; ?>" />
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Sub Menu</label>
									<div class="col-sm-3">
										<select style="width: 160px;" class="form-control" name="MM_id" id="MM_id" ><?echo $MM_List; ?></select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Sub Menu</label>
									<div class="col-sm-3">
									<input type="text" class="form-control" name="sub_menu" id="sub_menu" value="<?echo $sub_menu; ?>" placeholder="Enter Sub Menu">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Display Name</label>
									<div class="col-sm-3">
									<input type="text" class="form-control" name="disp_submenu" value="<?echo $disp_sub_menu; ?>" placeholder="Enter Display Name">
									</div>
								</div>
							</div>
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit">
								<a class="btn btn-info" href="submenumst.php">Cancel</a></div></div>
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
<script type="text/javascript">
function menucheck(){
	var valfrm = document.menuval;		
	if(valfrm.MM_id.value == 0){
		document.getElementById("MM_id").style.borderColor = "red";
		valfrm.MM_id.focus();
		return false;
	}
	if(valfrm.sub_menu.value == 0){
		document.getElementById("sub_menu").style.borderColor = "red";
		valfrm.sub_menu.focus();
		return false;
	}
	return true;
}
</script>