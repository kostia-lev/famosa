<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-home"></i> Sub Menu </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active"> Sub Menu </li>
                            </ol>
                        </div>
                    </div>
<?
$act = isSet($act) ? $act : '' ; 
$id = isSet($id) ? $id : '' ;
$upd = isSet($upd) ? $upd : '1' ;
$status = isSet($status) ? $status : '' ;
$Message = isSet($Message) ? $Message : '' ;

if($act == "del") {
    $db->insertrec("delete from sub_menu_mst where sub_menu_id='$id'");
    header("location:submenumst.php?act='del'");
    exit ;
}
if($status == "1") {
    $db->insertrec("update sub_menu_mst set active_status='0' where sub_menu_id='$id'");
    header("location:submenumst.php?act=sts");
    exit ;
}
else if($status == "0") {
    $db->insertrec("update sub_menu_mst set active_status='1' where sub_menu_id='$id'");
    header("location:submenumst.php?act=sts");
    exit ;
}

$GetRecord=$db->get_all("select * from sub_menu_mst where active_status !='2' order by main_menu_id asc");
if(count($GetRecord)==0)
    $Message="No Record found";

$disp="";
for($i = 0 ; $i < count($GetRecord) ; $i++) {
    $idvalue = $GetRecord[$i]['sub_menu_id'] ;
	$MM_id = $GetRecord[$i]['main_menu_id'] ;
	$sub_menu = stripslashes($GetRecord[$i]['sub_menu']);
	$disp_sub_menu = stripslashes($GetRecord[$i]['disp_sub_menu']);
	$Get_MM_Data=$db->singlerec("select main_menu from main_menu_mst where main_menu_id='$MM_id'");
	$MM_Data = $Get_MM_Data['main_menu'];
    $active_status = $GetRecord[$i]['active_status'] ;
	$slno = $i + 1 ;
    if($active_status == '0'){
        $DisplayStatus = $GT_InActive;
		$Title = "Active";
		$EditLink = "<a class='btn btn-default' ><i class='fa ><font color='red'>--</font></i></a>";
	}	
    else if($active_status == '1'){
        $DisplayStatus = $GT_Active;
		$Title = "Deactive";	
		$EditLink = "<a href='submenumstupd.php?upd=2&id=$idvalue' data-toggle='tooltip' title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";
	}
	$disp .="<tr>
				<td>$slno</td>
				<td>$MM_Data</td>
				<td>$disp_sub_menu</td>
				<td>
					<div class='btn-group btn-group-xs'>
						<a class='btn btn-default' href='submenumst.php?id=$idvalue&status=$active_status' title='$Title'>$DisplayStatus</a>
						$EditLink
						<a class='btn btn-default' href='submenumst.php?id=$idvalue&act=del' title='Delete'>$GT_Delete</a>
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
    $Message = "<font color='green'><b>Status Changed Successfully</b></font>";
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
							        <div class="col-sm-12 text-right"><a class="btn btn-info" href="submenumstupd.php?upd=1">Add New</a></div>
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>S.No</th>
											<th>Main Menu</th>
											<th>Sub Menu</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody><?echo $disp; ?></tbody>
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
