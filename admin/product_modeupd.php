<? include"header.php"; ?>
<div class="boxed">
	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<? include "header_nav.php"; ?>
		<div class="pageheader">
			<h3><i class="fa fa-home"></i>Site Templates </h3>
			<div class="breadcrumb-wrapper">
				<span class="label">You are here:</span>
				<ol class="breadcrumb">
					<li> <a href="welcome.php"> Home </a> </li>
					<li class="active"> Site Templates </li>
				</ol>
			</div>
		</div>
<?
$upd = isset($upd)?$upd:'';
$product_id = isSet($product_id) ? $product_id : '' ;
$act = isSet($act) ? $act : '' ;
$page = isSet($page) ? $page : '' ;
$Message = isSet($Message) ? $Message : '' ;
$name = isSet($name) ? $name : '' ;
if($submit) {
    $crcdt = time();
	$name = trim(addslashes($name));
	$checkStatus = $db->check1column("product","name",$name);
	if($upd == 2)
		$checkStatus = 0;
	if($checkStatus == 0){
	$set  = "name = '$name'";
			if($upd == 1){
				$set  .= ",crcdt = '$crcdt'";    
				$set  .= ",active_status = '1'";
				$set  .= ",usercre = '$usrcre_name'";
				$db->insertid("insert into product set $set");
				$act = "add";
			}
			else if($upd == 2){
				$set  .= ",chngdt = '$crcdt'";    
				$set  .= ",userchng = '$usrcre_name'";
				$db->insertrec("update product set $set where product_id='$product_id'");
				$act = "upd";
			}
			header("location:product_mode.php?page=$pg&act=$act");
			exit;
		}	
		 else {
			 $product_id = $idvalue;
			$Message = "<font color='red'>$name Already Exit's</font>";
		}
	}
if($upd == 1)
	$TextChange = "Add";
else if($upd == 2)
	$TextChange = "Edit";
$GetRecord = $db->singlerec("select * from product where product_id='$product_id'");
@extract($GetRecord);
$name = stripslashes($name);
?>
		<!--Page content-->
		<!--===================================================-->
		<div id="page-content">
			<div class="row">
			  <div class="eq-height">
				 <div class="col-sm-6 eq-box-sm">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><? echo $TextChange;?> Site Templates</h3>
						</div>
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
							<input type="hidden" name="idvalue" value="<?echo $product_id;?>" />
							<input type="hidden" name="upd" value="<?echo $upd;?>" />							
							<div class="panel-body">
								<table style="padding:25px;">
									<tr>
										<td>Name <font color="red">*</font></td>
										<td><input type="text" name="name" id="name" value="<? echo $name; ?>" class="form-control">
										</td>
									</tr>
								</table>
							</div>
							<div class="panel-footer text-left">
								<div class="col-md-4  text-right"><input class="btn btn-info" type="submit" name="submit" value="Submit"></div>
								<a class="btn btn-info" href="product_mode.php">Cancel</a>
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