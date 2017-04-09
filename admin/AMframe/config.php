<?php

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
	exit('Accesso non consentito') ;
}

include "framedb.php";
include "global.php";
include "routing.php";
include "dropdownelement.php";
include "images.php";
include "common.php"; 
include "devices.php";
include "numtostr.php"; 
include "notification.php";
include "resize-class.php";
//include "emailer.php";

$db=new database();
$com_obj=new common();
$drop = new dropdown;
$imgobj = new images;
$notifyobj = new notification;

$GetSite = $db->singlerec("select * from general_setting");
$sitelogo = $GetSite['img'];
$sitetitle = ucwords($GetSite['website_title']);
$siteurl = $GetSite['website_url'];
$siteemail = $GetSite['admin_email'];
$sitepaypalemil = $GetSite['paypal_email'] ?? '';
$GetSiteAbt = $db->singlerec("select aboutus from cms where active_status='1'");
$siteaboutus = ucfirst($GetSiteAbt['aboutus']);

function textwatermark($src, $watermark, $save=NULL) { 
	$getext = substr(strrchr($src, '.'), 1);
	$ext = strtolower($getext);
	list($width, $height) = getimagesize($src);
	$image_p = imagecreatetruecolor($width, $height);
	if($ext == "png")
		$image = imagecreatefrompng($src);
	else if($ext == "jpeg" || $ext == "jpg")
		$image = imagecreatefromjpeg($src);
	else if($ext == "gif")
		$image = imagecreatefromgif($src);
	
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height); 
	$txtcolor = imagecolorallocate($image_p, 255, 255, 255);
	$font = 'monofont.ttf';
	$font_size = 14;
	imagettftext($image_p, $font_size, 0, 50, 150, $txtcolor, $font, $watermark);
	if ($save<>'') {
		imagejpeg ($image_p, $save, 100); 
	}
	else {
		header('Content-Type: image/jpeg');
		imagejpeg($image_p, null, 100);
	}
	imagedestroy($image); 
	imagedestroy($image_p); 
}
?>