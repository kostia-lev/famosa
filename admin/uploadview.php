<? include "header.php"; ?>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <? include "header_nav.php"; ?>
                    <div class="pageheader">
                        <h3><i class="fa fa-file"></i> Upload File </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="welcome.php"> Home </a> </li>
                                <li class="active">Upload File </li>
                            </ol>
                        </div>
                    </div>
<?
$id = isSet($id) ? $id : '' ;
$page = isSet($page) ? $page : '' ;
$name=isset($name)?$name:'';
$desc_info=isSet($desc_info)?$desc_info:'';
$cat1_id=isSet($cat1_id)?$cat1_id:'';
$cat2_id=isSet($cat2_id)?$cat2_id:'';
$cat3_id=isSet($cat3_id)?$cat3_id:'';
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
$tags=isSet($tags)?$tags:'';
$support=isSet($support)?$support:'';
$comment=isSet($comment)?$comment:'';
$terms=isSet($terms)?$terms : '' ;
$main_category_id = isset($main_category_id)?($main_category_id):'';

$GetRecordView = $db->singlerec("select * from upload where id='$id'");
@extract($GetRecordView);
$GetRefereBy = $db->get_all("select * from upload where id='$id'");
@extract($GetRefereBy);

include "leftmenu.php";
?>
                   <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <!-- Basic Data Tables -->
                        <!--===================================================-->
						<h3>View Uploaded Files Details</h3><a href="upload.php"  class="btn btn-success">Back</a></br>
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
								<table height="400">
                                    <thead>
                                        <tr>
										<td width="30%"><b>Name</b></td><td style="width:50px;">:</td><td><? echo $name;?></td>
										</tr>
										<tr>
										<td><b>Description</b></td><td style="width:50px;">:</td><td><? echo $desc_info; ?></td>
										</tr>
										<tr>
										<td><b>Image</b></td><td style="width:50px;">:</td><td><img src="../uploads/product_image/<? echo $product_img; ?>" width="120px" height="120px">
										</td>
										</tr>
										<tr>
										<td><b>Category</b></td><td style="width:50px;">:</td><td><?echo $cat1;?>&nbsp &nbsp <span>,</span><?echo $cat2;?>&nbsp &nbsp <span>,</span><?echo $cat3;?></td>
										</tr>
										<tr>
										<td><b>High Resolution</b></td><td style="width:50px;">:</td><td><? echo $high_resol; ?></td>
										</tr>
										<tr>
										<td><b>Widget Ready</b></td><td style="width:50px;">:</td><td><? echo $widget_rdy; ?></td>
										</tr>
										<tr>
										<td><b>Compatible Browser</b></td><td style="width:50px;">:</td><td><? 
										$GetBrowser = $db->singlerec("select name from browser where id='$compatible_browser'");
										echo $GetBrowser['name']; ?></td>
										</tr>
										<tr>
										<td><b>Software Version</b></td><td style="width:50px;">:</td><td><? $GetVersion = $db->singlerec("select name from version where version_id='$soft_version'");
										echo $GetVersion['name']; ?></td>
										</tr>
										<tr>
										<td><b>Compatible with</b></td><td style="width:50px;">:</td><td><?
										$Getcompatible = $db->singlerec("select name from compatible where compatible_id='$compatible_with'");
										echo $Getcompatible['name'];?></td>
										</tr>
										<tr>
										<td><b>Framework</b></td><td style="width:50px;">:</td><td><?
										$GetFramework = $db->singlerec("select name from framework where id='$framework'");
										echo $GetFramework['name'];?></td>
										</tr>
										<tr>
										<td><b>ThemeForest Files Included</b></td><td style="width:50px;">:</td><td><? echo $th_f_included; ?></td>
										</tr>
										<tr>
										<td><b>Columns</b></td><td style="width:50px;">:</td><td><? echo $column; ?></td>
										</tr>
										<tr>
										<td><b>Layout</b></td><td style="width:50px;">:</td><td><? echo $layout; ?></td>
										</tr>
										<tr>
										<td><b>Preview URL</b></td><td style="width:50px;">:</td><td><? echo $prev_url; ?></td>
										</tr>
										<tr>
										<td><b>Download URL</b></td><td style="width:50px;">:</td><td><? echo $down_url; ?></td>
										</tr>
										<tr>
										<td><b>Tags</b></td><td style="width:50px;">:</td><td><? echo $tags; ?></td>
										</tr>
										<tr>
										<td><b>Comments</td><td style="width:50px;">:</td><td><? echo $comment; ?></td>
										</tr>
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