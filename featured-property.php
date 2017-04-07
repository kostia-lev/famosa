<?
include 'header.php';
include 'profile_header.php';

if(isset($_GET['randuniq']) && $_GET['ftr'] == 0 || $_GET['ftr'] == 1) {
    
    $prop_uniq = trim(addslashes($_GET['randuniq']));
    $ftr_value = trim(addslashes($_GET['ftr']));

    if ($prop_uniq == '') {
        echo "<script>location.href='$siteurl/manage-your-list';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    $usr = $_SESSION['usr'];

    $prop = $db->singlerec("select * from listings where randuniq='$prop_uniq'");
    if ($prop['id'] == '') {
        echo "<script>location.href='$siteurl/manage-your-list';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    if ($usr != $prop['email']) {
        $_SESSION['ftrerror'] = true;
        echo "<script>location.href='$siteurl/manage-your-list';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    if($ftr_value == 1) {
        $db->insertrec("update listings set featured=0 where email='$usr' and featured=1");
    }

    $db->insertrec("update listings set featured='$ftr_value' where randuniq='$prop_uniq' limit 1");

    $_SESSION['prftr'] = true;
    echo "<script>location.href='$siteurl/manage-your-list';</script>";
    header("Location: $siteurl/manage-your-list");
    exit;
}else{
    echo "<script>location.href='$siteurl/manage-your-list';</script>";
    header("Location: $siteurl/manage-your-list");
    exit;
}
?>