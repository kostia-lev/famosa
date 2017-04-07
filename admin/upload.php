<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-file"></i> Upload File</h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Upload File </li>
                            </ol>
                        </div>
                    </div>
<?$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;
$category = isSet($category) ? $category : '' ;

if($act == "del") {
if($product_img !="noimage.jpg"){
		$RemoveImage = "../uploads/product_image/$product_img";
		@unlink($RemoveImage);
	}
	$db->insertrec("delete from upload where id='$id'");
    header("location:upload.php?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update upload set active_status='0' where id='$id'");
    header("location:upload.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update upload set active_status='1' where id='$id'");
    header("location:upload.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from upload order by id desc");
if(count($GetRecord)==0)
    $Message="No Record found";
$disp = "";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
	$idvalue = $GetRecord[$i]['id'];
	$category = $GetRecord[$i]['main_category_id'];
	$main_category= $GetRecord[$i]['main_category'];
	$name= $GetRecord[$i]['name'];
	$desc_info= $GetRecord[$i]['desc_info'];
	$product_img= $GetRecord[$i]['product_img'];
	$high_resol= $GetRecord[$i]['high_resol'];
	$widget_rdy= $GetRecord[$i]['widget_rdy'];
	$compatible_browser= $GetRecord[$i]['compatible_browser'];
	$compatible_with= $GetRecord[$i]['compatible_with'];
	$soft_version= $GetRecord[$i]['soft_version'];
	$th_f_included= $GetRecord[$i]['th_f_included'];
	$support= $GetRecord[$i]['support'];
	$framework= $GetRecord[$i]['framework'];
	$column= $GetRecord[$i]['column_val'];
	$layout= $GetRecord[$i]['layout'];
	$prev_url= $GetRecord[$i]['prev_url'];
	$down_url= $GetRecord[$i]['down_url'];
	$price= $GetRecord[$i]['price'];
	$tags= $GetRecord[$i]['tags'];
	$result = substr($tags, 0, 300);
	$comment= $GetRecord[$i]['comment'];
	$usercre= $GetRecord[$i]['usercre'];
	$active_status=$GetRecord[$i]['active_status'];
	$crcdt=$GetRecord[$i]['crcdt'];
	$created=date("d/m/y",$crcdt);
	$slno = $i + 1;
	    if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$status_active = "Deactive";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";
		$status_active = "Active";
		$EditLink = "<a href='uploadupd.php?upd=2&id=$idvalue&category=$category' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
    $disp .="<tr>
				<td>$slno</td>
				<td  align='left'><img src='../uploads/product_image/$product_img' width='100'></td>
				<td  align='left'><b>$name</b></td>
				<td  align='left'>$result</td>
				<td  align='left'>$layout</td>
				<td  align='left'><span>$</span>$price</td>
				<td width='20%'>
				<div class='btn-group btn-group-xs'>
				<a href='uploadview.php?id=$idvalue&status=$active_status' title='View User Details' class='btn btn-default' data-toggle='tooltip'>$GT_View</a>
					<a href='upload.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>
					$EditLink
					<a href='upload.php?id=$idvalue&act=del' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>
				</div>
				</td>
			</tr>";
}

if($act == "'del'")
    $Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
else if($act == "upd")
    $Message = "<font color='green'><b>Updated Successfully</b></font>" ;
else if($act == "add")
    $Message = "<font color='green'><b>Added Successfully</b></font>" ;
else if($act == "sts")
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
?>
 
	                  <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?echo $Message;?></h3>
                            </div>
                            <div class="panel-body">
							<div class="col-sm-12 text-right"><a class="btn btn-info" href="add_upload_category.php">Add New</a></div>
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th></th>
											<th>Name</th>
											<th>Product Image</th>
											<th>Tags</th>
											<th>Layout</th>
											<th>Price</th>
											<th class='cntrhid'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><? echo $disp; ?></tbody>
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
<? include "footer.php"; ?>