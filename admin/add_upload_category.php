<?include "header.php"; 
$main_cat = isset($main_cat)?base64_encode($main_cat):'';
if(@$submit){
echo "<script>location.href='uploadupd.php?category=$main_cat&upd=1'</script>";	
}
$cat_id1=isset($cat_id1)?$cat_id1:'';
$catlist = "<option value=''>- - Select- -</option>";
$DropDownQry = "select id as cat_id1,name from category where parent_id='0' and child_id='0' order by id asc";
$catlist .= $drop->get_dropdown($db,$DropDownQry,$cat_id1);

$productmode = "<option value=''>- - Select- -</option>";
$DropDownQry = "select product_id as main_category_id,name from product order by product_id asc";
$productmode .= $drop->get_dropdown($db,$DropDownQry,$main_category_id);					
?>
<script type="text/javascript"></script>
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
						<h3 class="panel-title">Add Upload File Category</h3>
					</div>
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="idvalue" value="<?echo $id;?>" />
						<input type="hidden" name="upd" value="<?echo $upd;?>" />
						<div class="panel-body">
							<table style="padding:25px;">
								<tr>
								<td>&nbsp </td>
								<td><select name="main_cat" class="form-control" id="main_cat">
								  <?echo $productmode; ?>
								</select></td>
								<td>
								
								<input type="submit" name="submit" class="form-control" value="Next" onClick="return validate_main_cat();" style="width:100%;color:white;background-color:#009999;" />
								  </td>
								  </tr>
								  </table>
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

 <script src="js/jquery.min.js"></script>
    <script src="js/custom.js"></script>
	
<script>
$('#blah').hide();
$("#product_img").change(function(){
var isImage = validate_img();
if(isImage){
$("#blah").show();	
$("#note").hide();
}
});

function validate_main_cat(){
var main_catVal=$("#main_cat").val();
if(main_catVal=='select'){alert('select category');$("#main_cat").focus();return false;}	
else{return true;}
}