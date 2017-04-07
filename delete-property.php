<?
include 'header.php';
include 'profile_header.php';

if(isset($_GET['randuniq']) && $_GET['del'] == 1) {

	$prop_uniq = trim(addslashes($_GET['randuniq']));
	if($prop_uniq=='') {
		echo "<script>location.href='$siteurl/manage-your-list';</script>";
		header("Location: $siteurl/manage-your-list"); exit;
	}
	
	$usr=$_SESSION['usr'];
	$prop=$db->singlerec("select * from listings where randuniq='$prop_uniq'");
	if($prop['id']=='') {
		echo "<script>location.href='$siteurl/manage-your-list';</script>";
		header("Location: $siteurl/manage-your-list"); exit;
	}
	if($usr!=$prop['email'] && $row['role']=="broker" || $row['role']=="office-manager") {
		echo "<script>location.href='$siteurl/manage-your-list';</script>";
		header("Location: $siteurl/manage-your-list");  exit;
	}
	
	$db->singlerec("delete from listings where randuniq='$prop_uniq' limit 1");
	$i=$db->get_all("select * from listing_images where pid='".$prop['id']."'");
	foreach($i as $im) {
		$image="images/prop/".$im['image'];
		@unlink($image);
		$imageo="images/prop/org/".$im['image'];
		@unlink($imageo);
		$imageo="images/prop/74_46/".$im['image'];
		@unlink($imageo);
		$imageo="images/prop/230_144/".$im['image'];
		@unlink($imageo);
	}
	$db->singlerec("delete from listing_images where pid='".$prop['id']."'");
	$_SESSION['prdel']=true;
	echo "<script>location.href='$siteurl/manage-your-list';</script>";
	header("Location: $siteurl/manage-your-list"); exit;
}else{
	echo "<script>location.href='$siteurl/manage-your-list';</script>";
	header("Location: $siteurl/manage-your-list");
	exit;
}
?>