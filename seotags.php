<?

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}

//SEO settings
$GLOBALS['generalset'] = $generalset = $db->singlerec("select * from general_setting where id='1'");
$seoset = $db->singlerec("select * from seo_setting where id='1'");
$separator = " - ";

//homepage
if($_SERVER['REQUEST_URI'] == "/") {
    echo "<title>" . $seoset['tag_title'] . "</title>
    ";
    echo "<meta name='description' content='" . $seoset['tag_description'] . "' />
    ";
    echo "<link rel='canonical' href='" . $siteurl . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

//type page
else if(strpos($_SERVER['REQUEST_URI'], 'type')==true) {
    echo "<title>Immobili di tipo " . str_replace('-', ' ', $types) . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

//category page
else if(strpos($_SERVER['REQUEST_URI'], 'category')==true) {
    echo "<title>Immobili della categoria " . $cat . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

//map page
else if(strpos($_SERVER['REQUEST_URI'], 'map')==true) {
    echo "<title>Mappa immobili" . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

//agent-info page
else if(strpos($_SERVER['REQUEST_URI'], 'agent-info')==true) {
    $id = trim(addslashes($id));
    $user = $db->singlerec("select * from register where randuniq='$id' limit 1");

    echo "<title>Agente " . ucwords($user['fullname']) . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    if ($user['active'] == 0) {
        echo "<meta name='robots' content='noindex, nofollow' />
    ";
    } else {
        echo "<meta name='robots' content='index, follow' />
    ";
    }
}

//listing page
else if(strpos($_SERVER['REQUEST_URI'], 'listing')==true) {
    $pid = trim(addslashes($prop));
    $listing = $db->singlerec("select * from listings where randuniq='$pid' limit 1");

    echo "<title>" . ucfirst($listing['prop_title']) . " a " . strtok($listing['location'], ',') . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    if ($listing['post_sts'] == 0) {
        echo "<meta name='robots' content='noindex, nofollow' />
    ";
    } else {
        echo "<meta name='robots' content='index, follow' />
    ";
    }
}

//about-us page
else if(strpos($_SERVER['REQUEST_URI'], 'about-us')==true) {
    echo "<title>Chi siamo" . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

//lavora-con-noi page
else if(strpos($_SERVER['REQUEST_URI'], 'lavora-con-noi')==true) {
    echo "<title>Lavora con noi" . $separator . $generalset['website_title'] . "</title>
    ";
    echo "<link rel='canonical' href='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta name='robots' content='index, follow' />
    ";
}

else {
    echo "<meta name='robots' content='noindex, nofollow' />
    ";
}

if(isset($seoset['tag_title']) && isset($seoset['tag_description']) && isset($seoset['twitter_description']) && isset($seoset['twitter_title']) && isset($seoset['twitter_site'])) {

    echo "<meta property='og:locale' content='it_IT' />
    ";
    echo "<meta property='og:type' content='article' />
    ";
    echo "<meta property='og:title' content='" . $seoset['tag_title'] . "' />
    ";
    echo "<meta property='og:description' content='" . $seoset['tag_description'] . "' />
    ";
    echo "<meta property='og:url' content='" . $siteurl . $_SERVER['REQUEST_URI'] . "' />
    ";
    echo "<meta property='og:site_name' content='" . $generalset['website_title'] . "' />
    ";
    echo "<meta property='article:publisher' content='https://www.facebook.com/" . ($generalset['og_site'] ?? '') . "' />
    ";
    echo "<meta property='og:image' content='" . $siteurl . "/assets/images/logo.png' />
    ";
    echo "<meta property='og:image:width' content='273' />
    ";
    echo "<meta property='og:image:height' content='337' />
    ";
    echo "<meta name='twitter:card' content='summary_large_image' />
    ";
    echo "<meta name='twitter:description' content='" . $seoset['twitter_description'] . "' />
    ";
    echo "<meta name='twitter:title' content='" . $seoset['twitter_title'] . "' />
    ";
    echo "<meta name='twitter:site' content='@" . $seoset['twitter_site'] . "' />
    ";
    echo "<meta name='twitter:image' content='" . $siteurl . "/assets/images/logo.png' />
    ";
    echo "<meta name='twitter:creator' content='@" . $seoset['twitter_site'] . "' />";

}

?>