<? include "header.php"; 

$upd = isset($upd)?$upd:'';
$id = isSet($id) ? $id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$main_menu = isSet($main_menu) ? $main_menu : '' ;

if($submit){
		$crcdt = time();
		$checkStatus = $db->check1column("main_menu_mst","main_menu",$main_menu);
		if($upd == 2)
			$checkStatus = 0;
			
		if($checkStatus == 0){
			$set  = "main_menu = '$main_menu'";
			$set  .= ",orderby = '$orderby'";
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$db->insertrec("insert into main_menu_mst set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update main_menu_mst set $set where main_menu_id='$idvalue'");
				$act = "upd";
			}
			header("location:mainmenumst.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			$Message = "<font color='#000'>$main_menu Already Exit's</font>";
		}
	}
if($upd == 1){
	$TextChange = "Add";
	$GetRec = $db->singlerec("select orderby from main_menu_mst order by orderby desc");
	@extract($GetRec);
	$orderby = $orderby + 1;
}
else if($upd == 2)
	$TextChange = "Edit";

$GetRecord = $db->singlerec("select * from main_menu_mst where main_menu_id='$id'");
@extract($GetRecord);
$main_menu = stripslashes($main_menu);
?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Main Menu </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Main Menu </li>
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
							<h3 class="panel-title"><? echo $TextChange;?> Main Menu</h3>
						</div>
						<form class="form-horizontal" method="post" action="mainmenumstupd.php" >
							<input type="hidden" name="idvalue" value="<?echo $id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Name</label>
									<div class="col-sm-3">
										<input type="text" name="main_menu" value="<?echo $main_menu;?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-1 control-label" for="demo-hor-inputemail">Order</label>
									<div class="col-sm-3">
										<input type="text" name="orderby" value="<?echo $orderby;?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="panel-footer text-left">
								<div class="row"><div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div></div>
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